<?php
	session_start();
	$title = "AdminEdit";
	
	function get_content() {
		$place = "Admin Terminal";
        $value = json_decode(file_get_contents('../../data/users.json'));
?>

<?php require_once '../partials/nav.php'; ?>

<?php require_once '../partials/header.php'; ?>


<section class="container1">
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Username</th>
						<th scope="col">Fullname</th>
						<th scope="col"></th>
						<th scope="col">Tools</th>
					</tr>
                </thead>
                
                <?php 
                    $cc = 0 ;
                    foreach ($value as $i => $values) : 
                        $cc++;
                    if($_SESSION["user_details"]->username != $values->username){
                    ?>
				<tbody>
					<tr>
						<th>
                        <?php echo $cc ?>
						</th>
                        <td><?php echo $values -> username; ?>
                    </td>
						<td><?php echo $values -> fullname; ?></td>
						<td>
							<!-- <a 
								href="/controllers/activate_deactivate.php?id=<?php echo $i ?>" 
								class="btn btn-<?php $product->isActive ? print("secondary") : print('success')?>">
								<?php $product->isActive ? print('Deactivate') : print('Activate')?>
							</a> -->
						</td>
						<td>
							<div>
								<span><button class="btn btn-success ml-2" data-toggle="modal" data-target="#editModal">Edit</button>
								<div class="modal fade" id="editModal">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Edit</h5>
											</div>
											<div class="modal-body">
												<form method="POST" action='/controllers/admin/process_adminedit.php' enctype="multipart/form-data">
													<input type="hidden" name="id" value="<?php echo $id?>">
													<input type="hidden" name="placeses" value="<?php echo $places?>">
													<div class="form-group">
														<label>Username</label>
														<input type="text" name="username" class="form-control" value="<?php echo $values->username ?>">
                                                    </div>
                                                    <div class="form-group">
														<label>Fullname</label>
														<input type="text" name="fullname" class="form-control" value="<?php echo $values->fullname ?>">
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
							
								<a href="/controllers/admin/process_deleteuser.php?id=<?php echo $i?>" class="btn btn-danger" >Delete</a>
							</div>
						</td>
					</tr>

					<tr>
						<th scope="row"></th>
						<div class="d-flex">
							<td></td>
							<td></td>
							<td></td>
						</div>
					</tr>
					<tr>
					</tr>
					
				</tbody>
                    <?php };endforeach; ?>
			</table>
		</section>


		<footer class="bg-dark text-white py-4 text-center">
	<small>Asset Management System</small>
</footer>


<?php
	}
	require_once '../partials/layout.php';
?>
