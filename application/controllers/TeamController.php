<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TeamController extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Mteam');
		$this->load->model('M_posisi');
		$this->load->model('M_kota');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataTeam'] = $this->Mteam->select_all("mst_team");
		//$data['dataKota'] = $this->M_kota->select_all();
	
		$data['page'] = "team";
		$data['judul'] = "Data Team";
		$data['deskripsi'] = "Manage Data Team";

		$data['modal_tambah_team'] = show_my_modal('modals/modal_tambah_team', 'tambah-team', $data);

		$this->template->views('team/home', $data);
	}

	public function tampil() {
		$data['dataTeam'] = $this->Mteam->select_all("mst_team");
		$this->load->view('team/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('name_team', 'Nama Team', 'trim|required');
		$this->form_validation->set_rules('established', 'Tahun Berdiri', 'trim|required');
		$this->form_validation->set_rules('city_basecamp', 'Asal Kota', 'trim|required');
		$this->form_validation->set_rules('address_basecamp', 'Alamat Basecamp', 'trim|required');

		$data = $this->input->post();

		$config['upload_path'] = './upload/team/'; //path folder
        $config['allowed_types'] = 'jpg|jpeg|bmp|png|gif';
        $config['max_size'] = '2000';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';

        $this->load->library('upload',$config);
		$this->upload->do_upload('logo_team');
        $gbr = $this->upload->data();

		$data_insert = array(
			"name_team" => $data["name_team"],
			"established" => $data["established"],
			"city_basecamp" => $data["city_basecamp"],
			"address_basecamp" => $data["address_basecamp"],
			"logo_team" => $gbr['file_name'],
		);
		if ($this->form_validation->run() == TRUE) {
			$result = $this->Mteam->insert("mst_team",$data_insert);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Team Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Team Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}
	public function update() {
		$id = trim($_POST['id']);
		$where = array('id_team'=>$id);
		$data['dataTeam'] = $this->Mteam->select_by_id("mst_team",$where);
		$data['userdata'] = $this->userdata;

		echo show_my_modal('modals/modal_update_team', 'update-team', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('name_team', 'Nama Team', 'trim|required');
		$this->form_validation->set_rules('established', 'Tahun Berdiri', 'trim|required');
		$this->form_validation->set_rules('city_basecamp', 'Asal Kota', 'trim|required');
		$this->form_validation->set_rules('address_basecamp', 'Alamat Basecamp', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			if (!empty($_FILES["logo_team"]["name"])) {
			    $config['upload_path'] = './upload/team/'; //path folder
		        $config['allowed_types'] = 'jpg|jpeg|bmp|png|gif';
		        $config['max_size'] = '2000';
		        $config['max_width'] = '2000';
		        $config['max_height'] = '2000';

		        $this->load->library('upload',$config);
				$this->upload->do_upload('logo_team');
		        $gbr = $this->upload->data();
		        $logo_team = $gbr['file_name'];
			} else {
			    $logo_team = $data["olg_logo"];
			}
			$where = array('id_team' => $data["id"]);
			$data_insert = array(
				"name_team" => $data["name_team"],
				"established" => $data["established"],
				"city_basecamp" => $data["city_basecamp"],
				"address_basecamp" => $data["address_basecamp"],
				"logo_team" => $logo_team,
			);

			$result = $this->Mteam->update("mst_team",$data_insert,$where);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Team Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Team Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$where = array('id_team' => $id);
		$result = $this->Mteam->delete("mst_team",$where);

		if ($result > 0) {
			echo show_succ_msg('Data Team Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Team Gagal dihapus', '20px');
		}
	}

	
}

	

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */