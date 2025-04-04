/* sidebar */
function showSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'flex'
}
function hideSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'none'
}


document.getElementById("LoginForm").addEventListener("submit", function(event){
    event.preventDefault();

    var username = document.getElementsById("username").value;
    var password = document.getElementsById("password").value;

    if (username == "code" && password == "code"){
        window.location.href = "index.hmtl";
    }
    else {
        alert ("invalid username and password. Please try again");
    }
});
