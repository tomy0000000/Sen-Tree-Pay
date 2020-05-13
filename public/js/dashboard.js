// $(function() {
//     $("button").hide();
//     console.log("hidden");
//     setTimeout(function() {
//         console.log("Time Stop");
//         $("button").each(function() {
//             $(this).fadeIn("slow");

//         });
//     }, 5000);
    // $("body::before").hide().load(function(){
    //     $(this).fadeIn("slow");
    // });
// });

$.each($('button'), function(i, el) {
    $("button").hide();
    setTimeout(function() {
        $(el).fadeIn("fast");
    }, 100 + (i * 100));
});