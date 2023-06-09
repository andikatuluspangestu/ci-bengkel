<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="varchar">Kode Service <?php echo form_error('id_service') ?></label>
    <input type="text" class="form-control" name="id_service" id="id_service" placeholder="Kode Service" value="<?php echo $id_service; ?>" disabled />
  </div>

  <div class="form-group">
    <label for="int">Nama Customer <?php echo form_error('id_customer') ?></label>
    <select name="id_customer" class="form-control">
      <?php
      $sql = $this->db->get('customer');
      foreach ($sql->result() as $row) {
      ?>
        <option value="<?php echo $row->id_customer ?>" <?php if ($row->id_customer == $id_customer) { echo "selected"; } ?>><?php echo $row->nama_customer ?></option>
      <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <label for="varchar">Jenis Service <?php echo form_error('jenis_service') ?></label>
    <input type="text" class="form-control" name="jenis_service" id="jenis_service" placeholder="Jenis Service" value="<?php echo $jenis_service; ?>" />
  </div>

  <div class="form-group">
    <label for="tgl_service">Tanggal Service <?php echo form_error('tgl_service') ?></label>
    <input type="date" class="form-control" name="tgl_service" id="tgl_service" placeholder="Tanggal Service" value="<?php echo $tgl_service; ?>" />
  </div>

  <div class="form-group">
    <label for="biaya">Biaya <?php echo form_error('biaya') ?></label>
    <input type="text" class="form-control" name="biaya" id="biaya" placeholder="Biaya" value="<?php echo $biaya; ?>" />
  </div>

  <input type="hidden" name="kd_service" value="<?php echo $kd_service; ?>" />
  <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
  <a href="<?php echo site_url('transaksi/service') ?>" class="btn btn-default">Batal</a>
</form>