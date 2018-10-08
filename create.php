<?php 
	include 'inc/header.php'; 
	include 'lib/billing.php';
?>
<?php 
	
	$bill = new Bill();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])){
		$newBill = $bill->createBill($_POST);
	}
?>
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<h2>Create New Bill <span class="pull-right"><a class="btn btn-primary" href="index.php">Back</a></span></h2>
			</div>
			<div class="login-panel-body panel-body">
<?php
	if(isset($newBill)){
	echo $newBill;
	}
?>				
				<form action="" method="post">
					<div class="form-gorup">
						<label for="name">Name</label>
						<input type="text" id="name" name="name" class="form-control" />
					</div>
					<div class="form-gorup">
						<label for="share">Share</label>
						<input type="text" id="share" name="share" class="form-control" />
					</div>
					<div class="form-gorup">
						<label for="paid">Paid</label>
						<input type="text" id="paid" name="paid" class="form-control" />
					</div>
					<div class="form-gorup">
						<label for="due">Due</label>
						<input type="text" id="due" name="due" class="form-control" />
					</div>
					<div class="form-gorup">
						<label for="month">Month</label>
						<select class="form-control" name="month" id="month">
						  <option>July</option>
						  <option>August</option>
						  <option>September</option>
						  <option>October</option>
						  <option>November</option>
						  <option>December</option>
						  <option>January</option>
						  <option>February</option>
						  <option>March</option>
						  <option>April</option>
						  <option>May</option>
						  <option>June</option>
						</select>
					</div>
					<div class="form-gorup">
						<label for="year">Year</label>
						<select class="form-control" name="year" id="year">
						  <option>2018</option>
						  <option>2019</option>
						  <option>2020</option>
						  <option>2021</option>
						  <option>2022</option>
						  <option>2023</option>
						</select>
					</div>
					<button type="submit" name="create" class="btn btn-success">Create</button>
				</form>
			</div>
		</div>
<?php include 'inc/footer.php'; ?>