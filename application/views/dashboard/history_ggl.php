<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<scrip src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<div class="container box">
		<p>STAR RATING</p>
		<br/>
			<span id="bussiness_list"></span>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			function load_data()
			{
				$.ajax({
					url:"<?php echo base_url()?>dashboard/fetch",
					method:"POST",
					success:function(data)
					{
						$('#bussiness_list').html(data);
					}
				})
			}
		});
	</script>