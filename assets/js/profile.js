

var upload_image = document.querySelector('.upload_image')
var dummylogo = document.querySelector('.dummylogo')
var isOpen = false;

document.querySelector('.edit_profile').addEventListener('click', function(){
    event.preventDefault();

    if(isOpen) {
        upload_image.style.display = "block";
        dummylogo.style.display = "none";
    } else {
        upload_image.style.display = "none";
        dummylogo.style.display = "inline";
    }

    isOpen = !isOpen; 
});



var edit = document.querySelectorAll('#edit');
var isOpen = false;

document.querySelector('.settings').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default behavior of the link
    
    edit.forEach(function(edit) {
        if (isOpen) {
            edit.style.display = "none"; 
            upload_image.style.display = "none";
            dummylogo.style.display = "inline"
        } else {
            edit.style.display = "block"; 
        }
    });
    
    isOpen = !isOpen; 
});
