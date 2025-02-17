<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 20px 0 50px 0;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid black;
        }
        form {
            display: inline;
        }
        a, button {
            padding: 5px 10px;
            margin: 0 5px;
            text-decoration: none;
        }
        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Listado de Alumnos</h1>

    <div class="my-3"></div> <!-- Espacio para separar elementos-->

        <div class="button-container">
        <!-- Botón para crear un nuevo alumno -->
        <form action="{{ url('alumnos/create') }}" method="get">
            <button type="submit" class="btn btn-success">Registrar Alumno</button>
        </form>
        
        <!-- Botón para filtrar alumnos por fecha -->
        <form action="{{ url('/edad') }}" method="get">
            <button type="submit" class="btn btn-success">Filtrar alumnos por fecha</button>
        </form>
        </div>

    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Matrícula</th>
            <th>Nombre</th>
            <th>Fecha de Nacimiento</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Nivel</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($lista as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->matricula }}</td>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->fecha_nacimiento }}</td>
                <td>{{ $item->telefono }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->nivel->nombre ?? 'Sin nivel' }}</td>
                <td>
    <!-- Formulario para ver -->
    <form action="{{ url('alumnos/' . $item->id) }}" method="get">
        <button type="submit" class="btn btn-warning">Ver</button>
    </form>
    
    <!-- Formulario para editar -->
    <form action="{{ url('alumnos/' . $item->id . '/edit') }}" method="get">
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>

    <!-- Formulario de eliminar -->
    <form action="{{ url('alumnos/' . $item->id) }}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="8">No hay alumnos registrados</td>
                </tr>
            @endforelse
        </tbody>
</table>

<div class="my-3"></div> <!-- Espacio para separar elementos-->

<div class="d-flex justify-content-end">
    {{ $lista->links() }}
</div>


</body>
</html>
