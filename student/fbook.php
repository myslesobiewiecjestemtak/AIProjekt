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
	      Znajdź książkę 
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href=""><i class="fa fa-dashboard"></i> Strona Główna</a></li>
	      <li><a href="home.php">Spis książek</a></li>
	    </ol>
	  </section>

	  <!-- Main content -->
	  <section class="content">
	    <div class="row">
	      <div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <div class="box-header with-border">
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
	              <button type="submit" class="btn btn-primary" name="submit1" value="insert">Zatwierdź</button>
	              <a href='book_list.php' class="btn btn-warning">Wróć</a>
	            </div>
	            	
	            </div>
					
				</div>

	          </form>
              <div class="box-body">
        <table class='table responsive table-striped table-bordered table-hover' id='example'>
          <thead>
           <tr> 
             <th data-sort='string'>  Tytuł  </th>
             <th data-sort='string'>  Autor  </th>
             <th data-sort='string'>  Wydawnictwo  </th>
             <th data-sort='string'>  Gatunek  </th>
						 <th data-sort='string'>  Ilość  </th>
             <th data-sort='string'>  Dostępna ilość  </th>
             <th data-sort='string'>  Akcja  </th>
           </tr>
           </thead>
<?php
    if(isset($_POST["submit1"]))
    {
        $result = mysqli_query($link, "select * from books where name='$_POST[name]' or author='$_POST[author]'");
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
              echo "<td>"; echo $row["name"]; echo "</td>";
              echo "<td>"; echo $row["author"]; echo "</td>";
              echo "<td>"; echo $row["publication"]; echo "</td>";
							echo "<td>"; echo $row["genre"]; echo "</td>";
							echo "<td>"; echo $row["qty"]; echo "</td>";
							echo "<td>"; echo $row["available_qty"]; echo "</td>";
							echo "<td>";  if($row["available_qty"]>0){ ?> 
								<a href="student_checkout.php?id=<?php echo $row["idb"]; ?>" onclick="return confirm('Chcesz wypożyczyć?'); " class="label label-danger" >Wypożycz</a> <?php echo "</td>";
								}
								
							echo "</tr>";
						}
          echo "</table>";
        
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