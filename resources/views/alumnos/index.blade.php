<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
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

    <div class="button-container">
        <!-- Botón para crear un nuevo alumno -->
        <form action="{{ url('alumnos/create') }}" method="get">
            <button type="submit">Registrar Alumno</button>
        </form>
        
        <!-- Botón para filtrar alumnos por fecha -->
        <form action="{{ url('/edad') }}" method="get">
            <button type="submit">Filtrar alumnos por fecha</button>
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
            @foreach($lista as $alumno)
                <tr>
                    <td>{{ $alumno->id }}</td>
                    <td>{{ $alumno->matricula }}</td>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->fecha_nacimiento }}</td>
                    <td>{{ $alumno->telefono }}</td>
                    <td>{{ $alumno->email }}</td>
                    <td>{{ $alumno->nivel->nombre ?? 'Sin nivel' }}</td>
                    <td>
                        <!-- Formulario para ver -->
                        <form action="{{ url('alumnos/' . $alumno->id) }}" method="get">
                            <button type="submit">Ver</button>
                        </form>
                        
                        <!-- Formulario para editar -->
                        <form action="{{ url('alumnos/' . $alumno->id . '/edit') }}" method="get">
                            <button type="submit">Editar</button>
                        </form>

                        <!-- Formulario de eliminar -->
                        <form action="{{ url('alumnos/' . $alumno->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
