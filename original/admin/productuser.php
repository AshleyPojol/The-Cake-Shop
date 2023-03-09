<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbaruser.php'); 
?>
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Request Product</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <form action="code.php" method="POST">

			<div class="modal-body">

					<div class="form-group">
					<label>Product Name</label>
					<select name="name" class="form-control" >
						<option value="Cake"> Cake </option>
						<option value="Cookies"> Cookies </option>
						<option value="Pie"> Pie </option>
						<option value="Brownies"> Brownies </option>
						<option value="Doughnut"> Doughnut </option>
						<option value="Cupcake"> Cupcake </option>
						<option value="Muffins"> Muffins </option>
						<option value="Spanish Bread"> Spanish Bread </option>
						<option value="Crinkles"> Crinkles </option>
						<option value="Cinnamon"> Cinnamon Rolls </option>
					</select>
				</div>
				<div class="form-group">
					<label> Product Quantity</label>
					<input type="text" name="quantity" class="form-control" placeholder="Enter Product Quantity">
				</div>
				<div class="form-group">
					<label>Product Size</label>
					<select name="size" class="form-control" >
						<option value="Small"> Small </option>
						<option value="Medium"> Medium </option>
						<option value="Large"> Large </option>
					</select>
				</div>
				<input type="hidden" name="status" value="Pending">
				
			

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" name="aingregbtn" class="btn btn-primary">Save</button>
			</div>
		  </form>

		</div>
	  </div>
	</div>
	
	<div class="container-fluid">
	<!-- DataTables Example -->
	<div class="card shadow mb-4">
	  <div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"> Product List
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
				  Request Product 
				</button>
		</h6>
	  </div>
	<div class="card-body">
	
	 <?php
	if(isset($_SESSION['chillin']) && $_SESSION['chillin'] !='') 
	{
		echo '<h2> ' .$_SESSION['chillin']. ' </h2>';
		unset($_SESSION['chillin']);
	}
	
	if(isset($_SESSION['bing']) && $_SESSION['bing'] !='') 
	{
		echo '<h2> ' .$_SESSION['bing']. ' </h2>';
		unset($_SESSION['bing']);
	}
		?>

	 <div class="table-responsive">
	 
	 <?php
	
	$connection = mysqli_connect("localhost", "root", "", "adminpanel", "3307");
	$query = "SELECT * FROM ingredients";
	$query_run = mysqli_query($connection, $query);
	
	
	?>
	
	 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Product Name </th>
            <th>Product Quantity </th>
			<th>Product Size</th>
			<th>Product Status</th>
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
            <td> <?php echo $row['name'];?> </td>
            <td> <?php echo $row['quantity'];?> </td>
			<td> <?php echo $row['size'];?> </td>
			<td> <?php echo $row['status'];?> </td>
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