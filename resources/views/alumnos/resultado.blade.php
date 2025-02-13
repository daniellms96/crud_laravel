@extends('layout/template')

@section('title', 'Resultados de Búsqueda')

@section('content')
    <h1>Alumnos nacidos en el año {{ $anio }}.</h1>

    @if ($alumnos->isEmpty())
        <p>No se encontraron alumnos nacidos en ese año.</p>
    @else
        <ul>
            @foreach ($alumnos as $alumno)
                <li>{{ $alumno->nombre }} - {{ $alumno->fecha_nacimiento }}</li>
            @endforeach
        </ul>
    @endif

    <a href="{{ url('/edad') }}">Volver</a>
@endsection
