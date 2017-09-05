<?php 
  require_once("../includes/initialize.php");

  include_layout_template('header.php');

  $d = isset($_SESSION['user_id']) ? 'OK' : 'NO';
  echo $d;

  if(!$session->is_logged_in()){
    include_layout_template("signup_form.php");
  }
  else{
    header("location://localhost/SocialNetwork/");
  }


  include_layout_template('footer.php'); 

?>

<script src="<?php echo RESOURCE_PATH.DS.'js/custom_script.js' ?>"></script>