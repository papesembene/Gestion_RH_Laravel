<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Talent;
use Illuminate\Http\Request;

class TalentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $talents = Talent::Paginate(5);
        return view('talents.index', compact('talents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('talents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'type_talent' => 'required|string|max:255',

        ]);
        Talent::create($request->all());
        return redirect()->route('talents.index')->with('store', ' Le Talent a été ajouté avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Talent $talent)
    {
        return view('talents.show', compact('talent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Talent $talent)
    {
        return view('talents.edit', compact('talent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'type_talent' => 'required|string|max:255',

        ]);
        Talent::update($request->all());
        return redirect()->route('talents.index')->with('update', ' Le Talent a été ajouté avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Talent $talent)
    {
        $talent->delete();
        return redirect()->route('talents.index')->with('delete', 'Le Talent a été supprimé avec succès.');

    }
}
