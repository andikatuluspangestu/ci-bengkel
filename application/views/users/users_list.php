<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <?php echo anchor(site_url('users/create'), 'Tambah Pengguna', 'class="btn btn-primary"'); ?>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">
        <form action="<?php echo site_url('users/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php
                    if ($q <> '') {
                    ?>
                        <a href="<?php echo site_url('users'); ?>" class="btn btn-default">Reset</a>
                    <?php
                    }
                    ?>
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>
<table class="table table-bordered" style="margin-bottom: 10px">
    <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Username</th>
        <th>Role</th>
        <th>Action</th>
    </tr><?php
            foreach ($users_data as $users) {
            ?>
        <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $users->nama_user ?></td>
            <td><?php echo $users->username ?></td>
            <td><?php echo $users->level ?></td>
            <td width="200px">
                <!-- Bootstrap Buttons -->
                <a href="<?php echo site_url('users/update/' . $users->id_user) ?>" class="btn btn-info btn-sm"><span class="fa fa-pencil"></span> Edit</a>
                <a href="<?php echo site_url('users/delete/' . $users->id_user) ?>" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span> Delete</a>

            </td>
        </tr>
    <?php
            }
    ?>
</table>

<div class="row">
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
</div>