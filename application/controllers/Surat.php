<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('SuratModel'); // Load SuratModel ke controller ini
	}
	
	public function index(){
		$data['surat'] = $this->SuratModel->view();
		$this->load->view('surat/sidebar');
		$this->load->view('surat/index', $data);
	}
	public function about(){
		$data['surat'] = $this->SuratModel->view();
		$this->load->view('surat/sidebar');
		$this->load->view('surat/about', $data);
	}
	
	public function detail(){
		$data['surat'] = $this->SuratModel->view();
		$this->load->view('surat/sidebar');
		$this->load->view('surat/detail', $data);
	}
	
	public function search(){
			$keyword = $this->input->post('keyword');
			$data['surat']=$this->SuratModel->get_product_keyword($keyword);
			$this->load->view('surat/sidebar');
			$this->load->view('surat/index',$data);
	}

	public function tambah(){
		if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
			if($this->SuratModel->validation("save")){ // Jika validasi sukses atau hasil validasi adalah TRUE
				$this->SuratModel->save(); // Panggil fungsi save() yang ada di SuratModel.php
				redirect('surat');
			}
		}
		$this->load->view('surat/sidebar');
		$this->load->view('surat/form_tambah');
	}
	public function proses_tambah()
    {
        if ($this->input->post('finish')) {
            $config['upload_path']          = './assets/upload/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 2048;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                echo 'error';
                echo $this->upload->display_errors();
            } else {
                $file = $this->upload->data();
                $file = $file['file_name'];
                $nomor_surat = htmlspecialchars($this->input->post('nomor_surat'));
                $kategori = htmlspecialchars($this->input->post('kategori'));
                $judul = htmlspecialchars($this->input->post('judul'));
                $dataPengajuan = array(
                    'nomor_surat'      => $no_surat,
                    'kategori'          => $kategori,
                    'judul'            => $judul,
                    'file'             =>$file,
                );
                $this->SuratModel->tambah_pengajuan($dataPengajuan);
                redirect('Surat/index');
                print_r($dataPengajuan);
            }
        }
    }
	public function download()
    {
        $pth = file_get_contents(base_url()."assets/surat/".$nomor_surat);
        force_download($nomor_surat, $pth);
    }
	public function hapus(){
		$nomor_surat = $this->input->get('nomor_surat');
        $this->SuratModel->hapus_surat($nomor_surat);
        redirect('Surat/index');
	}

   public function ubah_surat($nomor_surat){
		if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
			if($this->SuratModel->validation("update")){ // Jika validasi sukses atau hasil validasi adalah TRUE
				$this->SuratModel->edit($nomor_surat); // Panggil fungsi edit() yang ada di SiswaModel.php
				redirect('surat');
			}
		}
		
		$data['surat'] = $this->SuratModel->view_by($nomor_surat);
		$this->load->view('surat/form_ubah', $data);
	}

}
