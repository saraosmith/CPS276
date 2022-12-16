<?php



$path = "index.php?page=login";

$nav = "";
$adminNav=<<<HTML
    <nav>
        <ul>
            <li><a href="index.php?page=addContact">Add Contact</a></li>
            <li><a href="index.php?page=deleteContacts">Delete contact(s)</a></li>
            <li><a href="index.php?page=addAdmin">Add Admin</a></li>
            <li><a href="index.php?page=deleteAdmin">Delete Admin(s)</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
HTML;
$staffNav=<<<HTML
    <nav>
        <ul>
            <li><a href="index.php?page=addContact">Add Contact</a></li>
            <li><a href="index.php?page=deleteContacts">Delete contact(s)</a></li>
            <li><a href="index.php?page=addAdmin">Add Admin</a></li>
            <li><a href="index.php?page=deleteAdmin">Delete Admin(s)</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
HTML;

if(isset($_GET)){
    if($_GET['page'] === "addContact"){
        require_once('pages/addContact.php');
        security1();
        $result = init();
    }
    
    else if($_GET['page'] === "deleteContacts"){
        require_once('pages/deleteContacts.php');
        security1();
        $result = init();
    }

    else if($_GET['page'] === "welcome"){
        require_once('pages/welcome.php');
        security1();
        $result = init();
    }

    else if($_GET['page'] === "login"){
        require_once('pages/login.php');
        $result = init();
    }

    else if($_GET['page'] === "addAdmin"){
        require_once('pages/addAdmin.php');
        security1();
        //security2();
        $result = init();
    }

    else if($_GET['page'] === "deleteAdmins"){
        require_once('pages/deleteAdmins.php');
        security1();
        //security2();
        $result = init();
    }

    else {
        header('location: '.$path);
    }
}

else {
    header('location: '.$path);
}

function security1(){
    global $adminNav, $staffNav, $nav;
    session_start();
    
    if($_SESSION['access'] !== "accessGranted"){
      header('location: index.php');
    }
    else {
        if($_SESSION['statusAd'] == "admin"){
            $nav=$adminNav;
        }
        else{
            $nav=$staffNav;
        }
    }
  }
  
  function security2(){
    //session_start();
    if($_SESSION['statusAd'] !== "admin"){
      header('location: index.php');
    }
    
    
  }

  









?>