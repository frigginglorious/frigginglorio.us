<?php

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
session_start();


if ((isset($_SESSION['loggedin'])) && ($_SESSION['loggedin']===TRUE)){
    include('post.php');
}else if(isset($_POST['username']) && isset($_POST['password'])){

    $name = $_POST['username'];
    $password = sha1($_POST['password']);


    $sql = "select * from author where name = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name]);

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {

        if($password == $row["password"]){
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['username'] = $name;
            $_SESSION['id'] = $row["id"];
            echo "LOGGED IN";
            include("post.php");
        }else{
            echo "Bad Password";
        }
    }
    else {
        echo "Error: " . $sql . "<br>";
        session_destroy();

    }

}else{
  session_destroy();

  echo "You Must Log In.";


?>

      <div id="login">
        Log in to create post:
        <form action="/cms/" method = "post">
          <label for="username">Username:</label> <input type="username" id="username" name="username"><br />
          <label for="password">Password:</label> <input type="password" id="password" name="password"><br />
          <button type = "submit">Login</button>
        </form>
      </div>
      <?php
}
echo "session: ";
print_r($_SESSION['loggedin']);
?>
