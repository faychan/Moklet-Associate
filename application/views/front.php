<div id="main">
	<div class="fh5co-intro text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
				
				<div class="detail-left-panel">
				<div class="login">
                    <a href="<?php echo $loginURL; ?>"><img src="<?php echo base_url().'assets/img/glogin.png'; ?>" width="225" height="50" /></a>
                </div>
				</div>
				
				<div class="detail-right-panel">
					<h1 class="intro-lead">
						Do Something You Love
					</h1>
				</div>
				
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	<?php 
		if(!empty($notif)) {
			echo 'swal("'.$notif.'","","error");';
		}
	?>
</script>