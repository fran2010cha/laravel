@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
          <a href="{{ url('categories/create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i>
            Adicionar categoria
          </a>
          <a href="{{ url('generate/pdf/users') }}" class="btn btn-indigo">
            <i class="fa fa-file-pdf"></i>
            Generar Reporte PDF
          </a>
          <a href="{{ url('generate/excel/users') }}" class="btn btn-indigo">
            <i class="fa fa-file-excel"></i>
            Generar Reporte Excel
          </a>
          <form class="navbar-form navbar-left pull-right" role="search">
         <!--    {--!! Form::open(['route' => 'categories.index','method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!--} -->
             <div  class="form-group">
             <!--  {--!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Nombre categoria']) !!--} -->
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
            </form>
          <!-- {--!! Form::close() !!--} -->
          <br><br>
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Nombre </th>
                    <th class="d-none d-sm-table-cell">Descripcion</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                    <tr>
                      <td>{{ $category->name }}</td>
                      <td class="d-none d-sm-table-cell">{{ $category->description }}</td>
                      <td><img src="{{ asset($category->image) }}" width="40px"></td>
                      <td>
                        <a href="{{ url('categories/'.$category->id) }}" class="btn btn-indigo btn-sm">
                          <i class="fa fa-search"></i>
                        </a>
                        <a href="{{ url('categories/'.$category->id.'/edit') }}" class="btn btn-indigo btn-sm">
                          <i class="fa fa-pen"></i>
                        </a>
                        <form action="{{ url('categories/'.$category->id) }}" method="post" style="display: inline-block;">
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
</div>
@endsection
