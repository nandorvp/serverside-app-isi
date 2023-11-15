@extends('layouts.main')
@section('content')
        <h2>Aqui podes adicionar tarefas</h2>
    <form method="POST" action="{{route("storeTask")}}">
        @csrf
        <input type="hidden" name="task" value="{{isset($task) ? $task->id : null}}">
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Task Name</label>
            <input type="text" class="form-control" id="exampleInputName" name="name" value="{{isset($task) ? $task->name:''}}" aria-describedby="NameHelp" required>
            @error('name')
            Por favor, coloque um nome!
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" value="{{isset($task) ? $task->description:''}}" required placeholder="Description..."></textarea>
            @error('description')
            Por favor, coloque uma descrição!
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
            Por favor, atribua a tarefa a um user!
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

