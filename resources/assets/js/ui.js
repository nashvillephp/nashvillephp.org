// TOGGLE SIDEBAR NAVIGATION MENU
$(document).ready(function(){
    $(".nav-menu-toggle").click(function(){
        $(".nav-menu-toggle").toggleClass("activate");
        $(".nav-menu").toggleClass("activate");

    });
});