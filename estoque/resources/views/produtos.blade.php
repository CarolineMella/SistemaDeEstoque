@extends('layout.template')

@section('conteudo')
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/produtos') }}" style="padding-left: 25%">
            <h2><strong>Gerenciamento de Estoque  -</strong></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="btn btn-warning" href="{{route('logout')}}">Logout</a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<br>
@if(empty($produtos))
    <div class="alert alert-danger">
        Você não tem nenhum produto cadastrado.
    </div>
@else
    <h3>Listagem de produtos  -
        <a class="btn btn-success " href="{{route('novo')}}">Adicionar Produto</a></li>
    </h3>
    
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="80px">Produto</th>
                <th width="80px">Preço</th>
                <th width="80px">Quantidade [Unidades]</th>
                <th width="80px">Marca</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($produtos as $item)
            <tr class="{{$item->quantidade <= 10 ? 'table-danger' : '' }}">
                <td width="80px">{{$item->title}}</td>
                <td width="80px">R${{$item->price}}</td>
                <td width="80px">{{$item->quantidade}}</td>
                <td width="80px">{{$item->marca->name}}</td>
                <td width="30px">
                    <a href="/produtos/mostra/{{$item->id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </a>
                </td>
                <td width="30px">
                    <a href="/produtos/remove/{{$item->id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </a>
                </td>
                <td width="30px">
                    <a href="/produtos/edit/{{$item->id}}" type="button" class="btn btn-outline-success btn-sm">Editar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
        

    </table>
    {{$produtos->links('pagination::bootstrap-4')}}
    @endif
    <br/>
    @if($item->quantidade <= 10)
        <h4>
            <span class="alert alert-danger">
                Um ou mais itens no estoque!
            </span>
        </h4>
    @endif
    
    <?php $data = old('nome')?>

    @if(old('title'))
        <div class="alert alert-success">
            <strong>Sucesso!</strong>
            O produto {{ old('title') }} foi adicionado.
        </div>
    @endif
 

@endsection

