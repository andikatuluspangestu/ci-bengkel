<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="varchar">Kode customer <?php echo form_error('kd_customer') ?></label>
    <input type="text" class="form-control" name="kd_customer" id="kd_customer" placeholder="Kode customer" value="<?php echo $kd_customer; ?>" disabled />
  </div>

  <div class="form-group">
    <label for="varchar">Nama customer <?php echo form_error('nama_customer') ?></label>
    <input type="text" class="form-control" name="nama_customer" id="nama_customer" placeholder="Nama customer" value="<?php echo $nama_customer; ?>" />
  </div>

  <div class="form-group">
    <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
  </div>

  <div class="form-group">
    <label for="no_tlp">No. Telepon <?php echo form_error('no_tlp') ?></label>
    <input type="text" class="form-control" name="no_tlp" id="no_tlp" placeholder="No. Telepon" value="<?php echo $no_tlp; ?>" />
  </div>

  <div class="form-group">
    <label for="no_stnk">No. STNK <?php echo form_error('no_stnk') ?></label>
    <input type="text" class="form-control" name="no_stnk" id="no_stnk" placeholder="No. STNK" value="<?php echo $no_stnk; ?>" />
  </div>

  <input type="hidden" name="id_customer" value="<?php echo $id_customer; ?>" />
  <button type="submit" class="btn btn-primary">
    Simpan
  </button>
  <a href="<?php echo site_url('customer') ?>" class="btn btn-default">Batal</a>
</form>