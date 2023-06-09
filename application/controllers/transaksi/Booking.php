<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class Booking extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Booking_model');
    $this->load->model('No_urut');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $q = urldecode($this->input->get('q', TRUE));
    $start = intval($this->input->get('start'));

    if ($q <> '') {
      $config['base_url'] = base_url() . 'transaksi/booking/index.html?q=' . urlencode($q);
      $config['first_url'] = base_url() . 'transaksi/booking/index.html?q=' . urlencode($q);
    } else {
      $config['base_url'] = base_url() . 'transaksi/booking/index.html';
      $config['first_url'] = base_url() . 'transaksi/booking/index.html';
    }

    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;
    $config['total_rows'] = $this->Booking_model->total_rows($q);
    $booking = $this->Booking_model->get_limit_data($config['per_page'], $start, $q);

    $this->load->library('pagination');
    $this->pagination->initialize($config);

    $data = array(
      'booking_data' => $booking,
      'q' => $q,
      'pagination' => $this->pagination->create_links(),
      'total_rows' => $config['total_rows'],
      'start' => $start,
      'konten' => 'transaksi/booking/booking_list',
      'judul' => 'Data Booking',
    );
    $this->load->view('dashboard', $data);
  }

  public function create()
  {
    $data = array(
      'button' => 'Create',
      'action' => site_url('transaksi/booking/create_action'),
      'kd_booking' => $this->No_urut->buat_kode('booking', 'id_booking', 'BK'),
      'id_booking' => set_value('id_booking'),
      'no_antrian' => set_value('no_antrian'),
      'tgl_booking' => set_value('tgl_booking'),
      'total_biaya' => set_value('total_biaya'),
      'id_customer' => set_value('id_customer'),
      'id_sparepart' => set_value('id_sparepart'),
      'jenis_service' => set_value('jenis_service'),
      'konten' => 'transaksi/booking/booking_form',
      'judul' => 'Data Booking',
    );
    $this->load->view('dashboard', $data);
  }

  public function create_action()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $data = array(
        'no_antrian' => $this->input->post('no_antrian', TRUE),
        'tgl_booking' => $this->input->post('tgl_booking', TRUE),
        'total_biaya' => $this->input->post('total_biaya', TRUE),
        'id_customer' => $this->input->post('id_customer', TRUE),
        'jenis_service' => $this->input->post('jenis_service', TRUE),
        'id_sparepart' => $this->input->post('id_sparepart', TRUE),
      );

      $this->Booking_model->insert($data);
      $this->session->set_flashdata('message', 'Create Record Success');
      redirect(site_url('transaksi/booking'));
    }
  }

  public function update($id)
  {
    $row = $this->Booking_model->get_by_id($id);

    if ($row) {
      $data = array(
        'button' => 'Update',
        'action' => site_url('transaksi/booking/update_action'),
        'id_booking' => set_value('id_booking', $row->id_booking),
        'kd_booking' => 'BK' . set_value('kd_booking', str_pad($row->id_booking, 4, "0", STR_PAD_LEFT)),
        'no_antrian' => set_value('no_antrian', $row->no_antrian),
        'tgl_booking' => set_value('tgl_booking', $row->tgl_booking),
        'total_biaya' => set_value('total_biaya', $row->total_biaya),
        'jenis_service' => set_value('jenis_service', $row->jenis_service),
        'id_sparepart' => set_value('id_sparepart', $row->id_sparepart),
        'nama_customer' => set_value('nama_customer', $row->nama_customer),
        'konten' => 'transaksi/booking/booking_form',
        'judul' => 'Data Booking',
      );
      $this->load->view('dashboard', $data);
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('transaksi/booking'));
    }
  }

  public function update_action()
  {
    $data = array(
      'no_antrian' => $this->input->post('no_antrian', TRUE),
      'tgl_booking' => $this->input->post('tgl_booking', TRUE),
      'total_biaya' => $this->input->post('total_biaya', TRUE),
      'jenis_service' => $this->input->post('jenis_service', TRUE),
      'id_sparepart' => $this->input->post('id_sparepart', TRUE),
      'nama_customer' => $this->input->post('nama_customer', TRUE),
    );

    $this->Booking_model->update($this->input->post('id_booking', TRUE), $data);
    $this->session->set_flashdata('message', 'Update Record Success');
    redirect(site_url('transaksi/booking'));
  }

  public function delete($id)
  {
    $row = $this->Booking_model->get_by_id($id);

    if ($row) {
      $this->Booking_model->delete($id);
      $this->session->set_flashdata('message', 'Delete Record Success');
      redirect(site_url('transaksi/booking'));
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('transaksi/booking'));
    }
  }

  public function exportpdf()
  {

    // Load data yang akan ditampilkan di PDF
    $data['booking_data'] = $this->Booking_model->get_pdf();

    // Total dana booking
    $data['total_booking'] = $this->Booking_model->totalDanaBooking();

    // Load view yang akan dijadikan PDF
    $html = $this->load->view('/transaksi/booking/exportpdf_view', $data, true);

    // Konversi view HTML menjadi PDF menggunakan dompdf
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait'); // Mengatur ukuran kertas
    $dompdf->render();

    // Menghasilkan output PDF ke browser
    $dompdf->stream('booking.pdf', array('Attachment' => 0));

    // Lokasi file output PDF
    $pdf_file = $dompdf->output();

    // Rename file output supaya tidak tertimpa
    $filename = 'booking_' . time() . '.pdf';
    file_put_contents($filename, $pdf_file);

    // Menampilkan hasil file PDF
    redirect(base_url() . $filename);

  }

  public function print_booking($id_booking)
{
    $data = array(
        'booking_data' => $this->Booking_model->get_by_id($id_booking),
    );

    // Load view yang akan dijadikan PDF
    $html = $this->load->view('transaksi/booking/booking_print', $data, true);

    // Konversi view HTML menjadi PDF menggunakan Dompdf
    require_once APPPATH . 'third_party/dompdf/autoload.inc.php';

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait'); // Mengatur ukuran kertas
    $dompdf->render();

    // Menghasilkan output PDF ke browser
    $dompdf->stream('struk-booking.pdf', array('Attachment' => 0));

    // Lokasi file output PDF
    $pdf_file = $dompdf->output();

    // Rename file output supaya tidak tertimpa
    $filename = 'booking_' . time() . '.pdf';
    file_put_contents($filename, $pdf_file);

    // Menampilkan hasil file PDF
    redirect(base_url() . $filename);
}


}
