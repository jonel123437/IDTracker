<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>idTracker | Dashboard</title>
        <link rel="stylesheet" href="./assets/css/styles.css">
        <link rel="stylesheet" href="./assets/css/home.css">
        <link rel="stylesheet" href="./assets/css/register.css">
        <link rel="stylesheet" href="./assets/css/dashboard.css">
    </head>
    <body>
        <?php
            include "Model/loginModel.php";
            include "Model/searchModel.php";
        ?>
        <header>
            <div class="header_container">
                <h1 id="dashboard_title" style="cursor: pointer; margin-left: 1rem;">ID Tracker</h1>
                <div class="header_container1">
                    <ul class="ul_container">
                        <li><a href="" id="dropdown"><?= $fullNameProfile ?><a href="" id="dropdown1"> ▼</a></a></li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="dropdown-logout">
            <a href="?page=profile">Profile</a>
            <br>
            <a href="?page=dashboard">Dashboard</a>
            <br>
            <a href="#" onclick="showLogoutModal()">Logout</a>
        </div>
        <!-- Logout Confirmation Modal -->
        <div id="logoutModal" class="modal-overlay" style="display:none;">
            <div class="modal">
                <p>Are you sure you want to logout?</p>
                <div class="modal-buttons">
                    <button onclick="confirmLogout()">Yes</button>
                    <button onclick="closeLogoutModal()">Cancel</button>
                </div>
            </div>
        </div>

        <div id="greetings" style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%);">
            <h1>WELCOME TO DASHBOARD</h1>

            <form action="" method="post">
                <div class="input_container">
                    <input 
                        type="text" 
                        placeholder="" 
                        name="id_no"
                        style="<?= !empty($searchError) ? 'border: 2px solid red;' : '' ?>"
                        autocomplete="off"
                    />
                    <label for="id_no">Search ID</label>
                    <button type="submit" id="search_id">></button>
                </div>
                <?php if (!empty($searchError)): ?>
                    <div style="text-align:left; color: red; font-size: 0.9rem;">
                        <?= htmlspecialchars($searchError) ?>
                    </div>
                <?php endif; ?>
            </form>

        </div>

    </body>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/profile.js"></script>
</html>
