<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalaireRequest;
use App\Salaire;
use Illuminate\Http\Request;

class SalaireController extends Controller
{
    public function index(Salaire $model)
    {
        return view('salaires.index', ['salaires' => $model->paginate(15)]);
    }

    public function create()
    {
        return view('salaires.create');
    }

    public function store(SalaireRequest $request, Salaire $model)
    {
        $model->create($request);
        return redirect()->route('salaire.index')->withStatus(__('L\'utilisateur a été créé avec succès.'));
    }


    public function edit(Salaire $salaire)
    {
        return view('salaires.edit', compact('salaire'));
    }

    public function update(SalaireRequest $request, Salaire  $salaire)
    {

        $salaire->update($request);

        return redirect()->route('salaire.index')->withStatus(__('Salariée mis à jour avec succès.'));
    }

    public function destroy(Salaire  $salaire)
    {
        $salaire->delete($salaire);

        return redirect()->route('salaire.index')->withStatus(__('Le salariée a bien été supprimé.'));
    }
}
