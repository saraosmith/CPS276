<?php
require_once('classes/StickyForm.php');
$stickyForm = new StickyForm();

function init(){
  global $elementsArr, $stickyForm;

  if(isset($_POST['submit'])){
    $postArr = $stickyForm->validateForm($_POST, $elementsArr);
    if($postArr['masterStatus']['status'] == "noerrors"){
      return login($_POST);
    }
    else{
      return getForm("<h1>Login</h1>",$postArr);
    }
  }
  else {
      return getForm("<h1>Login</h1>", $elementsArr);
    } 
}

$elementsArr = [
    "masterStatus"=>[
      "status"=>"noerrors",
      "type"=>"masterStatus"
    ],
    "email"=>[
      "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Email cannot be blank and must be written as a proper email</span>",
      "errorOutput"=>"",
      "type"=>"text",
      "value"=>"saosmith@admin.com",
      "regex"=>"email"
    ],
  "password"=>[
      "errorMessage"=>"<span style='color: red; margin-left: 15px;'>You must enter a password</span>",
      "errorOutput"=>"",
      "type"=>"text",
      "value"=>"password",
      "regex"=>"password"
    ],
  
  
];



	function login($post){
    global $elementsArr;

    require_once 'classes/Pdo_Methods.php';

	    $pdo = new PdoMethods();

	    $sql = "SELECT name, email, password, statusAd FROM admin WHERE email = :email";
		    $bindings = array(
			    array(':email',$post['email'],'str')
        );

	    $records = $pdo->selectBinded($sql, $bindings);

		if($records == 'error'){
			return getForm("<h1>Login</h1> There was an error logging in",$elementsArr);
		}
		else{
      if(count($records) != 0){
	           
	            if(password_verify($post['password'], $records[0]['password'])){
	                session_start();
	                $_SESSION['access'] = "accessGranted";
                  $_SESSION['statusAd'] = $records[0]['statusAd']; 
                  $_SESSION['name'] = $records[0]['name'];
                  header('location: index.php?page=welcome');
                  
	            }
	            else {
	                return getForm("<h1>Login</h1><p>Login credentials incorrect</p>",$elementsArr);
	            }
			}
			else {
				
        return getForm("<h1>Login</h1><p>Nothing exists with those credentials</p>",$elementsArr);
			}
		}
	}

  
   
  


function getForm($acknowledgement, $elementsArr){

global $stickyForm;

$form = <<<HTML

    <form method="post" action="index.php?page=login">
    
    <div class="form-group">
      <label for="email">Email{$elementsArr['email']['errorOutput']}</label>
      <input type="text" class="form-control" id="email" name="email" value="{$elementsArr['email']['value']}" >
    </div>
    <div class="form-group">
      <label for="password">Password {$elementsArr['password']['errorOutput']}</label>
      <input type="password" class="form-control" id="password" name="password" value="{$elementsArr['password']['value']}" >
    </div>
    
    <div>
    <button type="submit" name="submit" class="btn btn-primary">Login</button>
    </div>
  </form>
HTML;

return [$acknowledgement, $form];

}





?>
