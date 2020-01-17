<?php

namespace App\Http\Controllers;

use App\Repertoire;
use Illuminate\Http\Request;

class RepertoireController extends Controller
{
    public function index()
    {
        return view('repertoire.create');
    }
    public function update()
    {
        $rep = request('del');

       Repertoire::where('repertoire', '=',$rep)
            ->delete();
        //test si c'est le dernier niveau
        return view('repertoire.supprimer');
    }
    public function store()
    {
        $id=0;
        $niveau=0;
        $rep = request('repertoire');
        $resultat=Repertoire::where('repertoire', '=',$rep)
            ->get();
        foreach ($resultat as $repe) {
            $pere=$repe->id;
            $niveau=$repe->niveau;
        }
        $r=Repertoire::get();
        foreach ($r as $repe) {
            $id= $repe->id;
        }
        $repertoire = new Repertoire();
        $repertoire->id=$id+1;
        $repertoire->repertoire = request('fils');
        $repertoire->niveau = $niveau+1;
        $repertoire->parent = $pere;
        $repertoire->save();
        return view('repertoire.create');
    }

    public function search(Request $request)
    {
        $search = $request->get('term');
        $result = Repertoire::where('repertoire', 'LIKE', '%'. $search. '%')->get();
        return response()->json($result);
    }

}
