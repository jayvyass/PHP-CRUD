<?php
require_once "config.php";
if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = "DELETE FROM formvalidation WHERE id = ?";
    $stmt = $conn->prepare($query);
    if ($stmt) {
      $stmt->bind_param("i", $id); 
      if (isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
          if ($stmt->execute()) {
              echo "<script>window.location.href = 'http://localhost/validation/tcpdf/read.php';</script>";
              exit;
          } else {
            echo "Error: " . $stmt->error;
          }
        }
    echo "<script>
      var result = confirm('Are you sure you want to delete this record?');
        if (result) {
        window.location.href = 'delete.php?id=$id&confirm=true';
        } else {
        window.location.href = 'http://localhost/validation/tcpdf/read.php';
        }
        </script>";
        
        $stmt->close();
 }
}
mysqli_close($conn);
?>
