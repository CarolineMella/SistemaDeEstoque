@extends('layout.template')

@section('conteudo')
    <h1>Detalhes do Produto: {{$p->title}} </h1>
    <ul>
        <li>
            <b>Price:</b> R$ {{$p->price}}
        </li>
        <li>
            <b>Quantidade em estoque:</b> {{$p->quantidade}}
        </li>
        <li>
            <b>Marca do produto:</b> {{$p->marca->name}}
        </li>
    </ul>
@endsection
