<?php
use Dompdf\Dompdf;

class Fungsi
{
    protected $ci;

    function __construct()
    {
        $this->ci =& get_instance();
    }

    function userLogin()
    {
        $this->ci->load->model('userModel');
        $user_id = $this->ci->session->userdata('id_user');
        $user_data = $this->ci->userModel->get($user_id)->row();
        return $user_data;
    }

    function pdf_generator($html, $filename, $paper, $orientation)
    {
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientation);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($filename, array('Attachment' => 0));
    }

    public function count_items()
    {
        $this->ci->load->model('ItemModel');
        return $this->ci->ItemModel->get()->num_rows();
    }

    public function count_suppliers()
    {
        $this->ci->load->model('SupplierModel');
        return $this->ci->SupplierModel->get()->num_rows();
    }

    public function count_customers()
    {
        $this->ci->load->model('CustomerModel');
        return $this->ci->CustomerModel->get()->num_rows();
    }

    public function count_users()
    {
        $this->ci->load->model('UserModel');
        return $this->ci->UserModel->get()->num_rows();
    }
}
?>