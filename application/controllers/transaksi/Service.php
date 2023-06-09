<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Service extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Service_model');
    $this->load->model('No_urut');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $q = urldecode($this->input->get('q', TRUE));
    $start = intval($this->input->get('start'));

    if ($q <> '') {
      $config['base_url'] = base_url() . 'transaksi/service/index.html?q=' . urlencode($q);
      $config['first_url'] = base_url() . 'transaksi/service/index.html?q=' . urlencode($q);
    } else {
      $config['base_url'] = base_url() . 'transaksi/service/index.html';
      $config['first_url'] = base_url() . 'transaksi/service/index.html';
    }

    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;
    $config['total_rows'] = $this->Service_model->total_rows($q);
    $service = $this->Service_model->get_limit_data($config['per_page'], $start, $q);

    $this->load->library('pagination');
    $this->pagination->initialize($config);

    $data = array(
      'service_data' => $service,
      'q' => $q,
      'pagination' => $this->pagination->create_links(),
      'total_rows' => $config['total_rows'],
      'start' => $start,
      'konten' => 'transaksi/service/service_list',
      'judul' => 'Data Service',
    );
    $this->load->view('dashboard', $data);
  }

  public function create()
  {
    $data = array(
      'button' => 'Create',
      'action' => site_url('transaksi/service/create_action'),
      'id_service' => $this->No_urut->buat_kode('service', 'kd_service', 'SP'),
      'kd_service' => set_value('kd_service'),
      'jenis_service' => set_value('jenis_service'),
      'tgl_service' => set_value('tgl_service'),
      'biaya' => set_value('biaya'),
      'id_customer' => set_value('id_customer'),
      'konten' => 'transaksi/service/service_form',
      'judul' => 'Data Service',
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
        'jenis_service' => $this->input->post('jenis_service', TRUE),
        'tgl_service' => $this->input->post('tgl_service', TRUE),
        'biaya' => $this->input->post('biaya', TRUE),
        'id_customer' => $this->input->post('id_customer', TRUE),
      );

      $this->Service_model->insert($data);
      $this->session->set_flashdata('message', 'Create Record Success');
      redirect(site_url('transaksi/service'));
    }
  }

  public function update($id)
  {
    $row = $this->Service_model->get_by_id($id);

    if ($row) {
      $data = array(
        'button' => 'Update',
        'action' => site_url('transaksi/service/update_action'),
        'kd_service' => set_value('kd_service', $row->kd_service),
        'id_service' => 'SP' . set_value('id_service', str_pad($row->kd_service, 4, "0", STR_PAD_LEFT)),
        'jenis_service' => set_value('jenis_service', $row->jenis_service),
        'tgl_service' => set_value('tgl_service', $row->tgl_service),
        'biaya' => set_value('biaya', $row->biaya),
        'id_customer' => set_value('id_customer', $row->id_customer),
        'konten' => 'transaksi/service/service_form',
        'judul' => 'Data Service',
      );
      $this->load->view('dashboard', $data);
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('transaksi/service'));
    }
  }

  public function update_action()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->update($this->input->post('kd_service', TRUE));
    } else {
      $data = array(
        'jenis_service' => $this->input->post('jenis_service', TRUE),
        'tgl_service' => $this->input->post('tgl_service', TRUE),
        'biaya' => $this->input->post('biaya', TRUE),
        'id_customer' => $this->input->post('id_customer', TRUE),
      );

      $this->Service_model->update($this->input->post('kd_service', TRUE), $data);
      $this->session->set_flashdata('message', 'Update Record Success');
      redirect(site_url('transaksi/service'));
    }
  }

  public function delete($id)
  {
    $row = $this->Service_model->get_by_id($id);

    if ($row) {
      $this->Service_model->delete($id);
      $this->session->set_flashdata('message', 'Delete Record Success');
      redirect(site_url('transaksi/service'));
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('transaksi/service'));
    }
  }

  public function _rules()
  {
    $this->form_validation->set_rules('jenis_service', 'jenis service', 'trim|required');
    $this->form_validation->set_rules('tgl_service', 'tgl_service', 'trim|required');
    $this->form_validation->set_rules('biaya', 'biaya', 'trim|required|numeric');
    $this->form_validation->set_rules('id_customer', 'id_customer', 'trim|required|numeric');

    $this->form_validation->set_rules('kd_service', 'kd_service', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }
}
