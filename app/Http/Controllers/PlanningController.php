<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Planning;
use App\Models\Talent;
use Illuminate\Http\Request;

class PlanningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planning = Planning::all();

        return view('plannings.index', compact('planning'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('plannings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'employee_id' => 'nullable',
            'team_id' => 'nullable',
            'datedebut' => 'required|date|before:datefin|after_or_equal:today',
            'datefin' => 'required|date|after:datedebut',
            'start_time' => 'required|date_format:H:i|before:end_time',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'type' => 'required',
            'taches' => 'required',
        ]);

        // Création d'une nouvelle instance de Planning avec les données validées
        $planning = new Planning();
        $planning->employee_id = $request->input('employee_id');
        $planning->team_id = $request->input('team_id');
        $planning->datedebut = $request->input('datedebut');
        $planning->datefin = $request->input('datefin');
        $planning->start_time = $request->input('start_time');
        $planning->end_time = $request->input('end_time');
        $planning->type = $request->input('type');
        $planning->taches = $request->input('taches');

        // Enregistrement du planning
        $planning->save();

        // Redirection vers la page d'index des plannings avec un message de succès
        return redirect()->route('plannings.index')->with('success', 'Planning ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function planning()
    {
        $plannings = Planning::where('employee_id', auth()->user()->employee)->orderBy('datedebut', 'desc')->paginate(10);
        return view('plannings.myplanning', compact('plannings'));
    }
    public function teamPlanning()
    {
        $team = auth()->user()->employee()->first()->team()->first();
//        dd($team);
        // verifier si l'utilisateur a une equipe
        if (!$team) {
            return view('plannings.team_planning');
        }
        $plannings = $team->planning()->orderBy('datedebut', 'desc')->get();
//        dd($plannings);
        /*        je veux recuperer les plannings de l'equipe de l'utilisateur connecté
                sous cette forme:
                [
                {
                    title: 'All Day Event',
                            start: '2023-01-01'
                        },
                {
                    title: 'Long Event',
                            start: '2023-01-07',
                            end: '2023-01-10'
                        },
                ]*/
        $plannings = $plannings->map(function ($planning) {
            return [
                'title' => $planning->tache.' - '.$planning->type.' - '.$planning->status,
                'start' => $planning->datedebut/*.'T'.$planning->start_time*/,
                'end' => $planning->end_date/*.'T'.$planning->end_time*/,
                // url du show de la tache
                'url' => route('plannings.show', $planning->id)
            ];
        });
//        dd($plannings);

        return view('plannings.team_planning',
            [
                'plannings' => $plannings,
                'team' => $team,
                'planning' => new Planning(),
                'types' => ['Réunion', 'Formation'],
                'status' => ['En attente', 'Incompletée', 'Complétée']
            ]
        );
    }
}
