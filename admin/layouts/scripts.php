<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script src="../js/aos.js"></script>
<script src="../js/main.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			$("#pcategory").change(function(){
				var aid = $("#pcategory").val();
				$.ajax({
					url: 'get_ptypes.php',
					method: 'post',
					data: 'aid=' + aid
				}).done(function(types){
					console.log(types);
					types = JSON.parse(types);
					$('#books').empty();
					books.forEach(function(book){
						$('#books').append('<option>' + book.name + '</option>')
					})
				})
			})
		})
	</script>