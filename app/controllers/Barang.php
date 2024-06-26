<?php 

class Barang extends Controller {

    public function index(){
        $data['page'] = 'Data Barang';
        $data['barang'] = $this->model('BarangModel')->getAllBarang();
        $this->view('template/header', $data);
        $this->view('barang/index', $data);
        $this->view('template/footer');
    }

    public function tambah(){
        $data['page'] = 'Tambah Barang';
        $this->view('template/header', $data);
        $this->view('barang/create');
        $this->view('template/footer');
    }

    public function simpanBarang(){
        if( $this->model('BarangModel')->tambahBarang($_POST) > 0 ) {
            header('location: ' . BASE_URL . '/barang/index');
            exit;
        }else{
            header('location: ' . BASE_URL . '/barang/index');
            exit;
        }
    }

    public function edit($id){
        $data['page'] = 'Edit Barang';
        $data['barang'] = $this->model('BarangModel')->getBarangById($id);
        $this->view('template/header', $data);
        $this->view('barang/edit', $data);
        $this->view('template/footer');
    }

    public function updateBarang(){
        if ( $this->model('BarangModel')->updateDataBarang($_POST) > 0 ) {
            header('location: ' . BASE_URL . '/barang/index');
            exit;
        }else{
            header('location: ' . BASE_URL . '/barang/index');
            exit;
        }
    }

    public function hapus($id){
        if ( $this->model('BarangModel')->deleteBarang($id) > 0 ) {
            header('location: ' . BASE_URL . '/barang/index');
            exit;
        }else{
            header('location: ' . BASE_URL . '/barang/index');
            exit;
        }
    }

    public function cari(){
        $data['page'] = 'Data Barang';
        $data['barang'] = $this->model('barangModel')->cariBarang();
        $this->view('template/header', $data);
        $this->view('barang/index', $data);
        $this->view('template/footer');
    }
}

?>