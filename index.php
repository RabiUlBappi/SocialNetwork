<?php 
  require_once("includes/initialize.php");

  include_layout_template('header.php');

  if($session->is_logged_in()){
    include_layout_template("navbar.php");
    include_layout_template("home.php"); 
  }
  else{
    include_layout_template("signup_form.php");
    // or header("location:---link---");
  }

  include_layout_template('footer.php'); 

?>

<script src="<?php echo RESOURCE_PATH.DS.'js/custom_script.js' ?>"></script>
