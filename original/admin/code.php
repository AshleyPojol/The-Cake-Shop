<?php
include('security.php');

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

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
            $query = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
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

	if(isset($_POST['updatebtn']))
	{
		$id = $_POST ['edit_id'];
		$username = $_POST['edit_username'];
		$email = $_POST['edit_email'];
		$password = $_POST['edit_password'];
		
		$query = "UPDATE register SET username='$username', email='$email', password='$password' WHERE id='$id'";
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



	if(isset($_POST['login_btn']))
	{
		$email_login = $_POST['email'];
		$password_login = $_POST['password'];
		
		$query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login'";
		$query_run = mysqli_query($connection, $query);
	
	if(mysqli_fetch_array($query_run))
	{
		$_SESSION['username'] = $email_login;
		header('Location: index.php');
	}
	else
	{
		$_SESSION['status'] = 'Email ID / Password is Invalid';
		header('Location: login.php');
	}
	
	}

	if(isset($_POST['logout_btn']))
	{
		session_destroy();
		unset($_SESSION['username']);
	}
	
?>