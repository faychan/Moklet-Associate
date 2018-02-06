<style>
	.logout {
		padding: 10px;
		margin: 10px 15px;
		width: 125px;
		height: 50px;
		border: 1px solid #e32929;
		background: #e32929;
		font-size: 18px;
		color: #fff;
		font-family: 'Roboto Slab', arial, sans-serif;
		cursor: pointer;
		text-align: center;
	}
	
	.logout:hover{
		background: #b20707;
		border: 1px solid #8c1919;
	}
</style>
<div class="main" style="width: 60%;">
  	<div class="panel panel-info" >
		<div class="panel-body" >
		<h2>My Profile</h2>
		<div class="detail-left-panel" style="word-wrap: break-word;" >
			<div class="detail-group" ><label for="nama" >Nama</label>
				<div class="detail" id="nama" ><?php echo @$userData['first_name'].' '.@$userData['last_name']; ?></div></div>
				
			<div class="detail-group" ><label for="email" >Email</label>
				<div class="detail" id="email" ><?php echo @$userData['email']; ?></div></div>
				
			<div class="detail-group" ><label for="jk" >Jenis Kelamin</label>
				<div class="detail" id="jk" ><?php echo @$userData['gender']; ?></div></div>
				
			<div class="detail-group" ><label for="g_id" >Google ID</label>
				<div class="detail" id="g_id" ><?php echo @$userData['oauth_uid']; ?></div></div>
				
			<div class="detail-group" ><label for="glink" >Google+ Link</label>
				<div class="detail" id="glink" >
					<a href="<?php echo @$userData['profile_url']; ?>" target="_blank"><?php echo @$userData['profile_url']; ?></a>
			</div></div>
			
		</div>
		
		<div class="detail-right-panel" >
			<div class="detail-group" >
				<div class="detail-foto">
					<img width="100%" src="<?php echo @$userData['picture_url']; ?>"/>
			</div></div>			
			<div class="detail-group"><label for="logout" class="logout"> LogOut </label>
				<a href="<?php echo base_url(); ?>index.php/home/logout"><button style="display:none" id="logout" ></button></a>
			</div>
		</div>
		</div>
	</div>
</div>