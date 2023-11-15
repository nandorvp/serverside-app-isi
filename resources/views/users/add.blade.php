@extends('layouts.main')
@section('content')
    @if(isset($user))
        <h2>Aqui podes editar o {{$user -> name}}</h2>
    @else
        <h2>Aqui podes adicionar utilizadores</h2>
    @endif

    <form method="POST" action="{{route("storeUser")}}">
        @csrf
        <input type="hidden" name="user_id" value="{{isset($user) ? $user->id : null}}">
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleInputName" name="name" value="{{isset($user) ? $user->name:''}}" aria-describedby="NameHelp" required>
            @error('name')
                Por favor, coloque um nome!
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input @if(isset($user)) disabled @endif type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{isset($user) ? $user->email:''}}" aria-describedby="emailHelp" required>
            @error('email')
                Por favor, coloque um email!
            @enderror
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="{{isset($user) ? $user->password:''}}" required>
            @error('password')
                Por favor, coloque uma password com pelo menos 6 caracteres!
            @enderror
        </div>
        @if(isset($user))
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{isset($user) ? $user->address:''}}" required>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

