<div class="row" style="margin-bottom: 10px">
  <div class="col-md-4">
    <?php echo anchor(site_url('transaksi/service/create'), 'Create', 'class="btn btn-primary"'); ?>
  </div>
  <div class="col-md-4 text-center">
    <div style="margin-top: 8px" id="message">
      <?php if ($this->session->flashdata('message')) : ?>
        <?php echo $this->session->flashdata('message'); ?>
      <?php endif; ?>
    </div>
  </div>
  <div class="col-md-1 text-right">
  </div>
  <div class="col-md-3 text-right">
    <form action="<?php echo site_url('transaksi/service/index'); ?>" class="form-inline" method="get">
      <div class="input-group">
        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
        <span class="input-group-btn">
          <?php
          if ($q <> '') {
          ?>
            <a href="<?php echo site_url('transaksi/service/index'); ?>" class="btn btn-default">Reset</a>
          <?php
          }
          ?>
          <button class="btn btn-primary" type="submit">Search</button>
        </span>
      </div>
    </form>
  </div>
</div>
<table class="table table-bordered" style="margin-bottom: 10px">
  <tr>
    <th>Kode Service</th>
    <th>Nama Customer</th>
    <th>Jenis Service</th>
    <th>Tanggal</th>
    <th>Harga</th>
    <th>Action</th>
  </tr>
  <?php
  foreach ($service_data as $service) {
  ?>
    <tr>
      <td>SV<?php echo str_pad($service->kd_service, 4, "0", STR_PAD_LEFT)  ?></td>
      <td><?php echo $service->nama_customer ?></td>
      <td><?php echo $service->jenis_service ?></td>
      <td><?php echo $service->tgl_service ?></td>
      <td><?php echo number_format($service->biaya, 0, ',', '.') ?></td>
      <td style="text-align:center" width="200px">
        <?php
        echo anchor(site_url('transaksi/service/update/' . $service->kd_service), 'Update');
        echo ' | ';
        echo anchor(site_url('transaksi/service/delete/' . $service->kd_service), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
        ?>
      </td>
    </tr>
  <?php
  }
  ?>
</table>
<div class="row">
  <div class="col-md-6">
    <a class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
  </div>
  <div class="col-md-6 text-right">
    <?php echo $pagination ?>
  </div>
</div>