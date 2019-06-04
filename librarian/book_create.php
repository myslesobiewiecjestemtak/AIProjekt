<?php 
session_start();
if(!isset($_SESSION["librarian"]))
{
  ?>
    <script type="text/javascript">
      window.location="login.php";
    </script>
  <?php
}
include"includes/header.php"; 
include"includes/sidebar.php";
include"connection.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	  <!-- Content Header (Page header) -->
	  <section class="content-header">
	    <h1>
	      Ksiązki
	      <small>Create form element</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href=""><i class="fa fa-dashboard"></i> Strona Główna</a></li>
	      <li><a href="book_list.php">Spis książek</a></li>
	      <li class="active">Dodaj książkę</li>
	    </ol>
	  </section>

	  <!-- Main content -->
	  <section class="content">
	    <div class="row">
	      <div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <div class="box-header with-border">
	            <h3 class="box-title">Dodaj książkę</h3>
	          </div>   
	          <!-- /.box-header -->
	          <!-- form start -->
	          <form name="form1" role="form" action="" method="post" enctype="multipart/form-data">
	            <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	              <div class="form-group">
	                <input type="text" class="form-control" id="name" name="name" placeholder="Tytuł">
	              </div>
                  <div class="form-group">
	                <input type="text" class="form-control" id="author" name="author" placeholder="Autor">
	              </div>
	              <div class="form-group">
	                <input type="text" class="form-control" id="publication" name="publication" placeholder="Wydawnictwo">
	              </div>
                  <div class="form-group">
	                <input type="text" class="form-control" id="genre" name="genre" placeholder="Gatunek">
	              </div>
	              <div class="form-group">
	                <input type="text" class="form-control" id="price" name="price" placeholder="Cena">
	              </div>
                  <div class="form-group">
	                <input type="text" class="form-control" id="qty" name="qty" placeholder="Ilość">
	              </div>
	              <div class="form-group">
	                <input type="text" class="form-control" id="available_qty" name="available_qty" placeholder="Dostępna ilość">
	              </div>
	            <div class="form-group">
	              <button type="submit" class="btn btn-primary" name="submit1" value="insert">Zatwierdź</button>
	              <a href='book_list.php' class="btn btn-warning">Wróć</a>
	            </div>
	            	
	            </div>
					
				</div>

	          </form>
<?php
    if(isset($_POST["submit1"]))
    {
			$tm=md5(time());
			mysqli_query($link,"insert into books values('','$_POST[name]','$_POST[author]','$_POST[publication]','$_POST[genre]','$_POST[price]','$_POST[qty]','$_POST[available_qty]')");   
			?>
        ?>
        <script type="text/javascript">
            alert("Book Inserted Successfully");
            window.location = "book_list.php";
            exit;
        </script>
        <?php
    }
?>
	        </div>
	        <!-- /.box -->

	      </div>
	      <!-- /.col-->
	    </div>
	    <!-- ./row -->
	  </section>
	  <!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
<?php include "includes/footer.php"; ?>