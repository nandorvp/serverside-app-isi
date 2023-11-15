@extends('layouts.main')
@section('content')
    <h2>User</h2>
    <h6>Nome: {{$user->name}}</h6>
    <h6>Address: {{$user->address}}</h6>
    <h6>Password: {{$user->password}} </h6>
@endsection

