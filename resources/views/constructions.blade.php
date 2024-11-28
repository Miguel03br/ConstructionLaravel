@extends('master')


@section('content')


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
<title>Bootstrap Example</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
        .navbar-fixed-top {
            position: fixed;
            top: 0;
            left: 250px;
            width: calc(100% - 250px);
            z-index: 9999;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background-color:orange;
            padding-top: 10px;
        }

        .navbar-brand {
            font-size: 25px;
        }
    </style>
</head>
<body>
<div class="sidebar">
        <nav class="d-flex flex-column justify-content-between" style=" background-color:orange; width: 250px; height: 100vh;">
            <div>
                <div class="nav flex-column">
                    <a href="{{route('ConstructionControllerStore')}}" class="nav-link text-light font-weight-bold my-2"> Construções</a>
                    <a href="{{route('UserControllerCreate')}}" class="nav-link text-light font-weight-bold my-2"> Funcinários</a>
                    <a href="" class="nav-link text-light font-weight-bold my-2"> Avisos</a>
                    <a href="{{route('RelatorioControllerIndex')}}" class="nav-link text-light font-weight-bold my-2"> Relatórios</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="flex">
        <nav class="navbar navbar-expand-lg navbar-warning navbar shadow-sm navbar-fixed-top" style="background-color:orange;">
            <div class="container-fluid">
              <h1 class="text-white">sei la</h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </div>

<div>
<a type="button" style="margin-top: 7%;" href="{{ route('ConstructionControllerCreate')}}" class="btn btn-success">Adicionar</a>

@if(session()->has('message'))

{{session()->get('message')}}

@endif

<table class="table mt-3">


  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Data de finalização</th>
      <th scope="col">Andamento</th>
      <th scope="col">Solicitação de materiais</th>
      <th scope="col">Opções</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($allConstructions as $construction)



    <tr>
      <th scope="row">{{$construction->id}}</th>
      <td>

        {{$construction->nome}}

      </td>

      <td>
        {{$construction->data_de_finalizacao}}
      </td>

      <td>
        {{$construction->andamento_da_obra}}
      </td>

      <td>
        {{$construction->solicitacao_de_materiais}}
      </td>

      <td>
        <form action="/constructions/destroy/{{$construction->id}}" method="POST" onsubmit="return confirm('Tem certeza que deseja apagar?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Deletar</button>
        </form>

        <form action="{{route('ConstructionControllerEdit', $construction->id)}}" method="GET"> 
          @csrf
          <button type="submit" class="btn btn-warning">Editar</button>
        </form>
        
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>



@endsection