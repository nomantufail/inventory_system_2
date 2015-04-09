<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once(APPPATH."controllers/parentController.php");
class Purchases extends ParentController {
    //public variables...
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->cash_purchase();
    }

    public function cash_purchase()
    {
        $headerData['title']='Purchase';
        $bodyData['products'] = $this->products_model->get();
        $bodyData['suppliers'] = $this->agents_model->suppliers();

        if(isset($_POST['save_cash_purchase']))
        {
            $saved_invoice = $this->purchases_model->insert_cash_purchase();
            if($saved_invoice != 0){
                $bodyData['someMessage'] = array('message'=>'Invoice Saved Successfully! Invoice# was <b>'.$saved_invoice.'</b>', 'type'=>'alert-success');
            }else{
                $bodyData['someMessage'] = array('message'=>'Some Unknown database fault happened. please try again a few moments later. Or you can contact your system provider.<br>Thank You', 'type'=>'alert-warning');
            }

        }
        $this->load->view('components/header',$headerData);
        $this->load->view('purchases/cash/make', $bodyData);
        $this->load->view('components/footer');
    }
    public function credit_purchase()
    {
        $headerData['title']='Purchase';
        $bodyData['products'] = $this->products_model->get();
        $bodyData['suppliers'] = $this->agents_model->suppliers();

        if(isset($_POST['save_credit_purchase']))
        {
            $saved_invoice = $this->purchases_model->insert_credit_purchase();
            if($saved_invoice != 0){
                $bodyData['someMessage'] = array('message'=>'Invoice Saved Successfully! Invoice# was <b>'.$saved_invoice.'</b>', 'type'=>'alert-success');
            }else{
                $bodyData['someMessage'] = array('message'=>'Some Unknown database fault happened. please try again a few moments later. Or you can contact your system provider.<br>Thank You', 'type'=>'alert-warning');
            }

        }
        $this->load->view('components/header',$headerData);
        $this->load->view('purchases/credit/make', $bodyData);
        $this->load->view('components/footer');
    }

    public function cash()
    {
        $headerData['title']= 'Cash Invoices';
        $purchases = $this->purchases_model->cash();
        $bodyData['purchases']= $purchases;

        $this->load->view('components/header', $headerData);
        $this->load->view('purchases/cash/show', $bodyData);
        $this->load->view('components/footer');
    }

    public function credit()
    {
        $headerData['title']= 'Credit Invoices';
        $purchases = $this->purchases_model->credit();
        $bodyData['purchases']= $purchases;

        $this->load->view('components/header', $headerData);
        $this->load->view('purchases/cash/show', $bodyData);
        $this->load->view('components/footer');
    }

}
