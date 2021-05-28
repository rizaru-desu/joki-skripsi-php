<?php namespace App\Models;

use CodeIgniter\Model;

class PermintaanModel extends Model{
  protected $table = 'permintaan_barang';
  protected $allowedFields = ['kode', 'nama_barang', 'nama_supplier', 'harga_barang', 'updated_at'];
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

  public function noticeTable()
	{
		$builder = $this->db->table('user_table');

		return $builder;
	}
}