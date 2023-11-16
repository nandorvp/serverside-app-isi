@extends('layouts.main')
@section('content')
    <h1>HomePage</h1>
    <ul>
        <li><a href="{{route('users')}}">Todos os utilizadores</a> </li>
        <li><a href="{{route('all_tasks')}}">Todas as tarefas</a> </li>
        <li><a href="{{route('all_gifts')}}">Todas as tarefas</a> </li>
        <li><a href="{{route('add_gifts')}}">Adicionar Gift</a></li>
        <li><a href="{{route('add_users')}}">Adicionar Utilizador</a></li>
        <li><a href="{{route('add_tasks')}}">Adicionar Tarefas</a></li>
    </ul>
    <ul>
        @foreach($weekDays as $day)
            <li>
                {{$day}}
            </li>
        @endforeach
    </ul>
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center">
        @foreach($users as $user)
            <h1>Dados do User:</h1>
            @foreach($user as $item)
                @if($item != null)
                    <li>{{$item}}</li>
                @endif
            @endforeach
            <hr>
        @endforeach
    </div>

@endsection
