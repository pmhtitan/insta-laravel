@extends('layouts.app')

@section('title', 'Editar imagen')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header text-center text-uppercase">Editar imagen</div>

                <div class="card-body">
                    <form action="{{ route('image.updated') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="form-group row">
                                
                                <label for="image_before" class="col-md-3 col-form-label text-md-right">Imagen anterior</label>

                                <div class="col-md-7">
                                    <div class="container-avatar">
                                    <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" width="50" height="50" />
                                    </div>
                                </div>                            
                        </div>
                        <div class="form-group row">
                            
                            <label for="image_path" class="col-md-3 col-form-label text-md-right">Nueva imagen</label>

                            <div class="col-md-7">
                                <input id="image_path" type="file" class="form-control{{ $errors->has('image_path') ? ' is-invalid' : '' }}" name="image_path" autofocus>

                                @if ($errors->has('image_path'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_path') }}</strong>
                                    </span>
                                @endif
                            </div>                            
                        </div>

                        <div class="form-group row">
                            
                            <label for="description" class="col-md-3 col-form-label text-md-right">Descripción</label>

                            <div class="col-md-7">
                                <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required autofocus>{{ $image->description }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>                            
                        </div>
                        
                        <input type="hidden" name="image_id" value="{{ $image->id }}"/>

                        <div class="form-group row mb-0">
                            <div class="col-md-3 offset-md-3">
                                <button type="submit" class="btn btn-primary" name="submitCrearImagen">
                                    Actualizar imagen
                                </button>
                            </div>
                        </div>                       
                                            
                    </form>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection



