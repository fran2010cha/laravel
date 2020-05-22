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
			<th> Id </th>
			<th> Nombre Categoria </th>
			<th> descripcion </th>
		</tr>
	</thead>
	@foreach($categories as $user)
		<tr>
			<td> {{ $user->id }} </td>
			<td> {{ $user->name }} </td>
			<td> {{ $user->description }} </td>
		</tr>
	@endforeach
</table>
</body>
</html>
