
function fun()
{
    checkbox = document.querySelectorAll('input[type=checkbox]');
    checkbox.forEach(element => {
        if(element.checked)
        {
            let closestElement = element.closest(".list-container");
            let tasks = closestElement.querySelectorAll(".tasks");
            tasks[0].style.display = "none";
        }
        else if(!element.checked)
        {
            let closestElement = element.closest(".list-container");
            let tasks = closestElement.querySelectorAll(".tasks");
            tasks[0].style.display = "block";
        }
        
    });

}

var smallSize = false;

window.addEventListener('resize', hamburger);
window.addEventListener('DOMContentLoaded', hamburger);
window.addEventListener('DOMContentLoaded', fun);


function hamburger(){
    if(window.innerWidth<600 && smallSize==false)
    {
        smallSize = true;
        let log = document.querySelectorAll(".log");
        log.forEach(element => {
            element.style.display="none";
        });
        var sidenav = null;
        var burger = null;
        var my_div = null;
        var here = null;
        sidenav = document.createElement("div");
        sidenav.setAttribute("id", "mySidenav");
        sidenav.setAttribute("class", "sidenav");
        sidenav.innerHTML = "<a href=\"javascript:void(0)\" class=\"closebtn\" onclick=\"closeNav()\">&times;</a>";
        sidenav.innerHTML += "<a href=\"signup.php\">Sign up</a>";
        sidenav.innerHTML += "<a href=\"login.php\">Log in</a>";
        sidenav.innerHTML += "<a href=\"includes/logout.inc.php\">Log out</a>";

        burger = document.createElement("span");
        burger.setAttribute("style", "font-size:30px;cursor:pointer;position: absolute; top:5px; right:10px");
        burger.setAttribute("onclick", "openNav()");
        burger.innerHTML = "&#9776;";
        

        my_div = document.getElementById("first");
        here = document.getElementById("maherein");
        document.body.insertBefore(sidenav, my_div);
        document.body.insertBefore(burger, here);
    }
    else if(window.innerWidth>600 && smallSize==true)
    {
        smallSize = false;
        let span = document.querySelectorAll("span");
        span.forEach(element => {
            element.remove();
        });
        let sidenav = document.querySelectorAll(".sidenav");
        sidenav.forEach(element => {
            element.remove();
        });
        let log = document.querySelectorAll(".log");
        log.forEach(element => {
            element.style.removeProperty('display');
        });
    }
}



function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }

  function high_contrast() {
    let body = document.getElementsByTagName("body");
    let h2 = document.getElementsByTagName("h2");
    body[0].style.setProperty("color", "yellow", "important");
    h2[0].style.setProperty("color", "yellow", "important");
  }

  function fontSize() {
    let body = document.getElementsByTagName("body");
    let h2 = document.getElementsByTagName("h2");
    body[0].style.setProperty("font-size", "140%", "important");
    h2[0].style.setProperty("font-size", "140%", "important");
  }

  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});