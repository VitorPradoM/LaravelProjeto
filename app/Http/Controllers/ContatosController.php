<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contatos;
use DB;
class ContatosController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
  {
    

   $contatos = \App\Contatos::orderBy('id');

     
        if($request->has('nome')){
          $contatos->where("nome", "like", "%{$request->nome}%");
          }
        
    


  $contatos = $contatos->paginate(20);

  return view('contatos.index',['todos'=>$contatos]);
  }

    public function create(Request $request)
  {
      
   
      return view('contatos.create');
  }

  public function store(Request $request)
    {

    	

       $contatos = new Contatos;
       $nome = new Contatos;
    if($request->nome == null || $request->email == null  ||$request->telefone == null || $request->data_nascimento == null)
      {
        $request->session()->flash('alert-danger', ' Preencha todos os campos');
        return view('contatos.create');
    }else{
      
         $nome->nome=$request->nome;
         $nome->email=$request->email;
         $nome->telefone=$request->telefone;
         $nome->data_nascimento=$request->data_nascimento;

          $contatos= DB::table('contatos')
          ->select('contatos.id')
          ->where("contatos.telefone", "=", $request->telefone)
          ->count();
      


         if($contatos>0){
        $request->session()->flash('alert-danger', 'Telefone ja está registrado no nosso sistema digite outro!');
        return view('contatos.create');
         }else{

          $nome->save();
       $request->session()->flash('alert-success', 'Contatos Criado com Sucesso');
      return redirect('/contatos');
    }
       }
        }
  


     public function edit($id)
    {
      function soNumero($num) {
        return preg_replace("/[^0-9]/", "", $num);
      }
 
      $contatos = DB::table('contatos')
        ->select('contatos.id')
        ->where("contatos.id", "=", $id)
        ->get();
          
     
      $contatos = soNumero($contatos);
      $contatos = Contatos::find($contatos);

    
      
      return  view('contatos.edit')->with(array('contatos'=>$contatos));
    }
     public function update(Request $request, $id)
    { 

      function soNumero($num) {
        return preg_replace("/[^0-9]/", "", $num);
      }

      
      $contatos = DB::table('contatos')
        ->select('contatos.id')
        ->where("contatos.id", "=", $id)
        ->get();
          
    
      $contatos = soNumero($contatos);
      $contatos = Contatos::find($contatos);

      $contatos->nome=$request->nome;
      $contatos->email=$request->email;
      $contatos->telefone=$request->telefone;
      $contatos->data_nascimento=$request->data_nascimento;
      $contatos->save();



      $request->session()->flash('alert-success', 'Cadastro Atualizado com Sucesso!');
      
      return redirect('/contatos');
    }


     public function destroy($id,Request $request)
    {
        function soNumero($num) {
        return preg_replace("/[^0-9]/", "", $num);
      }
 
      $contatos= DB::table('contatos')
        ->select('contatos.id')
        ->where("contatos.id", "=", $id)
        ->get();

     
          
      $contatos= soNumero($contatos);
      $contatos = Contatos::find($contatos);
      $contatos->delete();
        $request->session()->flash('alert-success', 'Cadastro deletado com Sucesso!');
      return redirect('contatos');
    }

}
