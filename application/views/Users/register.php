
<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
<div class="row justify-content-md-center">
	<div class="col col-md-3">
		<h2 class="text-center"><?= $title; ?></h2>
	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="name" placeholder="Enter name">
	</div>
	<div class="form-group">
		<label>Zipcode</label>
		<input type="text" class="form-control" name="zipcode" placeholder="Zipcode">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="email" placeholder="Enter Email">
	</div>
	<div class="form-group">
		<label>Username</label>
		<input type="text" class="form-control" name="username" placeholder="Username">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" class="form-control" name="password" placeholder="Enter password">
	</div>
	<div class="form-group">
		<label>Name</label>
		<input type="password" class="form-control" name="password2" placeholder="Re-enter password">
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
<?php echo form_close(); ?>

