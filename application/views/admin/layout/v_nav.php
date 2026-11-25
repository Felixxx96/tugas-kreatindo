<style>
    @media (min-width: 768px) {
        .navbar-default.sidebar {
            min-height: calc(100vh - 51px);
        }

        .navbar-default.sidebar .sidebar-nav.navbar-collapse {
            max-height: calc(100vh - 51px);
            overflow-y: auto !important;
            overflow-x: hidden;
        }
    }
</style>

<!-- /.navbar-top-links -->
<?php
$is_super_admin = (
    $this->session->userdata('id_role') == '1' ||
    $this->session->userdata('nama_role') == 'Super Admin' ||
    $this->session->userdata('role') == 'Super Admin'
);
?>

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-brand-box">
        <a class="sidebar-brand-link" href="<?= base_url('admin') ?>">
            <i class="fa fa-graduation-cap"></i>
            <span>SMK</span>
        </a>
    </div>
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            <?php if ($is_super_admin) { ?>
                <li>
                    <a href="<?= base_url('user'); ?>"><i class="fa fa-users fa-fw"></i> Master User</a>
                </li>
                <li>
                    <a href="<?= base_url('role') ?>"><i class="fa fa-tag fa-fw"></i> Master Role</a>
                </li>
                <li>
                    <a href="<?= base_url('jabatan') ?>"><i class="fa fa-certificate"></i> Master Jabatan</a>
                </li>
                <li>
                    <a href="<?= base_url('kelas') ?>"><i class="fa fa-certificate"></i> Master Kelas</a>
                </li>
                <li>
                    <a href="<?= base_url('tahun_akademik') ?>"><i class="fa fa-calendar fa-fw"></i> Master Tahun Akademik</a>
                </li>
            <?php } ?>

            <li>
                <a href="<?= base_url('mapel') ?>"><i class="fa fa-table"></i> Mata Pelajaran</a>
            </li>
            <li>
                <a href="<?= base_url('jadwal') ?>"><i class="fa fa-table"></i> Jadwal Pelajaran</a>
            </li>
            <li>
                <a href="<?= base_url('guru') ?>"><i class="fa fa-user"></i> Guru</a>
            </li>
            <li>
                <a href="<?= base_url('siswa') ?>"><i class="fa fa-mortar-board"></i> Siswa</a>
            </li>
            <!-- <li>
                <a href="<?= base_url('gallery') ?>"><i class="fa fa-image fa-fw"></i> Gallery</a>
            </li>
            <li>
                <a href="<?= base_url('download') ?>"><i class="fa fa-download fa-fw"></i> Download</a>
            </li> -->

            <!-- <?php if ($is_super_admin) { ?>
                <li>
                    <a href="<?= base_url('admin/setting') ?>"><i class="fa fa-cogs fa-fw"></i> Setting</a>
                </li>
            <?php } ?> -->

            <li>
                <a href="<?= base_url('profile') ?>"><i class="fa fa-user-circle fa-fw"></i> Profile</a>
            </li>
            <li class="active">
                <a href="<?= base_url('login/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><?= $title2 ?></h2>