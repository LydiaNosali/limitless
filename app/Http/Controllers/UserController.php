<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $id=0;
        $r=$request->input('compta_id');
        $resultat=User::where([['name', '=',$r],['role','=','comptable']])
            ->get();
        foreach ($resultat as $repe) {
            $id= $repe->id;
            $request['compta_id']=$id;
        }
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());
        return redirect()->route('user.index')->withStatus(__('L\'utilisateur a été créé avec succès.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $hasPassword = $request->get('password');
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$hasPassword ? '' : 'password']
        ));

        return redirect()->route('user.index')->withStatus(__('Utilisateur mis à jour avec succès.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('L\'utilisateur a bien été supprimé.'));
    }
    public function suspend()
    {
        $res=request("suspend");
        User::where('id', $res)
            ->update(['suspend' => "oui"]);
        return redirect()->route('notifications')->withStatus(__('L\'utilisateur a bien été suspendu.'));
    }
    public function desuspend()
    {
        $res=request("desuspend");
        User::where('id', $res)
            ->update(['suspend' => "non"]);
        return redirect()->route('notifications')->withStatus(__('L\'utilisateur a bien été désuspendu.'));
    }
    public function search(Request $request)
    {
        $search = $request->get('term');

        $result = User::where([['role', '=' ,'client' ],
                              [ 'name', 'LIKE', '%'. $search. '%']])->get();

        return response()->json($result);

    }
    public function searchcompta(Request $request)
    {
        $search = $request->get('term');

        $result = User::where([['role', '=' ,'comptable' ],
            [ 'name', 'LIKE', '%'. $search. '%']])->get();

        return response()->json($result);

    }
}
