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
