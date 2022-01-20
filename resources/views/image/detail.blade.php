@extends('layouts.app')

@section('title', 'comentarios')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

        @include('includes.message')
       
            <div class="card publicate_img">
                    <div class="card-header">
                        @if($image->user->image)
                        <div class="container-avatar">
                            <img src="{{ route('user.avatar', ['filename' => $image->user->image]) }}"/>
                        </div>
                        @endif
                        <div class="data-user">
                            <span class="name-surname-home">{{ $image->user->name. ' ' .$image->user->surname }}</span>
                            <span class="nick-home">{{ '@'. $image->user->nick }}</span>
                        </div>
                     </div>

                    <div class="card-body">

                        <div class="img-container img-detail">
                            <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" />
                        </div>

                        <div class="description">
                            <span>{{'@'. $image->user->nick }}</span>
                            <p>{{ $image->description }}</p>
                        </div>

                        <div class="likes">                     
                        
                        <?php $user_like = false;  // Declaramos false por defecto ?>
                        @foreach($image->likes as $like)
                            @if($like->user->id == \Auth::user()->id)
                                <?php $user_like = true; ?>
                            @endif                        
                        @endforeach

                        @if(\Auth::user() && (\Auth::user()->id == $image->user_id))
                        <div class="actions">
                            <a href=" {{ route('image.update', ['id' => $image->id]) }}" class="btn btn-dark btn-sm">Editar</a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalBorrarFoto">Borrar foto</button>
                        </div><br>
                        @endif

                        @if($user_like)
                            <img src="{{asset('img/heart-red.png')}}" data-id="{{$image->id}}" class="btn-dislike off" name="like"/>
                        @else
                            <img src="{{asset('img/heart-grey.png')}}" data-id="{{$image->id}}" class="btn-like on" name="like"/>
                        @endif

                        @if((count($image->likes) >= 1)) <!-- Si no hay likes, que no muestre el contador -->
                            <span class="contador-likes">{{ count($image->likes) }}</span>
                        @endif  
                          
                        </div>
                        
                        <div class="clearfix"></div>
                        <div class="comments">
                            <h3 class="h3-text-comments"> Comentarios  ({{ count($image->comments) }})  </h3>
                            <div class="caja-comentarios">
                                @foreach($image->comments as $comment)
                                <span class="comment-nick">{{ $comment->user->nick }}</span><span class="comment-content"> {{ $comment->content }}</span>
                                @if(\Auth::check() && ($comment->user->id == \Auth::user()->id || $comment->image->user_id == \Auth::user()->id))
                                <!-- data-toggle="modal" data-target="#modalBorrarFoto" -->
                                <a href=" {{ route('comment.delete', ['id' => $comment->id]) }}" class="btn btn-sm btn-warning btn-delete-comment">Borrar</a>
                                @endif 
                                <div class="hace-comment">{{ \FormatTime::LongTimeFilter($comment->created_at) }}</div>
                                <br>
                                @endforeach
                            </div>
                            <div class="date">
                            {{ \FormatTime::LongTimeFilter($image->created_at) }}
                            </div>
                            <hr>
                        </div>
                        

                        <!-- Formulario escribir comentario -->
                        <form action=" {{ route('comment.save') }}" method="POST">
                            @csrf
                            <input type="hidden" name="image_id" value="{{ $image->id }}"/>
                            <p class="p-comment-box">
                
                                <textarea class="form-control textarea-cmmt {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" required="required" placeholder="Agrega un comentario..."></textarea>
                                @if($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                                <input type="submit" name="submitPublicarCmmt" class="btn btn-info btn-sm btn-cmmt" value="Publicar"></button>
                            </p>
                        </form>
                       
                    </div>
            </div>     
                    <!-- The Modal -->
                <div class="modal fade" id="modalBorrarFoto">
                    <div class="modal-dialog">
                        <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">¿Estás seguro?</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            Si eliminas esta imagen nunca podrás recuperarla, ¿estás seguro de querer borrarla?
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                            <a href="{{ route('image.delete', ['id' => $image->id]) }}" class="btn btn-danger">Borrar definitivamente</a>
                        </div>

                        </div>
                    </div>
                </div>
    </div>
</div>
@endsection
