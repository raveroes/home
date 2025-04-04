function func(){

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (username == "code" && password == "code"){
        alert("Welcome!")
        window.location.assign(index.html)
    }
    else {
        alert("invalid username and password. Please try again");
    }
};
