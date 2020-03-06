    <hr>
    <footer class="container">
      <div class="row">


        <div class="col-md-4">
          <?php 
            require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' .DIRECTORY_SEPARATOR . 'compteur.php';
            addView();
            $nbVues = showViews(); 
          ?>
          <h3>Il y a <?= $nbVues; ?> vue<?php if($nbVues > 1) echo 's' ?></h3>
        </div>

        <div class="col-md-4">
          <nav class="navbar-nav">
            <ul>
              <?= nav_menu('nav-item'); ?>
            </ul>
          </nav>
        </div>

        <div class="col-md-4">

        </div>


      </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>