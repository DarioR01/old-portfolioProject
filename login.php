<?php
    $Email=$_POST['email'];
    $Password='"'.$_POST['password'].'"';

    $dbhost = getenv("MYSQL_SERVICE_HOST");
    $dbport = getenv("MYSQL_SERVICE_PORT");
    $dbuser = getenv("DATABASE_USER");
    $dbpwd = getenv("DATABASE_PASSWORD");
    $dbname = getenv("DATABASE_NAME");

    $db = new mysqli($dbhost, $dbuser, $dbpwd, $dbname) or die('Unable to connect');
    $sql = 'SELECT Username, Email FROM users WHERE Email='.'"'.$Email.'"'.'AND Password='.$Password.';';
    $result = $db->query($sql);
    if ($result->num_rows > 0){
      session_start();
      while($row = $result->fetch_assoc()){
        $_SESSION['Username'] = $row['Username'];
        header("Location: addPost.php");
      }
    }
    else{
      echo "Error"; //Have to create an error page
      header("Location: Login.html");
    }
    $db->close();
?>
