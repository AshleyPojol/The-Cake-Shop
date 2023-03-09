<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbaruser.php'); 
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header ">
			<h5 class="modal-title" id="exampleModalLabel">Request Ingredient</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <form action="code.php" method="POST">

			<div class="modal-body">

				<div class="form-group">
					<label> Ingredient Name </label>
					<input type="text" name="productname" class="form-control" placeholder="Enter Ingredient Name">
				</div>
				<div class="form-group">
					<label> Ingredient Quantity</label>
					<input type="text" name="pquantity" class="form-control" placeholder="Enter Ingredient Quantity">
				</div>

				<div class="form-group">
					<label>Ingredient Unit</label>
					<select name="producttype" class="form-control" >
						<option value="Miligram"> Miligram </option>
						<option value="Kilogram"> Kilogram </option>
						<option value="Kilo"> Kilo </option>
						<option value="Litre"> Litre </option>
						<option value="Gallon"> Gallon </option>
					</select>
				</div>
				
				<input type="hidden" name="productstatus" value="Pending">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" name="aproductregbtn" class="btn btn-primary">Save</button>
			</div>
		  </form>

		</div>
	  </div>
	</div>
	
	<div class="container-fluid">
	<!-- DataTables Example -->
	<div class="card shadow mb-4">
	  <div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"> Ingredients List
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
				  Request Ingredient 
				</button>
		</h6>
	  </div>
	<div class="card-body">
	
	 <?php
	if(isset($_SESSION['kuro']) && $_SESSION['kuro'] !='') 
	{
		echo '<h2> ' .$_SESSION['kuro']. ' </h2>';
		unset($_SESSION['kuro']);
	}
	
	if(isset($_SESSION['ame']) && $_SESSION['ame'] !='') 
	{
		echo '<h2> ' .$_SESSION['ame']. ' </h2>';
		unset($_SESSION['ame']);
	}
		?>

	 <div class="table-responsive">
	 
	 <?php
	
	$connection = mysqli_connect("localhost", "root", "", "adminpanel", "3307");
	$query = "SELECT * FROM product";
	$query_run = mysqli_query($connection, $query);
	
	
	?>
	
	 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Ingredient Name </th>
            <th>Ingredient Quantity </th>
			<th>Ingredient Unit</th>
			<th>Ingredient Status</th>
          </tr>
        </thead>
        <tbody>
	<?php
		if(mysqli_num_rows($query_run) > 0)
		{
			while($row = mysqli_fetch_assoc($query_run))
			{
			
			?>
			
		
		
          <tr>
            <td> <?php echo $row['productname'];?> </td>
            <td> <?php echo $row['pquantity'];?> </td>
			<td> <?php echo $row['producttype'];?> </td>
			<td> <?php echo $row['productstatus'];?> </td>
          </tr>
			
         <?php
			}
		
		}
		else {
			echo "No Record Found";
		}
		?>
		 </tbody>
		 </table>
		 </div>
		 </div>
		 </div>

<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>