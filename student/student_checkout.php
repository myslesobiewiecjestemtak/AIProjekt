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

$name = $_SESSION["librarian"];
$query = mysqli_query($link,"SELECT * FROM student_registration WHERE username='$name'");
$row = mysqli_fetch_array($query);
$ids = $row['ids'];
$id = $_GET["id"];
mysqli_query($link, "INSERT INTO checkout (ids, idb) VALUES ($ids, $id)");
//echo $ids
//echo $id
mysqli_query($link, "UPDATE books SET available_qty= available_qty - 1 WHERE idb=$id and available_qty>0");
?>
<script type="text/javascript">
    alert("Ksiazka została wypozyczona");
    window.location = "home.php";
    exit;
</script>