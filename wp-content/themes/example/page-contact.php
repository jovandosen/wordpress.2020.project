<?php get_header(); ?>
<div class="container add-box-style">
	<div class="row">
		<div class="col-md-4">
			
			<h3>REGISTER</h3>
			<hr class="form-heading-hr">
			<form>
				<div class="form-group">
					<label for="first-name" class="form-el-style">First Name</label>
					<input type="text" name="first-name" class="form-control" id="first-name" placeholder="First Name...">
					<small class="form-text text-muted" id="first-name-help">Enter First Name.</small>
				</div>
				<div class="form-group">
					<label for="last-name" class="form-el-style">Last Name</label>
					<input type="text" name="last-name" class="form-control" id="last-name" placeholder="Last Name...">
					<small class="form-text text-muted" id="last-name-help">Enter Last Name.</small>
				</div>
				<div class="form-group">
					<label for="email" class="form-el-style">Email</label>
					<input type="email" name="email" class="form-control" id="email" placeholder="Email address...">
					<small class="form-text text-muted" id="email-help">Enter email address.</small>
				</div>
				<div class="form-group">
					<label for="password" class="form-el-style">Password</label>
					<input type="password" name="password" class="form-control" id="password" placeholder="Password...">
					<small class="form-text text-muted">Enter Password, atleast 6 characters, use letters and numbers.</small>
				</div>
				<div class="form-group">
					<span class="form-el-style">Gender</span>
					<div class="form-check add-margin-for-span">
						<input type="radio" name="gender" value="male" id="male" class="form-check-input" checked>
						<label for="male" class="form-check-label">Male</label>
					</div>
					<div class="form-check">
						<input type="radio" name="gender" value="female" id="female" class="form-check-input">
						<label for="female" class="form-check-label">Female</label>
					</div>
				</div>
				<button type="button" class="btn btn-primary">REGISTER</button>
			</form>

		</div>
		<div class="col-md-4">
			
			<h3>LOGIN</h3>
			<hr class="form-heading-hr">
			<form>
				<div class="form-group">
					<label for="email" class="form-el-style">Email</label>
					<input type="email" name="email" class="form-control" id="email" placeholder="Email address...">
					<small class="form-text text-muted" id="email-help">Enter email address.</small>
				</div>
				<div class="form-group">
					<label for="password" class="form-el-style">Password</label>
					<input type="password" name="password" class="form-control" id="password" placeholder="Password...">
					<small class="form-text text-muted">Enter Password, atleast 6 characters, use letters and numbers.</small>
				</div>
				<div class="form-group">
					<div class="form-check">
						<input type="checkbox" name="remember" id="remember" class="form-check-input" checked>
						<label for="remember" class="form-check-label">Remember me</label>
					</div>
				</div>
				<button type="button" class="btn btn-primary">LOGIN</button>
			</form>

		</div>
		<div class="col-md-4">
			
			<h3>CONTACT</h3>
			<hr class="form-heading-hr">
			<form>
				<div class="form-group">
					<label for="name" class="form-el-style">Name</label>
					<input type="text" name="name" id="name" class="form-control" placeholder="Name...">
					<small class="form-text text-muted">Enter your name.</small>
				</div>
				<div class="form-group">
					<label for="email" class="form-el-style">Email</label>
					<input type="email" name="email" class="form-control" id="email" placeholder="Email address...">
					<small class="form-text text-muted" id="email-help">Enter email address.</small>
				</div>
				<div class="form-group">
					<label for="message" class="form-el-style">Message</label>
					<textarea name="message" id="message" class="form-control">Your message...</textarea>
					<small class="form-text text-muted" id="message-help">Enter your contact message.</small>
				</div>
				<div class="form-group">
					<label for="file" class="form-el-style">Upload file</label>
					<input type="file" name="file" id="file" class="form-control-file">
				</div>
				<button type="button" class="btn btn-primary">CONTACT</button>
			</form>

		</div>
	</div>
</div>	
<?php get_footer(); ?>