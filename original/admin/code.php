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
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            header('Location: register.php');  
        }
    }

}

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
		$ptype = $_POST['producttype'];	
		
		$query = "INSERT INTO product (productname,pquantity,pprice,producttype) VALUES ('$productname','$pquantity','$pprice','$ptype')";
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
	
	if(isset($_POST['pedit_btn']))
	{
		$id = $_POST['pedit_id'];
		$query = "SELECT * FROM product WHERE id='$id' ";
		$query_run = mysqli_query($connection, $query);
		
	}
	
	// Product Update : Admin //
	
	if(isset($_POST['pupdatebtn']))
	{
		$id = $_POST['pedit_id'];
		$productname = $_POST['edit_productname'];
		$pquantity = $_POST['edit_pquantity'];
		$pprice = $_POST['edit_pprice'];
		$producttypeupdate = $_POST['update_producttype'];

		$query = "UPDATE product SET productname='$productname', pquantity='$pquantity', pprice='$pprice', producttype='$producttypeupdate' WHERE id='$id'";
		$query_run = mysqli_query($connection, $query);
		
		if($query_run)
		{
			$_SESSION['akami'] = 'Product Data is Updated';
			header('Location: product.php');
		}
		else
		{
			echo "Product Data is Not Saved";
			$_SESSION['shinzo'] = 'Product Data is not Updated';
			header('Location: product.php');
		}
	}
	
	// Product Delete : Admin //
	
	if(isset($_POST['pdelete_btn']))
	{
		$id = $_POST['pdelete_id'];
		
		$query = "DELETE FROM product WHERE id='$id'";
		$query_run = mysqli_query($connection, $query);
		
		if($query_run)
		{
			$_SESSION['akami'] = "Your Data is Deleted";
			header('Location: product.php');
		}
		else
		{
			$_SESSION['shinzo'] = "Your Data is Not Deleted";
			header('Location: product.php');
		}
	}
	
	
	// Ingredients Section : Admin // 
	
		if(isset($_POST['ingregbtn']))
	{
		$iname = $_POST['name'];
		$isize = $_POST['size'];
		$iprice = $_POST['price'];
		$iquantity = $_POST['quantity'];	
		
		
		
		$query = "INSERT INTO ingredients (name,size,price,quantity) VALUES ('$iname','$isize','$iprice','$iquantity')";
		$query_run = mysqli_query($connection, $query);
		
		if($query_run)
		{
			// echo "Product Data is Saved ";
			$_SESSION['koreo'] = 'Product Data is Added';
			header('Location: ingredients.php');
		}
		else
		{
			echo "Product Data is Not Saved";
			$_SESSION['toru'] = 'Product Data is not Added';
			header('Location: ingredients.php');
		}
	}
	
	if(isset($_POST['iedit_btn']))
	{
		$id = $_POST['iedit_id'];
		$query = "SELECT * FROM ingredients WHERE id='$id' ";
		$query_run = mysqli_query($connection, $query);
		
	}
	// Ingredients Update : Admin // 
	
	if(isset($_POST['iupdatebtn']))
	{
		$id = $_POST['iedit_id'];
		$name = $_POST['edit_name'];
		$size = $_POST['edit_size'];
		$quantity = $_POST['edit_quantity'];
		$price = $_POST['edit_price'];

		$query = "UPDATE ingredients SET name='$name', size='$size', quantity='$quantity', price='$price' WHERE id='$id'";
		$query_run = mysqli_query($connection, $query);
		
		if($query_run)
		{
			$_SESSION['koreo'] = 'Ingredient Data is Updated';
			header('Location: ingredients.php');
		}
		else
		{
			echo "Ingredient Data is Not Saved";
			$_SESSION['toru'] = 'Ingredient Data is not Updated';
			header('Location: ingredients.php');
		}
	}
	
	// Ingredients Delete : Admin // 
	if(isset($_POST['idelete_btn']))
	{
		$id = $_POST['idelete_id'];
		
		$query = "DELETE FROM ingredients WHERE id='$id'";
		$query_run = mysqli_query($connection, $query);
		
		if($query_run)
		{
			$_SESSION['koreo'] = "Your Data is Deleted";
			header('Location: ingredients.php');
		}
		else
		{
			$_SESSION['toru'] = "Your Data is Not Deleted";
			header('Location: ingredients.php');
		}
	}
	
	
?>