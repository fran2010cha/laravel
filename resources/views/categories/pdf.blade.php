<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Reporte en PDF</title>
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
			<th> Descripcion </th>
		</tr>
	</thead>
	@foreach($cat as $cats)
		<tr>
			<td> {{ $cats->id }} </td>
			<td> {{ $cats->name }} </td>
			<td> {{ $cats->description }} </td>
		</tr>
	@endforeach
</table>
</body>
</html>
