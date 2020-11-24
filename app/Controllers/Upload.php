<?php
namespace App\Controllers;
use App\Models\Upload_model;

class Upload extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->upload = new Upload_model();
    }

    public function index()
    {
        return view('imagex/upload');
    }

    public function image()
    {
        $gambar = $this->request->getFile('gambar');
        $gambar->move(ROOTPATH.'public/imagex');

        $data = [
            'image_name' => $gambar->getName()
        ];

        $simpan = $this->upload->insert_image($data);
        if ($simpan) {
            echo "Berhasil Upload";
        }else {
            echo "Gagal Upload";
        }
    }
}
?>