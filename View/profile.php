<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>idTracker | Home</title>
        <link rel="stylesheet" href="./assets/css/profile.css">
        <link rel="stylesheet" href="./assets/css/styles.css">
        <link rel="stylesheet" href="./assets/css/home.css">
        <link rel="stylesheet" href="./assets/css/dashboard.css">
    </head>
    <body>
        <?php   
            include "Model/profileModel.php";
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
            <a href="#" onclick="confirmLogout()">Logout</a>
        </div>
        
        <div id="profile_id">
            <div class="profile_1">
                <div class="profile_2">
                    <img class="citelogo" src="assets/img/citelogo.png" alt="">
                    <h1>CITE <br>TECHNICAL <br>INSTITUTE, INC.</h1>
                </div>
                <div class="profile_3">
                    <p>Purok 2, San Jose, Cebu City, Philippines</p>
                    <p>Tel. No. 346-1611 Fax No. 236-2650</p>
                </div>
            </div>

            <div class="profile_4">
                <img class="dummylogo" src="<?php echo $imageSrc; ?>" alt="">
                <span id="edit" class="edit_profile"> ⚙️</span>
                <form class="upload_image" method="POST" enctype="multipart/form-data">
                    <input type="file" name="image">
                    <input type="submit" value="submit">
                </form>
                <h1><?=$fullNameProfile?><span id="edit"> ⚙️</span></h1>
                <h4>NAME</h4>
            </div>


            <div class="profile_5">
                <h2><?=$id_noProfile?><span id="edit"> ⚙️</span></h2>
                <h4>ID NO.</h4>
            </div>
            <div class="settings">⚙️</div>
        </div>
        <button id="next_button">></button>
        <button id="prev_button"><</button> 
    </body>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/profile.js"></script>
</html>
