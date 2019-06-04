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
        Lista studentów
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Strona Główna</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <?php
            $result=mysqli_query($link,"select * from student_registration");
            echo "<table class='table table-striped table-bordered table-hover'>";
            echo "<tr>";
            echo "<th>"; echo "Imię";  echo "</th>";
            echo "<th>"; echo "Nazwisko";  echo "</th>";
            echo "<th>"; echo "Login";  echo "</th>";
            echo "<th>"; echo "Email";  echo "</th>";
            echo "<th>"; echo "Telefon";  echo "</th>";
            echo "<th>"; echo "Semestr";  echo "</th>";
            echo "<th>"; echo "Kierunek";  echo "</th>";
            echo "<th>"; echo "Status";  echo "</th>";
            echo "<th>"; echo "Zatwierdz";  echo "</th>";
            echo "<th>"; echo "Zaprzecz";  echo "</th>";
            echo "<th>"; echo "Akcja";  echo "</th>";
            echo "</tr>";
            while($row=mysqli_fetch_array($result))
            {
              echo "<tr>";
              echo "<td>"; echo $row["firstname"];  echo "</td>";
              echo "<td>"; echo $row["lastname"];  echo "</td>";
              echo "<td>"; echo $row["username"];  echo "</td>";
              echo "<td>"; echo $row["email"];  echo "</td>";
              echo "<td>"; echo $row["contact"];  echo "</td>";
              echo "<td>"; echo $row["sem"];  echo "</td>";
              echo "<td>"; echo $row["enrollment"];  echo "</td>";
              echo "<td>"; echo $row["status"];  echo "</td>";
              echo "<td>"; ?> <a href="approve.php?id=<?php echo $row["id"]; ?>" class="label label-success" >Zatwierdzono</a> <?php  echo "</td>";
              echo "<td>"; ?> <a href="notapprove.php?id=<?php echo $row["id"]; ?>" class="label label-warning" >Nie zatwierdzono</a> <?php  echo "</td>";
              echo "<td>"; ?> <a href="student_delete.php?id=<?php echo $row["ids"]; ?>" onclick="return confirm('Jestes pewny ze chcesz usunac?'); " class="label label-danger" >Usuń</a> <?php echo "</td>";
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
<?php include"includes/footer.php"; ?>

