<?php 
	include 'lib/billing.php';
	include 'inc/header.php';
?>
<?php 
	if (isset($_GET['id'])){
		$userid = (int)$_GET['id'];
	}
	$bill = new Bill();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
		$updatebill = $bill->updateBill($userid, $_POST);
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])){
		$deletebill = $bill->deleteBill($userid, $_POST);
	}
?>
<?php 
	if(isset($updatebill)){
		echo $updatebill;
	}
?>
<?php 
	if(isset($deletebill)){
		echo $deletebill;
	}
?>
<?php 
	$userdata = $bill->getUserById($userid);
	if($userdata){
?>
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<h2>Billing Update <span class="pull-right"><a class="btn btn-primary" href="index.php">Back</a></span></h2>
			</div>
			<div class="login-panel-body panel-body">
				<form action="" method="POST">
					<div class="form-gorup">
						<label for="name">Name</label>
						<input type="text" id="name" name="name" class="form-control" value="<?php echo $userdata->name; ?>" />
					</div>
					<div class="form-gorup">
						<label for="share">Share</label>
						<input type="text" id="share" name="share" class="form-control" value="<?php echo $userdata->share; ?>" />
					</div>
					<div class="form-gorup">
						<label for="paid">Paid</label>
						<input type="text" id="paid" name="paid" class="form-control" value="<?php echo $userdata->paid; ?>" />
					</div>
					<div class="form-gorup">
						<label for="due">Due</label>
						<input type="text" id="due" name="due" class="form-control" value="<?php echo $userdata->due; ?>" />
					</div>
					<div class="form-gorup">
						<label for="month">Month</label>
						<input type="text" id="month" name="month" class="form-control" value="<?php echo $userdata->month; ?>" />
					</div>
					<div class="form-gorup">
						<label for="year">Year</label>
						<input type="text" id="year" name="year" class="form-control" value="<?php echo $userdata->year; ?>" />
					</div>
					<button type='submit' name='update' class='btn btn-success'>Update</button>
					<button type='submit' name='delete' class='btn btn-danger' onclick='return confirm('Are you sure?')'>Delete</button>
<?php } ?>
				</form>
			</div>
		</div>
<?php include 'inc/footer.php'; ?>