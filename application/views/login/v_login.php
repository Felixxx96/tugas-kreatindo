<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Web Sekolah - <?= $title ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url() ?>template/back-end/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?= base_url() ?>template/back-end/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <style>
            :root {
                --bg-canvas: #F6F7FB;
                --bg-surface: #FFFFFF;
                --accent-purple: #7C5CFC;
                --accent-purple-hover: #6846EC;
                --accent-purple-soft: rgba(124, 92, 252, 0.14);
                --text-primary: #18181B;
                --text-muted: #71717A;
                --border-soft: #E5E7EB;
            }

            body {
                min-height: 100vh;
                margin: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: var(--bg-canvas);
                color: var(--text-primary);
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
                padding: 20px;
            }

            .login-box {
                width: 100%;
                max-width: 390px;
                background: var(--bg-surface);
                border: 1px solid var(--border-soft);
                border-radius: 16px;
                padding: 28px;
                box-shadow: 0 10px 25px rgba(15, 23, 42, 0.05);
            }

            .login-header {
                text-align: center;
                margin-bottom: 20px;
            }

            .login-brand {
                font-size: 12px;
                font-weight: 700;
                letter-spacing: 0.6px;
                text-transform: uppercase;
                color: var(--accent-purple);
                margin-bottom: 6px;
            }

            .login-title {
                margin: 0;
                font-size: 21px;
                font-weight: 700;
                color: var(--text-primary);
            }

            .form-group {
                margin-bottom: 14px;
            }

            .form-control {
                height: 40px;
                border-radius: 9px;
                border: 1px solid #D4D4D8;
                box-shadow: none;
            }

            .form-control:focus {
                border-color: var(--accent-purple);
                box-shadow: 0 0 0 3px var(--accent-purple-soft);
            }

            .login-btn-group {
                margin-top: 18px;
                display: flex;
                gap: 10px;
                justify-content: center;
            }

            .btn-login {
                flex: 1;
                height: 40px;
                border-radius: 9px;
                background-color: var(--accent-purple);
                border: 1px solid var(--accent-purple);
                color: #FFFFFF;
                font-weight: 600;
            }

            .btn-login:hover,
            .btn-login:focus {
                background-color: var(--accent-purple-hover);
                border-color: var(--accent-purple-hover);
                color: #FFFFFF;
            }

            .btn-sekolah {
                height: 40px;
                border-radius: 9px;
                background-color: var(--bg-surface);
                border: 1px solid var(--border-soft);
                color: var(--text-primary);
                font-weight: 500;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 0 16px;
                text-decoration: none;
            }

            .btn-sekolah:hover,
            .btn-sekolah:focus {
                background-color: #F9FAFB;
                color: var(--accent-purple);
                text-decoration: none;
            }

            .alert {
                border-radius: 9px;
                font-size: 13px;
                padding: 10px 34px 10px 12px !important;
                margin-bottom: 16px;
            }

            .alert-success {
                background-color: #ECFDF5 !important;
                border-color: #A7F3D0 !important;
                color: #047857 !important;
            }

            .alert-success .close {
                color: #047857;
            }

            .alert-danger {
                background-color: #FEF2F2 !important;
                border-color: #FECACA !important;
                color: #B91C1C !important;
            }

            .alert-danger .close {
                color: #B91C1C;
            }

            .alert .close {
                position: relative;
                top: -1px;
                right: -20px;
                opacity: 0.7;
            }

            .alert .close:hover {
                opacity: 1;
            }
        </style>
    </head>
    <body>
        <div class="login-box">
            <div class="login-header">
                <div class="login-brand">SMKN 1 LUMAJANG</div>
                <h3 class="login-title"><?= $title ?></h3>
            </div>

            <?php
            echo form_open('login');
            if ($this->session->flashdata('pesan')) {
                $pesan = $this->session->flashdata('pesan');
                $is_error = (stripos($pesan, 'salah') !== false || stripos($pesan, 'gagal') !== false);
                $alert_class = $is_error ? 'alert-danger' : 'alert-success';
                echo '<div class="alert ' . $alert_class . ' alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                echo $pesan;
                echo '</div>';
            }
            ?>
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" placeholder="username" name="username" type="text" autofocus required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="password" name="password" type="password" value="" required>
                    </div>
                    <div class="login-btn-group">
                        <button type="submit" class="btn btn-login">Login</button>
                        <a class="btn btn-sekolah" href="<?= base_url() ?>">web sekolah</a>
                    </div>
                </fieldset>
            <?php echo form_close(); ?>
        </div>

        <!-- jQuery -->
        <script src="<?= base_url() ?>template/back-end/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?= base_url() ?>template/back-end/js/bootstrap.min.js"></script>
    </body>
</html>