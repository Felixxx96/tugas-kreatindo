<style>
    .profile-card {
        background: #FFFFFF;
        border: 1px solid #E5E7EB;
        border-radius: 14px;
        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.03);
        margin-bottom: 20px;
        overflow: hidden;
    }

    .profile-card-header {
        padding: 16px 20px;
        border-bottom: 1px solid #E5E7EB;
        font-size: 16px;
        font-weight: 700;
        color: #7C5CFC;
        background: #FFFFFF;
    }

    .profile-card-body {
        padding: 20px;
    }

    .profile-role-row {
        display: flex;
        align-items: center;
        gap: 24px;
        margin: 14px 0 20px;
        font-size: 14px;
    }

    .profile-role-label {
        font-weight: 700;
        color: #18181B;
        min-width: 70px;
    }

    .profile-role-value {
        color: #3F3F46;
    }

    .btn-purple-profile {
        background-color: #7C5CFC !important;
        border-color: #7C5CFC !important;
        color: #FFFFFF !important;
        font-weight: 600;
        padding: 8px 18px;
        border-radius: 8px;
    }

    .btn-purple-profile:hover,
    .btn-purple-profile:focus {
        background-color: #6846EC !important;
        border-color: #6846EC !important;
        color: #FFFFFF !important;
    }
</style>

<?php
if ($this->session->flashdata('pesan')) {
    echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    echo $this->session->flashdata('pesan');
    echo '</div>';
}

if ($this->session->flashdata('error')) {
    echo '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    echo $this->session->flashdata('error');
    echo '</div>';
}

$nama_user = isset($user->nama_user) ? $user->nama_user : $this->session->userdata('nama_user');
$username  = isset($user->username) ? $user->username : $this->session->userdata('username');
$role_nama = isset($user->nama_role) ? $user->nama_role : ($this->session->userdata('nama_role') ?: 'User');
?>

<div class="row">
    <!-- Kolom Kiri: Data Profil -->
    <div class="col-md-7">
        <div class="profile-card">
            <div class="profile-card-header">User Profile</div>
            <div class="profile-card-body">
                <?= form_open('profile/update') ?>
                    <div class="form-group">
                        <label>Nama</label>
                        <div class="input-group">
                            <input type="text" name="nama_user" class="form-control" value="<?= htmlspecialchars((string)$nama_user, ENT_QUOTES, 'UTF-8') ?>" placeholder="Nama lengkap" required>
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <div class="input-group">
                            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars((string)$username, ENT_QUOTES, 'UTF-8') ?>" placeholder="Username" required>
                            <span class="input-group-addon"><i class="fa fa-at"></i></span>
                        </div>
                    </div>

                    <div class="profile-role-row">
                        <span class="profile-role-label">Role</span>
                        <span class="profile-role-value"><?= htmlspecialchars((string)$role_nama, ENT_QUOTES, 'UTF-8') ?></span>
                    </div>

                    <div class="form-group" style="margin-bottom: 0;">
                        <button type="submit" class="btn btn-purple-profile">Ubah Profile</button>
                    </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>

    <!-- Kolom Kanan: Ganti Password (2 Input) -->
    <div class="col-md-5">
        <div class="profile-card">
            <div class="profile-card-body">
                <?= form_open('profile/ganti_password') ?>
                    <div class="form-group">
                        <label>Password Lama</label>
                        <div class="input-group">
                            <input type="password" name="current_password" class="form-control" placeholder="Password lama" required>
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Password Baru</label>
                        <div class="input-group">
                            <input type="password" name="new_password" class="form-control" placeholder="Password baru" required>
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 0;">
                        <button type="submit" class="btn btn-purple-profile">Ganti Password</button>
                    </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>