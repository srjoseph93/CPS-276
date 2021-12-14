<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Define variables and initialize with empty values
$email = $password = $name = $status ="";
$errorMSG = "";
$email_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    //Check if username is empty
    if(empty($_POST["email"])){
      $email_err = "Please enter email.";
   } else{
        $email = $_POST["email"];
    }
    
    //Check if password is empty
    if(empty($_POST["password"])){
        $password_err = "Please enter your password.";
    } else{
        $password = $_POST["password"];
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        
         $valid = false;
         require_once '/home/s/r/srjoseph/public_html/Assignments/Final Project/Classes/Pdo_methods.php';
         $pdo = new PdoMethods();
 
         /* HERE I CREATE THE SQL STATEMENT I AM BINDING THE PARAMETERS */
         $sql = "SELECT * FROM contactMod2";
     
         $records = $pdo->selectNotBinded($sql);
         foreach($records as $row){
             if($email == $row['email'] && $password == $row['password']){
                $name=$row['name'];
                $status=$row['status'];
                $valid = true;
             }
         }
         
         if($valid){
               // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $name;
            $_SESSION["status"] = $status;
        
            header("location: /~srjoseph/Assignments/Final%20Project/index.php?page=welcome");
         }
         else{
            $email_err = "Invalid Email and Pssword Combination";
         }                   
     
    
    }
    else{
        $email_err = "Invalid Email and Password Combination";
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="hPotter@gmail.com">
                <span class="invalid-feedback"></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control"value="pass1">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
    
        </form>
    </div>
</body>
</html>


