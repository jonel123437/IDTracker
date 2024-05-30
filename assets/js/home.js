document.getElementById('title').addEventListener('click', function() {
    window.location.href = "?page=home";
})

document.getElementById('submit').addEventListener('click', function() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    if(email === "admin" && password === "admin") {
        window.location.href = "?page=admin";
    }
});
