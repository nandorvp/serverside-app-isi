@extends('layouts.main')
@section('content')
    <form method="post" action="{{route('login')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input value="" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        @error('email')
        {{$errors}}
        @enderror
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        @error('password')
        {{$errors}}
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
