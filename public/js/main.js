function toggleMenu() {
    var x = document.getElementById("mobile-menu");
    var width = document.getElementById("wrapper").clientWidth;
    if(width < 800){
        if (x.style.display === "flex") {
            x.style.display = "none";
        } else {
            x.style.display = "flex";
        }
    }
  } 

window.addEventListener("resize", function(event) {
    var x = document.getElementById("mobile-menu");
    if(document.body.clientWidth > 800){
        x.style.display = "none";
    }
})



var myNav = document.getElementById('body');
window.onscroll = function () { 
    "use strict";
    console.log('aaaa');
    if (document.body.scrollTop >= 200 ) {
        myNav.classList.add("changeColor");
        // myNav.classList.remove("changeColor");
    } 
    else {
        // myNav.classList.add("changeColor");
        myNav.classList.remove("changeColor");
    }
};