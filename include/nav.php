<nav class="navbar">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">
				<img src="images/logo.png" />
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li>
					<a href="mazda.php">
						<span>Mazda</span>
					</a>
				</li>
				<li>
					<a href="mclaren.php">
						<span>Mclaren</span>
					</a>
				</li>
				<li>
					<a href="lamborghini.php">
						<span>Lamborghini</span>
					</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a class="nav-cart" href="cart.php">
						<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
						Shopping Cart <span class="badge"><?php echo $_SESSION["quote"]["total_qty"] ?></span>
					</a>
				</li>
				<li class="dropdown dropdown-account">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>

						<!-- If have logined token, show customer email, otherwsie show Account -->
						<?php if(isset($_SESSION["customer"]["token"]) && !empty($_SESSION["customer"]["token"])): ?>

						<span class="label-customer-email">
							<?php echo $_SESSION["customer"]["email"] ?>
						</span> 

						<?php else: ?>

						<span class="label-customer-email">
							Account
						</span> 

						<?php endif; ?>
					</a>
					<ul class="dropdown-menu">

						<!-- If have logined token, show logout button, otherwsie show login button -->
						<?php if(isset($_SESSION["customer"]["token"]) && !empty($_SESSION["customer"]["token"])): ?>

						<li class="li-btn-logout">
							<a href="action/logout_account.php">
								<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
								<span>Login Out</span>
							</a>
						</li>

						<?php else: ?>

						<li class="li-btn-login">
							<a href="#" onclick="return false;" data-toggle="modal" data-target="#login-modal">
								<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
								<span>Login In</span>
							</a>
						</li>

						<?php endif; ?>

					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>