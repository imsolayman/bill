<?php 
	include 'inc/header.php'; 
	include 'lib/billing.php'; 
?>
<?php 
	$bill = new Bill();
	$billdata = $bill->billingData();
	
	
	$bill = new Bill();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['filter'])){
		$filterData = $bill->filterData($_POST);
		if(count($filterData) > 0)
		{
			$billdata = $filterData;
		}else {
			echo "Data not found";
		}
		
	}
?>
		<div class="panel panel-default">
			<div class="panel-heading">		
				<form action="" class="form-inline" method="post">
					<div class="form-group mb-2">
						<select class="form-control" name="year-select" id="year-select">
						  <option>2018</option>
						  <option>2019</option>
						  <option>2020</option>
						  <option>2021</option>
						  <option>2022</option>
						  <option>2023</option>
						</select>
					  </div>
					  <div class="form-group mx-sm-3 mb-2">
						<select class="form-control" name="month-select" id="month-select">
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
					<button type="submit" name="filter" class="btn btn-primary mb-2">Select</button>
				</form>
				<span class="pull-right"><a class="btn btn-primary" href="create.php">Create</a></span>
			</div>
			<div class="panel-body">
				<table class="table table-striped">
					<tr>
						<th>Serial</th>
						<th>Name</th>
						<th>Share</th>
						<th>Paid</th>
						<th>Due</th>
						<th>Action</th>
						<th>Status</th>
					</tr>
<?php 
	if($billdata){
		$i = 0;
		foreach($billdata as $bdata){
			$i++;
?>
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $bdata['name']; ?></td>
						<td><?php echo $bdata['share']; ?></td>
						<td><?php echo $bdata['paid']; ?></td>
						<td><?php echo $bdata['due']; ?></td>
						<td class="btn btn-primary"><a href="update.php?id=<?php echo $bdata['id']; ?>">Update</a></td>
						<td class='alert alert-danger'>
						<?php if($bdata['due'] > 0){
							echo "<span>Unpaid</span>"; 
							}else{
								echo "Paid";
							} ?>
						</td>
					</tr> 
<?php }}else{ ?>
					<tr>
						<td colspan="7">
							<h2>No user data found</h2>
						</td>
					</tr>
<?php } ?>
				</table>
			</div>
		</div>
<?php include 'inc/footer.php'; ?>