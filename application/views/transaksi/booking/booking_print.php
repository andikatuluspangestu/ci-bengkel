<!DOCTYPE html>
<html>

<head>
  <title>Print Booking</title>
  <style>
    /* Gaya CSS khusus untuk mencetak */
    @page {
      margin: 0;
    }

    body {
      margin: 0;
      font-family: Arial, sans-serif;
      font-size: 12px;
      color: #000;
    }

    .container {
      padding: 20px;
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    .header h1 {
      font-size: 18px;
      margin: 0;
    }

    .content {
      margin-bottom: 20px;
    }

    .content table {
      width: 100%;
      border-collapse: collapse;
    }

    .content table th,
    .content table td {
      padding: 5px;
      border: 1px solid #000;
    }

    .content table th {
      background-color: #f2f2f2;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <h1>Booking Details</h1>
    </div>
    <div class="content">
      <table>
        <tr>
          <th>ID Booking</th>
          <th>Nama Customer</th>
          <th>No. Antrian</th>
          <th>Tanggal Booking</th>
          <th>Rincian Tambahan</th>
          <th>Total Biaya</th>
          <th>Jenis Service</th>
        </tr>
        <tr>
          <td><?php echo $booking_data->id_booking; ?></td>
          <td><?php echo $booking_data->nama_customer; ?></td>
          <td><?php echo $booking_data->no_antrian; ?></td>
          <td><?php echo $booking_data->tgl_booking; ?></td>
          <td><?php echo $booking_data->nama_sparepart; ?></td>
          <td>
            <?php
            $total = $booking_data->total_biaya;
            echo "Rp. " . number_format($total, 0, ',', '.');
            ?>
          </td>
          <td><?php echo $booking_data->jenis_service; ?></td>
        </tr>
      </table>
      <div class="info-cetak">
        <p>
          Tanggal Cetak: <?php echo date('d-m-Y H:i:s'); ?> oleh Admin Bengkel
        </p>
      </div>
    </div>
  </div>
</body>

</html>