@extends('master')


@section('content')


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
<title>Bootstrap Example</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<nav class="navbar navbar-dark fixed-top" style=" background-color:orange">
  <div class="container-fluid">
    <button class="navbar-toggler" style="border-color:white;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <h1 class="navbar-brand" href="#" style="color:white;">Construções</h1>
    <img src="{{asset('images/user.png')}}" alt="" width="60px" height="60px" style="border-radius: 50%;">
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">ConstruControl</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('ConstructionControllerStore')}}">Construções</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('UserControllerCreate')}}">Funcinários</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{route('avisos')}}">Avisos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="RelatorioControllerIndex">Relatórios</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>



<table class="table " style="margin-top: 10%;">


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
        <form action="/constructions/destroy/{{$construction->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-warning">Deletar</button>
        </form>

        <a type="button" href="/update.blae.php" class="btn btn-warning">Editar</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<!--

<button type="button" id="modalAdicionar" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Adicionar
</button>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar obra:</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="/constructions" method="POST">
        @csrf
        <div class="input-group mb-3">
          <h2>Nome:</h2>
          <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
          <h2>Data de finalização:</h2>
          <input type="date" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
          <h2>Andamento da obra</h2>
            <select class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon">
                <option value="1" id="pendente">Pendente</option>
                <option value="2" id="andamento">Em andamento</option>
                <option value="3" id="finalizada">Finalizada</option>
            </select>       
        </div>

        <div class="input-group mb-3">
          <h2>Solicitação de materiais(Opcional):</h2>
          <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
        </div>
      </form>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success">Adicionar</button>
      </div>
    </div>
  </div>
</div>

-->

<a type="button" href="{{ route('ConstructionControllerCreate')}}" class="btn btn-success">Adicionar</a>

@if(session()->has('message'))

{{session()->get('message')}}

@endif

@endsection