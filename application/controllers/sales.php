<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once(APPPATH."controllers/parentController.php");
class Sales extends ParentController {
    //public variables...
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->cash_sale();
    }

    public function cash_sale()
    {
        $headerData['title']='Sale';
        $bodyData['products'] = $this->products_model->get();
        $bodyData['customers'] = $this->agents_model->customers();

        if(isset($_POST['save_cash_sale']))
        {
            $saved_invoice = $this->sales_model->insert_cash_sale();
            if($saved_invoice != 0){
                $bodyData['someMessage'] = array('message'=>'Invoice Saved Successfully! Invoice# was <b>'.$saved_invoice.'</b>', 'type'=>'alert-success');
            }else{
                $bodyData['someMessage'] = array('message'=>'Some Unknown database fault happened. please try again a few moments later. Or you can contact your system provider.<br>Thank You', 'type'=>'alert-warning');
            }

        }
        $this->load->view('components/header',$headerData);
        $this->load->view('sales/cash/make', $bodyData);
        $this->load->view('components/footer');
    }
    public function credit_sale()
    {
        $headerData['title']='sale';
        $bodyData['products'] = $this->products_model->get();
        $bodyData['customers'] = $this->agents_model->customers();

        if(isset($_POST['save_credit_sale']))
        {
            $saved_invoice = $this->sales_model->insert_credit_sale();
            if($saved_invoice != 0){
                $bodyData['someMessage'] = array('message'=>'Invoice Saved Successfully! Invoice# was <b>'.$saved_invoice.'</b>', 'type'=>'alert-success');
            }else{
                $bodyData['someMessage'] = array('message'=>'Some Unknown database fault happened. please try again a few moments later. Or you can contact your system provider.<br>Thank You', 'type'=>'alert-warning');
            }

        }
        $this->load->view('components/header',$headerData);
        $this->load->view('sales/credit/make', $bodyData);
        $this->load->view('components/footer');
    }

    public function cash()
    {
        $headerData['title']= 'Cash Invoices';
        $sales = $this->sales_model->cash();
        $bodyData['sales']= $sales;

        $this->load->view('components/header', $headerData);
        $this->load->view('sales/cash/show', $bodyData);
        $this->load->view('components/footer');
    }

    public function credit()
    {
        $headerData['title']= 'Credit Invoices';
        $sales = $this->sales_model->credit();
        $bodyData['sales']= $sales;

        $this->load->view('components/header', $headerData);
        $this->load->view('sales/cash/show', $bodyData);
        $this->load->view('components/footer');
    }

}
