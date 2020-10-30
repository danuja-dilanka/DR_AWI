<nav>
    <div class="nav nav-tabs" id="text_nav" role="tablist">
        <a class="nav-item nav-link active" id="nav-eff-tab-1" data-toggle="tab" href="#nav-eff-1" role="tab" aria-controls="nav-text-1" data-content-id="1" aria-selected="true">Basic</a>
        <a class="nav-item nav-link" id="nav-eff-tab-2" data-toggle="tab" href="#nav-eff-2" role="tab" aria-controls="nav-eff-2" data-content-id="2" >Advanced</a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane nav_tab_content fade show active" id="nav-eff-1" role="tabpanel" data-content-id="1">
        <div class="col-sm-12 row">
            <div class="col-sm-6">
                <label>Change Brightness <span id="eff_mod_1" class="eff_mod_val"></span></label>
                <input type="range" min="0" max="100" class="form-control eff_mod" data-content-id="1" data-effect='brightness' value="0">
            </div>
            <div class="col-sm-6">
                <label>Change Sharpness <span id="eff_mod_2" class="eff_mod_val"></span></label>
                <input type="range" class="form-control eff_mod" data-content-id="2"  data-effect='pixelate' value="0">
            </div>
            <div class="col-sm-6">
                <label>Change Contrast <span id="eff_mod_3" class="eff_mod_val"></span></label>
                <input type="range" class="form-control eff_mod" data-content-id="3" data-effect='contrast' value="0">
            </div>
            <div class="col-sm-6">
                <label>Change Smooth <span id="eff_mod_4" class="eff_mod_val"></span></label>
                <input type="range" class="form-control eff_mod" data-content-id="4" data-effect='smooth' value="0">
            </div>
        </div>
    </div>
    <div class="tab-pane nav_tab_content fade show active" id="nav-eff-2" role="tabpanel" data-content-id="1">
    </div>
</div>
<hr>