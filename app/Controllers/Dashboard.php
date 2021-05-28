<?php namespace App\Controllers;

use App\Models\PermintaanModel;
use App\Models\LaporanModel;
use App\Models\OrderModel;
use App\Models\PenyimpananModel;
use App\Models\PenerimaanModel;

class Dashboard extends BaseController
{
	public function index()
	{
		$data = [];

		$fetchModel = new PermintaanModel();

		$data['user_data'] = $fetchModel->orderBy('id', 'DESC')->findAll();

		echo view('template/header', $data);
		echo view('dashboard', $data);
		echo view('template/footer', $data);
	}

	//--------------------------------------------------------------------

	public function addPermintaan(){
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'kode' => 'required|min_length[3]|max_length[50]|is_unique[permintaan_barang.kode]',
				'nama_barang' => 'required|min_length[3]|max_length[255]',
				'nama_supplier' => 'required|min_length[3]|max_length[255]',
				'harga_barang' => 'required|min_length[3]|max_length[255]'
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new PermintaanModel();

				$newData = [
					'kode' => $this->request->getVar('kode'),
					'nama_barang' => $this->request->getVar('nama_barang'),
					'nama_supplier' => $this->request->getVar('nama_supplier'),
					'harga_barang' => $this->request->getVar('harga_barang'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Berhasil Menambahkan data Permintaan');
				return redirect()->to('/addPermintaan');

			}
		}

		echo view('template/header', $data);
		echo view('add-permintaan-barang', $data);
		echo view('template/footer', $data);
	}

	public function kelolaPermintaan(){
		
		helper(['form']);

		$fetchModel = new PermintaanModel();

		$data['user_data'] = $fetchModel->orderBy('id', 'DESC')->findAll();

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'kode' => 'required|min_length[3]|max_length[50]',
				'nama_barang' => 'required|min_length[3]|max_length[255]',
				'nama_supplier' => 'required|min_length[3]|max_length[255]',
				'harga_barang' => 'required|min_length[3]|max_length[255]'
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				
				$id = $this->request->getVar('id');

				$newData = [
					'kode' => $this->request->getVar('kode'),
					'nama_barang' => $this->request->getVar('nama_barang'),
					'nama_supplier' => $this->request->getVar('nama_supplier'),
					'harga_barang' => $this->request->getVar('harga_barang'),
				];
				$fetchModel->update($id, $newData);
				$session = session();
				$session->setFlashdata('success', 'Berhasil Memperbarui data Laporan');
				return redirect()->to('/kelolaPermintaan');

			}
		}

		echo view('template/header', $data);
		echo view('edit-permintaan-barang', $data);
		echo view('template/footer', $data);
	}

	function deletePermintaan($id)
    {
        $fetchModel = new PermintaanModel();

        $fetchModel->where('id', $id)->delete($id);

        $session = session();
		$session->setFlashdata('success', 'Data sudah terhapus');

        return redirect()->to('/kelolaPermintaan');
    }


	//--------------------------------------------------------------------

	public function addLaporan(){
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'tgl_masuk' => 'required',
				'kode' => 'required|min_length[3]|max_length[50]|is_unique[laporan_barang.kode]',
				'nama_barang' => 'required|min_length[3]|max_length[255]',
				'jml_barang' => 'required|min_length[1]|max_length[255]',
				'nama_supplier' => 'required|min_length[3]|max_length[255]',
				'harga_barang' => 'required|min_length[3]|max_length[255]'
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new LaporanModel();

				$newData = [
					'tgl_masuk' => $this->request->getVar('tgl_masuk'),
					'kode' => $this->request->getVar('kode'),
					'nama_barang' => $this->request->getVar('nama_barang'),
					'jml_barang' => $this->request->getVar('jml_barang'),
					'nama_supplier' => $this->request->getVar('nama_supplier'),
					'harga_barang' => $this->request->getVar('harga_barang'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Successful Add Data');
				return redirect()->to('/addLaporan');

			}
		}

		echo view('template/header', $data);
		echo view('add-laporan', $data);
		echo view('template/footer', $data);
	}

	//--------------------------------------------------------------------

	public function addOrder(){
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'kode' => 'required|min_length[3]|max_length[50]|is_unique[order_barang.kode]',
				'nama_barang' => 'required|min_length[3]|max_length[255]',
				'stock_barang' => 'required|min_length[1]|max_length[255]',
				'nama_supplier' => 'required|min_length[3]|max_length[255]',
				'unit_order' => 'required|min_length[1]|max_length[255]'
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new OrderModel();

				$newData = [
					'kode' => $this->request->getVar('kode'),
					'nama_barang' => $this->request->getVar('nama_barang'),
					'stock_barang' => $this->request->getVar('stock_barang'),
					'nama_supplier' => $this->request->getVar('nama_supplier'),
					'unit_order' => $this->request->getVar('unit_order'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Berhasil Menambahkan Order Barang');
				return redirect()->to('/addOrder');

			}
		}

		echo view('template/header', $data);
		echo view('add-order-barang', $data);
		echo view('template/footer', $data);
	}

	//--------------------------------------------------------------------

	public function addPenerima(){
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'tgl_masuk' => 'required',
				'kode' => 'required|min_length[3]|max_length[50]|is_unique[laporan_barang.kode]',
				'nama_barang' => 'required|min_length[3]|max_length[255]',
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new PenerimaanModel();

				$newData = [
					'tgl_masuk' => $this->request->getVar('tgl_masuk'),
					'kode' => $this->request->getVar('kode'),
					'nama_barang' => $this->request->getVar('nama_barang'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Berhasil Menambahkan Penerimaan Barang');
				return redirect()->to('/addPenerima');

			}
		}

		echo view('template/header', $data);
		echo view('add-penerimaan-barang', $data);
		echo view('template/footer', $data);
	}

	//--------------------------------------------------------------------

	public function addPenyimpanan(){
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'tgl_masuk' => 'required',
				'kode' => 'required|min_length[3]|max_length[50]|is_unique[laporan_barang.kode]',
				'nama_barang' => 'required|min_length[3]|max_length[255]',
				'stock_barang' => 'required|min_length[1]|max_length[255]',
				'nama_supplier' => 'required|min_length[3]|max_length[255]',
				'faktur' => 'required|min_length[3]|max_length[255]'
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new PenyimpananModel();

				$newData = [
					'tgl_masuk' => $this->request->getVar('tgl_masuk'),
					'kode' => $this->request->getVar('kode'),
					'nama_barang' => $this->request->getVar('nama_barang'),
					'stock_barang' => $this->request->getVar('stock_barang'),
					'nama_supplier' => $this->request->getVar('nama_supplier'),
					'faktur' => $this->request->getVar('faktur'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Berhasil Menambahkan ke Penyimpanan Barang');
				return redirect()->to('/addPenyimpanan');

			}
		}

		echo view('template/header', $data);
		echo view('add-penyimpanan-barang', $data);
		echo view('template/footer', $data);
	}

}