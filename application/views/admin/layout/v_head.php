<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SMK 1 Lumajang</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url(); ?>template/back-end/css/bootstrap.min.css" rel="stylesheet">

        <!-- Datepicker CSS -->
        <link rel="stylesheet" href="<?= base_url(); ?>datepicker/css/datepicker.css">

        <!-- MetisMenu CSS -->
        <link href="<?= base_url(); ?>template/back-end/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?= base_url(); ?>template/back-end/css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?= base_url(); ?>template/back-end/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- DataTables CSS -->
        <link href="<?= base_url(); ?>template/back-end/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="<?= base_url(); ?>template/back-end/css/dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
            .datepicker { z-index: 1151; }

            :root {
                --bg-canvas: #F6F7FB;
                --bg-surface: #FFFFFF;
                --bg-sidebar: #1F1F23;
                --bg-sidebar-hover: #2C2C32;
                --accent-purple: #7C5CFC;
                --accent-purple-hover: #6846EC;
                --accent-purple-soft: rgba(124, 92, 252, 0.14);
                --accent-red: #EF4444;
                --accent-red-hover: #DC2626;
                --text-primary: #18181B;
                --text-muted: #71717A;
                --border-soft: #E5E7EB;
                --sidebar-w: 250px;
                --topbar-h: 64px;
            }

            body {
                background-color: var(--bg-canvas) !important;
                color: var(--text-primary);
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            }

            #wrapper {
                background-color: var(--bg-canvas);
            }

            /* Desktop: Sidebar penuh ke atas, Topbar putih di sebelah kanan */
            @media (min-width: 768px) {
                .navbar-inverse.navbar-fixed-top {
                    left: var(--sidebar-w) !important;
                    right: 0 !important;
                    height: var(--topbar-h);
                    min-height: var(--topbar-h);
                    background-color: var(--bg-surface) !important;
                    border: none !important;
                    border-bottom: 1px solid var(--border-soft) !important;
                    box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04);
                    display: flex;
                    align-items: center;
                    justify-content: flex-end;
                    z-index: 1020;
                }

                .navbar-inverse .navbar-header {
                    display: none !important;
                }

                .navbar-top-links {
                    float: none !important;
                    margin-right: 20px !important;
                    display: flex;
                    align-items: center;
                }

                .navbar-default.sidebar {
                    position: fixed !important;
                    top: 0 !important;
                    left: 0 !important;
                    width: var(--sidebar-w) !important;
                    height: 100vh !important;
                    min-height: 100vh !important;
                    margin-top: 0 !important;
                    background-color: var(--bg-sidebar) !important;
                    border-right: 1px solid #2A2A30 !important;
                    z-index: 1030;
                }

                .navbar-default.sidebar .sidebar-nav.navbar-collapse {
                    max-height: calc(100vh - var(--topbar-h)) !important;
                    height: calc(100vh - var(--topbar-h)) !important;
                    overflow-y: auto !important;
                    overflow-x: hidden;
                    padding-top: 8px;
                    padding-bottom: 20px;
                }

                #page-wrapper {
                    margin-left: var(--sidebar-w) !important;
                    padding-top: calc(var(--topbar-h) + 16px) !important;
                    min-height: 100vh;
                    background-color: var(--bg-canvas) !important;
                }
            }

            /* Mobile / Layar Kecil */
            @media (max-width: 767px) {
                .navbar-inverse.navbar-fixed-top {
                    position: relative !important;
                    margin-bottom: 0;
                    background-color: var(--bg-surface) !important;
                    border-color: var(--border-soft) !important;
                }

                .navbar-inverse .navbar-brand {
                    color: var(--text-primary) !important;
                    font-weight: 700;
                    font-size: 15px;
                }

                .navbar-default.sidebar {
                    position: relative !important;
                    width: 100% !important;
                    margin-top: 0 !important;
                    background-color: var(--bg-sidebar) !important;
                }

                .navbar-default.sidebar .sidebar-nav.navbar-collapse {
                    max-height: 65vh !important;
                    overflow-y: auto !important;
                    overflow-x: hidden;
                }

                #page-wrapper {
                    margin-left: 0 !important;
                    padding-top: 16px !important;
                    background-color: var(--bg-canvas) !important;
                }
            }

            /* Brand di bagian atas Sidebar Gelap */
            .sidebar-brand-box {
                height: var(--topbar-h);
                padding: 0 18px;
                display: flex;
                align-items: center;
                border-bottom: 1px solid #2A2A30;
            }

            .sidebar-brand-link {
                color: #FFFFFF !important;
                font-size: 14.5px;
                font-weight: 700;
                letter-spacing: 0.4px;
                text-decoration: none !important;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .sidebar-brand-link i {
                color: var(--accent-purple);
                font-size: 17px;
            }

            .navbar-top-links > li > a {
                color: var(--text-primary) !important;
                font-weight: 500;
                padding: 10px 14px;
            }

            .navbar-top-links > li > a:hover,
            .navbar-top-links > li > a:focus,
            .navbar-top-links > .open > a {
                background-color: var(--bg-canvas) !important;
                color: var(--accent-purple) !important;
                border-radius: 8px;
            }

            .navbar-inverse .navbar-toggle .icon-bar {
                background-color: var(--text-primary) !important;
            }

            .sidebar ul li {
                border-bottom: none !important;
            }

            .sidebar ul li a {
                color: #B4B4BC !important;
                border-radius: 10px;
                margin: 2px 12px;
                padding: 9px 14px;
                font-weight: 500;
                transition: all 0.18s ease;
            }

            .sidebar ul li a:hover,
            .sidebar ul li a:focus {
                background-color: var(--bg-sidebar-hover) !important;
                color: #FFFFFF !important;
            }

            .sidebar ul li a.active,
            .nav > li > a.active,
            .sidebar ul li.active > a {
                background-color: var(--accent-purple) !important;
                color: #FFFFFF !important;
                box-shadow: 0 4px 12px rgba(124, 92, 252, 0.35);
            }

            .page-header {
                color: var(--text-primary);
                font-weight: 700;
                border-bottom: 1px solid var(--border-soft);
                padding-bottom: 12px;
                margin-top: 10px;
            }

            /* Panel, Card & Tabel Modern */
            .panel,
            .panel-default,
            .panel-primary {
                background-color: var(--bg-surface) !important;
                border: 1px solid var(--border-soft) !important;
                border-radius: 14px !important;
                box-shadow: 0 2px 8px rgba(15, 23, 42, 0.03) !important;
                overflow: hidden;
            }

            .panel-primary > .panel-heading,
            .panel-default > .panel-heading {
                background-color: var(--bg-surface) !important;
                color: var(--text-primary) !important;
                border-bottom: 1px solid var(--border-soft) !important;
                font-weight: 600;
                padding: 14px 18px;
            }

            .panel-body {
                padding: 18px;
            }

            .table > thead > tr > th {
                background-color: #F9FAFB !important;
                color: #374151 !important;
                border-bottom: 1px solid var(--border-soft) !important;
                font-weight: 600;
            }

            .form-control {
                border-radius: 8px;
                border-color: #D4D4D8;
                box-shadow: none;
            }

            .form-control:focus {
                border-color: var(--accent-purple);
                box-shadow: 0 0 0 3px var(--accent-purple-soft);
            }

            .btn {
                border-radius: 8px;
            }

            .btn-primary,
            .btn-info {
                background-color: var(--accent-purple) !important;
                border-color: var(--accent-purple) !important;
                color: #FFFFFF !important;
            }

            .btn-primary:hover,
            .btn-primary:focus,
            .btn-info:hover,
            .btn-info:focus {
                background-color: var(--accent-purple-hover) !important;
                border-color: var(--accent-purple-hover) !important;
                color: #FFFFFF !important;
            }

            form .btn-success,
            .panel-body > .btn-success,
            .panel-body > form .btn-success[type="reset"] {
                background-color: var(--accent-red) !important;
                border-color: var(--accent-red) !important;
                color: #FFFFFF !important;
            }

            form .btn-success:hover,
            form .btn-success:focus {
                background-color: var(--accent-red-hover) !important;
                border-color: var(--accent-red-hover) !important;
                color: #FFFFFF !important;
            }

            .pagination > .active > a,
            .pagination > .active > a:focus,
            .pagination > .active > a:hover,
            .pagination > .active > span,
            .pagination > .active > span:focus,
            .pagination > .active > span:hover {
                background-color: var(--accent-purple) !important;
                border-color: var(--accent-purple) !important;
                color: #FFFFFF !important;
            }

            .pagination > li > a:hover,
            .pagination > li > span:hover {
                color: var(--accent-purple) !important;
            }

            /* Card Statistik Dashboard Clean Putih & Ungu */
            #page-wrapper .panel-green > .panel-heading,
            #page-wrapper .panel-yellow > .panel-heading,
            #page-wrapper .panel-red > .panel-heading,
            #page-wrapper .panel-primary > .panel-heading {
                background-color: #FFFFFF !important;
                color: #18181B !important;
                border-bottom: 1px solid #F1F5F9 !important;
            }

            #page-wrapper .panel-green .huge,
            #page-wrapper .panel-yellow .huge,
            #page-wrapper .panel-red .huge,
            #page-wrapper .panel-primary .huge {
                color: #18181B !important;
                font-weight: 700;
            }

            #page-wrapper .panel-green .fa-5x,
            #page-wrapper .panel-yellow .fa-5x,
            #page-wrapper .panel-red .fa-5x,
            #page-wrapper .panel-primary .fa-5x {
                color: var(--accent-purple) !important;
                background: rgba(124, 92, 252, 0.12);
                padding: 14px;
                border-radius: 14px;
                font-size: 2.6em !important;
            }

            #page-wrapper .panel-footer {
                background-color: #FAFAFB !important;
                border-top: 1px solid #F1F5F9 !important;
                color: var(--accent-purple) !important;
                font-weight: 500;
            }

            #page-wrapper .panel-footer a,
            #page-wrapper a .panel-footer {
                color: var(--accent-purple) !important;
            }
        </style>
    </head>