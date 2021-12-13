<?php

$path = "index.php?page=welcome";


$nav=<<<HTML
    <nav>
        <ul>
            <a href="index.php?page=addContact">Add Contact&emsp;</a>
            <a href="index.php?page=deleteContacts">Delete contact(s)&emsp;</a>
            <a href="index.php?page=addAdmin">Add Admin&emsp;</a>
            <a href="index.php?page=deleteAdmins">Delete Admin(s)&emsp;</a>
            <a href="index.php?page=logout">Logout</a>
        </ul>
    </nav>
HTML;

if(isset($_GET)){
    if($_GET['page'] === "addContact"){
        require_once('Pages/addContact.php');
        $result = init();
    }
    
    else if($_GET['page'] === "deleteContacts"){
        require_once('Pages/deleteContacts.php');
        $result = init();
    }

    else if($_GET['page'] === "login"){
        require_once('Pages/login.php');
        $result = init();
    }

    else if($_GET['page'] === "welcome"){
        require_once('Pages/welcome.php');
        $result = init();
    }

    else if($_GET['page'] === "addAdmin"){
        require_once('Pages/addAdmin.php');
        $result = init();
    }

    else if($_GET['page'] === "deleteAdmins"){
        require_once('Pages/deleteAdmins.php');
        $result = init();
    }

    else {
        //header('Location: http://russet.php?page=form');
        header('location: '.$path);
    }
}

else {
    //header('Location: http://198.199.80.235/cps276/cps276_assignments/assignment10_final_project/solution/index.php?page=form');
    header('location: '.$path);
}



?>