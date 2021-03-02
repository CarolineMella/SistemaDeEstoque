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
                <h3>Editar Produtos</h3>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="{{route('save')}}">
                            @csrf 
                            <br>
                            <div class="form-group">
                                <input type="hidden" name="id" class="form-control" value="{{$data->id}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" class="form-control" value="{{$data->title}}">
                                <input type="hidden" value="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Price</label>
                                <input type="number" name="price" class="form-control" value="{{$data->price}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputQuant">Quantidade</label>
                                <input type="number" name="quantidade" class="form-control" value="{{$data->quantidade}}">
                            </div>

                            <select class="form-control" name="marca_id" required>
                                @foreach($marca as $m)
                                    <option value="{{$m->id}}"
                                        {{isset($data->marca_id) && $data->marca_id == $m->id ?
                                        'selected' : '' }}>{{$m->name}}
                                    </option>
                                @endforeach
                            </select>
                            <br>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection