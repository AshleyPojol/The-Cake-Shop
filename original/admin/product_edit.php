<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 

?>

<div class="container-fluid">
<!-- DataTables Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Edit Ingredient Data </h6>
  </div>
  
  <div class="card-body">
  
	<?php
	
	$connection = mysqli_connect("localhost","root","","adminpanel", "3307");
	if(isset($_POST['pedit_btn']))
	{
		$id = $_POST['pedit_id'];
		$query = "SELECT * FROM product WHERE id='$id'";
		$query_run = mysqli_query($connection, $query);
		
		foreach($query_run as $row)
		{
			?>
			
	<form action="code.php" method="POST">
	
	<input type="hidden" name="pedit_id" value="<?php echo $row['id'] ?>">
				<div class="form-group">
					<label> Ingredient Name </label>
					<input type="text" name="edit_productname" value="<?php echo $row['productname'] ?>" class="form-control" placeholder="Enter Product Name">
				</div>
				<div class="form-group">
					<label> Ingredient Quantity</label>
					<input type="text" name="edit_pquantity" value="<?php echo $row['pquantity'] ?>" class="form-control" placeholder="Enter Product Quantity">
				</div>
				<div class="form-group">
					<label> Ingredient Price</label>
					<input type="text" name="edit_pprice" value="<?php echo $row['pprice'] ?>" class="form-control" placeholder="Enter Product Price">
				</div>
				<div class="form-group">
					<label>Ingredient Unit</label>
					<select name="update_producttype" class="form-control" >
						<option value="Miligram"> Miligram </option>
						<option value="Kilogram"> Kilogram </option>
						<option value="Kilo"> Kilo </option>
						<option value="Litre"> Litre </option>
						<option value="Gallon"> Gallon </option>

					</select>
				</div>

				
				<a href="product.php" class="btn btn-danger"> Cancel </a>
				<button type="submit" name="pupdatebtn" class="btn btn-primary"> Update </button>
			</form>
	<?php
		}
	}
	?>
  
  
	</div>
	</div>
  </div>
  
<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>