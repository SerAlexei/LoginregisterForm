<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "testreglog";

   $conn = new mysqli($servername, $username, $password, $dbname);

   if($conn->connect_error){
       die("Connect failed: " . $conn->connect_error);
   }
   if(!empty($_POST)){
       $u_email = mysqli_real_escape_string($conn, trim($_POST['email_reg']));
       $u_name = mysqli_real_escape_string($conn, trim($_POST['name_reg']));
       $u_password = mysqli_real_escape_string($conn, trim($_POST['password_reg']));
       if(!empty($u_email) && !empty($u_name) && !empty($u_password)) {
           $query = "SELECT * FROM users WHERE u_name = '$u_name'";
           $data = mysqli_query($conn, $query);
           var_dump(mysqli_num_rows($data));
           if(mysqli_num_rows($data) === 0){
               $query = "INSERT INTO users (u_name, u_password, u_email) VALUES ('$u_name', '$u_password', '$u_email')";
               mysqli_query($conn, $query);
               echo "Все готово";
               mysqli_close($conn);
               exit();
           }
           else{
               echo "Такое имя уже существует";
           }
       }
   }
   else{
       echo "OOPS!!!";
   }
?>