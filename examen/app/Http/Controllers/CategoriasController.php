<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Familia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categoria::with('familia')->get();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        $familias = Familia::all();
        return view('categorias.create', compact('familias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
            'family_id' => 'nullable|exists:families,id'
        ]);

        $data = $request->except('logo');

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Categoria::create($data);

        return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente.');
    }

    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        $familias = Familia::all();
        return view('categorias.edit', compact('categoria', 'familias'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
            'family_id' => 'nullable|exists:families,id'
        ]);

        $data = $request->except('logo');

        if ($request->hasFile('logo')) {
            if ($categoria->logo) {
                Storage::disk('public')->delete($categoria->logo);
            }
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $categoria->update($data);

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    public function destroy(Categoria $categoria)
    {
        if ($categoria->logo) {
            Storage::disk('public')->delete($categoria->logo);
        }
        
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
