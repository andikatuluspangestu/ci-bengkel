<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Customer_model');
		$this->load->model('Booking_model');
		$this->load->model('Sparepart_model');
		$this->load->model('No_urut');
		$this->load->model('Service_model'); // Tambahkan ini
		$this->load->library('form_validation');
	}

	// Fungsi untuk mendapatkan jumlah booking
	private function getJumlahBooking()
	{
		// Ambil jumlah booking dari database
		$jumlah_booking = $this->Booking_model->get_count();

		return $jumlah_booking;
	}

	// Fungsi untuk mendapatkan jumlah sparepart
	private function getJumlahSparepart()
	{
		// Ambil jumlah sparepart dari database
		$jumlah_sparepart = $this->Sparepart_model->get_count();

		return $jumlah_sparepart;
	}

	// Fungsi untuk mendapatkan jumlah paket services
	private function getJumlahPaketServices()
	{
		// Ambil jumlah booking dari database
		$jumlah_paket_services = $this->Service_model->get_count();

		return $jumlah_paket_services;
	}

	public function index()
	{
		$data = array(
			'konten' => 'home',
			'judul' => 'Dashboard',
			'jumlah_booking' => $this->getJumlahBooking(),
			'jumlah_sparepart' => $this->getJumlahSparepart(),
			'jumlah_paket_services' => $this->getJumlahPaketServices()
		);
		$this->load->view('dashboard', $data);
	}

	public function signin()
	{
		if ($this->session->userdata('level') == "") {
			$this->load->view('auth/login');
		} else {
			redirect('app');
		}
	}

	public function registrasi()
	{

		$this->load->view('reg_user');
	}

	public function login()
	{

		if ($this->input->post() == NULL) {
			$this->load->view('/auth/login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$cek_user = $this->db->query("SELECT * FROM users WHERE username='$username' and password='$password' ");
			if ($cek_user->num_rows() == 1) {
				foreach ($cek_user->result() as $row) {
					$sess_data['id_user'] = $row->id_user;
					$sess_data['nama'] = $row->nama_user;
					$sess_data['username'] = $row->username;
					$sess_data['level'] = $row->level;
					$this->session->set_userdata($sess_data);
				}
				redirect('dashboard');
			} else {
			?>
				<script type="text/javascript">
					alert('Username dan password kamu salah !');
					window.location = "<?php echo base_url('app/signin'); ?>";
				</script>
			<?php
			}
		}
	}

	function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('level');
		session_destroy();

		redirect('app/signin');
	}

	public function simpan_reg()
	{
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = array(
			'nama' => $nama,
			'username' => $username,
			'password' => $password,
			'level' => 'user',
		);

		$this->db->insert('user', $data);
		?>
		<script type="text/javascript">
			alert('Pendaftaran Berhasil, Silahkan Login');
			window.location = '<?php echo base_url('signin'); ?>'
		</script>
	<?php
	}

	public function cek_barang()
	{
		$kode_barang = $this->input->post('kode_barang');
		$cek = $this->db->query("SELECT * FROM barang WHERE kode_barang='$kode_barang'")->row();
		$data = array(
			'stok' => $cek->stok,
			'harga' => $cek->harga,
			'kode_barang' => $cek->kode_barang,
			'nama_barang' => $cek->nama_barang,
		);
		echo json_encode($data);
	}

	public function tambah_penjualan()
	{
		$this->load->model('No_urut');

		$data = array(
			'konten' => 'form_penjualan',
			'judul' => 'Tambah Transaksi',
			'kodeurut' => $this->No_urut->buat_kode_penjualan(),
		);
		$this->load->view('dashboard', $data);
	}

	public function hapus_penjualan($kode_penjualan)
	{

		$this->db->where('kode_transaksi', $kode_penjualan);
		$this->db->delete('transaksi');
		$this->db->where('kode_transaksi', $kode_penjualan);
		$this->db->delete('detail_transaksi');
	?>
		<script type="text/javascript">
			alert('Berhapus Hapus Data');
			window.location = '<?php echo base_url('app/penjualan') ?>';
		</script>
<?php
	}

	public function cetak_penjualan($kode_penjualan)
	{

		$data = array(
			'data' => $this->db->query("SELECT * FROM transaksi where kode_transaksi='$kode_penjualan'"),
		);
		$this->load->view('cetak_penjualan', $data);
	}

	public function detail_penjualan($kode_penjualan)
	{

		$data = array(
			'konten' => 'detail_penjualan',
			'judul' => 'Detail Transaksi',
			'data' => $this->db->query("SELECT * FROM transaksi where kode_transaksi='$kode_penjualan'"),
		);
		$this->load->view('dashboard', $data);
	}

	public function simpan_penjualan()
	{
		$kode_penjualan = $this->input->post('kode_penjualan');
		$total_harga = $this->input->post('total_harga');
		$tgl_penjualan = $this->input->post('tgl_penjualan');
		// $pelanggan = $this->input->post('pelanggan');

		foreach ($this->cart->contents() as $items) {
			$kode_barang = $items['id'];
			$qty = $items['qty'];
			$d = array(
				'kode_transaksi' => $kode_penjualan,
				'kode_barang' => $kode_barang,
				'qty' => $qty,
			);
			$this->db->insert('detail_transaksi', $d);
			//$this->db->query("UPDATE menu SET satuan=satuan-'$qty' WHERE kode_menu='$kode_barang'");
		}

		$data = array(
			//'nama_pelanggan' => $pelanggan,
			'kode_transaksi' => $kode_penjualan,
			'total_harga' => $total_harga,
			'tgl_transaksi' => $tgl_penjualan,
		);
		$this->db->insert('transaksi', $data);
		$this->cart->destroy();
		redirect('app/penjualan');
	}

	public function simpan_cart()
	{

		$data = array(
			'id'    => $this->input->post('kode_barang'),
			'qty'   => $this->input->post('jumlah'),
			'price' => $this->input->post('harga'),
			'name'  => $this->input->post('nabar'),
		);
		$this->cart->insert($data);
		redirect('app/tambah_penjualan');
	}

	public function hapus_cart($id)
	{

		$data = array(
			'rowid'    => $id,
			'qty'   => 0,
		);
		$this->cart->update($data);
		redirect('app/tambah_penjualan');
	}

	public function penjualan()
	{
		$data = array(
			'konten' => 'penjualan',
			'judul' => 'Data Transaksi',
		);
		$this->load->view('dashboard', $data);
	}

	public function pemesanan_supplier()
	{
		$data = array(
			'konten' => 'pesanan_supplier',
			'judul' => 'Data Pemesanan Barang ke Supplier',
		);
		$this->load->view('dashboard', $data);
	}
}
