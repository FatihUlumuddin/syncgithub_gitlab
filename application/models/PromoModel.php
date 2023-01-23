<?php
class PromoModel extends CI_Model {
    var $table          = 'promo'; // nama table yang akan ditampilkan di datatables
    var $column_order   = array(null,'id_promo','kode_promo','start_date','end_date','media');
    var $column_search  = array('id_promo','kode_promo','start_date','end_date','media');
    var $order          = array('id_promo' => 'asc'); //default order

    private function _get_datatables_query(){
        $this->db->select($this->column_order);
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item){
            if($_POST['search']['value']){
                if($i===0){
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }
                    else{
                        $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if(isset($_POST['order'])){
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function __construct()
    {
        $this->load->database();
    }

    public function view_where($table,$where)
    {
        $this->db->where($where);
        return $this->db->get($table);
    }

    public function fetchAllData($data,$tablename,$where)
    {
        $query = $this->db->select($data)
                         ->from($tablename)
                         ->where($where)
                         ->get();
        return $query->result_array();                            
    }

    public function insert($table,$data){
        return $this->db->insert($table,$data);
    }

    public function get_where($table,$where){
        $this->db->where($where);
        return $this->db->get($table);
    }

    public function delete($table,$where){
        $this->db->where($where);
        return $this->db->get($table);
    }

    /*public function update($table,$data,$where){
        return $this->db->update($table,$data,$where);
    }*/

    function get_datatables(){
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered(){
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id_promo)
    {
        $this->db->from($this->table);
        $this->db->where('id_promo',$id_promo);
        $query = $this->db->get();
 
        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
 
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
 
    public function delete_by_id($id_promo)
    {
        $this->db->where('id_promo', $id_promo);
        $this->db->delete($this->table);
    }
}
?>