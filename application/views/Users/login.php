<?php echo form_open('users/login'); ?>
<div class="container-fluid">
	<div class="row justify-content-md-center">
		<div class="col col-md-3">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Enter username" required autofocus>
			</div>
		
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Enter password" required autofocus>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Login</button>
		</div>

	</div>

<?php echo form_close(); ?>