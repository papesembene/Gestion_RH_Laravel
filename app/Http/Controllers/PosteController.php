<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use Illuminate\Http\Request;

class PosteController extends Controller
{
    /**
     * Affiche la liste des postes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $postes = Poste::Paginate(5);
        return view('postes.index', compact('postes'));
    }

    /**
     * Affiche le formulaire de création d'un poste.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('postes.create');
    }

    /**
     * Enregistre un nouveau poste dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        Poste::create($request->all());

        return redirect()->route('postes.index')->with('store', 'Le poste a été ajouté avec succès.');
    }

    /**
     * Affiche les détails d'un poste.
     *
     * @param  \App\Models\Poste  $poste
     * @return \Illuminate\View\View
     */
    public function show(Poste $poste)
    {
        return view('postes.show', compact('poste'));
    }

    /**
     * Affiche le formulaire de modification d'un poste.
     *
     * @param  \App\Models\Poste  $poste
     * @return \Illuminate\View\View
     */
    public function edit(Poste $poste)
    {
        return view('postes.edit', compact('poste'));
    }

    /**
     * Met à jour les informations d'un poste dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poste  $poste
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Poste $poste)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        $poste->update($request->all());

        return redirect()->route('postes.index')->with('update', 'Le poste a été modifié avec succès.');
    }

    /**
     * Supprime un poste de la base de données.
     *
     * @param  \App\Models\Poste  $poste
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Poste $poste)
    {
        $poste->delete();

        return redirect()->route('postes.index')->with('delete', 'Le poste a été supprimé avec succès.');
    }
}
