@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        @include('includes.message')
        @foreach($images as $image)
           @include('includes.imageCard', ['image' => $image])
        @endforeach

        <!-- PAGINACIÓN -->
        <div class="clearfix"></div>
        {{ $images->links() }}
           
        </div>        
    </div>
</div>
@endsection
