<?php
class Pics extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('pics_model');
            $this->load->helper('url_helper');
        }

        public function index()
        {
            $data['pics'] = $this->pics_model->get_pics();
            $data['title'] = 'Picture archive';
            //$this->load->view('templates/header', $data);
            $this->load->view('pics/index', $data);
            //$this->load->view('templates/footer', $data);
        }

        public function view($slug = NULL)
        {
            $data['pics_item'] = $this->pics_model->get_pics($slug);

            if (empty($data['pics_item']))
            {
                show_404();
            }

            $data['title'] = $data['pics_item']['title'];

            //$this->load->view('templates/header', $data);
            $this->load->view('pics/view', $data);
            //$this->load->view('templates/footer', $data);
        }
    
/*    
        public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === FALSE)
        {//show form
            //$this->load->view('templates/header', $data);
            $this->load->view('news/create', $data);
            //$this->load->view('templates/footer', $data);

        }
        else
        {//say thanks for entering data
            $this->news_model->set_news();
            //$this->load->view('templates/header', $data);
            $this->load->view('news/success', $data);
            //$this->load->view('templates/footer', $data);
        }
    }//end create method
*/    
}