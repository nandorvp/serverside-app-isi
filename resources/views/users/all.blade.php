@extends('layouts.main')
@section('content')
    <style>
        table, th, td {
            border:1px solid black;
        }
        a, a:hover, a:focus, a:active {
            text-decoration: none;
            color: inherit;
        }
    </style>
    <h2>Users</h2>
    <div style="display: flex; align-items: center; margin-bottom: 20px">
        <form action="" method="get">
            <select name="user_id" id="" onchange="this.form.submit()">
                <option value="">Todos os Users</option>
                @foreach($allUsers as $user)
                    <option value="{{$user->id}}" @if($user->id == request()->query('user_id')) selected @endif>
                        {{$user->name}}
                    </option>
                @endforeach
            </select>
        </form>
        <form action="">
            <input class="ms-5" type="text" value="{{request()->query('search')}}" name="search" id="" placeholder="Search">
            <button class="btn btn-secondary">Search</button>
        </form>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Responsável</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    {{$user->password}}
                </td>
                @auth()
                    <td><a href="{{route('view_users',$user->id)}}"><button type="button" class="btn btn-primary">Info</button></a></td>
                    <td><a href="{{route('delete_user',$user->id)}}"><button type="button" class="btn btn-danger">Apagar</button></a></td>
                @endauth
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
