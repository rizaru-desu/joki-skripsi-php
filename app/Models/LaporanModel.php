<?php namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model{
  protected $table = 'laporan_barang';
  protected $allowedFields = ['tgl_masuk', 'kode', 'nama_barang', 'jml_barang', 'nama_supplier', 'harga_barang', 'updated_at'];
  protected $beforeInsert = ['beforeInsert'];
  protected $beforeUpdate = ['beforeUpdate'];

  protected function beforeInsert(array $data){
    $data['data']['created_at'] = date('Y-m-d H:i:s');

    return $data;
  }

  protected function beforeUpdate(array $data){
    $data['data']['updated_at'] = date('Y-m-d H:i:s');
    return $data;
  }


}