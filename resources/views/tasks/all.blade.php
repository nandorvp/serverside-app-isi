@extends('layouts.main')
@section('content')
    <style>
        table, th, td {
            border:1px solid black;
        }
    </style>
    <h2>Tasks</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Responsável</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td>{{$task->name}}</td>
                <td>{{$task->description}}</td>
                <td>
                    {{$task->Username}}
                </td>
                <td><a href="{{route('view_task',$task->id)}}"><button type="button" class="btn btn-primary">Ver/Editar</button></a></td>
                <td><a href="{{route('delete_task',$task->id)}}"><button type="button" class="btn btn-danger">Apagar</button></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

