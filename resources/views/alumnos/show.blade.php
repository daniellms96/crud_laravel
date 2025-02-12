@extends('layout/template')
@section('title', 'Información del Alumno')
@section('content')

<body>
    <h1>Detalles del alumno con ID: {{ $alumno->id }}.</h1>
    <ul>
        <li>Matrícula: {{ $alumno->matricula }}</li>
        <li>Nombre: {{ $alumno->nombre }}</li>
        <li>Fecha de Nacimiento: {{ $alumno->fecha_nacimiento }}</li>
        <li>Teléfono: {{ $alumno->telefono }}</li>
        <li>Email: {{ $alumno->email ?? 'No proporcionado' }}</li>
        <li>Nivel: {{ $alumno->nivel->nombre ?? 'Sin nivel asignado' }}</li>
    </ul>
</body>
</html>

@endsection
