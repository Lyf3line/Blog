
<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>

<div class="row">
		<div class="col-md-4 offset-md-4">
			<br><h2 class="text-center"><?= $title; ?></h2>
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="name" placeholder="Name">
			</div>

			<div class="form-group">
				<label>E-mail</label>
				<input type="email" class="form-control" name="email" placeholder="Email">
			</div>

			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="username" placeholder="username">
			</div>

			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password" placeholder="Password">
			</div>

			<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" class="form-control" name="password2" placeholder="Confirm password">
			</div>
			<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</div>
</div>
<?php echo form_close(); ?>