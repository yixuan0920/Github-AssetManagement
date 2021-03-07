<?php 
	session_start();
	if(!$_SESSION['user_details']) {
		header('Location: /views/forms/login.php');
	}
	$title = 'Booking';
	function get_content() {
	$placeses = array("meetingRoom","carpark","library","gymRoom");
?>

	<div class="container-fluid">
		<?php if(isset($_SESSION['borrow'])): ?>
			<h2 class="py-4">My Booking</h2>

			<table class="table  text-center">
				<thead class="thead-dark">
					<tr>
						<th>Name</th>
						<th>Image</th>
						<th>Quantity</th>
						<th>places</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php
						// $total = 0;
						// foreach($placeses as $i => $places):
						// 	$items = json_decode(file_get_contents("../../data/items/".$places.".json")); 
						// 	foreach($items as $i => $value) :
						// 	if(isset($_SESSION['borrow'][$i])):
						// 		$subtotal = $value->quantity * $_SESSION['borrow'][$i];
						// 		$total += $subtotal;
						// 	if(isset($_SESSION['user_details'])){
						foreach ($_SESSION["borrow"] as $i => $value) {
							# code...
						
								?>
						<tr>
							<td><?php echo $value->modal ?></td>
							<td>
								<img width="50" src="<?php echo $value->image ?>"> 
							</td> 

							<td>
								<?php echo $value->quantity ?>
							</td>

							<td><?php echo $value->place ?></td>

							<td>
								<a href="/controllers/delete_cart_item.php?id=<?php echo $i ?>" class="btn btn-warning">Return</a>
							</td>
						</tr>
						<?php }
						// 	endif;
						// endforeach;
					
						// endforeach;
					?>

					<!-- <tr>
						<td colspan="3">
							<form method="POST" action="/controllers/checkout.php">
								<input 
									type="hidden" 
									name="total"
									value="<?php echo $total ?>">
								<button class="btn btn-primary">Checkout</button>
							</form>
							
							<a href="/controllers/clear_cart.php?id=<?php echo $i ?>">
								<button class="btn btn-danger">Clear Cart</button>
							</a>
						</td>

						<td>Total: <b><?php echo $total ?></b></td>	
					</tr> -->

				</tbody>
			</table>

		<?php else: ?>
			<h2 class="py-4">Your Booking is empty</h2>
			<a href="meetingRoom.php">Go back to borrow</a>

		<?php endif; ?>
	</div>


<?php
	}
	require_once '../partials/layout.php';
?>