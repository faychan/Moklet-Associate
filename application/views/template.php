<!DOCTYPE html>
<html>
    <head>
        <title> Data Alumni </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/icomoon.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/simple-line-icons.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">
	
	<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,500' rel='stylesheet' type='text/css'>
	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	
	<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
	
	<script src="<?php echo base_url(); ?>assets/js/modernizr-2.6.2.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.0.js" type="text/javascript"></script>
	
	
    </head>

    <body 
		<?php 
			if(!empty($background)) {
				echo ' style="background-image:url('.$background.');background-size:100%;background-repeat:
						no-repeat;background-attachment: fixed;"';
			}
		?>
	>
	<header id="fh5co-header" role="banner">
		<nav class="navbar navbar-default" role="navigation" <?php if(!empty($transparent)) {echo $transparent;}?> style="position:fixed; box-shadow: 0px 5px 10px #ddd; width: 100%;">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="navbar-header"> 
						<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle visible-xs-block" data-toggle="collapse" data-target="#fh5co-navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
						<a class="navbar-brand" href="<?php echo base_url() ?>index.php/home"><img src="http://smktelkom-mlg.sch.id/_assets/images/logo.png" width="45px" ></a>
						</div>
						<div id="fh5co-navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav navbar-right">
								<li id="home" ><a href="<?php echo base_url() ?>index.php/home/"><span>Home <span class="border"></span></span></a></li>
								<li id="upload" >
                                    <?php
                                        echo '<a href="'.base_url().'index.php/home/form">Upload</a></li>';
                                    ?>
								<li id="viewdata" ><a href="<?php echo base_url() ?>index.php/home/data_view"><span>View Data<span class="border"></span></span></a></li>;
								<li <?php
										if($this->session->userdata('loggedIn') == TRUE) {
											echo ' id="profile" >';
											echo '<a href="'.base_url().'index.php/home/user_profile">Profile</a>';
										}else if($this->session->userdata('logged_admin') == TRUE){
											echo ">";
											echo '<div class="dropdown" >';
											echo '<a href="'.base_url().'index.php/admin"><button class="dropbtn" style="background: rgba(0, 0, 0, 0);color:darkred;" >';
											echo 'ADMIN';
											echo '</button>';
											echo '<div class="dropdown-content">';
											echo '	<a href="'.base_url().'index.php/home/logout">LogOut</a>';
											echo '</div></div>';
										}else{
											echo ">";
											echo '<a href="'.base_url().'index.php/home/">Sign In</a>';
										}
									?>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<br>
	
	<div class="clear"> </div>
	

	<div style="margin-top:100px;">
        <?php $this->load->view($main_view); ?>
	</div>
	
	<div class="clear"> </div>
	
	<footer id="fh5co-footer" style="background: rgba(0, 0, 0, 0)">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 text-center">
					<p>&copy;S.O.A.P 2017</p>
				</div>
			</div>
		</div>
	</footer>
    </body>
</html>

<script>
$(document).ready(function(){
	$active = "<?php echo $main_view ?>";
	if($active == "front" || $active == "redirect"){
		$('#home').addClass("active");
	}else if($active == "form_view"){
		$('#upload').addClass("active");
	}else if($active == "input"){
		$('#viewdata').addClass("active");
	}else if($active == "profile"){
		$('#profile').addClass("active");
	}
});
</script>