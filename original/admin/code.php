<?php
include('security.php');

// Register Section : Admin // 
if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
	$usertype = $_POST['usertype'];

    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO register (username,email,password,usertype) VALUES ('$username','$email','$password, $usertype')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
				
				$_SESSION['success'] = "Admin Profile Added";
                // echo "Saved";
             //   $_SESSION['status'] = "Admin Profile Added";
             //   $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
             //   $_SESSION['status_code'] = "error";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
          //  $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
        }
    }

}


		//	if(isset($_POST['edit_btn']))
		//	{
		//		$id = $_POST['edit_id'];
		//		$query = "SELECT * FROM register WHERE id='$id'";
		//		$query_run = mysqli_query($connection, $query);
		//	}
		
		// Update Button : Admin // 

	if(isset($_POST['updatebtn']))
	{
		$id = $_POST ['edit_id'];
		$username = $_POST['edit_username'];
		$email = $_POST['edit_email'];
		$password = $_POST['edit_password'];
		$usertypeupdate = $_POST['update_usertype'];

		$query = "UPDATE register SET username='$username', email='$email', password='$password', usertype='$usertypeupdate' WHERE id='$id'";
		$query_run = mysqli_query($connection, $query);
		
		if($query_run)
		{
			$_SESSION['success'] = "Your Data is Updated";
			header ('Location: register.php');
		}
		else
		{
			$_SESSION['success'] = "Your Data is Not Updated";
			header ('Location: register.php');
		}
	}
	
	// Delete Button : Admin // 

	if(isset($_POST['delete_btn']))
	{
		$id = $_POST['delete_id'];
		
		$query = "DELETE FROM register WHERE id='$id'";
		$query_run = mysqli_query($connection, $query);
		
		if($query_run)
		{
			$_SESSION['success'] = "Your Data is Deleted";
			header('Location: register.php');
		}
		else
		{
			$_SESSION['status'] = "Your Data is Not Deleted";
			header('Location: register.php');
		}
	}

	// Login Button : Admin / User //

	if(isset($_POST['login_btn']))
	{
		$email_login = $_POST['email'];
		$password_login = $_POST['password'];


		$query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login'";
		$query_run = mysqli_query($connection, $query);
		$usertypes = mysqli_fetch_array($query_run);
	
		if($usertypes['usertype'] == "Admin")
		{
			$_SESSION['username'] = $email_login;
			header('Location: index.php');
		}
		else if ($usertypes['usertype'] == "Employee")
		{
			$_SESSION['username'] = $email_login;
			header('Location: userindex.php');
		}
		else
		{
			$_SESSION['status'] = 'Email ID / Password is Invalid';
			header('Location: login.php');
		}
	
	}

	// Logout Button : Admin //
	
	if(isset($_POST['logout_btn']))
	{
		session_destroy();
		unset($_SESSION['username']);
	}
	
	// Product Section : Admin // 
	
	if(isset($_POST['productregbtn']))
	{
		$productname = $_POST['productname'];
		$pquantity = $_POST['pquantity'];
		$pprice = $_POST['pprice'];
		
		$query = "INSERT INTO product (productname,pquantity,pprice) VALUES ('$productname','$pquantity','$pprice')";
		$query_run = mysqli_query($connection, $query);
		
		if($query_run)
		{
			// echo "Product Data is Saved ";
			$_SESSION['akami'] = 'Product Data is Added';
			header('Location: product.php');
		}
		else
		{
			echo "Product Data is Not Saved";
			$_SESSION['shinzo'] = 'Product Data is not Added';
			header('Location: product.php');
		}
	}

?>