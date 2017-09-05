	<footer>
      <div class="container">
        <p>Dobble Copyright &copy, 2017</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo RESOURCE_PATH.DS.'js/jquery.min.js' ?>"></script>
    <script src="<?php echo RESOURCE_PATH.DS.'js/bootstrap.js' ?>"></script>
  </body>
</html>

<?php if(isset($database)) {$database->close_connection();} ?>