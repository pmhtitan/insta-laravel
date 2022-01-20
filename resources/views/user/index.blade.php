@extends('layouts.app')

@section('title', 'Buscar personas')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1><div class="people-search-top p-2 text-center text-uppercase">Search people</div></h1>
            <div class="people-search-container p-5">
                @include('includes.message')

                <!-- Que ha buscado -->
                @if(!empty($search))
                    <div class="text-center search-message">{!! 'Se han encontrado <span style="color:blueviolet">'.$users->total(). '</span> resultados para <span style="color:cornflowerblue">'. $search .'</span>' !!}</div><br>
                @endif  

                @foreach($users as $user)
                <div class="profile-user container">
                    <div class="row">
                        @if($user->image)
                        <div class="container-people col col-sm-2">
                            <img class="img-people" src="{{ route('user.avatar', ['filename' => $user->image]) }}" />
                        </div>
                        @endif

                       
                            <div class="col"><h5>{{ '@'. $user->nick }}</h5></div>
                            <div class="col"><h5>{{ $user->name . ' ' .$user->surname }}</h5></div>
                            <div class="col text-right"><a href="{{ route('profile', ['id' => $user->id]) }}" class="btn btn-success btn-sm">Ver perfil</a></div>
                       
                    </div>
                </div>
                @endforeach

                <!-- PAGINACIÓN -->
                <div class="clearfix"></div>
                {{ $users->links() }}

            </div>
        </div>
    </div>
</div>
@endsection