@extends('layouts.main')
@section('content')
    <h2>Aqui podes adicionar Gifts</h2>
    <form method="POST" action="{{route("storeGift")}}">
        @csrf
        <input type="hidden" name="id" value="">
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Gift Name</label>
            <input type="text" class="form-control" id="exampleInputName" name="name" value="" aria-describedby="NameHelp" required>
            @error('name')
            Por favor, coloque um nome!
            @enderror
        </div>
        <div class="mb-3">
            <label for="estimated_cost" class="form-label">Estimated Cost</label>
            <input type="text" class="form-control" id="estimated_cost" name="estimated_cost" value="" aria-describedby="NameHelp" required>
            @error('estimated_cost')
            Por favor, coloque um custo estimado!
            @enderror
        </div>
        <div class="mb-3">
            <label for="real_cost" class="form-label">Real Cost</label>
            <input type="text" class="form-control" id="real_cost" name="real_cost" value="" aria-describedby="NameHelp" required>
            @error('real_cost')
            Por favor, coloque um nome!
            @enderror
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">
                <select id="user_id" name="user_id" required>
                    <option value="" selected>Escolha um User</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">
                            {{$user->name}}
                        </option>
                    @endforeach
                </select>
            </label>
            @error('user')
            Por favor, atribua um presente a um user!
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

