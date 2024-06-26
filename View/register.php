<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>idTracker | Register</title>
        <link rel="stylesheet" href="./assets/css/home.css">
        <link rel="stylesheet" href="./assets/css/styles.css">
    </head>
    <body>
        <?php
            require "Model/registerModel.php";
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
        <div class="container <?php if($success) echo 'success'; ?><?php if($error) echo ' error'; ?>">
            <form action="?page=register" method="post">
                <h1 style="margin-bottom: 2rem;">Register</h1>
                <?php if($error): ?>
                    <p id="exist_id" style="color: red;">ID already exists. Please choose a different ID.</p>
                <?php endif; ?>
                <?php if($success): ?>
                    <p id="exist_id" style="color: green;">Registered successfully</p>
                <?php endif; ?>
                <div class="input_container">
                    <input type="text" placeholder="Full Name" name="full_name" pattern="[A-Za-z\s]+" title="Please enter only alphabetic characters" required>
                </div>
                <div class="input_container">
                    <input type="text" placeholder="Id No." name="id_no" pattern="[0-9-]*" title="Please enter only numbers" required>
                </div>
                <div class="input_container">
                    <input type="email" placeholder="Email" name="email" required>
                </div>
                <div class="input_container">
                    <input type="password" placeholder="Password" name="password" minlength="8" required>
                </div>
                <div class="input_container">
                    <input value="Signup" class="signup" type="submit" style="background-color: 1177d1 !important; width: 100%; cursor: pointer;">
                </div>
            </form>
        </div>
    </body>
    <script src="./assets/js/home.js"></script>
</html>
