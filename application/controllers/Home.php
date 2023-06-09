<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Service_model');
		$this->load->model('Booking_model');
		$this->load->model('Sparepart_model');
	}

	public function index()
	{
		// Ambil semua data service dari model
		$services = $this->Service_model->get_all_limit();

		// Tampilkan view home dengan data services
		$data = array(
			'services' => $services
		);

		$this->load->view('/home/index', $data);

	}

	// Detail services by id
	public function detail($id)
	{
		// Ambil data service berdasarkan id
		$service = $this->Service_model->get_by_id($id);
		$data = array(
			'service' => $service
		);
		$this->load->view('/home/services/detail_service', $data);
	}

	// Order or Booking Form page services by id
	public function booknow($id)
	{
		// Ambil data service berdasarkan id
		$service = $this->Service_model->get_by_id($id);

		// Ambil semua data sparepart
		$spareparts = $this->Sparepart_model->get_all();

		$data = array(
			'service' => $service,
			'spareparts' => $spareparts
		);

		$this->load->view('/home/orders/order_form', $data);
	}

	// Proses order or booking
	public function order()
	{
		// No. Antrian Random dari 1-100 dan reset setiap hari
		// Jika hari ini sudah ada yang order, maka no antrian akan direset
		// Jika belum ada yang order, maka no antrian akan dimulai dari 1
		$no_antrian = rand(1, 100);
		$cek = $this->db->get_where('booking', array('tgl_booking' => date('Y-m-d')))->num_rows();
		if ($cek > 0) {
			$no_antrian = 1;
		}

		// Ambil data dari form
		$tgl_booking = $this->input->post('tgl_booking');
		$no_antrian = $no_antrian;
		$nama_customer = $this->input->post('nama_customer');
		$total_biaya = $this->input->post('total_biaya');
		$id_sparepart = $this->input->post('id_sparepart');
		$jenis_service = $this->input->post('jenis_service');

		// Mengubah tipe data total biaya menjadi float untuk perhitungan
		$total_biaya = (float) $total_biaya;

		// Akumulasi total_biaya dengan harga sparepart
		$sparepart = $this->Sparepart_model->get_by_id($id_sparepart);
		$total_biaya += $sparepart['harga'];

		// Masukkan data ke array untuk disimpan ke database
		$data = array(
			'tgl_booking' => $tgl_booking,
			'no_antrian' => $no_antrian,
			'nama_customer' => $nama_customer,
			'total_biaya' => $total_biaya,
			'id_sparepart' => $id_sparepart,
			'jenis_service' => $jenis_service
		);

		// Simpan data ke database
		$this->Booking_model->insert($data);
		$this->load->view('/home/orders/order_success', $data);


	}

	public function about()
	{
		$this->load->view('/home/pages/about');
	}

	public function contact()
	{
		$this->load->view('/home/pages/contact');
	}

	public function services()
	{
		// Ambil semua data service langsung dari database tanpa dari model
		$services = $this->db->get('service')->result_array();

		// Tampilkan view home dengan data services
		$data = array(
			'services' => $services
		);

		$this->load->view('/home/services/list_services', $data);
	}

	public function generate_dummy_data()
	{
		$this->load->model('Service_model');
		$this->Service_model->generate_dummy_data();
		echo "Data dummy berhasil di-generate!";
	}

}
