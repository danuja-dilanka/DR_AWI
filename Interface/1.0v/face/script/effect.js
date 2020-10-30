$('.eff_mod').on('input', function () {
    var eff_val = $(this).val();
    var the_unic = $(this).attr('data-content-id');
    $('#eff_mod_' + the_unic).html(eff_val + "%");
});
$('.eff_mod').on('change', function () {
    var eff_val = $(this).val();
    var the_unic = $(this).attr('data-content-id');
    $('#eff_mod_' + the_unic).html(eff_val + "%");
    $.ajax({
        url: "../values.php",
        Type: "GET",
        data: {"eff_data": getEffects(), 'txt_data': getTextData()},
        success: function (data) {
            var obj = JSON.parse(data);
            $("#img_preview").attr("src", "data:image/png;base64," + obj["image_string"]);
        }
    });
});

