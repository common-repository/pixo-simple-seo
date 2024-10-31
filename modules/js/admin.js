jQuery(document).ready(function($){
	
	
	$('.inputlimit').each( function(){
		$(this).on('input', function(){
			var limit = parseInt( $(this).attr('data-limit') );

			var lenght = $(this).val().length;
			var diff = 0;
			diff = limit - lenght;
			if( diff < 0 ){
				$(this).next('p').html( '<span class="red">'+diff+' remaining</span>' );
			}else{
				$(this).next('p').html( diff+' remaining' );	
			}
			
		})
	})
	
	$('.inputlimit').each( function(){
			var limit = parseInt( $(this).attr('data-limit') );

			var lenght = $(this).val().length;
			var diff = 0;
			diff = limit - lenght;
			if( diff < 0 ){
				$(this).next('p').html( '<span class="red">'+diff+' remaining</span>' );
			}else{
				$(this).next('p').html( diff+' remaining' );	
			}
			
		})
	
	
	
});