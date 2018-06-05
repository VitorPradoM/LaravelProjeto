@extends('layouts.app')

@section('page_title', 'Usuários')

@section('content')

<link href="{{ asset('css/projeto.css') }}" rel="stylesheet">


<div class="container">

    
<div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach
 </div> 
    <form action="">
        <div id="titulo" class="col-sm-12" style="text-align: center;">
            <h3 style="font-size: 30px; color:black; font-weight: bold; margin-bottom: 50px;">ADMINISTRAÇÃO DE USUÁRIOS</h3>
        </div>
        <div>
        <div class="col-sm-12" >
               

            <div class="form-group col-sm-4" style="float:left;  margin-left:320px; margin-top: 70px;">
                <input id="busca" type="text" class="form-control" name="nome" value="{{ $_GET['search'] or '' }}" placeholder="Nome do Usuário" autocomplete="off">
            </div>
        
            <div class="form-group col-sm-2" style="margin-top: 70px;" >
                <label>&nbsp;</label>
                <button id="btn" type="submit" class="btn btn-primary">BUSCAR</button>
            </div>
    

           

            <div class="form-group col-sm-6 col-sm-offset-6" style="float:left; margin-top: 3%; margin-left: 2px">
            <a href="/home">
            <button type="button" id="btn" class="btn btn-primary" style="float:left;" >VOLTAR</button>
           </a>
          </div>



            <div class="form-group col-sm-6 col-sm-offset-6" style="float: right; margin-top: 3%;">
                <a href="/usuarios/create">
                    <button id="btn" type="button" class="btn btn-primary" style="float: right;"> 
                    NOVO USUÁRIO</button>
                </a>    
            </div>
        </form>     

        <div class="col-sm-12">
            <div id="table" class="panel panel-default">
                <div class="panel-body">
                    <div id="table" class="table-responsive">
                        <table class="table">
                            <thead>
                                <th style="color: #2E58A5;">Nome do Usuário</th>
                                <th style="color: #2E58A5;">Email</th>                         
                            </thead>
                            <tbody>                               
                                @foreach($todosusers as $users)
                                <tr>
                                    <td>{{ $users->name}}</td>
                                    <td>{{ $users->email}}</td>
                                    </td>
                                    <td>
	                                   
                                       
	                               <a href="/usuarios/{{ $users->id }}/destroy" onclick="return confirm ('Tem certeza que deseja remover este usuário')"><img src="/img/lixo.png" width="20" style="margin-bottom: 8px;"></a>
	                               <a href="/usuarios/{{ $users->id }}/edit" ><img src="/img/lapis.jpg" width="20" style="margin-bottom: 8px;"></a>
                                                                                              
                                    </td>                                       
                                </tr>
                                @endforeach                    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 

       <!--  <div class="container col-sm-6 col-sm-offset-5" style="margin-bottom: 100px">
            <div id="pagination" class="full-width">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="font-black"><a href="#" class="active">1</a></li>
                        <li class="font-black"><a href="#">2</a></li>
                        <li class="font-black"><a href="#">3</a></li>
                        <li class="font-black"><a href="#">4</a></li>
                        <li class="font-black"><a href="#">5</a></li>
                        <li class="font-black">
                            <a href="#" aria-label="Next" class="arrow">
                                <span aria-hidden="true" class="arrow_carrot-right"></span>
                            </a>
                        </li> 
                    </ul>
                </nav>
            </div>
        </div> -->
        
    </div>
</div>
    @endsection