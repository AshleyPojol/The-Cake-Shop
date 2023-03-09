<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbaruser.php'); 
?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

               

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                       
                    </div>

                    <!-- Content Row -->
                    <div class="row ">

                       
                        <!-- TOTAL NUMBER OF INGREDIENTS  -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               Total Number of Approved Ingredients</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
											<?php
											require './database/dbconfig.php';
											$query = "SELECT productstatus FROM product WHERE productstatus='Accepted'";
											$query_run = mysqli_query($connection, $query);	
											$row = mysqli_num_rows($query_run);
											echo '<h5> Total Ingredients: ' .$row. '</h5>';
											?>
											</div>
										</div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TOTAL NUMBER OF PRODUCTS -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Number of Approved Products
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                </div>
                                                <div class="col">
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
													<?php
													require './database/dbconfig.php';
													$query = "SELECT status FROM ingredients WHERE status='Accepted'";
													$query_run = mysqli_query($connection, $query);	
													$row = mysqli_num_rows($query_run);
													echo '<h5> Total Products: ' .$row. '</h5>';
													?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						
						
						
						

            </div>
            <!-- End of Main Content -->



        </div> 
       <!-- End of Content Wrapper -->

    </div> 
    <!-- End of Page Wrapper -->


<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>