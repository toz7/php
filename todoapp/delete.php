<?php
include "database.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['delete_todo'])) {
        $id = $_POST['todo_id'];
        $deleteSql = "DELETE FROM todoapp WHERE id = $id";
        if ($mysqli->query($deleteSql) === true) {
            // Query
            $sql_display = "SELECT * FROM todoapp";
            if ($res = mysqli_query($mysqli, $sql_display)) {
            if ($res->num_rows > 0) {
                while ($row = mysqli_fetch_array($res)) {
                    echo "<div class=\"card\">";
                    echo "<h1>" .$row['id'] ."- ".$row['todo']."</h1>";
                    echo "<p class=\"price\">" .$row['priority']."</p>";
                    echo "<p>" .$row['date']."</p>";
                    echo "<form action='' method='post'>";
                    echo "<input type='hidden' name='todo_id' value='" .$row['id'] . "'>";
                    echo "<button type='submit' name='delete_todo'>Delete</button>";
                    echo "</form>";
                    echo "</div>";
          }
          mysqli_free_res($res);
      }
  }
        } else {
            echo "Error: " . $mysqli->error;
        }
        exit;
    }
}


?>
