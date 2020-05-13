var video = document.createElement("video");
var canvasElement = document.getElementById("canvas");
var canvas = canvasElement.getContext("2d");
var constraints = { video: { facingMode: "environment" } };

function drawLine(begin, end, color) {
    canvas.beginPath();
    canvas.moveTo(begin.x, begin.y);
    canvas.lineTo(end.x, end.y);
    canvas.lineWidth = 4;
    canvas.strokeStyle = color;
    canvas.stroke();
}

function foundQR(code) {
    drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF3B58");
    drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF3B58");
    drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF3B58");
    drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF3B58");
    if (code.data.startsWith("http://2018yzucamp.tyze.me/")) {
        window.location = code.data;
    } else {
        console.log("Scanned Unexpected datas: ");
        console.log(code.data);
    }
}

function adjScreen() {
    var greyBoxWidth = $(".grey-box").width() + parseInt($(".grey-box").css("padding"))*2;
    var greyBoxMin = parseInt($("body").css("--greybox-min-width"));
    var greyBoxMax = parseInt($("body").css("--greybox-max-width"));
    if (greyBoxWidth == greyBoxMin) {
        // console.log("locked in small");
        canvasElement.width = $(".grey-box").width();
        canvasElement.height = video.videoHeight * $(".grey-box").width() / video.videoWidth;
    } else if (greyBoxMax > greyBoxWidth && greyBoxWidth > greyBoxMin) {
        // console.log("in between");
        if ($(".grey-box").width() > video.videoWidth) {
            canvasElement.width = video.videoWidth;
            canvasElement.height = video.videoHeight;
        } else {
            canvasElement.width = $(".grey-box").width();
            canvasElement.height = video.videoHeight * $(".grey-box").width() / video.videoWidth;
        }
    } else {
        // console.log("locked in big");
        if ($(".grey-box").width() > video.videoWidth) {
            canvasElement.width = video.videoWidth;
            canvasElement.height = video.videoHeight;
        } else {
            canvasElement.width = $(".grey-box").width();
            canvasElement.height = video.videoHeight * $(".grey-box").width() / video.videoWidth;
        }
    }
}

function tick() {
    // console.log("ticked");
    if (video.readyState === video.HAVE_ENOUGH_DATA) {
        // console.log("start load")
        $("#loadingMessage").hide();
        canvasElement.hidden = false;
        adjScreen();
        canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
        var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
        var code = jsQR(imageData.data, imageData.width, imageData.height);
        if (code) {
            foundQR(code);
        }
    }
    requestAnimationFrame(tick);
}

// Use facingMode: environment to attemt to get the front camera on phones
navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
    // console.log("call init");
    video.srcObject = stream;
    video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
    video.play();
    requestAnimationFrame(tick);
});
