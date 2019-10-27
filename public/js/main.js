window.onload = function() {

    document.getElementById("auth-menu").addEventListener("click", authMenu);
    initMap(contacts);
};

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

function authMenu(event) {
    event.stopImmediatePropagation();
}

function initMap(contacts) {
    for (let i = 0; i < contacts.length; ++i) {
        let contact = contacts[i];
        map = 'map-' + contact.id;
        var mymap = L.map(map).setView([contact.longitude, contact.latitude], 17);
        var marker = L.marker([contact.longitude, contact.latitude]).addTo(mymap);
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.streets',
            accessToken: 'pk.eyJ1IjoiaHVkZ2VtYXAiLCJhIjoiY2sxZ3JrYmNjMDgwYzNvazE5bGpkcHplZyJ9.abeMzFGKNR9SwqV94RyQTA'
        }).addTo(mymap);
    }
}
