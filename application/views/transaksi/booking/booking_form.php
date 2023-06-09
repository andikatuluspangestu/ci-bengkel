<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="varchar">Kode Booking <?php echo form_error('kd_booking') ?></label>
    <input type="text" class="form-control" name="kd_booking" id="kd_booking" placeholder="Kode Booking" value="<?php echo $kd_booking; ?>" disabled />
  </div>

  <div class="form-group">
    <label for="int">Nama Customer <?php echo form_error('nama_customer') ?></label>
    <input type="text" class="form-control" name="nama_customer" id="nama_customer" placeholder="Nama Customer" value="<?php echo $nama_customer; ?>" />
  </div>

  <div class="form-group">
    <label for="int">Jenis Service <?php echo form_error('jenis_service') ?></label>
    <input type="text" class="form-control" name="jenis_service" id="jenis_service" placeholder="Jenis Service" value="<?php echo $jenis_service; ?>" />
  </div>

  <div class="form-group">
    <label for="int">Nama Spare Part <?php echo form_error('id_sparepart') ?></label>
    <select name="id_sparepart" class="form-control">
      <?php
      $sql = $this->db->get('sparepart');
      foreach ($sql->result() as $row) {
      ?>
        <option value="<?php echo $row->kd_sparepart ?>" <?php if ($row->kd_sparepart == $id_sparepart) {
                                                            echo "selected";
                                                          } ?>>
          <?php echo $row->nama_sparepart ?>
        </option>
      <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <label for="varchar">Nomor Antrian <?php echo form_error('no_antrian') ?></label>
    <input type="text" class="form-control" name="no_antrian" id="no_antrian" placeholder="Nomor Antrian" value="<?php echo $no_antrian; ?>" />
  </div>

  <div class="form-group">
    <label for="tgl_booking">Tanggal Booking <?php echo form_error('tgl_booking') ?></label>
    <input type="date" class="form-control" name="tgl_booking" id="tgl_booking" placeholder="Tanggal Booking" value="<?php echo $tgl_booking; ?>" />
  </div>

  <div class="form-group">
    <label for="total_biaya">Total Biaya <?php echo form_error('total_biaya') ?></label>
    <input type="text" class="form-control" name="total_biaya" id="total_biaya" placeholder="Total Biaya" value="<?php echo $total_biaya; ?>" />
  </div>

  <input type="hidden" name="id_booking" value="<?php echo $id_booking; ?>" />
  <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
  <a href="<?php echo site_url('transaksi/service') ?>" class="btn btn-default">Batal</a>
</form>