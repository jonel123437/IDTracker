<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>idTracker | Register</title>
        <link rel="stylesheet" href="./assets/css/home.css" />
        <link rel="stylesheet" href="./assets/css/styles.css" />
        <link rel="stylesheet" href="./assets/css/register.css" />
    </head>
    <body>
        <?php require "Model/registerModel.php"; ?>
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
        <div id="register_container" class="container <?php if($success) echo 'success'; ?><?php if($error) echo ' error'; ?>">
            <form action="?page=register" method="post">
                <h1 style="margin-bottom: 2rem;">Register</h1>

                <?php if($error): ?>
                    <p id="error_msg" style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>

                <?php if($email_exists): ?>
                    <p id="error_msg" style="color: red;">Email already exists. Please use a different email.</p>
                <?php endif; ?>

                <?php if($success): ?>
                    <p id="success_msg" style="color: green;">Registered successfully</p>
                <?php endif; ?>

                <div class="input_container" style="margin-top: 2rem;">
                    <input 
                        type="text" 
                        name="full_name" 
                        id="full_name" 
                        pattern="[A-Za-z\s]+" 
                        title="Please enter only alphabetic characters" 
                        required 
                        placeholder=" " 
                    />
                    <label for="full_name">Full Name</label>
                </div>

                <div class="input_container">
                    <input 
                        type="text" 
                        name="id_no" 
                        id="id_no" 
                        required 
                        placeholder=" " 
                        maxlength="16"
                    />
                    <label for="id_no">ID No. (e.g., DIET-2022-32-179)</label>
                </div>

                <div class="input_container">
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        required 
                        placeholder=" " 
                    />
                    <label for="email">Email</label>
                </div>

                <div class="input_container">
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        minlength="8" 
                        required 
                        placeholder=" " 
                    />
                    <label for="password">Password</label>
                </div>

                <div class="input_container">
                    <input 
                        value="Signup" 
                        class="signup" 
                        type="submit" 
                        style="background-color: #1177d1 !important; width: 100%; cursor: pointer;"
                    />
                </div>
            </form>
        </div>
    </body>
    <script>
        const input = document.getElementById('id_no');

        input.addEventListener('input', function(e) {
            // Remove everything except digits
            let digits = input.value.replace(/\D/g, '');

            // Limit length to 9 digits (4 + 2 + 3)
            digits = digits.substring(0, 9);

            // Build the formatted value
            let formatted = 'DIET-';

            if (digits.length > 0) {
                formatted += digits.substring(0, 4);
            }
            if (digits.length >= 5) {
                formatted += '-' + digits.substring(4, 6);
            }
            if (digits.length >= 7) {
                formatted += '-' + digits.substring(6, 9);
            }

            input.value = formatted;
        });
    </script>
    <script src="./assets/js/home.js"></script>
</html>
