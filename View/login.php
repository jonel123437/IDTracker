<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>idTracker | Login</title>
        <link rel="stylesheet" href="./assets/css/home.css">
        <link rel="stylesheet" href="./assets/css/styles.css">
    </head>
    <body>
        <?php
            require "Model/loginModel.php";
        ?>
        <header>
            <div class="header_container">
                <h1 id="title" style="cursor: pointer; margin-left: 1rem;">ID Tracker</h1>
                <div class="header_container1">
                    <ul class="ul_container">
                        <li style="margin: 0 50px;"><a href="?page=register">Signup</a></li>
                        <li><a href="?page=login">Login</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="container <?php if($error) echo 'error'; ?>">
            <form action="?page=login" method="post">
                <h1 style="margin-bottom: 2rem;">LOGIN</h1>
                <?php if($error): ?>
                    <p id="exist_id" style="color: red;">Invalid email or password</p>
                <?php endif; ?>
                <div class="input_container">
                    <input id="email" type="email" placeholder="Email" name="email">
                </div>
                <div class="input_container">
                    <input id="password" type="password" placeholder="Password" name="password">
                </div>
                <div class="input_container">
                    <input id="submit" type="submit" value="Login" style="background-color: 1177d1 !important; width: 100%; cursor: pointer;">
                </div>
            </form>
        </div>
    </body>
    <script src="./assets/js/home.js"></script>
</html>
