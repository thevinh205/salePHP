<?php
    session_start();
    if(isset($_SESSION['username'])) {
        $newURL = "../shop/shop_list.php";
        header('Location: '.$newURL);
    }
?>
<html>
    <link rel="stylesheet"  href="../static/css/login.css" />
    <script src="../static/js/jquery.min.js"></script>
    <script src="../static/js/common.js"></script>
    <div class="wrapper">
        <div class="imgcontainer">
            <img src="../static/img/avatar.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
            </br>

            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <br/>
            
            <span class="message-login-fail hidden">Username hoặc password không đúng</span>
            
            <button onclick="login()" class="btn-submit">Login</button>
            <input type="checkbox" checked="checked"> Remember me
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </div>
</html>