<?php



$pdo = include("dbConnect.php");
$sql = "SELECT * FROM author";
$stmt = $pdo->query($sql);

// print_r($link->query($sql));
// if ($link->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $link->error;
// }
// // print_r($result);

if (($stmt->rowCount() < 1)){
    if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD'] == 'POST' )) {
        if (isset($_POST["name"]) && isset($_POST["password"])){
            $password = SHA1($_POST["password"]);
            $name = $_POST["name"];

            $sql = "SELECT * FROM author where name = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name]);
            if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                exit("Username Already Exists");
            }

            $sql = "INSERT into author(name, password) Values (?, ?)";
            if ($pdo->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $pdo->error;
            }
        }
    }else{


?>
<h1>Create New Post Author</h1>
<form id="signup" action="/cms/index.php" method="post">
    <label>Name: </label><input type="text" name="name"/>
    <label>Password: </label><input type="password" name="password"/>
    <button type="submit">Submit</button>
</form>


<?php
    }

}else{
    include("login.php");
}
?>
<a href="/cms/logout.php">Logout</a>
