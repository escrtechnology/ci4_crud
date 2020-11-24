<?php
namespace App\Models;
use CodeIgniter\Model;

class Upload_model extends Model
{
    protected $table = "image";

    public function insert_image($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
}
?>