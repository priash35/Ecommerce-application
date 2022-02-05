
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('product_model');			
		$this->load->model('category_model');
		$this->load->model('order_model');
        $this->load->library('cart');
	}

	
	public function index(){
		if(isset($_POST['changestatus'])&&$_POST['changestatus']=='Change Status'){
			$data = array("ord_status"=>$_POST['trackstatus'],"updateddate"=>date('Y-m-d H:i:s'));
			$orderStatus = $this->order_model->update_order_status($data,$_POST['odeID']);
		}
		
		$orderData = $this->order_model->get_all_orders();
		$sendData = array('orderData'=>$orderData);
		
		self::slicing('order_list',$sendData);
	}
	public function traking(){ 
	
		$email = $_POST['email'];
		$trackId = $_POST['trackId'];
		$orderS = $this->order_model->order_IDByemail($email);
		
		if(count($orderS)>0){
			foreach($orderS as $od){
				 
				if($od['serial']==$trackId){
					
				 $orderData = $this->order_model->get_orders_status_odrId($od['serial']);
				
					if(count($orderData)>0){
					$sts = ($orderData[0]['trackstatus']);
						echo "1-----".$sts; die;
					}else{
						echo "0-----0"; die;
					}
				}
				
			}
		}else{
			echo "0-----0"; die;
		}
		
		
	}
	
	public function products(){
		$orderId = $this->uri->segment('3');
		$orderData = $this->order_model->get_all_ProductsByorder($orderId);
		$sendData = array('orderData'=>$orderData);
		self::slicing('order_products',$sendData);
	}
    function slicing($viewTemp,$sendArray)
    {
		$this->load->view('superadmin/master/header');
		$this->load->view('superadmin/'.$viewTemp,$sendArray);
		$this->load->view('superadmin/master/left');
		$this->load->view('superadmin/master/footer');
	}

}