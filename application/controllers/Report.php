<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checkNotLogin();
        $this->load->model('ReportModel');
    }

    public function sales()
    {
        $stockData = $this->ReportModel->get_transactions()->result();

        $data['row'] = $stockData;

        $this->template->load('template', 'Report/report_sales', $data);
    }

    public function stock()
    {
        $stockData = $this->ReportModel->get()->result();

        $data['row'] = $stockData;

        $this->template->load('template', 'Report/report', $data);
    }

    function report_print($id)
    {
        $data['row'] = $this->ReportModel->get($id)->row();
        $html = $this->load->view('report/report_print', $data, true);
        $this->fungsi->pdf_generator($html, 'report-stock-', 'A4', 'landscape');
    }
}
?>