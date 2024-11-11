<?php

namespace App\Http\Controllers;
use App\Models\EstiloMusical;
use Illuminate\Http\Request;

class EstiloMusicalController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estilosMusicais = EstiloMusical::all();
        return view('estilos_musicais.index', compact('estilosMusicais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estilos_musicais.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'estilo_musical' => 'required|string|max:255',
        ]);
    
        EstiloMusical::create($request->all());
        return redirect()->route('estilos-musicais.index');
    }

    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $estiloMusical = EstiloMusical::findOrFail($id);
        return view('estilos_musicais.show', compact('estiloMusical'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $estiloMusical = EstiloMusical::findOrFail($id);
        return view('estilos_musicais.edit', compact('estiloMusical'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'estilo_musical' => 'required|string|max:255',
        ]);
    
        $estiloMusical = EstiloMusical::findOrFail($id);
        $estiloMusical->update($request->all());
        return redirect()->route('estilos-musicais.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $estiloMusical = EstiloMusical::findOrFail($id);
        $estiloMusical->delete();
        return redirect()->route('estilos-musicais.index');
    }
}
