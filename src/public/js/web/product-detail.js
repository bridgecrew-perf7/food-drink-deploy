$(document).ready(function () {
    // Hover Star
    $("#starRating1").hover(function () {
        setCssStar(1);
    });
    $("#starRating2").hover(function () {
        setCssStar(2);
    });
    $("#starRating3").hover(function () {
        setCssStar(3);
    });
    $("#starRating4").hover(function () {
        setCssStar(4);
    });
    $("#starRating5").hover(function () {
        setCssStar(5);
    });

    // Click image smaill
    $(this).on("click","#pd-image-small", function (event) {
      $("#pd-image-large").attr("src", $(this).attr("src"));
    });

    // Set Css Star Rating
    function setCssStar(rating) {
        $("#valueStar").val(rating);
        for (let i = 1; i < 6; i++) {
            if (rating >= i) {
                $("#starRating" + i).addClass("click-active");
            } else {
                $("#starRating" + i).removeClass("click-active");
            }
        }
    }
});
/* Message display time */
setTimeout(function () {
    $("#message_time").hide(); // hide message
}, 5000); // 5000ms
