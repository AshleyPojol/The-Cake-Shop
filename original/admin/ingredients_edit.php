<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 

?>

<div class="container-fluid">
<!-- DataTables Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Edit Product Data </h6>
  </div>
  
  <div class="card-body">
  
	<?php
	
	$connection = mysqli_connect("localhost","root","","adminpanel", "3307");
	if(isset($_POST['iedit_btn']))
	{
		$id = $_POST['iedit_id'];
		$query = "SELECT * FROM ingredients WHERE id='$id'";
		$query_run = mysqli_query($connection, $query);
		
		foreach($query_run as $row)
		{
			?>
			
	<form action="code.php" method="POST">
	<input type="hidden" name="iedit_id" value="<?php echo $row['id'] ?>">
			<div class="modal-body">

					<div class="form-group">
					<label>Product Name</label>
					<select name="edit_name" class="form-control" >
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
					<input type="text" name="edit_quantity" class="form-control" value="<?php echo $row['quantity'] ?>" placeholder="Enter Product Quantity">
				</div>
				<div class="form-group">
					<label> Product Price </label>
					<input type="text" name="edit_price" class="form-control" value="<?php echo $row['price'] ?>" placeholder="Enter Product Price">
				</div>
				
				<div class="form-group">
					<label>Product Size</label>
					<select name="edit_size"  class="form-control"  >
						<option value="Small"> Small </option>
						<option value="Medium"> Medium </option>
						<option value="Large"> Large </option>

					</select>
				</div>
				<div class="form-group">
					<label>Product Status</label>
					<select name="updated_status" class="form-control" >
						<option value="Accepted"> Accepted </option>
						<option value="Rejected"> Rejected </option>
						<option value="Pending"> Pending </option>
					</select>
				</div>
				
					<a href="ingredients.php" class="btn btn-danger"> Cancel </a>
				<button type="submit" name="iupdatebtn" class="btn btn-primary"> Update </button>
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