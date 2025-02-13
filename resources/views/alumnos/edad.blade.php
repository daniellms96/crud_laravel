@extends('layout/template')

@section('title', 'Ingresar Año de Nacimiento')

@section('content')
    <h1>Buscar alumnos por año de nacimiento</h1>
    <form action="{{ url('/resultado') }}" method="POST">
        @csrf
        <label for="anio">Ingrese el año:</label>
        <input type="number" name="anio" id="anio" required min="1900" max="{{ date('Y') }}">
        <button type="submit">Buscar</button>
    </form>

    <br>
    <!-- Botón para regresar al índice -->
    <a href="{{ url('alumnos') }}">
        <button>Regresar al listado de alumnos</button>
    </a>
@endsection
