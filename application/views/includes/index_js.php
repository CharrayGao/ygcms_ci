<script type="text/javascript">
$(document).ready(function(){
	$('.lightbox').lightbox();
	$('.new').hover (
		function(){
			$(this).addClass('hover');
		},
		function() {
			$(this).removeClass('hover');
		}
	)
	
	$('.show').mouseover(function(){
		$(this).find("img").css('opacity', 0.5);
	}).mouseout(function(){
		$(this).find("img").css('opacity', 1.0);
	});	
});

</script>
