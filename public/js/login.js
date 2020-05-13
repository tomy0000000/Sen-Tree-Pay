function loginEffect() {
    console.log("call login");
    $(".bg").animate({
        "filter": "blur(10px)"
    }, 5000, function() {
        console.log("animation complete");
    // Animation complete.
  });
    // $(".bg").css('filter', 'blur(0px)');
}

function checkLogin() {
    if ($("#userPassword").val().length == 6) {
        console.log("Loging in...");
        // loginEffect();
        $("#loginForm").submit();
        // $("#userPassword").val("");
    }
}

$(document).ready(function() {
    $("#userPassword").on("change paste keyup", checkLogin);
});

// -ms-transform: scale(1.2);
// -moz-transform: scale(1.2);
// -webkit-transform: scale(1.2);
// -o-transform: scale(1.2);
// transform: scale(1.2);