@extends('layouts.app')

@section('page_title', 'Criar Contatos - ')

@section('content')

<link href="{{ asset('css/projeto.css') }}" rel="stylesheet">
<div class="container">
    <div class="flash-message">
        @foreach (['danger', 'warning', 'succes =s', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach
 </div> 
    
    <div class="col-s m-12">
        <a href="/contatos">
            <button id="btn" type="button" class="btn btn-primary">VOLTAR</button>
        </a>
    </div>

    <form class="" action="/contatos" method="POST">
        <form method="post" action="">            
            <div id="titulo" class="col-sm-12" style="text-align: center;">
                <h3 style="font-size: 30px; color: black; font-weight: bold; ">FICHA CADASTRAL</h3>
            </div>
            <div class="form-group col-sm-12">
                <ul style="list-style-type: none;">
                    <hr style="height:2px; color:#7A7A7A; background-color:#7A7A7A; margin-top: 10px; margin-bottom: 2px; margin-left: -40px; "/>
                    <li style="margin-left: -40px; margin-bottom: -15px; color: #7A7A7A">
                    </li>
                </ul>
            </div>    

              <div class="form-group col-sm-6 ">
                <label>Nome:</label>
                <input type="text" name="nome" class="input form-control">
             </div>


            <div class="form-group col-sm-6 ">
                <label>Data de Nascimento:</label>
                <input type="date" name="data_nascimento" class="input form-control">
            </div>
            
            <div class="form-group col-sm-6">
                <label>email:</label>
                <input type="text" name="email" class="input form-control">
             </div>
             <div class="form-group col-sm-6">
                <label>Telefone:</label>
                <input type="text" name="telefone" class="input form-control">
             </div>

           

            <div class="form-group col-sm-12" style="text-align: center; margin-bottom: 50px; margin-top: 50px;">               
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input id="btn" type="submit" name="name" class="btn btn-primary input" style="padding: 15px;" value="CADASTRAR">
            </div>
        </form>
    </form>
</div>



@endsection
