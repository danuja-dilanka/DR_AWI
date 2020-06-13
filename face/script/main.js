$(document).ready(function () {

    $(document).on('input', '.text_mod', function () {
        var dataId = $(this).attr("data-content-id");
        $.ajax({
            url: "../values.php",
            Type: "GET",
            data: {"data": getTextData(dataId)},
            success: function (data) {
                var obj = JSON.parse(data);
                $("#img_preview").attr("src", "data:image/png;base64," + obj["image_string"]);
            }
        });
    });
    $(document).on("change", ".text_sel_mod", function () {
        var dataId = $(this).attr("data-content-id");
        $.ajax({
            url: "../values.php",
            Type: "GET",
            data: {"data": getTextData(dataId)},
            success: function (data) {
                var obj = JSON.parse(data);
                $("#img_preview").attr("src", "data:image/png;base64," + obj["image_string"]);
            }
        });
    });
    $(".btn-save").on("click", function () {
        $(".nav-link").removeAttr("data-toggle");
        $.ajax({
            url: "../face_save_img.php",
            Type: "GET",
            data: {"status": "1"},
            success: function (data) {
                $(".nav-link").attr("data-toggle", "pill");
//                var obj = JSON.parse(data);
//                $("#img_preview").attr("src", "data:image/png;base64," + obj["image_string"]);

            }
        });
    });
});