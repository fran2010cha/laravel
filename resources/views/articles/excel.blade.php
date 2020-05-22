<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Reporte en Excel</title>
	<style>
		body {
			font-family: Helvetica;
		}
		table {
			border-collapse: collapse;
		}
		table th,
		table td {
			font-size: 14px !important;
		}
		table th {
			background-color: gray;
			color: white;
			text-align: center;
		}
		table td {
			border: 1px solid silver;
			padding: 10px;
		}
	</style>
</head>
<body>
	<table>
	<thead>
		<tr>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Descripción</th>
            <th>Creación</th>
            <th>Actualización</th>
        </tr>
	</thead>
	@foreach($Articles as $art)
    <tr>
        <td>{{ $art->name }}</td>
        <td>{{ $art->category->name }}</td>
        <td>{{ $art->description }}</td>
        <td>{{ $art->created_at }}</td>
        <td>{{ $art->updated_at }}</td>
    </tr>
	@endforeach
</table>
</body>
</html>
