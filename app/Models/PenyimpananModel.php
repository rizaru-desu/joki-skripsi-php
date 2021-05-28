<?php namespace App\Models;

use CodeIgniter\Model;

class PenyimpananModel extends Model{
  protected $table = 'penyimpanan_barang';
  protected $allowedFields = ['tgl_masuk', 'kode', 'nama_barang', 'stock_barang', 'nama_supplier', 'faktur', 'updated_at'];
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