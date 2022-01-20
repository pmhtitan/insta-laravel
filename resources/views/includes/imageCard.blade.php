<div class="card publicate_img">
    <div class="card-header">
        @if($image->user->image)
        <div class="container-avatar">
            <img src="{{ route('user.avatar', ['filename' => $image->user->image]) }}" />
        </div>
        @endif
        <div class="data-user">
            <a href="{{ route('profile', ['id' => $image->user->id]) }}"><span class="name-surname-home">{{ $image->user->name. ' ' .$image->user->surname }}</span></a>
            <span class="nick-home">{{ '@'. $image->user->nick }}</span>
        </div>
    </div>

    <div class="card-body">

        <div class="img-container">
            <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" />
        </div>

        <div class="description">
            <span>{{'@'. $image->user->nick }}</span>
            <p>{{ $image->description }}</p>
        </div>

        <div class="likes">

            <?php $user_like = false;  // Declaramos false por defecto 
            ?>
            @foreach($image->likes as $like)
            @if($like->user->id == \Auth::user()->id)
            <?php $user_like = true; ?>
            @endif
            @endforeach

            @if($user_like)
            <img src="{{asset('img/heart-red.png')}}" data-id="{{$image->id}}" class="btn-dislike off" name="like"/>
            @else
            <img src="{{asset('img/heart-grey.png')}}" data-id="{{$image->id}}" class="btn-like on" name="like"/>
            @endif

            @if((count($image->likes) >= 1))
            <!-- Si no hay likes, que no muestre el contador -->
            <span class="contador-likes">{{ count($image->likes) }}</span>
            @endif

        </div>

        <div class="comments">
            <a href="{{ route('image.detail', ['id' => $image->id]) }}" class="btn btn-warning btn-sm btn-comments">Comentarios {{ '('. count($image->comments) . ')' }}</a>
        </div>
        <div class="date">
            {{ \FormatTime::LongTimeFilter($image->created_at) }}
        </div>
    </div>
</div>