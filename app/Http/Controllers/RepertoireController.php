<?php

namespace App\Http\Controllers;

use App\Repertoire;
use Illuminate\Http\Request;

class RepertoireController extends Controller
{
    public function AjoutRep()
    {
        $data=DB::table('repertoire')->get();

        return view('repertoire',compact('data'));
    }

    public function insert(Request $request)
    {
        $pereid = $request->input('d');
        $nomrepertoire= $request->input('nomrepertoire');
        $lig=array('nom'=>'aya','niveau'=>1,'parent'=>1);
        DB::table('repertoire')->insert($lig);
        echo "good";
    }

    public function index()
    {
        return view('document.create');
    }

    public function search(Request $request)
    {
        $search = $request->get('term');
        $result = Repertoire::where('repertoire', 'LIKE', '%'. $search. '%')->get();
        return response()->json($result);
    }
}
