<?php

$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "adminpanel";
 $db_port = "3307";

$connection = mysqli_connect($server_name,$db_username,$db_password,$db_name, $db_port);
$dbconfig = mysqli_select_db($connection ,$db_name);

if($dbconfig)
{
   // echo "Database Connected";
}
else
{
    echo "Database Connection Failed";
}
// if(!$connection)
// {
//     die("Connection failed: " . mysqli_connect_error());
//     echo '
//         <div class="container">
//             <div class="row">
//                 <div class="col-md-8 mr-auto ml-auto text-center py-5 mt-5">
//                     <div class="card">
//                         <div class="card-body">
//                             <h1 class="card-title bg-danger text-white"> Database Connection Failed </h1>
//                             <h2 class="card-title"> Database Failure</h2>
//                             <p class="card-text"> Please Check Your Database Connection.</p>
//                             <a href="#" class="btn btn-primary">:( </a>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//         </div>
//     ';
// }
?>