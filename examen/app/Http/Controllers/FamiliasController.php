<?php

namespace App\Http\Controllers;

use App\Models\Familia;
use Illuminate\Http\Request;

class FamiliasController extends Controller
{
    public function index()
    {
        $familias = Familia::all();
        return view('familias.index', compact('familias'));
    }

    public function create()
    {
        return view('familias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string'
        ]);

        Familia::create($request->all());

        return redirect()->route('familias.index')->with('success', 'Familia creada exitosamente.');
    }

    public function show(Familia $familia)
    {
        return view('familias.show', compact('familia'));
    }

    public function edit(Familia $familia)
    {
        return view('familias.edit', compact('familia'));
    }

    public function update(Request $request, Familia $familia)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string'
        ]);

        $familia->update($request->all());

        return redirect()->route('familias.index')->with('success', 'Familia actualizada exitosamente.');
    }

    public function destroy(Familia $familia)
    {
        $familia->delete();

        return redirect()->route('familias.index')->with('success', 'Familia eliminada exitosamente.');
    }
}
