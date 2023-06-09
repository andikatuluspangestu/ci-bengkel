<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Sparepart extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Sparepart_model');
    $this->load->model('No_urut');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $q = urldecode($this->input->get('q', TRUE));
    $start = intval($this->input->get('start'));

    if ($q <> '') {
      $config['base_url'] = base_url() . 'sparepart/index.html?q=' . urlencode($q);
      $config['first_url'] = base_url() . 'sparepart/index.html?q=' . urlencode($q);
    } else {
      $config['base_url'] = base_url() . 'sparepart/index.html';
      $config['first_url'] = base_url() . 'sparepart/index.html';
    }

    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;
    $config['total_rows'] = $this->Sparepart_model->total_rows($q);
    $sparepart = $this->Sparepart_model->get_limit_data($config['per_page'], $start, $q);

    $this->load->library('pagination');
    $this->pagination->initialize($config);

    $data = array(
      'sparepart_data' => $sparepart,
      'q' => $q,
      'pagination' => $this->pagination->create_links(),
      'total_rows' => $config['total_rows'],
      'start' => $start,
      'konten' => 'sparepart/sparepart_list',
      'judul' => 'Data Spare Part',
    );
    $this->load->view('dashboard', $data);
  }

  public function create()
  {
    $data = array(
      'button' => 'Create',
      'action' => site_url('sparepart/create_action'),
      'id_sparepart' => $this->No_urut->buat_kode('sparepart', 'kd_sparepart', 'SP'),
      'kd_sparepart' => set_value('kd_sparepart'),
      'nama_sparepart' => set_value('nama_sparepart'),
      'qty' => set_value('qty'),
      'harga' => set_value('harga'),
      'konten' => 'sparepart/sparepart_form',
      'judul' => 'Data Spare Part',
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
        'nama_sparepart' => $this->input->post('nama_sparepart', TRUE),
        'qty' => $this->input->post('qty', TRUE),
        'harga' => $this->input->post('harga', TRUE),
      );

      $this->Sparepart_model->insert($data);
      $this->session->set_flashdata('message', 'Create Record Success');
      redirect(site_url('sparepart'));
    }
  }

  public function update($id)
  {
    $row = $this->Sparepart_model->get_by_id($id);

    if ($row) {
      $data = array(
        'button' => 'Update',
        'action' => site_url('sparepart/update_action'),
        'kd_sparepart' => set_value('kd_sparepart', $row->kd_sparepart),
        'id_sparepart' => 'SP' . set_value('id_sparepart', str_pad($row->kd_sparepart, 4, "0", STR_PAD_LEFT)),
        'nama_sparepart' => set_value('nama_sparepart', $row->nama_sparepart),
        'qty' => set_value('qty', $row->qty),
        'harga' => set_value('harga', $row->harga),
        'konten' => 'sparepart/sparepart_form',
        'judul' => 'Data Spare Part',
      );
      $this->load->view('dashboard', $data);
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('sparepart'));
    }
  }

  public function update_action()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->update($this->input->post('kd_sparepart', TRUE));
    } else {
      $data = array(
        'nama_sparepart' => $this->input->post('nama_sparepart', TRUE),
        'qty' => $this->input->post('qty', TRUE),
        'harga' => $this->input->post('harga', TRUE),
      );

      $this->Sparepart_model->update($this->input->post('kd_sparepart', TRUE), $data);
      $this->session->set_flashdata('message', 'Update Record Success');
      redirect(site_url('sparepart'));
    }
  }

  public function delete($id)
  {
    $row = $this->Sparepart_model->get_by_id($id);

    if ($row) {
      $this->Sparepart_model->delete($id);
      $this->session->set_flashdata('message', 'Delete Record Success');
      redirect(site_url('sparepart'));
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('sparepart'));
    }
  }

  public function _rules()
  {
    $this->form_validation->set_rules('nama_sparepart', 'nama sparepart', 'trim|required');
    $this->form_validation->set_rules('qty', 'qty', 'trim|required|numeric');
    $this->form_validation->set_rules('harga', 'harga', 'trim|required|numeric');

    $this->form_validation->set_rules('kd_sparepart', 'kd_sparepart', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }
}
