<?php
class News extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('news_model');
            $this->load->helper('url');
            $this->config->set_item('banner','News Banner');
        }

        public function index()
        {
            $data['news'] = $this->news_model->get_news();
            $this->config->set_item('title', 'News Archive');
            $this->load->view('news/index', $data);
        }

        public function view($slug = NULL)
        {
            $data['news_item'] = $this->news_model->get_news($slug);

            if (empty($data['news_item']))
            {
                show_404();
            }

            $data['title'] = $data['news_item']['title'];

            //$this->load->view('templates/header', $data);
            $this->load->view('news/view', $data);
            //$this->load->view('templates/footer', $data);
        }
    
    
        public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === FALSE)
        {//show form
            $this->load->view('news/create', $data);
        }
        else
        {//show newly created news item
            $slug = $this->news_model->set_news();
            
            if($slug)
            {//data looks good
                feedback('News item successfully created!', 'notice');
                redirect('/news/view/' . $slug);
            }
            else 
            {//data looks bad
                feedback('News item NOT created!', 'warning');
                redirect('/news/create');
            }
            
            //$data['title'] = "Item Encountered!";
            //$this->load->view('news/success', $data);
        }
    }//end create method
    
}