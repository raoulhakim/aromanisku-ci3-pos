<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checkNotLogin();
        $this->load->model(['ItemModel', 'CustomerModel', 'SalesModel', 'SalesDetailModel']);
    }

    public function index()
    {
        $item = $this->ItemModel->get()->result();
        $customer = $this->CustomerModel->get()->result();
        $data = [
            'item' => $item,
            'customer' => $customer,
        ];
        $this->template->load('template', 'transaction/Sales/sales', $data);
    }

    public function test()
    {
        $post = $this->input->post(null, TRUE);
        foreach ($post as $key => $value) {
            echo "Key: " . $key . ", Value: " . $value . "<br>";
        }
    }

    public function add()
    {
        $post = $this->input->post(null, TRUE);
        $this->SalesModel->add($post);
        if ($this->db->affected_rows() > 0) {
            echo "Sucess";
        }
    }

    public function detail()
    {
        $cart = [
            ['id_transaction' => '1',
                'id_item' => '1001',
                'name_item' => 'Product A',
                'price_item' => '10',
                'qty' => '2']
        ];

        $this->SalesDetailModel->addTransactionDetails($cart);
    }
}

?>