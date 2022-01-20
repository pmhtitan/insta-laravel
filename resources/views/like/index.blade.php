@extends('layouts.app')

@section('title', 'Favoritos')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center p-4">Mis imágenes favoritas</h1>
        @include('includes.message')

        @foreach($likes as $like)
            <?php $image = $like->image; ?>
            @include('includes.imageCard', ['image' => $image])
        @endforeach

        <!-- PAGINACIÓN -->
        <div class="clearfix"></div>
        {{ $likes->links() }}
           
        </div>        
    </div>
</div>
@endsection
