<?php 
include('includes/header.php');
?>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
						
                <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">The Cake Shop</h1>
										<p class ="h4 text-gray-900 mb-4"> Login Interface</p>
                                    </div>
									
                                    <form class="user" action="code.php" method="POST">
                                        <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email Address">
                                        </div>
                                        <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                        </div>
					
											 <!-- Insert Here Comments -->
				
										<button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                                        <hr>
									</form>
										
										 <!-- <div class="form-group"> </div> -->
										 <!-- <div class="custom-control custom-checkbox small"> </div> -->
										 <!-- <input type="checkbox" class="custom-control-input" id="customCheck"> </div> -->
										 <!-- <label class="custom-control-label" for="customCheck">Remember </div> -->
										 <!-- Me</label> </div> -->
										 <!-- </div> -->
                                         <!-- </div> -->  
                                       
                                        
										
										
                                  <!--  <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                   
								   
								   
								   <!-- <div class="text-center"> </div> -->
								   <!-- <a class="small" href="register.html">Create an Account!</a> </div> -->
								   <!-- </div> </div> -->
									
                                        
                                    
									
									
									
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

<?php
include('includes/scripts.php');
?>