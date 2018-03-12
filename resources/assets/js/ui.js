// TOGGLE SIDEBAR NAVIGATION MENU
$(document).ready(function(){
    $(".nav-menu-toggle").click(function(){
        $(".nav-menu-toggle").toggleClass("activate");
        $(".nav-menu").toggleClass("activate");

    });
});

// Populate file input labels with the name of the file selected
$('.custom-file-input').on('change', function() {
   let fileName = $(this).val().split('\\').pop();
   $(this).next('.custom-file-label').addClass("selected").html(fileName);
});
