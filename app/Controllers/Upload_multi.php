<?php
namespace App\Controllers;
use App\Models\Upload_model;

class Upload_multi extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->upload = new Upload_model();
    }

    public function index()
    {
        return view('imagex/upload_multi');
    }

    public function image()
    {
        $gambar = $this->request->getFiles();
        if ($gambar) {
            foreach ($gambar['gambar'] as $img) {
                $img->move(ROOTPATH.'public/imagex');
                $data = [
                    'image_name' => $img->getName()
                ];
                $this->upload->insert_image($data);
            }
            echo "Berhasil Upload";
        }
    }
}
?>