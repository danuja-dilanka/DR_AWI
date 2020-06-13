<?php
session_start();
session_destroy();
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="face/css/bootstrap4.min.css">
        <link rel="stylesheet" href="face/css/style.css">
       
        <title>Getting Start</title>
    </head>
    <body>
        <div class="container">
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark progress-bar-animated" id="status_bar" style="width:0%"></div>
            </div>
            <div class="col-sm-12 col-md-12 row">
                <div class="col-sm-3 col-md-3"></div>
                <div class="col-sm-6 col-md-6">
                    <div class="card text-center">
                        <div class="card-header">
                            Getting Start
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">DR_AWI</h5>
                            <p class="card-text">Supported File Types<br> JPG/JPEG , PNG , GIF , WBMP , XBM , Imagestring</p>
                            <input type="text" class="form-control" id="img_src" placeholder="Image Url">
                            <br>
                            <button onclick="goForIt()" type="button" class="btn btn-primary">Let's Go</button>
                        </div>
                        <div class="card-footer text-muted">
                            Developed By Dilanka DR | <b>1.0v</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <!--<script src="face/script/jquery-3.2.1.slim.min.js"></script>-->
            <script src="face/script/popper.min.js"></script>
            <script src="face/script/bootstrap.min.js"></script>
            <script src="face/script/jquery.min.js"></script>
            <script src="face/script/start.js"></script>
        </footer>
    </body>
</html>