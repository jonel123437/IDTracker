document.getElementById('admin_title').addEventListener('click', function() {
    window.location.href = "?page=admin"
})

document.getElementById('users_button').addEventListener('click', function() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("viewUsers").innerHTML = xhttp.responseText;
            document.getElementById('admin_dashboard').style.display = "none";
        }
    };
    xhttp.open("GET", "?page=viewUsers", true);
    xhttp.send();
})

document.getElementById('body').addEventListener('click', function() {
    document.querySelector('.title1').innerHTML = "What do you want to do?";
    document.querySelector('.des').style.display = "none";
    document.querySelectorAll('.button').forEach(button => {
        button.style.display = "inline";
    });
});
