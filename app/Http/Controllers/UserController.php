<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin/list_users')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/form_users')->with('user', new User());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $formError = [];
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        if($request->input('password') !== $request->input('password2')){
          $formError['password'] = "As senhas precisam ser iguais";

        }
        if(User::where('email', $user->email)->count()){
          $formError['email'] = "Email já cadastrado no sistema";
        }
        if(count($formError)){
          return view('admin/form_users')->with([
                                                  'formError'=> $formError,
                                                  'user' => $user
                                                ]);
        }

        $user->save();

        return view('admin/list_users')->with([
                                                'success' => true,
                                                'message' => "Um novo usuário foi criado",
                                                'users' => User::all()
                                              ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::where('id', $id)->first();

        return view('admin/form_users')->with(['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $formError = [];
        $user = User::where('id', $id)->first();

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if($request->input('password')){
          if($request->input('password') !== $request->input('password2')){
            $formError['password'] = "As senhas precisam ser iguais";
          }
          $user->password = bcrypt($request->input('password'));
        }
        $anotherUser = User::where('email', $user->email)->first();
        if($anotherUser && $anotherUser->id != $id){
          $formError['email'] = "Esse email já está sendo usado.";
        }
        if(count($formError)){
          return view('admin/form_users')->with([
                                            'user' => $user,
                                            'formError' => $formError
                                         ]);
        }

        $user->save();

        return view('admin/list_users')->with([
                                          'success' => true,
                                          'users' => User::all(),
                                          'message' => "Dados alterados com sucesso!"
                                        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $affectedRow = User::where('id', $id)->delete();
        $message = $affectedRow ? "Usuário deletado do sistema." : "Usuário não encontrado";
        return view('admin/list_users')->with([
                                               'message' => $message,
                                               'success' => $affectedRow,
                                               'users' => User::all()
                                             ]);
    }
}
