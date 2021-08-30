<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SuratModel extends CI_Model {
	// Fungsi untuk menampilkan semua data siswa
	public function view(){
		return $this->db->get('surat')->result();
	}
	
	public function view_by($nomor_surat){
		$this->db->where('nomor_surat', $nomor_surat);
		return $this->db->get('surat')->row();
	}
	public function getSuratById($nomor_surat)
	{
		$this->db->where('nomor_surat', $nomor_surat);
		return $this->db->get('surat')->result();
	}

	public function detail($nomor_surat){
		$data["surat"] = $this->db->query("select * from surat where id = '$nomor_surat'")->row();
        $this->db->display("detail",$data);
	}
	public function get_all(){
			return $this->db->get('surat')->result();
		}
	public function get_product_keyword($keyword){
			$this->db->select('*');
			$this->db->from('surat');
			$this->db->like('judul',$keyword);
			return $this->db->get()->result();
	}	
	// Fungsi untuk melakukan menghapus data surat berdasarkan nomor surat
	public function hapus_surat($nomor_surat){
		$this->db->where('nomor_surat', $nomor_surat);
        $this->db->delete('surat');
        return true;
	}
		public function validation($mode){
		$this->load->library('form_validation'); // Load library form_validation untuk proses validasinya
		
		// Tambahkan if apakah $mode save atau update
		// Karena ketika update, nomor surat tidak harus divalidasi
		// Jadi nomor surat di validasi hanya ketika menambah data surat saja
		if($mode == "save")
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
		
		$this->form_validation->set_rules('kategori', 'Kategori');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('waktu', 'Waktu', 'required');
		$this->form_validation->set_rules('file', 'File', 'required');
			
		if($this->form_validation->run()) // Jika validasi benar
			return TRUE; // Maka kembalikan hasilnya dengan TRUE
		else // Jika ada data yang tidak sesuai validasi
			return FALSE; // Maka kembalikan hasilnya dengan FALSE
	}
	
	// Fungsi untuk melakukan simpan data ke tabel surat
	public function save(){
		$data = array(
			"nomor_surat" => $this->input->post('nomor_surat'),
			"kategori" => $this->input->post('kategori'),
			"judul" => $this->input->post('judul'),
			"waktu" => $this->input->post('waktu'),
			"file" => $this->input->post('file')
		);
		
		$this->db->insert('surat', $data); // Untuk mengeksekusi perintah insert data
	}

	public function edit($nomor_surat){
		$data = array(
			"nomor_surat" => $this->input->post('nomor_surat'),
			"kategori" => $this->input->post('kategori'),
			"judul" => $this->input->post('judul'),
			"waktu" => $this->input->post('waktu'),
			"file" => $this->input->post('file')
		);
		
		$this->db->where('nomor_surat', $nomor_surat);
		$this->db->update('surat', $data); // Untuk mengeksekusi perintah update data
	}
}
