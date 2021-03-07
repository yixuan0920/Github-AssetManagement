<?php
	session_start();
	$title = "Gym Room";
	function get_content() {
		$place = "Gym Room Page";
		$placeses = array("gymRoom");
		$url = "../../data/";
			
?>

<?php require_once '../partials/nav.php'; ?>

<?php require_once '../partials/header.php'; ?>

<?php require_once '../partials/nav2.php'; ?>

		<section class="container1">
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">Image</th>
						<th scope="col">Asset Tag</th>
						<th scope="col">Model</th>
						<th scope="col">Quantity</th>
						
						<?php if(isset($_SESSION['user_details']) && $_SESSION['user_details']->isAdmin) :?>
							<th scope="col">Status</th>
					<?php endif;?>


					</tr>
				</thead>

				<?php foreach ($placeses as $key => $places) :
					$items = json_decode(file_get_contents($url.$places.".json"));
					foreach ($items as $id => $value) :?>

				<tbody>
					<tr>
						<th>
							<img src="<?php echo $value->image; ?>">
						</th>
						<td>#HFKO61235</td>
						<td><?php echo $value->modal; ?></td>
						<td>
							<span><?php echo $value->quantity; ?></span>
						</td>

								<!-- <?php if(isset($_SESSION['user_details']) && $_SESSION['user_details']->isAdmin) :?>
						<td><?php echo $_SESSION['user_details']->fullname; ?></td>
								<?php endif; ?> -->


							<?php if(isset($_SESSION['user_details']) && $_SESSION['user_details']->isAdmin) :?>
						<td>
							<a 
								href="../../controllers/admin/activate_deactivate.php?id=<?php echo $id ?>&places=<?php echo $places?>" 
								class="btn btn-<?php $value->isActive ? print("secondary") : print('primary')?>">
								<?php $value->isActive ? print('Deactivate') : print('Activate')?>
							</a>
						</td>
							<?php endif; ?>

						<td>
							<?php if(isset($_SESSION['user_details']) && $_SESSION['user_details']->isAdmin): ?>
							<div>
								<span><a href="../../controllers/admin/process_delete.php?id=<?php echo $id?>&places=<?php echo $places?>" class="btn btn-danger" >Delete</a></span>
								<span><button class="btn btn-success ml-2" data-toggle="modal" data-target="#editModal">Edit</button>

								<div class="modal fade" id="editModal">
									<div class="modal-dialog">
										<div class="modal-content">

											<div class="modal-header">
												<h5 class="modal-title">Edit Product</h5>
											</div>

											<div class="modal-body">
												<form method="POST" action='/controllers/admin/process_edit.php' enctype="multipart/form-data">
													<input type="hidden" name="id" value="<?php echo $id?>">
													<input type="hidden" name="placeses" value="<?php echo $places?>">

													<div class="form-group">
														<label>Image</label>
														<img src="<?php echo $value->image ?>" class="d-block img-fluid image1">
														<input type="file" name="image" value="<?php echo $value->image ?>">
														<input type="hidden" name="current_image" class="form-control" value="<?php echo $value->image ?>">
													</div>


													<div class="form-group">
														<label>Model</label>
														<input type="text" name="modal" class="form-control" value="<?php echo $value->modal ?>">
													</div>

													<div class="form-group">
														<label>Status</label>
														<input type="number" name="quantity" max="99" min="1">
													</div>

													<button class="btn btn-primary">Submit</button>

												</form>
											</div>

											<div class="modal-footer">
												<button data-dismiss="modal" class="btn btn-secondary">Cancel</button>
											</div>

										</div>
									</div>
								</div>
							</div>
						<?php endif; ?>

								</span>
							</div>

							<div>
								<?php if(isset($_SESSION['user_details']) && !$_SESSION['user_details']->isAdmin) :?>
								<?php //if($value->isActive) :?>
								<!-- <form method="POST" action="/controllers/user/borrow_product.php?id=<?php echo $id ?>&places=<?php echo $places?>">
								<input type="hidden" name="id" value="<?php echo $id ?>">

								<div class="input-group">
									<input type="number" name="quantity" class="form-control" min="1" max="99" required> -->

									<form class="input-group-append" action="/controllers/user/booking.php" method="GET">
										<input type="hidden" name="id" value="<?php echo $id?>">
										<input type="hidden" name="places" value="<?php echo $places?>">
										<input type="hidden" name="quantity" value="<?php echo $value->quantity?>">
										<button class="btn btn-warning mr-auto" <?php 
											if(!$value->isActive) echo "disabled";
										?>>Borrow</button>
									</form>
									</div>
								<!-- </div>

							</form> -->
							<?php endif;//endif;
							 ?>

								<!-- <?php if(isset($_SESSION['user_details']) && !$_SESSION['user_details']->isAdmin) :?>
								<?php if(!$value->isActive) :?>
								<span class="btn disabled">Borrow</span>
							<?php endif;endif; ?> -->

							</div>
						</td>
					</tr>
					
				</tbody>

			<?php endforeach;
					endforeach; ?>
			</table>
		</section>



<?php

	}
	require_once '../partials/layout.php';
?>