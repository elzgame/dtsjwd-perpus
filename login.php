<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_login.css">
    <title>Halaman Login</title>
</head>

<body>
    <!-- <div class="title" style="color:white; position: absolute;left: 510px;top: 120px; 
		font-size: 30px; background-color: black;"> -->
    <div class="title">
        ADMIN PERPUSTAKAAN
    </div>
    <div class="container">
        <h1>Login</h1>
        <form method="post" action="cek_login.php">
            <label>Username</label><br>
            <input type="text" name="user"><br>
            <label>Password</label><br>
            <input type="password" name="pass"><br>
            <button type="submit" name="submit">Log in</button>
        </form>
    </div>

</body>

</html>