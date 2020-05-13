// Auto Adjust Currency Unit & Grey-box Width
function autoAdj() {
    if (parseInt($(".container").css("width")) > parseInt($(".grey-box").css("width")) + 40) {
        $("td[id^='team']").each(function() {
            $(this).text($(this).attr("data-point").toString().replace(/\B(?=(\d{4})+(?!\d))/g, ","));
        });
    } else {
        $("td[id^='team']").each(function() {
            $(this).text($(this).attr("data-point"));
            if ($(this).attr("data-point") > 1000000000000) {
                $(this).text(Math.round($(this).attr("data-point") / 1000000000000 * 100) / 100 + "兆");
            } else if ($(this).attr("data-point") > 100000000) {
                $(this).text(Math.round($(this).attr("data-point") / 100000000 * 100) / 100 + "億");
            } else if ($(this).attr("data-point") > 10000) {
                $(this).text(Math.round($(this).attr("data-point") / 10000 * 100) / 100 + "萬");
            } else {
                $(this).text($(this).attr("data-point"));
            }
        });
    }
    // $(".grey-box").width($("table").width() + parseInt($(".grey-box").css("padding"))*2);
}

autoAdj();
$(window).resize(autoAdj);