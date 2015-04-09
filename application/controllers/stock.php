<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once(APPPATH."controllers/parentController.php");
class Stock extends ParentController {
    //public variables...
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if($this->login == true){


            $headerData = array(
                'title' => 'products',
            );

            $bodyData['stock'] = $this->stock_model->get();

                $this->load->view('components/header', $headerData);
                $this->load->view('stock/show', $bodyData);
                $this->load->view('components/footer');

        }else{
            $this->load->view('admin/login');
        }
    }
}
