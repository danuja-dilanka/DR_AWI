$(document).ready(function () {

    $(document).on('input', '.text_mod', function () {
        var dataId = $(this).attr("data-content-id");
        $.ajax({
            url: "../values.php",
            Type: "GET",
            data: {"txt_data": getTextData(dataId), "eff_data": getEffects()},
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
            data: {"txt_data": getTextData(dataId), "eff_data": getEffects()},
            success: function (data) {
                var obj = JSON.parse(data);
                $("#img_preview").attr("src", "data:image/png;base64," + obj["image_string"]);
            }
        });
    });
    $(".btn-save").on("click", function () {
        $("#status_bar").css("width", "50%");
        var img_save_type = parseInt($('#img_save_type').val());
        $.ajax({
            url: "../face_save_img.php",
            Type: "GET",
            data: {"img_save_type": img_save_type},
            success: function (data) {
                $("#status_bar").css("width", "75%");
                $(".nav-link").attr("data-toggle", "pill");
                var obj = JSON.parse(data);
                var down_a = document.createElement('a');
                var down_img = document.createElement('a');
                if (img_save_type === 1) {
                    down_img.setAttribute('src', "data:image/jpeg;base64," + obj["image_string"]);
                    down_a.setAttribute('href', "data:image/jpeg;base64," + obj["image_string"]);
                } else if (img_save_type === 2) {
                    down_img.setAttribute('src', "data:image/png;base64," + obj["image_string"]);
                    down_a.setAttribute('href', "data:image/png;base64," + obj["image_string"]);
                } else if (img_save_type === 3) {
                    down_img.setAttribute('src', "data:image/xbm;base64," + obj["image_string"]);
                    down_a.setAttribute('href', "data:image/xbm;base64," + obj["image_string"]);
                } else if (img_save_type === 4) {
                    down_img.setAttribute('src', "data:image/wbmp;base64," + obj["image_string"]);
                    down_a.setAttribute('href', "data:image/wbmp;base64," + obj["image_string"]);
                }
                down_a.setAttribute('style', "display:none");
                down_a.id = 'down_img';
                down_a.setAttribute('download', 'ExportImg');
                down_a.appendChild(down_img);
                document.getElementById('main_body').appendChild(down_a);
                document.getElementById('down_img').click();
                $("#status_bar").css("width", "100%");
                setTimeout(function () {
                    $("#status_bar").css("width", "0%");
                    $('#down_img').remove();
                }, 1000);
            }
        });
    });
});