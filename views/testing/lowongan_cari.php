<?php

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>PLASA</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!--     Fonts and icons     -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,600,700,800,900' rel='stylesheet' type='text/css'>
        <link href="../font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <style>
        .navbar-default .navbar-nav > li > a:not(.btn) {
            opacity: 1;
            color: #FFFFFF;
            margin-top: 18px;
        }
        .navbar-default .navbar-nav > li > a:not(.btn):hover {
            opacity: 1;
            color: #59ABE3;
        }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" color-on-scroll="200">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                        aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="dashboard.php" class="navbar-brand" style="color: #FFFFFF;">
                        PLASA
                    </a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left" style="margin-left: 56px;">
                        <li>
                            <a href="dashboard.php">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="lamaran.php">
                                Lamaran
                            </a>
                        </li>
                        <li>
                            <a href="lowongan_cari.php">Cari Lowongan</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="profil_edit.php">
                                Hallo, <?php echo $_SESSION['calon_pekerja_nama_lengkap'];?>
                            </a>
                        </li>
                        <li>
                            <a href="../php/logout.php" style="background-color: #D24D57; border-radius: 10px;">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>
        <div class="section section-header">
            <div class="parallax filter filter-color-black">
                <div class="image" style="background-image: url('../img/1.jpg')">
                </div>
                <div class="container">
                    <div class="content">
                        <form method="GET" action="dashboard.php">
                            <div class="title-area">
                                <p>Cari Lowongan Pekerjaan yang Kamu Inginkan</p><br/>
                                <div class="row" style="">
                                    <div class="col-md-8">
                                        <input type="text" class="form-control input-lg" name="nama" placeholder="Lowongan Pekerjaan" />
                                    </div>
                                    <div class="col-md-4">
                                        <!-- <select class="form-control input-lg" name="kota_id" style="height: 55px; font-size: 16px;">
                                        
                                        </select> -->
                                    </div>
                                </div>
                                <button type="Submit" class="btn btn-primary btn-fill btn-lg" style="height: 55px;">
                                    Cari Lowongan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    

    </html>