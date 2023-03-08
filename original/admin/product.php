<?php
include ('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Add Product Data</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <form action="code.php" method="POST">

			<div class="modal-body">

				<div class="form-group">
					<label> Product Name </label>
					<input type="text" name="productname" class="form-control" placeholder="Enter Product Name">
				</div>
				<div class="form-group">
					<label> Product Quantity</label>
					<input type="text" name="pquantity" class="form-control" placeholder="Enter Product Quantity">
				</div>
				<div class="form-group">
					<label> Product Price</label>
					<input type="text" name="pprice" class="form-control" placeholder="Enter Product Price">
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" name="productregbtn" class="btn btn-primary">Save</button>
			</div>
		  </form>

		</div>
	  </div>
	</div>
	
	<div class="container-fluid">
	<!-- DataTables Example -->
	<div class="card shadow mb-4">
	  <div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"> Product Data
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
				  Add Product Data 
				</button>
		</h6>
	  </div>
	<div class="card-body">
	 <div class="table-responsive">
	 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID </th>
            <th>Product Name </th>
            <th>Product Quantity </th>
            <th>Product Price </th>
			<th>Product Unit</th>
            <th> EDIT </th>
            <th> DELETE </th>
          </tr>
        </thead>
        <tbody>
		 <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
			<td></td>
			
         </tr>
		 </tbody>
		 </table>
		 </div>
		 </div>
		 </div>
		 
	

	
	  
	  

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>