function getTextData(dataId = 0) {
    var obj = {};
    var tot_txt_lay = $('.text_tabs').length;

    var img_text = "";
    var text_pos = "M";
    var text_size = 20;
    var text_colour = "255,255,255";
    var text_agestY = 0;
    var text_agestX = 0;
    var text_font = 0;
    var text_effect = 0;
    var text_shadow_gap = 5;
    var text_shadow_colur = "255,255,255";
    var text_rotate = 0;

    var theDom;

    while (tot_txt_lay > 0) {

        theDom = $("#nav-text-" + tot_txt_lay);
        if (theDom === null) {
            var lastEleId = $('.sction1_field').eq($(".sction1_field").length - 1).attr("id");
            var lastId = lastEleId.split("_");
            var theId = parseInt(lastId[lastId.length - 1]);
            if (!isNaN(theId) && ((tot_txt_lay + 1) <= theId)) {
                tot_txt_lay++;
                continue;
            }
        }

        img_text = $("#img_text_" + tot_txt_lay).val();
        text_pos = $("#text_pos_" + tot_txt_lay).val();
        text_size = $("#text_size_" + tot_txt_lay).val();
        text_colour = $("#text_colour_" + tot_txt_lay).val();
        text_agestY = $("#text_agestY_" + tot_txt_lay).val();
        text_agestX = $("#text_agestX_" + tot_txt_lay).val();
        text_font = $("#text_font_" + tot_txt_lay).val();
        text_effect = $("#text_effect_" + tot_txt_lay).val();
        text_shadow_gap = $("#text_shadow_gap_" + tot_txt_lay).val();
        text_shadow_colur = $("#text_shadow_colur_" + tot_txt_lay).val();
        text_rotate = $("#text_rotate_" + tot_txt_lay).val();

        obj["txt_layer_" + tot_txt_lay] = {
            "text_agestY": text_agestX,
            "text_agestX": text_agestY,
            "text_pos": text_pos,
            "img_text": img_text,
            "text_size": text_size,
            "text_colour": text_colour,
            "text_font": text_font,
            "text_effect": text_effect,
            "text_shadow_gap": text_shadow_gap,
            "text_shadow_colur": text_shadow_colur,
            "text_rotate": text_rotate
        };

        tot_txt_lay--;
    }
    if (dataId !== 0) {
        var inputVal = $("#img_text_" + dataId).val();
        if (inputVal.length <= 10) {
            $("#nav-text-tab-" + dataId).html(inputVal);
        }
    }
    return JSON.stringify(obj);
}
function getEffects() {
    var obj = {};
    var effects = $('.eff_mod');
    var tot_effects = effects.length;
    var element, element_name;
    while (tot_effects > 0) {
        element = effects.eq(tot_effects - 1);
        element_name = element.attr("data-effect");
        obj[element_name] = element.val();
        tot_effects--;
    }

    return JSON.stringify(obj);
}