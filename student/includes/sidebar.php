
  <aside class="main-sidebar">
    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["librarian"]; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <span class="input-group-btn">

              </span>
        </div>
      </form>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Nawigacja</li>

        <li><a href="home.php"><i class="fa fa-home"></i> Lista książek </a></li>
        <li><a href="checkout.php"><i class="fa fa-home"></i> Wypożyczenia </a></li>
        <li><a href="fbook.php"><i class="fa fa-home"></i> Znajdź książkę </a></li>

      </ul>

      <?php
      /*
              <li><a href="book_create.php"><i class="fa fa-home"></i> Dodaj książkę </a></li>
              <li><a href="home.php"><i class="fa fa-home"></i> Lista studentów </a></li>
              */
       ?>
    </section>
    <!-- /.sidebar -->
  </aside>
