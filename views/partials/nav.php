<nav class="navbar navbar-expand-lg position-a w-100">
	<a href="../forms/homepage.php" class="navbar-brand text-white">Monday.com</a>
	
	<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
		<span class="text-white">MENU</span>
		<span><i class="fa fa-bars text-white" aria-hidden="true"></i></span>
	</button>

	<div class="navbar-collapse	apse navbar-collapse text-center" id="navbarMenu">
		<div class="navbar-nav ml-auto">

			<a href="../forms/homepage.php" class="nav-link text-white">Home</a>
			<?php if(isset($_SESSION['user_details']) && $_SESSION['user_details']->isAdmin) :?>
			<a href="/views/forms/register.php" class="nav-link text-white">Register</a>
			<?php endif; ?>
			<?php if(isset($_SESSION['user_details']) && !$_SESSION['user_details']->isAdmin) :?>
			<a href="/views/forms/booking.php" class="nav-link text-white">Booking</a>
			<a href="/views/partials/user_edit.php" class="nav-link text-white">Profile</a>
			<?php endif; ?>

			<?php if(isset($_SESSION['user_details']) && $_SESSION['user_details']->isAdmin) :?>
			<a href="/views/partials/products.php" class="nav-link text-white">Upload</a>
			<?php endif; ?>
			<a href="../../controllers/process/process_logout.php" class="nav-link text-white">Logout</a>

		</div>
	</div>
	
</nav>