<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php
    session_start();
    ?>

  <head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="CSS\Reset.css" type="text/css">
    <link rel="stylesheet" href="CSS\index.css" type="text/css">
    <link rel="stylesheet" href="CSS\Blog.css" type="text/css">
  </head>
  <body>

    <nav>
      <div class="Parent">
      <div class="child LogoBoxSize">
          <a href="index.php"><img src="Resources\Images\Logo.png" alt="HomeLogo" class="HomeLogo"></img></a>
        </div>
        <div class="child">
          <div class="menu">
          <div class="button">
            <button type="button" class="drop_down" value="Menu">Menu</button>
          </div>
          <div class="content">
          <div class="middle1">
            <a href="index.php#AboutMe" class="btn btn1">about me</a>
            <a href="index.php#Skills" class="btn btn1">skills</a>
            <a href="index.php#Education" class="btn btn1">education</a>
            <a href="index.php#Experience" class="btn btn1">experience</a>
          </div>
          <div class="middle2">
            <a href="index.php#Contact" class="btn btn1">contact</a>
            <a href=<?php if(isset($_SESSION['Username'])){echo '"addPost.php"';}else{echo '"Login.html"';} ?>  class="btn btn1">add post</a>
            <a href="viewBlog.php" class="btn btn1">view blog</a>
            <a href=<?php if(isset($_SESSION['Username'])){echo '"logout.php"';}else{echo '"Login.html"';} ?> class="btn btn1">
              <?php
                  if(isset($_SESSION['Username'])){
                    echo "LogOut";
                  }
                  else{
                    echo "Login";
                  }
              ?>
            </a>
          </div>
        </div>
      </div>
      </div>
    </div>
    </nav>

    <div class="Banner">
      <h1>Blog</h1>
    </div>

    <form action="viewBlog.php" method="get">
      <aside class="Filter">
        <h3>Filter</h3>
        <select class="" name="Month">
          <option value="null">Month</option>
          <option value="01">January</option>
          <option value="02">February</option>
          <option value="03">March</option>
          <option value="04">April</option>
          <option value="05">May</option>
          <option value="06">June</option>
          <option value="07">July</option>
          <option value="08">August</option>
          <option value="09">Septemeber</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
        </select>
        <button type="submit" name="Filter">Filter</button>
      </aside>
    </form>

    <main id="Blog_Entry">
      <article id="BlogCreation">
        <div id="content">
            <?php
              $dbhost = getenv("MYSQL_SERVICE_HOST");
              $dbport = getenv("MYSQL_SERVICE_PORT");
              $dbuser = getenv("DATABASE_USER");
              $dbpwd = getenv("DATABASE_PASSWORD");
              $dbname = getenv("DATABASE_NAME");


                if(isset($_SESSION['PostPrev'])){
                  echo '<section><div class="row"><h2 class="PostAuthor columnLeft">Author: '.$_SESSION['Username'].'</h2><time class="columnRight"><p>'.$_SESSION['DatePrev'].' '.$_SESSION['TimePrev'].'</p></time></div><h2 class="PostAuthor">Title: '.$_SESSION['TitlePrev'].'</h2><div class="row"><p class="PostSample columnLeft">'.nl2br($_SESSION['PostPrev']).'</p><form class="preview columnRight" action="BlogEntry.php" method="post"><button type="submit" name="submitPrev">Submit</button><button type="submit" name="back">Edit</button></form></div></section><hr>';
                }
                if(isset($_GET['Month'])){
                  if($_GET['Month']=="null"){
                    $sql = 'SELECT * FROM blogentry';
                  }
                  else{
                      $sql = 'SELECT * FROM blogentry WHERE MONTH(Date)="'.$_GET['Month'].'"';
                  }
                }
                else{
                  $sql = 'SELECT * FROM blogentry';
                }
                $db = new mysqli($dbhost, $dbuser, $dbpwd, $dbname) or die('Unable to connect');
                $result = $db->query($sql);
                if(!$result){
                  echo '<section><h2 class="PostAuthor">No entry in my blog yet; Be the first to post somenthing</h2></section>';
                }
                if ($result->num_rows== 0 ){
                  echo '<section><h2 class="PostAuthor">No entry in this month yet.</h2></section>';
                }
                else{
                  $stack=array();
                  if ($result->num_rows > 0 ){
                    while($row = $result->fetch_assoc()){
                      $stack[]=$row;
                    }
                  }
                  for($i=count($stack)-1;$i>=0;$i--){
                    echo '<section><div class="row"><h2 class="PostAuthor columnLeft">Author: '.$stack[$i]['Username'].'</h2><time class="columnRight"><p>'.$stack[$i]['Date'].' '.$stack[$i]['time'].'</p></time></div><h2 class="PostAuthor">Title: '.$stack[$i]['Title'].'</h2><p class="PostSample">'.nl2br($stack[$i]['Post']).'</p></section><hr>';
                  }
                }
                $db->close();
              ?>
</div>
      </article>
    </main>
</body>
</html>
