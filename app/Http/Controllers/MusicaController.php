<?php

namespace App\Http\Controllers;

use App\Models\Musica;
use App\Models\Instrumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class MusicaController extends Controller
{
    // Lista todas as músicas de um instrumento específico
    public function index($instrumentoId)
    {
        $instrumento = Instrumento::findOrFail($instrumentoId);
        $musicas = $instrumento->musicas; // Certifique-se de que isso retorna uma coleção de músicas
        
        return view('musicas.index', compact('musicas', 'instrumento'));
    }
    
    

    // Mostra o formulário para criar uma nova música
    public function create($instrumento_id)
    {
        $instrumento = Instrumento::findOrFail($instrumento_id);
        return view('musicas.create', compact('instrumento'));
    }

    // Armazena uma nova música no banco de dados
    public function store(Request $request, $instrumento_id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'letra' => 'required',
            'imagens.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $instrumento = Instrumento::findOrFail($instrumento_id);

        // Upload das imagens
        $imagens = [];
        if($request->hasFile('imagens')) {
            foreach ($request->file('imagens') as $imagem) {
                $path = $imagem->store('imagens', 'public');
                $imagens[] = $path;
            }
        }

        // Cria a música associada ao instrumento
        Musica::create([
            'instrumento_id' => $instrumento->id,
            'titulo' => $request->titulo,
            'letra' => $request->letra,
            'imagens' => json_encode($imagens),
        ]);

        return redirect()->route('musicas.index', $instrumento->id)->with('success', 'Música cadastrada com sucesso!');
    }

    // Exibe uma música específica
    public function show($instrumento_id, $musica_id)
    {
        $musica = Musica::where('instrumento_id', $instrumento_id)->findOrFail($musica_id);

        return view('musicas.show', compact('musica'));
    }

    public function edit($instrumentoId, $musicaId)
    {
        $instrumento = Instrumento::findOrFail($instrumentoId);
        $musica = Musica::findOrFail($musicaId);
        return view('musicas.edit', compact('instrumento', 'musica'));
    }
    

    public function update(Request $request, $instrumento_id, $musica_id)
    {
        // Validação dos dados
        $request->validate([
            'titulo' => 'required|string|max:255',
            'letra' => 'required',
            'imagens.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Validação das imagens
        ]);

        // Encontra a música no banco de dados
        $musica = Musica::where('instrumento_id', $instrumento_id)->findOrFail($musica_id);

        // Decodifica as imagens atuais
        $imagensExistentes = json_decode($musica->imagens, true);

        // Armazena novas imagens
        $novasImagens = [];
        if ($request->hasFile('imagens')) {
            // Deleta imagens antigas
            foreach ($imagensExistentes as $imagem) {
                Storage::disk('public')->delete($imagem);
            }

            // Adiciona novas imagens
            foreach ($request->file('imagens') as $imagem) {
                $path = $imagem->store('imagens', 'public');
                $novasImagens[] = $path;
            }
        } else {
            // Mantém as imagens existentes se nenhuma nova for enviada
            $novasImagens = $imagensExistentes;
        }

        // Atualiza a música
        $musica->update([
            'titulo' => $request->titulo,
            'letra' => $request->letra,
            'imagens' => json_encode($novasImagens), // Atualiza com novas imagens
        ]);

        return redirect()->route('musicas.index', $instrumento_id)->with('success', 'Música atualizada com sucesso!');
    }
    

    // Exclui uma música
    public function destroy($instrumento_id, $musica_id)
    {
        $musica = Musica::where('instrumento_id', $instrumento_id)->findOrFail($musica_id);
        $musica->delete();

        return redirect()->route('musicas.index', $instrumento_id)->with('success', 'Música excluída com sucesso!');
    }
}
