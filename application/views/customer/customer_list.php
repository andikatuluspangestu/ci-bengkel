<div class="row" style="margin-bottom: 10px">
  <div class="col-md-4">
    <?php echo anchor(site_url('customer/create'), 'Tambah Data', 'class="btn btn-primary"'); ?>
  </div>
  <div class="col-md-4 text-center">
    <div style="margin-top: 8px" id="message">
      <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    </div>
  </div>
  <div class="col-md-1 text-right">
  </div>
  <div class="col-md-3 text-right">
    <form action="<?php echo site_url('customer/index'); ?>" class="form-inline" method="get">
      <div class="input-group">
        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
        <span class="input-group-btn">
          <?php
          if ($q <> '') {
          ?>
            <a href="<?php echo site_url('customer'); ?>" class="btn btn-default">Reset</a>
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
    <th>Kode customer</th>
    <th>Nama customer</th>
    <th>Alamat</th>
    <th>No. Telepon</th>
    <th>No. STNK</th>
    <th>Action</th>
    </tr>
    <?php
      foreach ($customer_data as $customer) {
    ?>
    <tr>
      <td>
        CS <?php echo str_pad($customer->id_customer, 4, "0", STR_PAD_LEFT)  ?>
      </td>
      <td><?php echo $customer->nama_customer ?></td>
      <td><?php echo $customer->alamat ?></td>
      <td><?php echo $customer->no_tlp ?></td>
      <td><?php echo $customer->no_stnk ?></td>
      <td style="text-align:center" width="200px">
        <?php
          echo anchor(site_url('customer/update/' . $customer->id_customer), 'Update');
          echo ' | ';
          echo anchor(site_url('customer/delete/' . $customer->id_customer), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
        ?>
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