
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Orders extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //load model
        $this->load->model('product_model');
        $this->load->model('category_model');
        $this->load->model('order_model');
        $this->load->model('user_model');
        $this->load->library('cart');
    }

    public function index() {


        $orderData = $this->order_model->get_all_orders();
        //print_r($orderData);
        $sendData = array('orderData' => $orderData);

        self::slicing('order_list', $sendData);
    }

    public function traking() {

        $email = $_POST['email'];
        $trackId = $_POST['trackId'];
        $orderS = $this->order_model->order_IDByemail($email);

        if (count($orderS) > 0) {
            foreach ($orderS as $od) {

                if ($od['serial'] == $trackId) {

                    $orderData = $this->order_model->get_orders_status_odrId($od['serial']);

                    if (count($orderData) > 0) {
                        $sts = ($orderData[0]['trackstatus']);
                        echo "1-----" . $sts;
                        die;
                    } else {
                        echo "0-----0";
                        die;
                    }
                }
            }
        } else {
            echo "0-----0";
            die;
        }
    }

    public function products() {
        $orderId = $this->uri->segment('3');
        $orderData = $this->order_model->get_all_ProductsByorder($orderId);
        $sendData = array('orderData' => $orderData);
        self::slicing('order_products', $sendData);
    }

    function slicing($viewTemp, $sendArray) {
        $this->load->view('superadmin/master/header');
        $this->load->view('superadmin/' . $viewTemp, $sendArray);
        $this->load->view('superadmin/master/left');
        $this->load->view('superadmin/master/footer');
    }

    function add_order() {

        $sessdata = $this->session->userdata('front_user_logged_in');

//        $isAddUser = '';


        if ($this->input->post()) {

            $data = array(
                "user_id" => $sessdata['USER_SESS_ID'],
                "address1" => $_POST['address_1'],
                "address2" => $_POST['address_2'],
                "city" => $_POST['city_id'],
                "postcode" => $_POST['postcode'],
                "state" => $_POST['state_id'],
                "country" => $_POST['country_id'],
                "amount" => $_POST['amount'],
                "delivarycharge" => $_POST['delivaraycharge'],
                "orderdate" => date('Y-m-d H:i:s'),
                "order_status" => 'Pending'
            );
//            echo "<pre>";
//            print_r($data);
//            echo "</pre>";
//            die();
            $add_order = $this->order_model->add_order($data);

            $items = $this->cart->contents();
            $item_data = array();
            foreach ($items as $row) {
                $item_data[] = array(
                    'orderid' => $add_order,
                    'size_id' => $row['id'],
                    'productid' => $row['product_id'],
                    'quantity' => $row['qty'],
                    'price' => $row['price'],
                    'name' => $row['name'],
                    'mrp' => $row['mrp'],
                    'subtotal' => $row['subtotal'],
                    'color' => $row['color'],
                );
            }

            $item = $this->order_model->add_items($item_data);
        }
//            $id = $this->session->userdata['front_user_logged_in']['USER_SESS_ID'];
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('users', 'users.user_pk_id = orders.user_id');
        $this->db->where('order_id', $add_order);
        $results['users'] = $this->db->get()->row();

        $results['ord_del'] = $this->db->get_where('order_detail', array('orderid' => $add_order))->result();

        $to = $results['users']->user_email; //'testing.linosys@gmail.com'; 
        $Phone = $results['users']->user_contact;
        $msg = $this->load->view('emails/orderemail', $results, true);
        $this->sendMail($to, "Gravitie's Order Status", $msg);

        $msg = $this->session->userdata['front_user_logged_in']['USER_NAME'] . "is Order Placed, Order No :- " . $add_order;
        $this->sendMail(ADMINEMAIL, "Gravitie'sStatus", $msg);

        $this->session->set_flashdata('success', 'Order Place Successfully.');
        
        $this->cart->destroy();
        redirect(base_url());
    }

    function remove($rowid) {
        // Check rowid value.
        if ($rowid === "all") {
            $this->cart->destroy();
        } else {
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            $this->cart->update($data);
        }
        redirect('shopping/billing_view');
    }

    function sendMail($to, $sub, $msg, $from = 'support@inncrotech.site') {
        $this->load->library('email');
        $config['mailtype'] = "html";
        $config['wordwrap'] = TRUE;
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($from); // change it to yours
        $this->email->to($to); // change it to yours
        $this->email->subject($sub);
        $this->email->message($msg);
        $r = $this->email->send();
//        echo $r;
//        echo 'hii';
        return $r;
    }

}

?>