
<?php
session_start();
if(!isset($_SESSION["librarian"]))
{
  ?>
    <script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
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

        Książki
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Strona Główna</a></li>
        <li><a href="#">Książki</a></li>
      </ol>
    </section>
    <!-- Main content -->

    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a href="book_list.php">Name <?php $sort = "name"; echo $sort?></a></li>
              <li><a href="book_list.php">authoer<?php $sort = "author"; echo $sort ?></a></li>
              <li><a href="#">Something else here</a></li>

              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </div>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
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
          $result = mysqli_query($link, "select * from books");
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
          ?>
        </div>
        <!-- /.box-body -->

        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "includes/footer.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/stupidtable.js?dev"></script>
<script>
    $(function(){
        $("table").stupidtable();
    });
</script>
