<!DOCTYPE html>
<html>
    <head>
        <title>Personal Assistant | Login page</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta charset="UTF-8">
        <meta name="viewport" content="min-width=1100, initial-scale=1.0">
        <link href="<?php echo base_url() ?>public/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>public/css/flat-ui.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>public/css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body style="background: rgb(66, 66, 66);">
        <div class="container-non-responsive">
            <div class="row" style="width: 500px; margin: 0 auto;">
                <div class="col-xs-12 login-panel">
                    <h1 class="logo"><span style="color: #2490EA;">PSU</span> <span style="font-size: 18px;color: #AFAFAF;">Management</span></h1>
             
                    <div class="col-xs-12">
                        <form class="form-signin" method="post">
                            <p class="text-muted text-center">
                                Enter your username and password
                            </p>
                            <div class="form-group">
                                <input style="width: 100%" required="required" type="text" placeholder="Username" class="form-control" name="username" id="username">
                            </div>
                            <div class="form-group">
                                <input style="width: 100%" required="required" type="password" placeholder="Password" class="form-control" name="password" id="password">
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                        </form>
                    </div>
                </div>

            </div>



        </div>
    </body>
</html>
