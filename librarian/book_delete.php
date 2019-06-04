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

mysqli_query($link, "DELETE from books WHERE idb=$id");
?>
<script type="text/javascript">
    alert("Usunieto");
    window.location = "book_list.php";
    exit;
</script>



