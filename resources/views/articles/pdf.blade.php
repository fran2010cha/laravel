<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Lista de Artículos</title>
	<style>
		table {
			border-collapse: collapse;
			font-family: sans-serif;
		}
		table thead {
			background-color: #e3342f;
			color: #fff;
			padding: 12px;
			text-align: center;
		}
		table th,
		table td {
			border: 1px solid #333;
			padding: 6px;
		}
		table tbody tr:nth-child(odd) {
			background-color: #ccc;
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
		<tbody>
			@foreach ($arts as $art)
				<tr>
					<td>{{ $art->name }}</td>
					<td>{{ $art->category->name }}</td>
					<td>{{ $art->description }}</td>
					<td>{{ $art->created_at }}</td>
					<td>{{ $art->updated_at }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>
