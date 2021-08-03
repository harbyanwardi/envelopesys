<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

class SuratController extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Mteam');
		$this->load->model('M_posisi');
		$this->load->model('M_kota');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataSurat'] = $this->Mteam->select_all("surat");
		//$data['dataKota'] = $this->M_kota->select_all();
	
		$data['page'] = "surat";
		$data['judul'] = "Data Surat";
		$data['deskripsi'] = "Manage Data Surat";

		$data['modal_tambah_surat'] = show_my_modal('modals/modal_tambah_surat', 'tambah-surat', $data);

		$this->template->views('surat/home', $data);
	}

	public function tampil() {
		$data['dataSurat'] = $this->Mteam->select_all("surat");
		$this->load->view('surat/list_data', $data);
	}

	public function download($id){
		
		$where = array('id'=>$id);
		$data = $this->Mteam->select_by_id("surat",$where);
		$tgl = $this->template->convertDate($data->tanggal_surat);


		$phpWord = new PhpWord();
			
				$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('suratlapas.docx');
				$templateProcessor->setValues([
				    'tanggal' => $tgl,
				    'nama'	  => $data->nama,
				    'tujuan'  => $data->tujuan,
				    'no' => '- '.$data->nomor_surat,
				]);

				header("Content-Disposition: attachment; filename=PERMOHONAN JC A.N $data->nama.docx");

				$templateProcessor->saveAs('php://output');
	}
	public function prosesTambah() {
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Penerima', 'trim|required');
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required');
		$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'trim|required');

		$data = $this->input->post();

		

		$data_insert = array(
			"nomor_surat" => $data["nomor_surat"],
			"nama" => $data["nama"],
			"tujuan" => $data["tujuan"],
			"tanggal_surat" => $data["tanggal_surat"],
		);
		if ($this->form_validation->run() == TRUE) {
			$result = $this->Mteam->insert("surat",$data_insert);
			
			if ($result > 0) {
				
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Surat Berhasil ditambahkan', '20px');
				$out['id'] = $result;
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Surat Gagal ditambahkan', '20px');
				
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}
	public function update() {
		$id = trim($_POST['id']);
		$where = array('id'=>$id);
		$data['dataSurat'] = $this->Mteam->select_by_id("surat",$where);
		$data['userdata'] = $this->userdata;

		echo show_my_modal('modals/modal_update_surat', 'update-surat', $data);
	}

	public function detail() {
		$id = trim($_POST['id']);
		$where = array('id'=>$id);
		$data['dataSurat'] = $this->Mteam->select_by_id("surat",$where);
		$data['userdata'] = $this->userdata;

		echo show_my_modal('modals/modal_detail_surat', 'detail-surat', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Penerima', 'trim|required');
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required');
		$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			
			$where = array('id' => $data["id"]);
			$data_insert = array(
				"nomor_surat" => $data["nomor_surat"],
				"nama" => $data["nama"],
				"tujuan" => $data["tujuan"],
				"tanggal_surat" => $data["tanggal_surat"],
				"tanggal_pengembalian_surat" => $data["tanggal_pengembalian_surat"],
				"tanggal_pengembalian_tanda" => $data["tanggal_pengembalian_tanda"], 
				"ket_diterima" => $data["ket_diterima"],
				"keterangan" => $data['keterangan']
			);

			$result = $this->Mteam->update("surat",$data_insert,$where);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Surat Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Surat Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$where = array('id' => $id);
		$result = $this->Mteam->delete("surat",$where);

		if ($result > 0) {
			echo show_succ_msg('Data Surat Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Surat Gagal dihapus', '20px');
		}
	}

	
}

	

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */