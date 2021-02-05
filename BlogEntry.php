<?php
  session_start();
  if(isset($_POST['submit'])){
    if(isset($_SESSION['TitlePrev'])){
      unset($_SESSION['TitlePrev']);
      unset($_SESSION['PostPrev']);
      unset($_SESSION['DatePrev']);
    }
    if(isset($_SESSION['Username'])){
        $Username='"'.$_SESSION['Username'].'"';
        $Title='"'.$_POST['title'].'"';
        $Blog='"'.$_POST['textEntry'].'"';
        $Date='"'.date("Y/m/d").'"';
        $Time='"'.date("H:i:s").'"';

        $dbhost = getenv("MYSQL_SERVICE_HOST");
        $dbport = getenv("MYSQL_SERVICE_PORT");
        $dbuser = getenv("DATABASE_USER");
        $dbpwd = getenv("DATABASE_PASSWORD");
        $dbname = getenv("DATABASE_NAME");


        $db = new mysqli($dbhost, $dbuser, $dbpwd, $dbname) or die('Unable to connect');
        $sql = 'INSERT INTO blogentry (Username,time, Date, Title, Post) VALUES ('.$Username.','.$Time.','.$Date.','.$Title.','.$Blog.')';
        if ($db->query($sql) === TRUE) {
            header("Location: viewBlog.php");
          }
          else {
            echo "Error: " . $sql . "<br>" . $db->error;
          }
        mysqli_close($db);
    }
    else{
      header("Location: viewBlog.php");
    }
  }

  else if(isset($_POST['back'])){
    header("Location: addPost.php");
  }

  else if(isset($_POST['submitPrev'])){
    if(isset($_SESSION['Username'])){
        $Username='"'.$_SESSION['Username'].'"';
        $Title='"'.$_SESSION['TitlePrev'].'"';
        $Blog='"'.$_SESSION['PostPrev'].'"';
        $Date='"'.$_SESSION['DatePrev'].'"';
        $Time='"'.$_SESSION['TimePrev'].'"';
        $db = new mysqli('localhost', 'root', '', 'blog') or die('Unable to connect');
        $sql = 'INSERT INTO blogentry (Username,time, Date, Title, Post) VALUES ('.$Username.','.$Time.','.$Date.','.$Title.','.$Blog.')';
        if ($db->query($sql) === TRUE) {
            header("Location: viewBlog.php");
          }
          else {
            echo "Error: " . $sql . "<br>" . $db->error;
          }
        mysqli_close($db);
    }
    else{
      header("Location: viewBlog.php");
    }
    if(isset($_SESSION['TitlePrev'])){
      unset($_SESSION['TitlePrev']);
      unset($_SESSION['PostPrev']);
      unset($_SESSION['DatePrev']);
      unset($_SESSION['TimePrev']);
    }
  }

  else{
    $_SESSION['TitlePrev']=$_POST['title'];
    $_SESSION['PostPrev']=$_POST['textEntry'];
    $_SESSION['DatePrev']=date("Y/m/d");
    $_SESSION['TimePrev']=date("H:i:s");
    header("Location: viewBlog.php");
  }
?>
