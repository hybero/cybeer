<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"

        <!-- Google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- App styles -->
        <?php
            echo link_tag('assets/css/bootstrap-css/bootstrap.css');
            echo link_tag('assets/css/bootstrap-css/bootstrap-grid.css');

            echo link_tag('assets/css/styles.css');
            echo link_tag('assets/css/menu.css');
            echo link_tag('assets/css/tanks.css');
            echo link_tag('assets/css/clients.css');
            echo link_tag('assets/css/storage.css');
            echo link_tag('assets/css/export.css');
            echo link_tag('assets/css/popup.css');
        ?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('js/popup.js'); ?>" type="text/javascript"></script>

        <title>Cybeer</title>
    </head>

    <body id="body">

        <div class="log-in-wrapper">
            <div class="log-in-container">
                <form class="form-signin" action="<?php echo site_url('login/auth');?>" method="post">
                    <h2 class="form-signin-heading">Brewsoft</h2>
                    <?php echo $this->session->flashdata('msg');?>
                    <div>
                        <label for="username" class="sr-only">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
                    </div>
                    <div>
                        <label for="password" class="sr-only">Heslo</label>
                        <input type="password" name="password" class="form-control" placeholder="" required>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Zapamätať
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Prihlásiť</button>
                </form>
            </div>
        </div>

    </body>
</html>
