<?php

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    include('/cms/post.php');
}else if(isset($_POST['username']) && isset($_POST['password'])){
    $link = include('dbConnect.php');

    $name = $_POST['username'];
    $password = sha1($_POST['password']);


    $sql = "select * from author where name = '$name'";



    if ($result = $link->query($sql)) {
        /* fetch object array */
        while ($obj = $result->fetch_object()) {
            if($password == $obj->password){
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $name;

            }
        }
        /* free result set */
        $result->close();
        if ($_SESSION['loggedin'] == TRUE) {

            echo "LOGGED IN";
            include("post.php");

        }
    }else {
        echo "Error: " . $sql . "<br>" . $link->error;
        session_destroy();

    }

}

else{
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
print_r($_SESSION['login']);
?>
