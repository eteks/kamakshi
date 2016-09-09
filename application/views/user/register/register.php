<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
  <strong>Please fill the fields correctly as per the instructions</strong> 
</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				
					<div class="alert alert-danger" role="alert">
  			<strong>Oh snap!</strong> Change a few things up and try submitting again.
				</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="col-md-12">
			<div class="page-header">
				<h1>Register</h1>
			</div>
			<?= form_open('','id ="signup"'); ?>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Enter a username">
					<p class="help-block">At least 4 characters, letters or numbers only</p>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
					<p class="help-block">A valid email address</p>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Enter a password">
					<p class="help-block">At least 6 characters</p>
				</div>
				<div class="form-group">
					<label for="password_confirm">Confirm password</label>
					<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm your password">
					<p class="help-block">Must match your password</p>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Register">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->