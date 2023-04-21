@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear evento</h1>
    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="location">Ubicación</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>

        <div class="form-group">

    <label for="date">Fecha</label>
    <input type="date" class="form-control" id="date" name="date" required>
</div>


    <label for="user_id">Usuario</label>
    <select class="form-control" id="user_id" name="user_id" required>
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
</div>
        <button type="submit" class="btn btn-primary">Crear evento</button>
    </form>
</div>
@endsection
