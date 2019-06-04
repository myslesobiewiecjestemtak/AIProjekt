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
include "connection.php";
$id = $_GET["id"];
mysqli_query($link, "DELETE from student_registration WHERE ids=$id");
?>
<script type="text/javascript">
    alert("Student został usunięty");
    window.location = "home.php";
    exit;
</script>