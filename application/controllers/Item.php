<?php

use Picqer\Barcode\BarcodeGeneratorHTML;

defined('BASEPATH') or exit('No direct script access allowed');

class item extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checkNotLogin();
        $this->load->model(['ItemModel', 'CategoryModel', 'UnitModel']);
    }

    function get_ajax()
    {
        $list = $this->ItemModel->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $item->barcode_item . '<br><a href="' . site_url('item/barcode_qrcode/' . $item->id_item) . '" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
            $row[] = $item->name_item;
            $row[] = $item->category_name;
            $row[] = $item->unit_name;
            $row[] = indo_currency($item->price_item);
            $row[] = $item->stock_item;
            $row[] = $item->image_item != null ? '<img src="' . base_url('uploads/product/' . $item->image) . '" class="img" style="width:100px">' : null;
            // add html for action
            $row[] = '<a href="' . site_url('item/edit/' . $item->id_item) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                    <a href="' . site_url('item/del/' . $item->id_item) . '" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->ItemModel->count_all(),
            "recordsFiltered" => $this->ItemModel->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function index()
    {
        $data['row'] = $this->ItemModel->get();
        $this->template->load('template', 'product/item', $data);
    }

    public function del($id)
    {
        $item = $this->ItemModel->get($id)->row();
        if ($item->image_item != null) {
            $target_file = './upload/product/' . $item->image_item;
            unlink($target_file);
        }

        $this->ItemModel->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Deleted');
        }
        redirect('item');
    }

    public function add()
    {
        $item = new stdClass();
        $item->id_item = null;
        $item->name_item = null;
        $item->barcode_item = null;
        $item->price_item = null;
        $item->id_category = null;

        $category = $this->CategoryModel->get();
        $unit = $this->UnitModel->get();
        $unitss[null] = '-- Choose Unit --';

        foreach ($unit->result() as $units) {
            $unitss[$units->id_unit] = $units->nama_unit;
        }

        $data = array(
            'page' => 'add',
            'row' => $item,
            'category' => $category,
            'unitss' => $unitss,
            'selected_unit' => null,
        );
        $this->template->load('template', 'product/itemAdd', $data);
    }

    public function process()
    {
        $config['upload_path'] = './upload/product/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 2048;
        $config['file_name_item'] = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if ($this->ItemModel->check_barcode($post['barcode_item'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode $post[barcode_item] already exist");
                redirect('item/add');
            } else {
                if (@$_FILES['image_item']['nama_item'] != null) {
                    if ($this->upload->do_upload('image_item')) {
                        $post['image_item'] = $this->upload->data('file_name_item');
                        $this->ItemModel->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data Changed');
                        }
                        redirect('item');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('item/add');
                    }
                } else {
                    $post['image_item'] = null;
                    $this->ItemModel->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data Changed');
                    }
                    redirect('item');
                }
            }
        } else if (isset($_POST['edit'])) {
            if ($this->ItemModel->check_barcode($post['barcode_item'], $post['id_item'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode $post[barcode_item] already exist");
                redirect('item/edit/', $post['id_item']);
            } else {
                if (@$_FILES['image_item']['nama_item'] != null) {
                    if ($this->upload->do_upload('image_item')) {

                        $item = $this->ItemModel->get($post('id_item'))->row();
                        if ($item->image_item != null) {
                            $target_file = './upload/product/' . $item->image_item;
                            unlink($target_file);
                        }

                        $post['image_item'] = $this->upload->data('file_name_item');
                        $this->ItemModel->edit($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data Changed');
                        }
                        redirect('item');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('item/edit');
                    }
                } else {
                    $post['image_item'] = null;
                    $this->ItemModel->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data Changed');
                    }
                    redirect('item');
                }
            }
        }
    }

    public function edit($id)
    {
        $query = $this->ItemModel->get($id);
        if ($query->num_rows() > 0) {
            $item = $query->row();
            $category = $this->CategoryModel->get();
            $unit = $this->UnitModel->get();
            $unitss[null] = '-- Choose Unit --';

            foreach ($unit->result() as $units) {
                $unitss[$units->id_unit] = $units->nama_unit;
            }

            $data = array(
                'page' => 'edit',
                'row' => $item,
                'category' => $category,
                'unitss' => $unitss,
                'selected_unit' => $item->id_unit,
            );

            $this->template->load('template', 'product/itemAdd', $data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');</script>";
            redirect('item');
        }
    }

    function barcode_qrcode($id)
    {
        $data['row'] = $this->ItemModel->get($id)->row();
        $this->template->load('template', 'product/barcode_qrcode', $data);
    }

    function barcode_print($id)
    {
        $data['row'] = $this->ItemModel->get($id)->row();
        $html = $this->load->view('product/barcode_print', $data, true);
        $this->fungsi->pdf_generator($html, 'barcode-' . $data['row']->barcode_item, 'A4', 'landscape');
    }
}
