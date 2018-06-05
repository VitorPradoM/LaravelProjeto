<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Users;

class UsuariosController extends Controller
{
  
    function index(Request $request)
    {
       
        $users = \App\Users::orderBy('id');

        if($request->nome!=null)
        {
          if($request->has('nome')){
            $log = \App\Log::create(["action" => "find", "user_id" => \Auth::user()->id, "observation" => "Nome do Usuario - {$request->nome}", "ip" => $_SERVER["REMOTE_ADDR"]]);
            $users->where("name", "like", "%{$request->nome}%");
          }
        }

      
      
      $users= $users->paginate(20);
            
      return view('usuarios.index',['todosusers'=>$users]);
    }

    public function create()
    {
      return view('usuarios.create');
    }


    public function store(Request $request)  
    {
          $users1 = new Users;

          $users1= DB::table('Users')
          ->select('users.id')
          ->where("users.email", "=", $request->email)
          ->count();
          if($users1>0){
        $request->session()->flash('alert-danger', 'Este email já está em uso.Digite outro');
      
      return view('usuarios.create');

          }
if($request->name == null || $request->email == null  ||$request->password == null)
            {

        $request->session()->flash('alert-danger', ' Preencha todos os campos');
        return view('usuarios.create');
        }else{

      $users = new Users;
      $users->name=$request->nome;
      $users->email=$request->email;
      $users->password = bcrypt($request->password);
      $users->save();
      
      $request->session()->flash('alert-success', 'Cadastro Efetuado com Sucesso!');
      
      return redirect('/usuarios')->with('message','Associado atualizado com sucesso!');
    }
  }

    public function show($id)
    { 
      $users=Users::find($id);  

      if(!$users){
        abort(404);
      }    

    return view('usuarios.details')->with(array('detailpage'=>$users));
    
    }

    public function edit($id)
    {
      $users=Users::find($id);

      return view('usuarios.edit')->with(array('detailpage'=>$users));
    }

    public function update(Request $request, $id)
    {      

      if($request->name == null || $request->email == null  ||$request->password == null)
            {
        $users=Users::find($id);
        $request->session()->flash('alert-danger', ' Preencha todos os campos');
        return view('usuarios.edit')->with(array('detailpage'=>$users));
        }else{
      $users = Users::find($id);

          $users->password=bcrypt($request->password);
          $users->name = $request->name;
          $users->email = $request->email;
          $users->save();

       $request->session()->flash('alert-success', 'Usuário atualizado com Sucesso');

          return redirect('/usuarios');
      
}
}
    public function destroy(Request $request,$id)
    {

      $users = Users::find($id);
      $users->delete();
      $request->session()->flash('alert-success', 'Usuário deletado com Sucesso');
   
      return redirect('/usuarios');
    }
}