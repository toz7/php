

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section id="section-add">
        <form action="index.php" method="post">
            <fieldset><legend>To Do List</legend>
                <label>Date: </label>
                <input type="date" name="date"> <br>
                <label>To Do Item: </label>
                <input type="text" name="todo"><br>
                <label>Priority:</label>
                <input type="radio" name="priority" value="normal">
                <label>Normal</label>
                <input type="radio" name="priority" value="high">
                <label>High</label>
                <input type="radio" name="priority" value="low">
                <label>Low</label><br>
                <input type="submit" value="Submit">
            </fieldset>
        </form>
    </section>
    <section id="section-list">
    <?php

include "database.php";
include "delete.php";

    // Insert

    $date = $_POST['date'];
    $todo = $_POST['todo'];
    $priority = $_POST['priority'];
        
    $sql = "INSERT INTO todoapp (date, todo, priority)
            VALUES('$date', '$todo', '$priority')";

    if($mysqli->query($sql) === true) {
        echo "Your todo was inserted succesfully";
    } else {
        echo "ERROR: Could not execute $sql " . $mysqli->error;
    } 

    
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

    

    ?>
    </section>
</body>
</html>


