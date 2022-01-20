var url = 'http://proyecto-laravel.develop:8083/';
window.addEventListener("load", function(){
	
	$('.btn-like').css('cursor', 'pointer');
	$('.btn-dislike').css('cursor', 'pointer');
	
	// Botón de like
	/* function like(){
		$('.btn-like').unbind('click').click(function(){
			console.log('like');
			$(this).addClass('btn-dislike').removeClass('btn-like');
			$(this).attr('src', url+'/img/heart-red.png');
			
			$.ajax({
				url: url+'/like/'+$(this).data('id'),
				type: 'GET',
				success: function(response){
					if(response.like){
						console.log('Has dado like a la publicacion');
					}else{
						console.log('Error al dar like');
					}
				}
			});
			
			dislike();
		});
	}
	like();
	
	// Botón de dislike
	function dislike(){
		$('.btn-dislike').unbind('click').click(function(){
			console.log('dislike');
			$(this).addClass('btn-like').removeClass('btn-dislike');
			$(this).attr('src', url+'/img/heart-grey.png');
			
			$.ajax({
				url: url+'/dislike/'+$(this).data('id'),
				type: 'GET',
				success: function(response){
					if(response.like){
						console.log('Has dado dislike a la publicacion');
					}else{
						console.log('Error al dar dislike');
					}
				}
			});
			
			like();
		});
	}
	dislike(); */	


//	Alternativa 

	  //   <img src="{‌{asset('/img/heart-red.png') }}" class="off" data-id="{{$image->id}}" name="like" />
	  
	  //   <img src="{‌{asset('/img/heart-grey.png') }}" class="on" data-id="{{$image->id}}" name="like" />




     //Seleccionamos el html clickado con name = like

					$('[name="like"]').click(function(){

									console.log('item clicked'+ $(this));

				//Comprobamos si tiene clase off u on y lo cambiamos

									if($(this).hasClass( "on" )){

											$(this).addClass('off').removeClass('on');

											$(this).attr('src',url+'img/heart-red.png');

											$.ajax({
												url: url+'/like/'+$(this).data('id'),
												type: 'GET',
												success: function(response){
													if(response.like){
														console.log('Has dado like a la publicacion');
													}else{
														console.log('Error al dar like');
													}
												}
											});

									}

									else{

											$(this).addClass('on').removeClass('off');     

											$(this).attr('src',url+'img/heart-grey.png');
											
											$.ajax({
												url: url+'/dislike/'+$(this).data('id'),
												type: 'GET',
												success: function(response){
													if(response.like){
														console.log('Has dado dislike a la publicacion');
													}else{
														console.log('Error al dar dislike');
													}
												}
											});

									}

					});


	

	//	BUSCADOR

	$('#buscador').submit(function(e){
		e.preventDefault();

		$(this).attr('action',url +'people/'+$('#searchID').val());
		document.getElementById("buscador").submit();
	});	
});
