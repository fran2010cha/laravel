@extends('layouts.app')

@section('title', 'Lista de Categorías')

@section('content')
	<section class="content mt-5">
		<div class="row">
			<div class="col-md-9 offset-md-2">
                {{-- <a href="{{ url('categories/create') }}" class="btn btn-success">
                    <i class="fa fa-file"></i>
                    Adicionar categoria
                  </a> --}}
                  {{-- <a href="{{ url('generate/pdf/categories') }}" class="btn btn-indigo">
                    <i class="fa fa-file-pdf"></i>
                    Generar Reporte PDF
                  </a> --}}
                  <h1>
					<i class="fa fa-list"></i>
					Lista de Categorías
				</h1>
                <hr>
                <form class="navbar-form navbar-left pull-right" role="search">
                    <!--    {--!! Form::open(['route' => 'categories.index','method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!--} -->
                        <div  class="form-group">
                        <!--  {--!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Nombre categoria']) !!--} -->
                           <input type="text" class="form-control" placeholder="Search">
                           {{-- <button type="submit" class="btn btn-default">Buscar</button> --}}
                       </div>
                     </form>
                     <a class="btn btn-indigo" href="{{ url('categories/create') }}">
                        <i class="fa fa-plus"></i>
                        Adicionar Categoría
                    </a>
                    <a class="btn btn-danger" href="{{ url('generate/excel/categories') }}">
                        <i class="fa fa-file-excel"></i>
                        Descargar articulo
                    </a>
				<hr>
				@if (session('message'))
					<div class="alert alert-success alert-dismissible fade show">
					  {{ session('message') }}
					  <button type="button" class="close" data-dismiss="alert">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
				@endif
				<table table class="table table-striped table-bordered">
					<thead class="thead-dark">
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Descripción</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($cats as $cat)
							<tr>
								<td>{{ $cat->id }}</td>
								<td>{{ $cat->name }}</td>
                                <td>{{ $cat->description }}</td>
                                <td >
                                    <a href="{{ url('categories/'.$cat->id) }}" class="btn btn-indigo btn-sm">
                                      <i class="fa fa-search"></i>
                                    </a>
                                    <a href="{{ url('categories/'.$cat->id.'/edit') }}" class="btn btn-indigo btn-sm">
                                      <i class="fa fa-pen"></i>
                                    </a>
                                    <form action="{{ url('categories/'.$cat->id) }}" method="post" style="display: inline-block;">
                                      @csrf
                                      @method('DELETE')
                                      <button type="button" class="btn btn-danger btn-sm btn-delete">
                                        <i class="fa fa-trash"></i>
                                      </button>
                                    </form>
                                  </td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section>
@endsection

