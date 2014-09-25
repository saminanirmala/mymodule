<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page extends MX_Controller {

    const table = "tbl_pages";

    public function __construct() {
        parent::__construct();
        $this->load->model('page_model');
        $this->load->library('image_moo');
    }
    /*
     * @return add view
     * @add pages
     */
    
       
    function do_upload() {
        $config['upload_path'] = "uploads/product/original/";

        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '4000';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("userfile")) {
            $data = $this->upload->data();
            /* PATH */
            $source = "uploads/product/original/" . $data['file_name'];
            $destination_resized = "uploads/product/resized/";
            $destination_thumb = "uploads/product/thumb/";
            $size_resized_width = 270;
            $size_resized_height = 120;
            $size_thumb_width = 150;
            $size_thumb_height = 150;
            $this->load->library('image_moo');
            $this->image_moo
                    ->load($source)
                    /* RESIZING IMAGE TO BE MEDIUM SIZE */
                    ->resize_crop($size_resized_width, $size_resized_height)
                    ->save($destination_resized . $data['file_name'])
                    ->resize_crop($size_thumb_width, $size_thumb_height)
                    ->save($destination_thumb . $data['file_name']);

            if ($this->image_moo->errors)
                print $this->image_moo->display_errors();
            else {
                return $data['file_name'];
            }
        } else {
            $error = strip_tags($this->upload->display_errors());
            echo "<script type='text/javascript'>alert('.$error.');history.back(-1);</script>";
            die();
        }
    }

    public function add() {
        if ($_POST) {
            $slug = $this->input->post('ptitle');
             $image = $this->do_upload();

            $data = array(
                'page_title' => $this->input->post('ptitle'),
                'page_description' => $this->input->post('pdescription'),
                'meta_data' => $this->input->post('mdata'),
                'meta_description' => $this->input->post('mdescription'),
                'image' => $image,
                'added_date' => $this->input->post('date'),
                'order' => $this->input->post('order'),
                'page_slug' => url_title($slug, 'dash', True)
            );

            $this->page_model->addPage($data);

            redirect('page/lists');
        }
        $this->load->view('addpage');
    }
    
    public function addsubpage(){
    $data['getallpage'] = $this->page_model->getAllPage();
    if($_POST){
        $data=array(
          'sub_page'=>$this->input->post('subpage'),
            'page_id'=>$this->input->post('pagename')
        );
        $this->page_model->insertSubPage($data);
        redirect('page/subpagelist');
    }
    $this->load->view('addsubpage',$data);
    
}
public function subpagelist(){
    $data['allsubpage']=$this->page_model->getSubPages($page_id);
    $this->load->view('pagetitle',$data);
}
public function view(){
     $data['getallpage'] = $this->page_model->getAllPage(); 
        $data['allsubpage']=$this->page_model->getSubPages($page_id);
        $this->load->view('pagetitle',$data);
}

    /*
     * @return page list view
     */
    public function lists() {
        $data['getallpage'] = $this->page_model->getAllPage();
        $this->load->view('pagelist', $data);
    }
    /*
     * @edit pages
     * @PARAM INT ID
     * @return edit pages
     */
    public function subpage(){
        $data['allpages']=$this->page_model->getPages();
        $this->load->view('pagetitle',$data);
    }
         
   
    public function edit($id) {
        if ($_POST) {
           if (!empty($_FILES['userfile']['name'])) {
                $image = $this->do_upload();
                $this->page_model->update($id, Page::table, $image);
                redirect("page/lists");
            }else{
                $page_image=$this->page_model->getSinglePage($id);
                $image->$page_image->image;
                $this->page_model->update($id, Page::table, $image);
                  redirect("page/lists");
            }
        }
        $data['pagedetail'] = $this->page_model->getSinglePage($id);
        $this->load->view("editpage", $data);
    }
    /*
     * @delete pages
     * @PARAM INT ID
     * @return to page list view
     */

    public function delete($id) {
        $this->page_model->delete_row($id);
        redirect($_SERVER['HTTP_REFERER']);
    }

}

?>
