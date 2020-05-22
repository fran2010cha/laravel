@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('content')
	<section class="container mt-5">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<h1>
					<i class="fa fa-pencil"></i>
					Editar Categoría
				</h1>
				<hr>
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item">
			    	<a href="{{ url('categories') }}">Lista de Categorías</a>
			    </li>
			    <li class="breadcrumb-item active">
			    	Editar Categoria
			    </li>
			  </ol>
			  @if (count($errors) > 0)
			  	  <div class="alert alert-danger alert-dismissible fade show">
				  @foreach ($errors->all() as $message)
				  		<li>{{ $message }}</li>
				  @endforeach
				  	<button type="button" class="close" data-dismiss="alert">
					   	<span aria-hidden="true">&times;</span>
					</button>
				</div>
			  @endif
				<form action="{{ url('categories/'.$cat->id) }}" method="post">
					@csrf
					@method('PUT')
					<input type="hidden" name="id" value="{{ $cat->id }}">
					<div class="form-group">
						<input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" name="name" placeholder="Nombre" value="{{ $cat->name }}">
					</div>
					<div class="form-group">
						<textarea name="description" class="form-control @if($errors->has('description')) is-invalid @endif" cols="30" rows="4" placeholder="Descripción">{{ $cat->description }}</textarea>
                    </div>
                    {{-- <div class="form-group">
                        <label for="image" class="text-md-right">Foto</label>

                        <button class="btn btn-indigo btn-block btn-upload" type="button">
                            <i class="fa fa-upload"></i>
                            Seleccionar Foto
                        </button>
                        <input id="photo" type="file" class="form-control-file @error('image') is-invalid @enderror d-none" name="image" accept="image/*">

                        <br>
                        <div class="text-center @error('photo') is-invalid @enderror">
                          <img src="{{ asset($cat->image) }}" id="preview" class="img-thumbnail" width="120px">
                        </div>

                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
					<div class="form-group">
						<button class="btn btn-success btn-lg">
							<i class="fa fa-save"></i>
							Editar
						</button>
						<button class="btn btn-light btn-lg" type="reset">
							<i class="fa fa-trash"></i>
							Limpiar
						</button>
					</div>
				</form>
			</div>
		</div>
	</section>
@endsection
