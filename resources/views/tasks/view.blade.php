@extends('layouts.main')
@section('content')
    <form action="{{route('tasks_update')}}" method="post">
        @csrf
        <input type="hidden" name="task_id" value="{{$task->id}}">
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Task Name</label>
            <input type="text" class="form-control" id="exampleInputName" name="name" value="{{$task->name}}" aria-describedby="NameHelp" required>
            @error('name')
            Por favor, coloque um nome!
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{$task->description}}" required>
            @error('description')
            Por favor, coloque uma descrição!
            @enderror
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">
                <select id="user_id" name="user_id" required>
                    <option value="" selected>Escolha um User</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}" @if($user->id == $task->user_id) selected @endif>
                            {{$user->name}}
                        </option>
                    @endforeach
                </select>
            </label>
            @error('user')
            Por favor, atribua a tarefa a um user!
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

