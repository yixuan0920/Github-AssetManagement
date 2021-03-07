<?php
	session_start();
	$title = "Admin Setting";
	$place = "Admin Edit";
	$place1 = "Admin Edit";
	function get_content() {
			
?>
		<div class="container-fluid">
            <form method="POST" action="/controllers/admin/process_adminedit.php">
                <div class="editprofileform">
                    <div class="form-group row">
					    <label for="text" class="col-sm-2 col-form-label">User Name</label>
					    <div class="col-sm-10">
						    <input type="text" class="form-control textbox" id="username" name="username" value="<?php echo $_SESSION['user_details']->username ?>">
					    </div>
				    </div>
				    <div class="form-group row">
                        <label for="text" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control  textbox" id="fullname" name="fullname" value="<?php echo $_SESSION['user_details']->fullname ?>">
                        </div>
				    </div>
                    <input type="submit" class="btn btn-primary" value="submit">
				    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                </div>
			</form>
        </div>
<?php
	}
	require_once "layout.php";
?>