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
    $u_name = mysqli_real_escape_string($conn, trim($_POST['login_in']));
    $u_password = mysqli_real_escape_string($conn, trim($_POST['password_in']));
    if(!empty($u_name) && !empty($u_password)) {
//        $query = "SELECT * FROM users WHERE u_name = '$u_name'";
        $query = "SELECT * FROM users WHERE u_name = '$u_name' AND u_password = '$u_password'";
        $data = mysqli_query($conn, $query);
        var_dump(mysqli_num_rows($data));
        if (mysqli_num_rows($data) === 0) {
            echo '<p class="error" style="color: red">Username password combination is wrong!</p>';
        } else {
                echo '<p class="success" style="color: green">Congratulations, you are logged in!</p>';
        }
    }



}else{
    echo "OOPS!!!";
}

?>