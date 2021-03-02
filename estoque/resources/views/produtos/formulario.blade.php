@extends('layout.template')

@section('conteudo')
@if($errors->any())
    <div class="alert alert-danger" style="padding-top: 30px">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach 
        </ul>
</div>

@endif
    <div class="d-flex justify-content-center">
        <div class="col-md-4">
            <br>
            <div class="card card-outline" style="margin-top:50%">
                <div class="card-header" style="text-align:center">
                    <h3>Cadastrar Produto</h3>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form class="form-row" method="POST" action="{{route('adiciona')}}">
                                @csrf
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input class="form-control" name="title" type="text" value="{{ old('title') }}">
                                </div>
                                <div class="form-group">
                                    <label>Preço</label>
                                    <input class="form-control" name="price" type="number" value="{{ old('price') }}">
                                </div>
                                <div class="form-group">
                                    <label>Quantidade</label>
                                    <input class="form-control" name="quantidade" type="number" value="{{ old('quantidade') }}">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="marca_id">Selecione a marca deste produto</label>
                                    <select class="form-control" name="marca_id" required>
                                        @foreach($marcas as $marca)
                                            <option value="{{$marca->id}}">{{$marca->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <input type="submit" value="Cadastrar" class="btn btn-primary btn-block"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>    

@endsection