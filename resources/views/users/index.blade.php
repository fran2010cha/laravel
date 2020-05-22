@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11 offset-md-1">
            <h1>
                <i class="fa fa-list"></i>
                Lista de Usuarios
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
          <a href="{{ url('users/create') }}" class="btn btn-indigo">
            <i class="fa fa-plus"></i>
            Adicionar Usuario
          </a>
          <a href="{{ url('generate/pdf/users') }}" class="btn btn-danger">
            <i class="fa fa-file-pdf"></i>
            Generar Reporte PDF
          </a>
          <a href="{{ url('generate/excel/users') }}" class="btn btn-danger">
            <i class="fa fa-file-excel"></i>
            Generar Reporte Excel
          </a>
          <br><br>
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th>Nombre Completo</th>
                    <th class="d-none d-sm-table-cell">Correo Electrónico</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                    <tr>
                      <td>{{ $user->fullname }}</td>
                      <td class="d-none d-sm-table-cell">{{ $user->email }}</td>
                      <td><img src="{{ asset($user->photo) }}" width="40px"></td>
                      <td>
                        <a href="{{ url('users/'.$user->id) }}" class="btn btn-indigo btn-sm">
                          <i class="fa fa-search"></i>
                        </a>
                        <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-indigo btn-sm">
                          <i class="fa fa-pen"></i>
                        </a>
                        <form action="{{ url('users/'.$user->id) }}" method="post" style="display: inline-block;">
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
                <tfoot>
                  <tr>
                    <td colspan="4">{{ $users->links() }}</td>
                  </tr>
                </tfoot>
            </table>

        </div>
    </div>
</div>
@endsection
