<?php namespace App\Models;

use CodeIgniter\Model;

class PenerimaanModel extends Model{
  protected $table = 'penerimaan_barang';
  protected $allowedFields = ['kode', 'nama_barang', 'tgl_masuk', 'updated_at'];
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