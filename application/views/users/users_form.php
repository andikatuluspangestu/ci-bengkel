<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">Nama Lengkap <?php echo form_error('nama_user') ?></label>
        <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Nama User" value="<?php echo $nama_user; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Username <?php echo form_error('username') ?></label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Password <?php echo form_error('password') ?></label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Level <?php echo form_error('level') ?></label>
        <select name="level" class="form-control">
            <option value="<?php echo $level ?>">
                -- Pilih Role Akun --
            </option>
            <option value="admin">Administrator</option>
            <!-- <option value="petugas gudang">petugas gudang</option>
                <option value="manajer">manajer</option> -->
            <!-- <option value="supplier">supplier</option> -->
        </select>
    </div>
    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
    <button type="submit" class="btn btn-primary">
        Simpan Data
    </button>
    <a href="<?php echo site_url('users') ?>" class="btn btn-default">Batal</a>
</form>