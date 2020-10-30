<?php
session_start();
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap4.min.css">
        <link rel="stylesheet" href="css/style.css">
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.17/css/bootstrap-select.min.css" integrity="sha256-VMPhaMmJn7coDSbzwqB0jflvb+CDnoAlfStC5RogOQo=" crossorigin="anonymous" />-->
        <title>Interface 1.0v</title>
    </head>
    <body id="main_body">
        <div class="container border">
            <div class="col-sm-12 col-md-12 row">
                <div class="col-sm-3 col-md-3">
                    <p class="alert alert-warning">This Is Only A Preview!</p>
                </div>
                <div class="col-sm-6 col-md-6">
                    <img src="tmp/resized_img.jpeg" class="img_preview" id="img_preview">
                </div>
            </div>
            <div class="main_tabs">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Text Adding</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Effecting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-save-tab" data-toggle="pill" href="#pills-save" role="tab" aria-controls="pills-save" aria-selected="false">Saving</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <?php include 'textMod.php'; ?>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <?php include 'effeMod.php'; ?>
                    </div>
                    <div class="tab-pane fade" id="pills-save" role="tabpanel" aria-labelledby="pills-save-tab">
                        <p id='save_status'></p>
                        <div class="progress progress1">
                            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" id="status_bar" style="width:0%"></div>
                        </div>
                        <div class="col-sm-12 row">
                            <div class="col-sm-2">
                                <a href="../" class="btn btn-success">New</a>&nbsp;
                                <a href="../face/" class="btn btn-undo btn-danger">Undo</a>
                            </div>
                            <div class="col-sm-7"></div>
                            <div class="col-sm-2">
                                <select class="form-control" id="img_save_type">
                                    <!--<option value="1">JPEG</option>-->
                                    <option value="2">PNG</option>
                                    <!--<option value="3">XBM</option>-->
                                    <!--<option value="4">WBMP</option>-->
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <button class="btn btn-save btn-secondary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="script/jquery-3.2.1.slim.min.js"></script>
            <script src="script/popper.min.js"></script>
            <script src="script/bootstrap.min.js"></script>

            <script src="script/jquery.min.js"></script>
            <script src="script/fun.js"></script>
            <script src="script/tabs.js"></script>
            <script src="script/effect.js"></script>
            <script src="script/main.js"></script>
        </footer>
    </body>
</html>