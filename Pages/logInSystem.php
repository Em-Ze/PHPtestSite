<?php
    include_once "header.php";
?>

<div class= "logInBox">
    <form action="" method="post">
        <label for="Login" id="idLogin">Login</label>
        <input type="text" name="Login">
        <label for="Password" id="idPassword">Password</label>
        <input type="text" name="Password">
        <br>
        <button class="logButton" type="submit" >Log In</button>
    </form>
    <br ><br>
    <a class="registerLink" href="register.php">Register</a>
</div>

<?php
    include_once "../Includes/dbCannectionClass.php";   
?>
<?php

    if(isset($_POST["Login"]))
    {
        $login = $_POST["Login"];
        $password = $_POST["Password"];

        $dbConn = new dbConnection();
        $dbConn->querySelect($login,$password);

    }
     
?>

<?php
    include_once "footer.php";
