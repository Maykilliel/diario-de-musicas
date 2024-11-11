<?php

namespace App\Http\Controllers;

use App\Models\Instrumento;
use App\Models\EstiloMusical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstrumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instrumentos = Instrumento::with('estiloMusical')->get();
        return view('instrumentos.index', compact('instrumentos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estilosMusicais = EstiloMusical::all();
        return view('instrumentos.create', compact('estilosMusicais'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'instrumento' => 'required|string|max:255',
            'data_cadastramento' => 'required|date',
            'descricao' => 'nullable|string',
            'estilo_musical_id' => 'required|exists:estilos_musicais,id',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' 
        ]);
    
        if ($request->hasFile('imagem')) {
            $imagePath = $request->file('imagem')->store('imagens', 'public');
        } else {
            $imagePath = null;
        }
    
        $instrumento = new Instrumento();
        $instrumento->instrumento = $request->input('instrumento');
        $instrumento->data_cadastramento = $request->input('data_cadastramento');
        $instrumento->descricao = $request->input('descricao');
        $instrumento->estilo_musical_id = $request->input('estilo_musical_id');
        $instrumento->imagem = $imagePath; 
        $instrumento->save();
    
        return redirect()->route('instrumentos.index')->with('success', 'Instrumento cadastrado com sucesso!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $instrumento = Instrumento::with('estiloMusical')->findOrFail($id);
        return view('instrumentos.show', compact('instrumento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $instrumento = Instrumento::findOrFail($id);
        $estilosMusicais = EstiloMusical::all();
        return view('instrumentos.edit', compact('instrumento', 'estilosMusicais'));
    }


    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, $id)
     {
         // Validação
         $request->validate([
             'instrumento' => 'required|string|max:255',
             'data_cadastramento' => 'required|date',
             'descricao' => 'nullable|string',
             'estilo_musical_id' => 'required|exists:estilos_musicais,id',
             'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validação da imagem
         ]);
     
         // Encontra o instrumento no banco de dados
         $instrumento = Instrumento::findOrFail($id);
     
         // Verifica se uma nova imagem foi enviada
         if ($request->hasFile('imagem')) {
             // Deletar a imagem anterior, se existir
             if ($instrumento->imagem) {
                 Storage::disk('public')->delete($instrumento->imagem);
             }
     
             // Armazenar a nova imagem na pasta "public/imagens"
             $imagePath = $request->file('imagem')->store('imagens', 'public');
             $instrumento->imagem = $imagePath; // Atualiza o caminho da imagem
         }
     
         // Atualiza os demais campos
         $instrumento->instrumento = $request->input('instrumento');
         $instrumento->data_cadastramento = $request->input('data_cadastramento');
         $instrumento->descricao = $request->input('descricao');
         $instrumento->estilo_musical_id = $request->input('estilo_musical_id');
     
         // Salvar as alterações no banco de dados
         $instrumento->save();
     
         return redirect()->route('instrumentos.index')->with('success', 'Instrumento atualizado com sucesso!');
     }
     

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $instrumento = Instrumento::findOrFail($id);
        $instrumento->delete();
        return redirect()->route('instrumentos.index');
    }

    public function musicas()
    {
        return $this->hasMany(Musica::class);
    }
    

}
