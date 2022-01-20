@extends('layouts.app')

@section('title', 'Perfil de '.\Auth::user()->name)

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="profile-user">

            @if($user->image)
            <div class="container-avatar">
                <img class="img-avatar" src="{{ route('user.avatar', ['filename' => $user->image]) }}" />
            </div>
            @endif

            <div class="user-info">
              <h2>{{ '@'. $user->nick }}</h2>
              <h3>{{ $user->name . ' ' .$user->surname }}</h3>
              <p>{{ 'Se unió: ' .\FormatTime::LongTimeFilter($user->created_at) }}</p>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="img-perfil-show">
          @foreach($user->images as $image)
            @include('includes.imageCard', ['image' => $image])
          @endforeach
        </div>        
    </div>
</div>
@endsection
