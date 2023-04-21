@extends('layouts.app')

@section('title', 'Index')
@section('content')

    <style>
table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  font-size: 14px;
}

th, td {
  padding: 10px;
  text-align: center;
}

thead th {
  background-color: #383f46;
  color: #fff;
}

tbody tr:nth-child(odd) {
  background-color: #f2f2f2;
}

tbody tr:hover {
  background-color: #e5e5e5;
}

td a {
  text-decoration: none;
  color: white;
}

.btn {
  display: inline-block;
  padding: 8px 12px;
  background-color: #7f8c8d;
  color: #fff;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

.btn:hover {
  background-color: #2c3e50;
}

    </style>


<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Ubicación</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->description }}</td>
                <td>{{ $event->location }}</td>
                <td>{{ $event->date }}</td>
            
<td>
  
        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Editar</a>

        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar este evento?')">Eliminar</button>
        </form>
  
</td>


            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
