function checkCurrency() {
    if ($("#points").val() < 0) {
        $("#points").addClass("is-invalid");
    } else {
        $("#points").removeClass("is-invalid");
    }
}

// Ready Action
$(document).ready(function() {
    // Check Currency Value
    $("#points").on("change paste keyup blur", checkCurrency);
    // Message Template Selector
    $(".dropdown-item").click(function() {
        $("#msg").val($(this).text());
    });
    // Button Group Action
    $("#btdef").click(function() {
        $("#points").val(2000);
    });
    $("#btp1").click(function() {
        $("#points").val(parseInt($("#points").val()) + 100);
        checkCurrency();
    });
    $("#btp5").click(function() {
        $("#points").val(parseInt($("#points").val()) + 500);
        checkCurrency();
    });
    $("#btp10").click(function() {
        $("#points").val(parseInt($("#points").val()) + 1000);
        checkCurrency();
    });
    $("#btm1").click(function() {
        $("#points").val(parseInt($("#points").val()) - 100);
        checkCurrency();
    });
    $("#btm5").click(function() {
        $("#points").val(parseInt($("#points").val()) - 500);
        checkCurrency();
    });
    $("#btm10").click(function() {
        $("#points").val(parseInt($("#points").val()) - 1000);
        checkCurrency();
    });
    // Load Random Message & Auto Expand
    var oldScrollHeight;
    $("#msg")
    .val(
        $(".dropdown-menu a")
        .eq(Math.floor(Math.random() * $(".dropdown-menu a").length))
        .text())
    .autogrow({vertical: true, horizontal: false});
});
