function goForIt() {
    var img_src = $("#img_src").val();
    $("#status_bar").css("width", "25%");
    $.ajax({
        url: "values.php",
        Type: "GET",
        data: {"new_img_src": img_src},
        success: function (data) {
            $("#status_bar").css("width", "75%");
            var obj = JSON.parse(data);
            var status = parseInt(obj["status"]);
            if (status == 1) {
                setTimeout(function () {
                    $("#status_bar").css("width", "100%");
                }, 500);
                setTimeout(function () {
                    window.location.href = "face/";
                }, 1000);
            } else {
                $("#status_bar").css("width", "100%");
                $("#status_bar").removeClass("bg-dark");
                $("#status_bar").addClass("bg-danger");
            }
        }
    });
}