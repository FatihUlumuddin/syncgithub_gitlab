<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('PromoModel');
    }

	public function index()
	{   
        $data['head'] = $this->load->view('_partial/head');
        $this->load->view('view_promo', $data);
    }

    public function ambildata()
    {
        $resultList = $this->PromoModel->get_datatables();
        $data = array();
        $i = 1;
        foreach($resultList as $value){
            $row = array();
            $row[] = $i++;
            $row[] = $value->kode_promo;
            $row[] = $value->start_date;
            $row[] = $value->end_date;
            $row[] = $value->media;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_promo('."'".$value->id_promo."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                      <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_promo('."'".$value->id_promo."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                #$row[] = "<a href='javascript:void(0)' title='edit' onclick=edit_promo('."'".$value->id_promo."'".')' class ='btn btn-warning'>Edit</a>"." "."<a href='".base_url("index.php/Promo/deletepromo/").$value->id_promo."' class ='btn btn-danger delete' onclick='return hapus()'>Delete</a>";
           
            $data[] = $row;
        }

        $output = array(
            "data"            => $data,
            "recordsTotal"    => $this->PromoModel->count_all(),
            "recordsFiltered" => $this->PromoModel->count_filtered(),
            "draw"            => $_POST['draw']
        );
        echo json_encode($output);
    }

    public function addpromo(){
        if(ISSET($_POST["simpan"])){
            $data["id_promo"]       = $this->input->post("id_promo");
            $data["kode_promo"]     = $this->input->post("kode_promo");
            $data["start_date"]     = $this->input->post("start_date");
            $data["end_date"]       = $this->input->post("end_date");
            $data["media"]          = $this->input->post("media");     
        }
        $this->PromoModel->insert('promo',$data);
        redirect(base_url("index.php/promo"));
    }

    public function vaddpromo(){
        $data['provinsi'] = array(
            '1' => 'Website',
            '2' => 'Offline Kasir',
            '3' => 'Customer Tools'
        );
        $data['head']     = $this->load->view('_partial/head');
        $this->load->view("view_add", $data);
    }

    public function ajax_edit($id_promo)
    {
        $data = $this->person->get_by_id($id_promo);
        echo json_encode($data);
    }

    public function ajax_update()
    {
        $data = array(
                'kode_promo' => $this->input->post('kode_promo'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'media' => $this->input->post('media'),
            );
        $this->person->update(array('id_promo' => $this->input->post('id_promo')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->person->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function editpromo(){
        
            $kode_promo = $this->input->post('kode_promo');
            $start_date = $this->input->post('start_date');
            $end_date   = $this->input->post('end_date');
            $media      = $this->input->post('media');
            $data       = array(
                    "kode_promo" => $kode_promo,
                    "start_date" => $start_date,
                    "end_date"   => $end_date,
                    "media"      => $media
                );
            $id_promo = $this->input->post('id_promo');
            $where = array("id_promo" => $id_promo);
            $this->PromoModel->update('promo',$data,$where);

        redirect(base_url("index.php/promo"));
        }

    public function veditpromo($id_promo){
        $data['head']      = $this->load->view('_partial/head');
        $data['editpromo'] = $this->PromoModel->get_where("promo", array("id_promo" => $id_promo))->row();
        $this->load->view("view_edit", $data);
    }


    public function deletepromo($id_promo){
        $this->db->delete('promo', array('id_promo' => $id_promo));
        redirect(base_url("index.php/Promo"));
    }
}
