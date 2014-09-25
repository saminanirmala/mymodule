<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page_model extends CI_Model {

    const table = "tbl_pages";
    const Table='tbl_subpage';

    public function __construct() {
        parent::__construct();
    }
    /*
     * @insert page
     */

    public function addPage($data) {
        $this->db->insert(Page_model::table, $data);
    }
    
    public function insertSubPage($data) {
        $this->db->insert(Page_model::table, $data);
    }
    /*
     * @retrieve all page
     */

    public function getAllPage() {

        $query = $this->db->get_where(Page_model::table, array('parent_id' => 0));
        return $query->result();
    }

    function getSubPages($page_id) {
        $this->db->select('*');
        $this->db->from(Page_model::table);
        $this->db->where(array('parent_id' => $page_id));
        $query = $this->db->get();
        return $query->result();
    }

    /*
     * @retrieve single page
     */



    /*
     * @update page
     * @PARAM INT ID
     * @PARAM table name, data
     */
    public function update($id, $tablename, $image) {
        $p_slug = $this->input->post('ptitle');
        $data = array(
            'page_title' => $this->input->post('ptitle'),
            'page_description' => $this->input->post('pdescription'),
            'meta_data' => $this->input->post('mdata'),
            'meta_description' => $this->input->post('mdescription'),
            'image' => $image,
            'added_date' => $this->input->post('date'),
            'order' => $this->input->post('order'),
            'page_slug' => url_title($p_slug, 'dash', True)
        );
        $this->db->where('page_id', $id);
        $this->db->update($tablename, $data);
        return $this->db->affected_rows();
    }

    /*
     * @delete a single row of page
     */

    public function delete_row($id) {
        $this->db->where('page_id', $id);
        $this->db->delete(Page_model::table);
    }

}
?>

