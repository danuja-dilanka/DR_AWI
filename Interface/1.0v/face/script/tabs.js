var fonts = {"Arial": 0, "Arizonia": 1, "Opensans": 2};
var effects = {"No Effect": 0, "Bold": 1, "Shadow": 2};

function newText() {
    var font, eff;
    var textTabs = $('.text_tabs');
    var totTabs = textTabs.length;
    if (totTabs < 10) {
        var next_tab_id = totTabs + 1;
        $('.text_tabs').removeClass("active");
        $('.nav_tab_content').removeClass("active");

        var tab = $("<a></a>", {"id": "nav-text-tab-" + next_tab_id, "ondblclick": "deleteTab('nav-text-tab-" + next_tab_id + "')", "class": "nav-item nav-link text_tabs active", "data-toggle": "tab", "href": "#nav-text-" + next_tab_id, "data-content-id": next_tab_id}).html("Text" + next_tab_id);
        var tab_content_base = $("<div></div>", {"id": "nav-text-" + next_tab_id, "class": "tab-pane nav_tab_content fade show active", "role": "tabpanel", "data-content-id": next_tab_id});

        var row1 = $("<div></div>", {"class": "col-sm-12 row"});

        var r1_col1 = $("<div></div>", {"class": "col-sm-4"});
        var r1_col2 = $("<div></div>", {"class": "col-sm-2"});
        var r1_col3 = $("<div></div>", {"class": "col-sm-1"});
        var r1_col4 = $("<div></div>", {"class": "col-sm-3"});
        var r1_col5 = $("<div></div>", {"class": "col-sm-1"});
        var r1_col6 = $("<div></div>", {"class": "col-sm-1"});

        var r1_input1 = $("<input>", {"type": "text", "id": "img_text_" + next_tab_id, "class": "form-control sction1_field text_mod", "data-content-id": next_tab_id, "placeholder": "New Text"});
        var r1_input2 = $("<input>", {"type": "number", "id": "text_size_" + next_tab_id, "class": "form-control sction1_field text_mod", "data-content-id": next_tab_id, "value": "20", "placeholder": "Font Size"});
        var r1_input3 = $("<input>", {"type": "color", "id": "text_colour_" + next_tab_id, "class": "form-control sction1_field text_mod", "data-content-id": next_tab_id, "value": "#ffffff"});
        var r1_input4 = $("<input>", {"type": "number", "id": "text_agestX_" + next_tab_id, "class": "form-control sction1_field text_mod", "data-content-id": next_tab_id, "value": "0", "placeholder": "Agest Position X"});
        var r1_input5 = $("<input>", {"type": "number", "id": "text_agestY_" + next_tab_id, "class": "form-control sction1_field text_mod", "data-content-id": next_tab_id, "value": "0", "placeholder": "Agest Position Y"});

        var r1_sel = $("<select></select>", {"id": "text_pos_" + next_tab_id, "class": "form-control sction1_field text_sel_mod", "data-content-id": next_tab_id});
        $(r1_sel).append(new Option("Top Left (TL)", "TL"));
        $(r1_sel).append(new Option("Top Middle (TM)", "TM"));
        $(r1_sel).append(new Option("Middle Left (ML)", "ML"));
        $(r1_sel).append(new Option("Middle (M)", "M", true, true));
        $(r1_sel).append(new Option("Bottom Left (BL)", "BL"));
        $(r1_sel).append(new Option("Bottom Middle (BM)", "BM"));

        var row2 = $("<div></div>", {"class": "col-sm-12 row"});

        var r2_col1 = $("<div></div>", {"class": "col-sm-3"});
        var r2_col2 = $("<div></div>", {"class": "col-sm-3"});
        var r2_col3 = $("<div></div>", {"class": "col-sm-2"});
        var r2_col4 = $("<div></div>", {"class": "col-sm-2"});
        var r2_col5 = $("<div></div>", {"class": "col-sm-2"});

        var r2_input1 = $("<input>", {"type": "number", "id": "text_shadow_gap_" + next_tab_id, "class": "form-control sction1_field text_mod", "value": "5", "data-content-id": next_tab_id, "placeholder": "Text-Shadow Gap"});
        var r2_input2 = $("<input>", {"type": "number", "id": "text_rotate_" + next_tab_id, "class": "form-control sction1_field text_mod", "data-content-id": next_tab_id, "value": "0", "placeholder": "Text Rotation(Degree)"});
        var r2_input3 = $("<input>", {"type": "color", "id": "text_shadow_colur_" + next_tab_id, "class": "form-control sction1_field text_mod", "data-content-id": next_tab_id, "value": "#ffffff"});

        var r2_sel1 = $("<select></select>", {"id": "text_font_" + next_tab_id, "class": "form-control sction1_field text_sel_mod", "data-content-id": next_tab_id});
        for (font in fonts) {
            $(r2_sel1).append(new Option(font, fonts[font]));
        }

        var r2_sel2 = $("<select></select>", {"id": "text_effect_" + next_tab_id, "class": "form-control sction1_field text_sel_mod", "data-content-id": next_tab_id});
        for (eff in effects) {
            $(r2_sel2).append(new Option(eff, effects[eff]));
        }

        r2_col1.append(r2_sel1);
        r2_col2.append(r2_sel2);
        r2_col3.append(r2_input1);
        r2_col4.append(r2_input3);
        r2_col5.append(r2_input2);

        r1_col1.append(r1_input1);
        r1_col2.append(r1_input2);
        r1_col3.append(r1_input3);
        r1_col4.append(r1_sel);
        r1_col5.append(r1_input4);
        r1_col6.append(r1_input5);

        row1.append(r1_col1);
        row1.append(r1_col2);
        row1.append(r1_col3);
        row1.append(r1_col4);
        row1.append(r1_col5);
        row1.append(r1_col6);

        row2.append(r2_col1);
        row2.append(r2_col2);
        row2.append(r2_col3);
        row2.append(r2_col4);
        row2.append(r2_col5);

        $(tab).insertBefore("#new_txt_btn");
        tab_content_base.append(row1);
        tab_content_base.append(row2);
        $("#nav-tabContent").append(tab_content_base);
    }
}
function deleteTab(theId) {
    var con_id = parseInt($("#" + theId).attr("data-content-id"));
    
    if (!isNaN(con_id)) {
        
        $("#nav-text-" + con_id).remove();
        $("#nav-text-tab-" + con_id).remove();
        
        $('.text_tabs').removeClass("active");
        $('.nav_tab_content').removeClass("active");
        $('.nav_tab_content').eq(0).addClass("active");
        $('.text_tabs').eq(0).addClass("active");
        
        var dataId = 0;
        $.ajax({
            url: "../values.php",
            Type: "GET",
            data: {"data": getTextData(dataId)},
            success: function (data) {
                var obj = JSON.parse(data);
                $("#img_preview").attr("src", "data:image/png;base64," + obj["image_string"]);
            }
        });
    }
}