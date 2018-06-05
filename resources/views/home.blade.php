
@extends('layouts.app')
@section('page_title', 'MÓDULOS')
@section('content')

<link href="{{ asset('css/associados.css') }}" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="col-sm-12 panel-heading">
                    <h3><strong style="font-family: Arial, sans-serif; font-size: 40px;">Módulos</strong></h3>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="full-width margin-top-30">
                            <a href="/contatos">
                                <div class="col-sm-4">
                                    <img src="/img/contatos.jpg" style="width: 150px; margin-left: 35px; margin-right: 100px;">
                                    <div class="col-sm-12" style="text-align: center;"><strong class="title" style="color: black; font-size: 17px;">CONTATOS</strong></div>
                                </div>
                            </a>
                    </div>

                    <div class="full-width margin-top-30">
                            <a href="/usuarios">
                                <div class="col-sm-4" style=" margin-left: 40px">
                                    <img src="/img/usuarios.png" style="width: 160px; margin-top: 15x; margin-bottom: 5px; margin-left: 5px; margin-right: 100px "> 
                                    <div class="full-width item" style="text-align: center;"><strong class="title" style="color: black; font-size: 17px;">USUÁRIOS</strong></div>
                                </div>
                            </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
