<?php

function init(){
    // Initialize the session
    session_start();
 
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: Pages/login.php");
    }
    return ["<h1>Welcome</h1>","<p>Welcome ADD CODE FOR NAME HERE</p>"];
}

?>
