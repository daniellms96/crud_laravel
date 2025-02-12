@extends('layout/template')
@section('title', 'Nuevo Alumno')
@section('content')

<form action="{{ url('/alumnos') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="matricula" class="form-label">Matrícula</label>
        <input type="text" name="matricula" id="matricula" class="form-control">
    </div>
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control">
    </div>
    <div class="mb-3">
        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control">
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" name="telefono" id="telefono" class="form-control">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    <div class="mb-3">
        <label for="nivel_id" class="form-label">Nivel</label>
        <select name="nivel_id" id="nivel_id" class="form-control">
            @foreach($niveles as $nivel)
                <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
            @endforeach
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
