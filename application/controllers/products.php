<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once(APPPATH."controllers/parentController.php");
class Products extends ParentController {
    //public variables...
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if($this->login == true){
            $product_id = (isset($_GET['product']))?$_GET['product']:'';
            $keys = array(
                'product_id'=>$product_id,
            );
            //defining the sorting column
            $sort = array(
                'sort_by'=>(isset($_GET['sort_by']))?$_GET['sort_by']:'inserted_at',
                'order' => (isset($_GET['order']))?$_GET['order']:'asc',
            );
            ///////////////////////////////////////////////////////////////
            //counting total products
            $num_products = $this->products_model->count($keys);
            $num_products = ($num_products == 0)?1:$num_products;
            $config = $this->helper_model->pagination_configs("products/index/?", "products", $num_products);
            $this->pagination->initialize($config);

            $pageNumber = 0;
            if(isset($_GET['page'])){
                $pageNumber = $_GET['page'];
                if($pageNumber>=0){$pageNumber = $pageNumber;}else{ $pageNumber = 0;}
            }

            $headerData = array(
                'title' => 'products',
                'page' => 'products',
            );
            $bodyData['someMessage'] = '';
            $bodyData['pages'] = $this->pagination->create_links();
            $bodyData['columns'] = array();

            //deleting the customer*****************//
            if(isset($_POST['del'])){
                $this->form_validation->set_rules('del', 'product', 'required|numeric|callback__validate_customer_deleting');
                if ($this->form_validation->run() == true)
                {
                    if( $this->helper_model->delete_record('products',$_POST['del']) == true){
                        $bodyData['someMessage'] = array('message'=>'product Deleted Successfully!', 'type'=>'alert-success');
                    }else{
                        $bodyData['someMessage'] = array('message'=>'Some Unknown database fault happened. please try again a few moments later. Or you can contact your system provider.<br>Thank You', 'type'=>'alert-warning');
                    }
                }
            }
            //////////////////////////////////////////////////////////

            if(isset($_POST['addProduct'])){
                if($this->form_validation->run('add_product') == true){
                    if( $this->products_model->insert() == true){
                        $bodyData['someMessage'] = array('message'=>'Product Added Successfully!', 'type'=>'alert-success');
                    }else{
                        $bodyData['someMessage'] = array('message'=>'Some Unknown database fault happened. please try again a few moments later. Or you can contact your system provider.<br>Thank You', 'type'=>'alert-warning');
                    }
                }
            }

            $bodyData['products'] = $this->products_model->get_limited($config["per_page"], $pageNumber, $keys, $sort);
            if(isset($_GET['print'])){
                if(isset($_POST['check'])){
                    $bodyData['products'] = $this->helper_model->filter_records($bodyData['products'], $_POST['check'],"id");
                }
                if(isset($_POST['column'])){
                    $bodyData['columns'] = $_POST['column'];
                }
                $this->load->view('products/components/print_products', $bodyData);
            }else{
                $this->load->view('components/header', $headerData);
                $this->load->view('products/welcome', $bodyData);
                $this->load->view('components/footer');
            }
        }else{
            $this->load->view('admin/login');
        }
    }
}
