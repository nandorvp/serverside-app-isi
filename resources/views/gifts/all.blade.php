@extends('layouts.main')
@section('content')
    <style>
        table, th, td {
            border:1px solid black;
        }
    </style>
    <h2>Gifts</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Estimated Cost</th>
            <th>Real Cost</th>
            <th>User</th>
            <th>Custo diferença</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gifts as $gift)
            <tr>
                <td>{{$gift->name}}</td>
                <td>{{$gift->estimated_cost}}</td>
                <td>{{$gift->real_cost}}</td>
                <td>{{$gift->username}}</td>
                <td>{{$gift->diferenca}}</td>
                <td><a href="{{route('view_gift',$gift->id)}}"><button type="button" class="btn btn-primary">Ver/Editar</button></a></td>
                <td><a href="{{route('delete_gift',$gift->id)}}"><button type="button" class="btn btn-danger">Apagar</button></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="/add_gift" ><button class="btn btn-primary">Adicionar Gift</button></a>
@endsection

