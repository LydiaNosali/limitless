<?php

namespace App\Http\Controllers;

use App\Document;
use App\Repertoire;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index(){

        $documents = Document::all();

        return view('document.create',compact('documents'));
    }

    public function store(){
        $repertoire='';
        $id=0;
        $idd=0;
        $data=request()->validate([
            'file'=>['required','file'],
        ]);
        $rep = request('repertoire');
        $resultat=Repertoire::where('repertoire', '=',$rep)
            ->get();

        foreach ($resultat as $repe) {
                $id= $repe->id;
                $repertoire=$repe->repertoire;
        }
        $r = request('client');
        $resultt=User::where('name', '=',$r)
            ->get();

        foreach ($resultt as $r) {
            $idd= $r->id;
        }
      request('file')->store('uploads','public');
        $document = new Document();

        $document->document = request('document');
        $document->client_id = $idd;
        $document->repertoire_id = $id;
        if (request('compta')=='false')
            $document->compta = 'oui';
        else
            $document->compta = 'non';
        $document->date_ajout = date('Y-m-d H:i:s');

        $document->save();

        return view('document.create');
    }

    public function update(){
        $repertoire=0;
        $resultat=Document::where('document', '=',request('document'))->get();
        foreach ($resultat as $repe) {
            $document = new Document();

            $document->id = $repe->id;
            $document->document = $repe->document;
            $document->repertoire_id = $repe->repertoire_id;
            $document->annule = 1;
            $document->date_ajout = date('Y-m-d H:i:s');
            Document::where('id', '=',$repe->id)->delete();

            $document->save();

            $resultat=Repertoire::where('id', '=',$repe->repertoire_id)->get();
            foreach ($resultat as $repe) {
                $repertoire=$repe->repertoire;
            }

        }
        Storage::move( 'public/uploads/'.request('document').'.pdf', 'public/Textes organiques Annulés/'.request('document').'.pdf');
        return view('document.annuler');
    }

    public function search(Request $request)
    {
        $search = $request->get('term');

        $result = Document::where('document', 'LIKE', '%'. $search. '%')->get();

        return response()->json($result);

    }
}
