<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Poste;
use Illuminate\Http\Request;

class DeptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $depts = Departement::Paginate(5);
        return view('dept.index', compact('depts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dept.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'chef' => 'required|string|max:255',
        ]);

        Departement::create($request->all());

        return redirect()->route('depts.index')->with('success', 'Le Departement a été ajouté avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Departement $dept)
    {
        return view('dept.show', compact('dept'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departement $dept)
    {
        return view('dept.edit', compact('dept'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'chef' => 'required|string|max:255',
        ]);

        Departement::update($request->all());

        return redirect()->route('depts.index')->with('success', 'Le Departement a été modifie avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departement $dept)
    {
        $dept->delete();

        return redirect()->route('depts.index')->with('success', 'Le departement a été supprimé avec succès.');

    }
}
