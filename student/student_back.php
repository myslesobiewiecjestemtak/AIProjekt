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
echo $id;
mysqli_query($link, "DELETE from checkout WHERE idb=$id");
mysqli_query($link, "UPDATE books SET available_qty= available_qty + 1 WHERE idb=$id and available_qty>0");
?>
<script type="text/javascript">
    alert("Ksiazka została zwrocona");
    window.location = "home.php";
    exit;
</script>