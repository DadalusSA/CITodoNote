	<body style="background:#dce5e1">
		<nav class="navbar navbar-expand-sm bg-secondary navbar-light sticky-top">

			<div class="container">
					<a class="navbar-brand" href="<?php echo base_url(); ?>">Home</a>
				
					<ul class="navbar-nav">
					
					<?php if(!$this->session->userdata('logged_in')) : ?>
					<li class="nav-item">
						<a class="nav-link navbar-light" href="<?php echo base_url(); ?>users/register">Register </a>
					</li>
					<li class="nav-item">
						<a class="nav-link navbar-light" href="<?php echo base_url(); ?>users/login">Login </a>
					</li>
					<?php endif; ?>
						<?php if($this->session->userdata('logged_in')) : ?>
					<li class="nav-item">
						<a class="nav-link navbar-light" href="<?php echo base_url(); ?>users/logout">Logout </a>
					</li>
					<?php endif; ?>
				</ul>
			</div>
	</nav>

	<div class="container">

		<?php if($this->session->flashdata('user_registered')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered'). '</p>'; ?>

		<?php endif; ?>
		
	<?php if($this->session->flashdata('login_failed')): ?>
			<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed'). '</p>'; ?>

		<?php endif; ?>