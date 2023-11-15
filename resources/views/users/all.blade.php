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
                <td><a href="{{route('view_users',$user->id)}}"><button type="button" class="btn btn-primary">Info</button></a></td>
                <td><a href="{{route('delete_user',$user->id)}}"><button type="button" class="btn btn-danger">Apagar</button></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
