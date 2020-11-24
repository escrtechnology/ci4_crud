<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Product_model;

class Product extends BaseController
{
    public function __construct()
    {
        $this->product = new Product_model();
    }

    public function index()
    {
        $data['product'] = $this->product->getProduct();
        return view('product/index', $data);
    }

    public function create()
    {
        return view('product/create');
    }

    public function store()
    {
        $name = $this->request->getPost('product_name');
        $desc = $this->request->getPost('product_description');

        $data = [
            'product_name' => $name,
            'product_description' => $desc
        ];

        $simpan = $this->product->insert_product($data);

        if ($simpan) {
            session()->setFlashdata('success', 'Created product successfully');
            return redirect()->to(base_url('product'));
        }else {
            session()->setFlashdata('error', 'Created product failed');
            return redirect()->to(base_url('product'));
        }
    }

    public function edit($id)
    {
        $data['product'] = $this->product->getProduct($id);
        return view('product/edit', $data);
    }

    public function update($id)
    {
        $name = $this->request->getPost('product_name');
        $desc = $this->request->getPost('product_description');

        $data = [
            'product_name' => $name,
            'product_description' => $desc
        ];

        $ubah = $this->product->update_product($data, $id);

        if($ubah) {
            session()->setFlashdata('info', 'Updated product successfully');
            return redirect()->to(base_url('product'));
        }else {
            session()->setFlashdata('error', 'Updated product failed');
            return redirect()->to(base_url('product'));
        }
    }

    public function delete($id)
    {
        $hapus = $this->product->delete_product($id);
        
        if($hapus) {
            session()->setFlashdata('warning', 'Deleted product successfully');
            return redirect()->to(base_url('product'));
        }else {
            session()->setFlashdata('error', 'Deleted product failed');
            return redirect()->to(base_url('product'));
        }
} 
}
?>