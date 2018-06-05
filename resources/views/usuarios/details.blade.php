@extends('layouts.app')

@section('content')

<link href="{{ asset('css/projeto.css') }}" rel="stylesheet">


    <div class="col-sm-6">
        <a style="float: right; margin-top: 12px;" href="/usuarios">
            <button type="button" id="btn" class="btn btn-primary">VOLTAR</button>
        </a>
    </div>

    <form class="" action="/usuarios" method="POST">
        <form method="post" action="">            
            <div id="titulo" class="col-sm-12" style="text-align: center;">
                <h3><b>DETALHES DO USUÁRIO</b></h3>
            </div>

         

            <div class="form-group col-sm-7">
                <label>Nome:</label>   
                <input readonly="" class="input form-control" name="nome" value="{{ $detailpage->name }}">               
            </div>

            <div class="form-group col-sm-3">
                <label>Email:</label>
                <input readonly="" class="input form-control" name="email" value="{{ $detailpage->email }}">               
            </div>
        </form>
    </form>
</div>

@endsection