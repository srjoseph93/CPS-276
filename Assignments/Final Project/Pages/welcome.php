<?php

function init(){
// Initialize the session
 
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: Pages/login.php");
    }
    else{    
        return ["<h1>Welcome</h1>","<p>Welcome $_SESSION[name]"];
    }
    
}

?>
