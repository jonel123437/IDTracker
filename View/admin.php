<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="./assets/css/styles.css">
        <link rel="stylesheet" href="./assets/css/home.css">
        <link rel="stylesheet" href="./assets/css/dashboard.css">
    </head>
    <body>
        <header>
            <div class="header_container">
                <h1 id="admin_title" style="cursor: pointer; margin-left: 1rem;">ID Tracker</h1>
                <div class="header_container1">
                    <ul class="ul_container">
                        <li><a href="" id="dropdown">Admin<a href="" id="dropdown1"> ▼</a></a></li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="dropdown-logout">
            <a href="?page=admin">Dashboard</a>
            <br>
            <a href="#" onclick="confirmLogout()">Logout</a>
        </div>
    </body>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/profile.js"></script>
    <script src="assets/js/admin.js"></script>
</html>
