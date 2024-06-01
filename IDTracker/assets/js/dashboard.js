var dropdown = document.querySelector('.dropdown-logout');
var isOpen = false;

document.getElementById('dropdown').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default behavior of the link
    
    if (isOpen) {
        dropdown.style.display = "none"; 
        document.getElementById('dropdown1').innerHTML = " ▼"; 
    } else {
        dropdown.style.display = "block"; 
        document.getElementById('dropdown1').innerHTML = " ▲"; 
    }
    
    isOpen = !isOpen; 
});

function confirmLogout() {
    var confirmLogout = confirm("Do you really want to logout?");
    if (confirmLogout) {
        window.location.href = "?page=home"; 
    }
}

document.getElementById('dashboard_title').addEventListener('click', function() {
    window.location.href = "?page=dashboard";
})