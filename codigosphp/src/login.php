<?php require_once "menu.php"; ?>

<div>
    <h3>Login</h3>
    <form action="loginConfirmation.php" method="post">

        <label for="email">Email</label>
        <input type="email" name="email" />
    
        <label for="password">Password</label>
        <input type="password" name="password" />
    
        <input type="submit" value="Login">
    </form>
</div>