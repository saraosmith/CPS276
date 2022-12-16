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
      return getForm("<h1>Add Contact</h1>",$postArr);
    }
  }
  else {
      return getForm("<h1>Add Contact</h1>", $elementsArr);
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
    "address"=>[
        "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Address cannot be blank and must be a valid address</span>",
        "errorOutput"=>"",
        "type"=>"text",
        "value"=>"123 Someplace",
        "regex"=>"address"
    ],
    "city"=>[
        "errorMessage"=>"<span style='color: red; margin-left: 15px;'>City cannot be blank and must be a real city</span>",
        "errorOutput"=>"",
        "type"=>"text",
        "value"=>"Anywhere",
        "regex"=>"city"
    ],
    "phone"=>[
        "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Phone cannot be blank and must be written as 999.999.9999</span>",
        "errorOutput"=>"",
        "type"=>"text",
        "value"=>"999.999.9999",
        "regex"=>"phone"
    ],
     
    "state"=>[
        "type"=>"select",
        "options"=>["MI"=>"Michigan","OH"=>"Ohio","PA"=>"Pennslyvania","TX"=>"Texas"],
        "selected"=>"MI",
        "regex"=>"state"
    ],
    "email"=>[
        "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Email cannot be blank and must be written as a proper email</span>",
        "errorOutput"=>"",
        "type"=>"text",
        "value"=>"saosmith@test.com",
        "regex"=>"email"
    ],
    "dob"=>[
        "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Dob cannot be blank, must be a valid date and be formatted as mm/dd/yyyy</span>",
        "errorOutput"=>"",
        "type"=>"text",
        "value"=>"09/14/2000",
        "regex"=>"dob"
    ],
    "contact"=>[
        "action"=>"notRequired",
        "type"=>"checkbox",
        "status"=>["Newsletter"=>"", "Email"=>"", "Text"=>""]
    ],
    "age"=>[
        "errorMessage"=>"<span style='color: red; margin-left: 15px;'>You must select an age range</span>",
        "errorOutput"=>"",
        "action"=>"required",
        "type"=>"radio",
        "value"=>["10-18"=>"", "19-30"=>"", "30-50"=>"", "51+"=>""]
    ]
  ];


  function addData($post){
    global $elementsArr;  

      require_once('classes/Pdo_Methods.php');
  
      $pdo = new PdoMethods();

      $sql = "INSERT INTO contacts (name, address, city, state, phone, email, dob, contact, age) VALUES (:name, :address, :city, :state, :phone, :email, :dob, :contact, :age)";
      
      if(isset($_POST['contact'])){
        $contact = "";
        foreach($post['contact'] as $v){
          $contact .= $v.",";
        }
        $contact = substr($contact, 0, -1);
      }
      else {
        $contact = "";
      }



      if(isset($_POST['age'])){
        $age = $_POST['age'];
      }
      else {
        $age = "";
      }

      $bindings = [
        [':name',$post['name'],'str'],
        [':address',$post['address'],'str'],
        [':city',$post['city'],'str'],
        [':state',$post['state'],'str'],
        [':phone',$post['phone'],'str'],
        [':email',$post['email'],'str'],
        [':dob',$post['dob'],'str'],
        [':contact',$contact,'str'],
        [':age',$age,'str']
      ];

      $result = $pdo->otherBinded($sql, $bindings);

      if($result == "error"){
        return getForm("<h1>Add Contact</h1><p>There was a problem processing your form</p>", $elementsArr);
      }
      else {
        return getForm("<h1>Add Contact</h1><p>Contact Information Added</p>", $elementsArr);
      }
      
}
   

function getForm($acknowledgement, $elementsArr){

global $stickyForm;
$options = $stickyForm->createOptions($elementsArr['state']);

$form = <<<HTML
    <form method="post" action="index.php?page=addContact">
    <div class="form-group">
      <label for="name">Name (letters only){$elementsArr['name']['errorOutput']}</label>
      <input type="text" class="form-control" id="name" name="name" value="{$elementsArr['name']['value']}" >
    </div>
    <div class="form-group">
      <label for="address">Address (just number and street){$elementsArr['address']['errorOutput']}</label>
      <input type="text" class="form-control" id="address" name="address" value="{$elementsArr['address']['value']}" >
    </div>
    <div class="form-group">
      <label for="city">City{$elementsArr['city']['errorOutput']}</label>
      <input type="text" class="form-control" id="city" name="city" value="{$elementsArr['city']['value']}" >
    </div>
    <div class="form-group">
      <label for="state">State</label>
      <select class="form-control" id="state" name="state">
        $options
      </select>
    </div>
    <div class="form-group">
      <label for="phone">Phone (format 999.999.9999) {$elementsArr['phone']['errorOutput']}</label>
      <input type="text" class="form-control" id="phone" name="phone" value="{$elementsArr['phone']['value']}" >
    </div>
    <div class="form-group">
      <label for="email">Email{$elementsArr['email']['errorOutput']}</label>
      <input type="text" class="form-control" id="email" name="email" value="{$elementsArr['email']['value']}" >
    </div>
    <div class="form-group">
      <label for="dob">Date of Birth{$elementsArr['dob']['errorOutput']}</label>
      <input type="text" class="form-control" id="dob" name="dob" value="{$elementsArr['dob']['value']}" >
    </div>

    <p>Please check all contact types you would like (optional):</p>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="contact[]" id="contact1" value="Newsletter" {$elementsArr['contact']['status']['Newsletter']}>
      <label class="form-check-label" for="contact1">Newsletter</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="contact[]" id="contact2" value="Email" {$elementsArr['contact']['status']['Email']}>
      <label class="form-check-label" for="contact2">Email Updates</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="contact[]" id="contac3" value="Text" {$elementsArr['contact']['status']['Text']}>
      <label class="form-check-label" for="contact3">Text Updates</label>
    </div>
    
        
    <p>Please select an age range (you must select one):{$elementsArr['age']['errorOutput']}</p>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="age" id="age1" value="10-18"  {$elementsArr['age']['value']['10-18']}>
      <label class="form-check-label" for="age1">10-18</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="age" id="age2" value="19-30"  {$elementsArr['age']['value']['19-30']}>
      <label class="form-check-label" for="age2">19-30</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="age" id="age3" value="30-50"  {$elementsArr['age']['value']['30-50']}>
      <label class="form-check-label" for="age3">30-50</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="age" id="age4" value="51+"  {$elementsArr['age']['value']['51+']}>
      <label class="form-check-label" for="age4">51 +</label>
    </div>
    
    <div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
HTML;

return [$acknowledgement, $form];

}



?>