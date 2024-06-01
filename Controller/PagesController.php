<?php
    class PagesController{
        function register() {
            include "View/register.php";
        }
        function home() {
            include "View/home.php";
        }
        function login() {
            include "View/login.php";
        }
        function dashboard() {
            include "View/dashboard.php";
        }
        function error() {
            include "View/404.php";
        }
        function profile() {
            include "View/profile.php";
        }
        function search() {
            include "View/search_id.php";
        }
        function admin() {
            include "View/admin.php";
        }
        function viewUsers() {
            include "View/viewUsers.php";
        }
    }
?>  
