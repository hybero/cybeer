<html>
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"

            <!-- Google fonts -->
            <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

            <!-- App styles -->
            <?php
                echo link_tag('assets/css/bootstrap-css/bootstrap.css');
                echo link_tag('assets/css/bootstrap-css/bootstrap-grid.css');

                echo link_tag('assets/css/styles.css');
                echo link_tag('assets/css/menu.css');
                echo link_tag('assets/css/tanks.css');
                echo link_tag('assets/css/popup.css');
            ?>

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            <script src="<?php echo base_url('js/popup.js'); ?>" type="text/javascript"></script>

            <title>Cybeer</title>
        </head>
        
        <body id="body">

            <div class="container">
                <div class="row no-gutters">
                    <div class="col-sm-2">
                        <div class="logo">
                            <h1>Cybeer</h1>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="toolbar">
                            <div class="logged-in"></div>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-sm-2">
                        <div class="menu">
                            <a href="<?php echo site_url('tanks/index'); ?>">
                                <div class="menu-button first">
                                    <div class="menu-button-text">Tanky</div>
                                </div>
                            </a>
                            <a href="<?php echo site_url('/'); ?>">
                                <div class="menu-button">
                                    <div class="menu-button-text">Sklad</div>
                                </div>
                            </a>
                            <a href="<?php echo site_url('/'); ?>">
                                <div class="menu-button">
                                    <div class="menu-button-text">Odberatelia</div>
                                </div>
                            </a>
                            <a href="<?php echo site_url('/'); ?>">
                                <div class="menu-button">
                                    <div class="menu-button-text">Pivná databáza</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="page-content">


            <!-- <div class="float-fix"></div> -->
