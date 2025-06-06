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

function showLogoutModal() {
    document.getElementById("logoutModal").style.display = "flex";
}

function closeLogoutModal() {
    document.getElementById("logoutModal").style.display = "none";
}

function confirmLogout() {
    window.location.href = "?page=logout";
}

// Close modal when clicking outside the modal content
window.addEventListener("click", function (event) {
    const modal = document.getElementById("logoutModal");
    if (event.target === modal) {
        closeLogoutModal();
    }
});

document.getElementById('dashboard_title').addEventListener('click', function() {
    window.location.href = "?page=dashboard";
})