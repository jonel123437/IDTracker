

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

document.getElementById('next_button').addEventListener('click', function() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('prev_button').style.display = "block";
            next_button.style.display = "none";
            document.getElementById("profile_id").innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "?page=back_profile", true);
    xhttp.send();
})

document.getElementById('prev_button').addEventListener('click',function() {
    window.location.href = "?page=profile"
})
