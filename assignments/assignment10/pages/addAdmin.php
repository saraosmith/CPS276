<?php

require_once('classes/StickyForm.php');
$stickyForm = new StickyForm();

function init(){
  global $elementsArr, $stickyForm;

  if(isset($_POST['submit'])){
    $postArr = $stickyForm->validateForm($_POST, $elementsArr);
    if($postArr['masterStatus']['status'] == "noerrors"){
      return addData($_POST);
    }
    else{
      return getForm("<h1>Add Admin</h1>",$postArr);
    }
  }
  else {
      return getForm("<h1>Add Admin</h1>", $elementsArr);
    } 
}



$elementsArr = [
    "masterStatus"=>[
      "status"=>"noerrors",
      "type"=>"masterStatus"
    ],
    "name"=>[
        "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Name cannot be blank and must be a standard name</span>",
        "errorOutput"=>"",
        "type"=>"text",
        "value"=>"Sara Smith",
        "regex"=>"name"
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
     
    "statusAd"=>[
        "type"=>"select",
        "options"=>["staff"=>"staff","admin"=>"admin"],
        "selected"=>"admin",
        "regex"=>"statusAd"
      ],
];

function addData($post){
  global $elementsArr;  
  
    require_once('classes/Pdo_Methods.php');

    $pdo = new PdoMethods();

    $sql = "SELECT email FROM admin WHERE email = :email";
    $bindings = array(
      array(':email', $post['email'], 'str'),
      
  );

    $records = $pdo->selectBinded($sql, $bindings);

  if($records == 'error'){
    return getForm("<h1>Add Admin</h1><p>There was an error processing your request</p>",$elementsArr);
  }
  else{
    if(count($records) != 0){
          return getForm("<h1>Add Admin</h1><p>That email already exists</p>", $elementsArr);
    }
    else {
      $password = password_hash($post['password'], PASSWORD_DEFAULT);

      $sql = "INSERT INTO admin (name, email, password, statusAd) VALUES (:name, :email, :password, :statusAd)";
      $bindings = array(
        array (':name',$post['name'],'str'),
        array(':email',$post['email'],'str'),
        array(':password',$password,'str'),
        array(':statusAd',$post['statusAd'],'str')
      );
      $result = $pdo->otherBinded($sql, $bindings);
      if($result = 'noerror'){
        return getForm("<h1>Add Admin</h1><p>Admin has been added</p>", $elementsArr);
      }
      else {
        return getForm("<h1>Add Admin</h1><p>There was a problem adding this administrator</p>", $elementsArr);
      }
    } 
  }
} 

function getForm($acknowledgement, $elementsArr){

global $stickyForm;
$options = $stickyForm->createOptions($elementsArr['statusAd']);

$form = <<<HTML
   
    <form method="post" action="index.php?page=addAdmin">
    <div class="form-group">
      <label for="name">Name (letters only){$elementsArr['name']['errorOutput']}</label>
      <input type="text" class="form-control" id="name" name="name" value="{$elementsArr['name']['value']}" >
    </div>
    <div class="form-group">
      <label for="email">Email{$elementsArr['email']['errorOutput']}</label>
      <input type="text" class="form-control" id="email" name="email" value="{$elementsArr['email']['value']}" >
    </div>
    <div class="form-group">
      <label for="password">Password {$elementsArr['password']['errorOutput']}</label>
      <input type="password" class="form-control" id="password" name="password" value="{$elementsArr['password']['value']}" >
    </div>
    <div class="form-group">
      <label for="Status">Status</label>
      <select class="form-control" id="statusAd" name="statusAd">
        $options
      </select>
  
    <div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
HTML;

return [$acknowledgement, $form];

}




?>
