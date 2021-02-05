<?php
    $Username='"'.$_POST['Username'].'"';
    $Name='"'.$_POST['Name'].'"';
    $Surname='"'.$_POST['Surname'].'"';
    $Email='"'.$_POST['email'].'"';
    $Password='"'.$_POST['password'].'"';

    $dbhost = getenv("MYSQL_SERVICE_HOST");
    $dbport = getenv("MYSQL_SERVICE_PORT");
    $dbuser = getenv("DATABASE_USER");
    $dbpwd = getenv("DATABASE_PASSWORD");
    $dbname = getenv("DATABASE_NAME");

    $db = new mysqli($dbhost, $dbuser, $dbpwd, $dbname) or die('Unable to connect');
    $sql = 'INSERT INTO users (Username, Name, Surname,Email,Password) VALUES ('.$Username.','.$Name.','.$Surname.','.$Email.','.$Password.')';
    if ($db->query($sql) === TRUE) {
        header("Location: Login.html");
      }
      else {
        echo "Error: " . $sql . "<br>" . $db->error;
      }

    mysqli_close($db);
?>
