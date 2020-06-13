<nav>
    <div class="nav nav-tabs" id="text_nav" role="tablist">
        <a class="nav-item nav-link text_tabs active" id="nav-text-tab-1" data-toggle="tab" href="#nav-text-1" role="tab" aria-controls="nav-text-1" data-content-id="1" aria-selected="true">Text1</a>
        <a class="nav-item nav-link" id="new_txt_btn" onclick="newText()">+</a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane nav_tab_content fade show active" id="nav-text-1" role="tabpanel" data-content-id="1">
        <div class="col-sm-12 row">
            <div class="col-sm-4">
                <input type="text" id="img_text_1" class="form-control sction1_field text_mod" data-content-id="1" placeholder="New Text" data-toggle="tooltip" data-placement="top" title="New Text">
            </div>
            <div class="col-sm-2">
                <input type="number" id="text_size_1" class="form-control sction1_field text_mod" data-content-id="1" placeholder="Text Size" value="20" data-toggle="tooltip" data-placement="top" title="Font Size">
            </div>
            <div class="col-sm-1">
                <input type="color" id="text_colour_1" class="form-control sction1_field text_mod" data-content-id="1" value="#ffffff" data-toggle="tooltip" data-placement="top" title="Text Colour">
            </div>
            <div class="col-sm-3">
                <select class="form-control sction1_field text_sel_mod" id="text_pos_1" data-content-id="1">
                    <option value="TL">Top Left (TL)</option>
                    <option value="TM">Top Middle (TM)</option>
                    <option value="ML">Middle Left (ML)</option>
                    <option value="M" selected>Middle (M)</option>
                    <option value="BL">Bottom Left (BL)</option>
                    <option value="BM">Bottom Middle (BM)</option>
                </select>
            </div>
            <div class="col-sm-1">
                <input type="number" id="text_agestX_1" class="form-control sction1_field text_mod" data-content-id="1" placeholder="X" value="0" data-toggle="tooltip" data-placement="top" title="Agest Position X">
            </div>
            <div class="col-sm-1">
                <input type="number" id="text_agestY_1" class="form-control sction1_field text_mod" data-content-id="1" placeholder="Y" value="0" data-toggle="tooltip" data-placement="top" title="Agest Position Y">
            </div>
        </div>
        <div class="col-sm-12 row">
            <div class="col-sm-3">
                <select class="form-control sction1_field text_sel_mod" id="text_font_1" data-toggle="tooltip" data-content-id="1" data-placement="top" title="Select Font">
                    <option value="0">Arial</option>
                    <option value="1">Arizonia</option>
                    <option value="2">Opensans</option>
                </select>
            </div>
            <div class="col-sm-3">
                <select class="form-control sction1_field text_sel_mod" id="text_effect_1" data-toggle="tooltip" data-content-id="1" data-placement="top" title="Text Effect">
                    <option value="0">No Effect</option>
                    <option value="1">Bold</option>
                    <option value="2">Shadow</option>
                </select>
            </div>
            <div class="col-sm-2">
                <input type="number" id="text_shadow_gap_1" class="form-control sction1_field text_mod" data-content-id="1" placeholder="Shadow Gap" value="5" data-toggle="tooltip" data-placement="top" title="Text-Shadow Gap">
            </div>
            <div class="col-sm-2">
                <input type="color" id="text_shadow_colur_1" class="form-control sction1_field text_mod" data-content-id="1" value="#ffffff" data-toggle="tooltip" data-placement="top" title="Shadow Colour">
            </div>
            <div class="col-sm-2">
                <input type="number" id="text_rotate_1" class="form-control sction1_field text_mod" data-content-id="1" value="0" placeholder="Rotate Degree" data-toggle="tooltip" data-placement="top" title="Text Rotation(Degree)">
            </div>
        </div>
    </div>
</div>
    <hr>