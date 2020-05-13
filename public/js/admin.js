$(function() {
    $('[data-toggle="popover"]').popover({
  trigger: "focus"
});
    $("#quota_send").click(function() {
        $.ajax({
            type: "get",
            data: $("#edit_quota_form").serializeArray(),
            url: "editQuota",
        }).done(function(responseData) {
            if (responseData === "success") {
                console.log("success");
            } else {
                console.log(responseData);
            }
        }).fail(function(responseData) {
            console.log("Failed");
            console.log(responseData);
        }).always(function(responseData) {
            console.log("Request Sent");
        });
    });
});
