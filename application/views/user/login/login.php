<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
<div class="row">
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
  				<strong>Check ur user name or Password </strong> <a href="login" class="alert-link">and try submitting again.</a> 
			</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
  				<strong>Check ur user name or Password </strong> <a href="login" class="alert-link">and try submitting again.</a>
				</div>
			</div>
		<?php endif; ?>
		<div class="col-md-12">
			<div class="page-header">
			<span class="error_test"> Please fill all required(*) fields </span>
				<h1>Login</h1>
			</div>
			<?= form_open('','id ="login"'); ?>
			
				<div class="form-group">
				
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Your username">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Your password">
				</div>
				<div class="form-group">
					<input type="submit" id="login_val" class="btn btn-default" value="Login">
					</div>
				
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->