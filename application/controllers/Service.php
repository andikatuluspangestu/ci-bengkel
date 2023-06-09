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
    $q      = urldecode($this->input->get('q', TRUE));
    $start  = intval($this->input->get('start'));

    if ($q <> '') {
      $config['base_url'] = base_url() . 'services/index.html?q=' . urlencode($q);
      $config['first_url'] = base_url() . 'services/index.html?q=' . urlencode($q);
    } else {
      $config['base_url'] = base_url() . 'services/index.html';
      $config['first_url'] = base_url() . 'services/index.html';
    }

    $config['per_page']           = 10;
    $config['page_query_string']  = TRUE;
    $config['total_rows']         = $this->Service_model->total_rows($q);
    $service                    = $this->Service_model->get_limit_data($config['per_page'], $start, $q);

    $this->load->library('pagination');
    $this->pagination->initialize($config);

    $data = array(
      'service_data'  => $service,
      'q'             => $q,
      'pagination'    => $this->pagination->create_links(),
      'total_rows'    => $config['total_rows'],
      'start'         => $start,
      'konten'        => 'services/service_list',
      'judul'         => 'Data Paket Service',
    );
    $this->load->view('dashboard', $data);
  }

  public function create()
  {
    $data = array(

      // Form Layout
      'konten'  => 'services/service_form',
      'judul'   => 'Data Services',
      'button'  => 'Create',
      'action'  => site_url('service/create_action'),

      // Data
      'id_service'    => $this->No_urut->buat_kode('service', 'id_service', 'SV'),
      'jenis_service' => set_value('jenis_service'),
      'deskripsi'     => set_value('deskripsi'),
      'biaya'         => set_value('biaya'),
      'gambar'        => set_value('gambar'),
    );

    // Redirect
    $this->load->view('dashboard', $data);
  }

  public function create_action()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $data = array(
        'id_service'    => $this->input->post('id_service', TRUE),
        'jenis_service' => $this->input->post('jenis_service', TRUE),
        'deskripsi'     => $this->input->post('deskripsi', TRUE),
        'biaya'         => $this->input->post('biaya', TRUE),
        'gambar'        => $this->input->post('gambar', TRUE),
      );

      // Insert to Database
      $this->Service_model->insert($data);

      // Redirect
      $this->session->set_flashdata('message', 'Create Record Success');
      redirect(site_url('service'));
    }
  }

  public function update($id)
  {
    $row = $this->Service_model->get_by_id($id);

    if ($row) {
      $data = array(

          // Form Layout
          'konten'  => 'services/service_form',
          'judul'   => 'Data Services',
          'button'  => 'Update',
          'action'  => site_url('service/update_action'),

          // Data
          'id_service'    => set_value('id_service', $row->id_service),
          'jenis_service' => set_value('jenis_service', $row->jenis_service),
          'deskripsi'     => set_value('deskripsi', $row->deskripsi),
          'biaya'         => set_value('biaya', $row->biaya),
          'gambar'        => set_value('gambar', $row->gambar),
      );

      // Redirect
      $this->load->view('dashboard', $data);

    } else {
      // Redirect
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('service'));
    }
  }

  public function update_action()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->update($this->input->post('id_service', TRUE));
    } else {
      $data = array(
        'jenis_service' => $this->input->post('jenis_service', TRUE),
        'deskripsi'     => $this->input->post('deskripsi', TRUE),
        'biaya'         => $this->input->post('biaya', TRUE),
        'gambar'        => $this->input->post('gambar', TRUE),
      );

      // Update to Database
      $this->Service_model->update($this->input->post('id_service', TRUE), $data);

      $this->session->set_flashdata('message', 'Update Record Success');
      redirect(site_url('service'));
    }
  }

  public function delete($id)
  {
    $row = $this->Service_model->get_by_id($id);

    if ($row) {
      $this->Service_model->delete($id);
      $this->session->set_flashdata('message', 'Delete Record Success');
      redirect(site_url('service'));
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('service'));
    }
  }

  public function _rules()
  {
    $this->form_validation->set_rules('jenis_service', 'jenis_service', 'trim|required');
    $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
    $this->form_validation->set_rules('biaya', 'biaya', 'trim|required');
    $this->form_validation->set_rules('gambar', 'gambar', 'trim|required');

    $this->form_validation->set_rules('id_service', 'id_service', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }
}
