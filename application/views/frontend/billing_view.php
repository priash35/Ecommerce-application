<style>
    .head{background-color:  #0023b2 !important;color: #fff !important}
    .close {
        float: right;
        font-size: 21px;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        opacity: 1;
    }
    .panel-heading .accordion-toggle:after {

        float: right;
        color: #fff;
        font-size: 11px;
    }
    .pl-ziro { padding-left: 0px; }
</style>
<?php
if ($this->session->front_user_logged_in) {
    $userLoIDArr = $this->session->front_user_logged_in;
}
if (isset($this->session->userdata['prod_arr'])) {
    $prod_arr = $this->session->userdata['prod_arr'];
    $grand_total = $prod_arr['price'];
} else {
    $cart = $this->cart->contents();
    $grand_total = 0;
    $sub_total = 0;
    foreach ($cart as $item) {
        $sub_total = ($item['price'] * $item['qty']);
        $grand_total = $grand_total + $sub_total;
    }
}

// Merchant key here as provided by Payu
//$MERCHANT_KEY = "P4rShA1k";
$MERCHANT_KEY = "gtKFFx";
// Merchant product info.
// Populate name, merchantId, description, value, commission parameters as per your code logic; in case of multiple splits pass multiple json objects in paymentParts
$firstSplitArr = array("name" => "splitID1", "value" => "6", "merchantId" => "396446", "description" => "test description", "commission" => "2");
$paymentPartsArr = array($firstSplitArr);
$finalInputArr = array("paymentParts" => $paymentPartsArr);
$Prod_info = json_encode($finalInputArr);
//var_dump($Prod_info);
// Merchant Salt as provided by Payu
//$SALT = "RjWAdXh0";
$receiver_name = '';
$receiver_mobile = '';
$receiver_email = '';
$receiver_address1 = '';
$receiver_address2 = '';
$receiver_pincode = '';
$card_message = '';
if (isset($prod_info1) && !empty($prod_info1)) {
    $receiver_name = $prod_info1['receiver_name'];
    $receiver_mobile = $prod_info1['receiver_mobile'];
    $receiver_email = $prod_info1['receiver_email'];
    $receiver_address1 = $prod_info1['receiver_address1'];
    $receiver_address2 = $prod_info1['receiver_address2'];
    $receiver_pincode = $prod_info1['receiver_pincode'];
    $card_message = $prod_info1['card_message'];
}
$SALT = "eCwWELxi";
//$SALT = "idW2Bj6VBl";
// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";
//$PAYU_BASE_URL = "https://secure.payu.in";



$posted = array();
if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        $posted[$key] = $value;
    }
}
$formError = 0;
if (empty($posted['txnid'])) {
    // Generate random transaction id
    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
    $txnid = $posted['txnid'];
}
?>
<script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
        if (hash == '') {
            return;
        }

        var payuForm = document.forms.payuForm;
        payuForm.submit();


    }
</script>

<div class="col-md-12 product_list" >
    <section>
        <div class="col-md-9" style="padding: 0 8px;">
            <div class="checkout">
                <div class="container">
                    <div class="row">
                        <div class="panel-group" id="accordion">

                            <div class="panel panel-default">
                                <div class="panel-heading head">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="accordion-toggle collapsed"></a>    
                                            1. Login
                                            <?php
                                            if (isset($_SESSION['front_user_logged_in']['USER_SESS_ID']) && $_SESSION['front_user_logged_in']['USER_SESS_ID'] != '') {
                                                ;
                                                ?>
                                                <label class=""> with : <?= $userinfobasic[0]['user_email'] ?></label> 
                                        <?php } ?>
                                    </h4>
                                </div>
                                <?php if (!isset($_SESSION['front_user_logged_in'] ['USER_SESS_ID'])) { ?>
                                    <div id="collapse1" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h2>New Customer</h2>
                                                    <p>Checkout Options:</p>
                                                    <div class="radio">
                                                        <p>click here to <a href="<?php echo base_url(); ?>users/register?checkout">Signup</a></p>

                                                    </div>
                                                    <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="accordion-toggle collapsed" aria-expanded="false">  <input type="button" value="Continue" id="button-account" data-loading-text="Loading..." class="btn btn-checkout"></a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h2>Returning Customer</h2>
                                                    <p>I am a returning customer</p>
                                                    <form id = "SubLOg" class="sign-in-page">
                                                         <span id="redErr"></span>
                                                        <div class="form-group">
                                                            <label class="control-label" for="input-email">E-Mail</label>
                                                            <input type="text" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label" for="input-password">Password</label>
                                                            <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
                                                            <a href=""  data-toggle="modal" data-target="#fpassword" >Forgotten Password</a></div>

                                                        <input type="submit"  value="Login" id="button-login" class="btn btn-checkout">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php
//                                echo "<pre>";
//                                print_r($userinfodelv);
//                                echo "</pre>";
//                                die();
//                                if (!empty($userinfodelv)) { 
                                ?>
                            </div>
                            <form method="post" action="<?= base_url() ?>orders/add_order">
                                <?php if (!empty($userinfodelv)) { ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading head">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="accordion-toggle">
                                                    Delivery Address</a>
                                            </h4>
                                        </div>
                                        <div id="collapse2" class="panel-collapse collapse <?= !empty($userinfodelv) ? "in" : "" ?>">
                                            <div class="panel-body">
                                                <div class="checkbox">
                                                    <div class="col-md-12">
    <!--                                                    <form method="Post" action="<?//php echo base_url(); ?>orders/add_order" id="addressIDForm">-->
                                                        <label class="col-md-12">
                                                            <b><?= $userinfobasic[0]['user_first_name'] ?></b>&nbsp;<b><?= $userinfobasic[0]['user_contact'] ?></b>
                                                        </label>

                                                        <?php
                                                        $adcnt = 0;
                                                        foreach ($userinfodelv as $delAdd) { //print_r($delAdd)
                                                            ?>

                                                            <div class="col-md-6 checkAddP" >
                                                                <input type="radio" name="shipping_address" id="shipping_address_<?= $adcnt ?>" class="shipping_address" value="<?php echo $delAdd['uda_id'] ?>" required>
                                                                <p>&nbsp; <?PHP echo $delAdd['uda_address1']; ?>,&nbsp;<?PHP echo $delAdd['uda_address2']; ?>
                                                                    ,&nbsp;<?PHP echo $delAdd['uda_city']; ?>, &nbsp;<?PHP echo $delAdd['uda_state']; ?>.&nbsp;
                                                                    ,&nbsp;<?PHP echo $delAdd['uda_country']; ?> -&nbsp;<?PHP echo $delAdd['uda_pincode']; ?>.&nbsp;
                                                                    <a href="javascript:void(0);" onclick ="edit_address('<?php echo $delAdd['uda_id'] ?>', '<?php echo $delAdd['uda_address1'] ?>', '<?php echo $delAdd['uda_address2'] ?>', '<?php echo $delAdd['uda_city'] ?>', '<?php echo $delAdd['uda_pincode'] ?>', '<?php echo $delAdd['uda_state'] ?>', '<?php echo $delAdd['uda_country'] ?>');">Edit</a></p>
                                                            </div>
                                                            <?php
                                                            $adcnt++;
                                                        }
                                                        ?>
                                                        <div class="col-md-12">
                                                            <!--<button type="submit" class="btn purpleBtn" value="PayNow">Continue</button>-->
                                                            <div class="col-md-4 text-right pdt10"> <input type="button" value="Continue" id="button-account" data-toggle="collapse" data-parent="#accordion" href="#addaddress" class="btn btn-checkout"></div>
                                                            <!--<input type="button"  value="Continue" id="DeliveryHere" data-loading-text="Loading..." class="btn btn-checkout">-->
                                                        </div>
                                                        <!--</form>-->
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading head">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#addaddress" class="accordion-toggle collapsed">
                                                2 Add New Address</a>
                                        </h4>
                                    </div>
                                    <div id="addaddress" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <fieldset id="account">
                                                        <legend>Your Personal Details</legend>
                                                        <?php
                                                        ?>
                                                        <div class="col-md-6">
                                                            <div class="form-group required">
                                                                <label class="control-label" >Full Name</label>
                                                                <input type="text" name="Fullname" value="<?php echo isset($userinfobasic[0]['user_first_name']) ? $userinfobasic[0]['user_first_name'] : '' ?>" placeholder="Full Name" id="fullname" class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group required ">
                                                                <label class="control-label" >E-Mail</label>
                                                                <input type="text" name="email" value="<?php echo isset($userinfobasic[0]['user_email']) ? $userinfobasic[0]['user_email'] : '' ?>" placeholder="E-Mail" id="email" class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group required">
                                                                <label class="control-label" >Mobile</label>
                                                                <input type="number" onKeyPress="if (this.value.length == 10)
                                                                            return false;" name="Mobile" value="<?php echo isset($userinfobasic[0]['user_contact']) ? $userinfobasic[0]['user_contact'] : '' ?>" placeholder="Mobile" maxlength="10" id="mobile" class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-12">
                                                    <!--<form action="" method="post" id="edit_address_form" name="edit_address_form">-->
                                                    <fieldset id="address" class="required">
                                                        <legend>Your Address</legend>
                                                        <div class="col-md-6">
                                                            <div class="form-group required">
                                                                <label class="control-label" >Address 1</label>
                                                                <input type="text" name="address_1" value="<?php echo isset($userinfobasic[0]['user_address']) ? $userinfobasic[0]['user_address'] : '' ?>" placeholder="Address 1" id="input-payment-address-1" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label" >Address 2</label>
                                                                <input type="text" name="address_2" value="<?php echo isset($userinfobasic[0]['user_address1']) ? $userinfobasic[0]['user_address1'] : '' ?>" placeholder="Address 2" id="input-payment-address-2" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group required">
                                                                <label class="control-label">City</label>
                                                                <select id="secondlist" name="city_id" id="input-payment-zone" class="form-control">

                                                                    <option value="Ahmednagar" <?= $userinfobasic[0]['city'] == "Ahmednagar" ? 'selected' : ""; ?> >Ahmednagar</option>
                                                                    <option value="Akola" <?= $userinfobasic[0]['city'] == "Akola" ? 'selected' : ""; ?>>Akola</option>
                                                                    <option value="Alibag" <?= $userinfobasic[0]['city'] == "Alibag" ? 'selected' : ""; ?>>Alibag</option>
                                                                    <option value="Amaravati" <?= $userinfobasic[0]['city'] == "Amaravati" ? 'selected' : ""; ?>>Amaravati</option>
                                                                    <option value="Arnala" <?= $userinfobasic[0]['city'] == "Arnala" ? 'selected' : ""; ?>>Arnala</option>
                                                                    <option value="Aurangabad" <?= $userinfobasic[0]['city'] == "Aurangabad" ? 'selected' : ""; ?>>Aurangabad</option>
                                                                    <option value="Bandra" <?= $userinfobasic[0]['city'] == "Bandra" ? 'selected' : ""; ?>>Bandra</option>
                                                                    <option value="Bassain" <?= $userinfobasic[0]['city'] == "Bassain" ? 'selected' : ""; ?>>Bassain</option>
                                                                    <option value="Belapur" <?= $userinfobasic[0]['city'] == "Belapur" ? 'selected' : ""; ?>>Belapur</option>
                                                                    <option value="Bhiwandi" <?= $userinfobasic[0]['city'] == "Bhiwandi" ? 'selected' : ""; ?>>Bhiwandi</option>
                                                                    <option value="Bhusaval" <?= $userinfobasic[0]['city'] == "Bhusaval" ? 'selected' : ""; ?>>Bhusaval</option>
                                                                    <option value="Borliai-Mandla" <?= $userinfobasic[0]['city'] == "Borliai-Mandla" ? 'selected' : ""; ?>>Borliai-Mandla</option>
                                                                    <option value="Chandrapur" <?= $userinfobasic[0]['city'] == "Chandrapur" ? 'selected' : ""; ?>>Chandrapur</option>
                                                                    <option value="Dahanu" <?= $userinfobasic[0]['city'] == "Dahanu" ? 'selected' : ""; ?>>Dahanu</option>
                                                                    <option value="Daulatabad" <?= $userinfobasic[0]['city'] == "Daulatabad" ? 'selected' : ""; ?>>Daulatabad</option>
                                                                    <option value="Dighi (Pune)" <?= $userinfobasic[0]['city'] == "Dighi (Pune)" ? 'selected' : ""; ?>>Dighi (Pune)</option>
                                                                    <option value="Dombivali" <?= $userinfobasic[0]['city'] == "Dombivali" ? 'selected' : ""; ?>>Dombivali</option>
                                                                    <option value="Goa" <?= $userinfobasic[0]['city'] == "Goa" ? 'selected' : ""; ?>>Goa</option>
                                                                    <option value="Jaitapur" <?= $userinfobasic[0]['city'] == "Jaitapur" ? 'selected' : ""; ?>>Jaitapur</option>
                                                                    <option value="Jalgaon" <?= $userinfobasic[0]['city'] == "Jalgaon" ? 'selected' : ""; ?>>Jalgaon</option>
                                                                    <option value="Jawaharlal Nehru (Nhava Sheva)" <?= $userinfobasic[0]['city'] == "Jawaharlal Nehru (Nhava Sheva)" ? 'selected' : ""; ?>>Jawaharlal Nehru (Nhava Sheva)</option>
                                                                    <option value="Kalyan" <?= $userinfobasic[0]['city'] == "Kalyan" ? 'selected' : ""; ?>>Kalyan</option>
                                                                    <option value="Karanja" <?= $userinfobasic[0]['city'] == "Karanja" ? 'selected' : ""; ?>>Karanja</option>
                                                                    <option value="Kelwa" <?= $userinfobasic[0]['city'] == "Kelwa" ? 'selected' : ""; ?>>Kelwa</option>
                                                                    <option value="Khopoli" <?= $userinfobasic[0]['city'] == "Khopoli" ? 'selected' : ""; ?>>Khopoli</option>
                                                                    <option value="Kolhapur" <?= $userinfobasic[0]['city'] == "Kolhapur" ? 'selected' : ""; ?>>Kolhapur</option>
                                                                    <option value="Lonavale" <?= $userinfobasic[0]['city'] == "Lonavale" ? 'selected' : ""; ?>>Lonavale</option>
                                                                    <option value="Malegaon" <?= $userinfobasic[0]['city'] == "Malegaon" ? 'selected' : ""; ?>>Malegaon</option>
                                                                    <option value="Malwan" <?= $userinfobasic[0]['city'] == "Malwan" ? 'selected' : ""; ?>>Malwan</option>
                                                                    <option value="Manori" <?= $userinfobasic[0]['city'] == "Manori" ? 'selected' : ""; ?>>Manori</option>
                                                                    <option value="Mira Bhayandar" <?= $userinfobasic[0]['city'] == "Mira Bhayandar" ? 'selected' : ""; ?>>Mira Bhayandar</option>
                                                                    <option value="Miraj" <?= $userinfobasic[0]['city'] == "Miraj" ? 'selected' : ""; ?>>Miraj</option>
                                                                    <option value="Mumbai (ex Bombay)" <?= $userinfobasic[0]['city'] == "Mumbai (ex Bombay)" ? 'selected' : ""; ?>>Mumbai (ex Bombay)</option>
                                                                    <option value="Murad" <?= $userinfobasic[0]['city'] == "Murad" ? 'selected' : ""; ?>>Murad</option>
                                                                    <option value="Nagapur" <?= $userinfobasic[0]['city'] == "Nagapur" ? 'selected' : ""; ?>>Nagapur</option>
                                                                    <option value="Nagpur" <?= $userinfobasic[0]['city'] == "Nagpur" ? 'selected' : ""; ?>>Nagpur</option>
                                                                    <option value="Nalasopara" <?= $userinfobasic[0]['city'] == "Nalasopara" ? 'selected' : ""; ?>>Nalasopara</option>
                                                                    <option value="Nanded" <?= $userinfobasic[0]['city'] == "Nanded" ? 'selected' : ""; ?>>Nanded</option>
                                                                    <option value="Nandgaon" <?= $userinfobasic[0]['city'] == "Nandgaon" ? 'selected' : ""; ?>>Nandgaon</option>
                                                                    <option value="Nasik" <?= $userinfobasic[0]['city'] == "Nasik" ? 'selected' : ""; ?>>Nasik</option>
                                                                    <option value="Navi Mumbai" <?= $userinfobasic[0]['city'] == "Navi Mumbai" ? 'selected' : ""; ?>>Navi Mumbai</option>
                                                                    <option value="Nhave" <?= $userinfobasic[0]['city'] == "Nhave" ? 'selected' : ""; ?>>Nhave</option>
                                                                    <option value="Osmanabad" <?= $userinfobasic[0]['city'] == "Osmanabad" ? 'selected' : ""; ?>>Osmanabad</option>
                                                                    <option value="Palghar" <?= $userinfobasic[0]['city'] == "Palghar" ? 'selected' : ""; ?>>Palghar</option>
                                                                    <option value="Panvel" <?= $userinfobasic[0]['city'] == "Panvel" ? 'selected' : ""; ?>>Panvel</option>
                                                                    <option value="Pimpri" <?= $userinfobasic[0]['city'] == "Pimpri" ? 'selected' : ""; ?>>Pimpri</option>
                                                                    <option value="Pune" <?= $userinfobasic[0]['city'] == "Pune" ? 'selected' : ""; ?>>Pune</option>
                                                                    <option value="Ratnagiri" <?= $userinfobasic[0]['city'] == "Ratnagiri" ? 'selected' : ""; ?>>Ratnagiri</option>
                                                                    <option value="Sholapur" <?= $userinfobasic[0]['city'] == "Sholapur" ? 'selected' : ""; ?>>Sholapur</option>
                                                                    <option value="Shrirampur" <?= $userinfobasic[0]['city'] == "Shrirampur" ? 'selected' : ""; ?>>Shrirampur</option>
                                                                    <option value="Shriwardhan" <?= $userinfobasic[0]['city'] == "Shriwardhan" ? 'selected' : ""; ?>>Shriwardhan</option>
                                                                    <option value="Tarapur" <?= $userinfobasic[0]['city'] == "Tarapur" ? 'selected' : ""; ?>>Tarapur</option>
                                                                    <option value="Thane" <?= $userinfobasic[0]['city'] == "Thane" ? 'selected' : ""; ?>>Thane</option>
                                                                    <option value="Trombay" <?= $userinfobasic[0]['city'] == "Trombay" ? 'selected' : ""; ?>>Trombay</option>
                                                                    <option value="Varsova" <?= $userinfobasic[0]['city'] == "Varsova" ? 'selected' : ""; ?>>Varsova</option>
                                                                    <option value="Vengurla" <?= $userinfobasic[0]['city'] == "Vengurla" ? 'selected' : ""; ?>>Vengurla</option>
                                                                    <option value="Virar" <?= $userinfobasic[0]['city'] == "Virar" ? 'selected' : ""; ?>>Virar</option>
                                                                    <option value="Wada" <?= $userinfobasic[0]['city'] == "Wada" ? 'selected' : ""; ?>>Wada</option>

                                                                    <?php
//                                                                    $sql = "select * from city where city_status=1";
//                                                                    $query = $this->db->query($sql);
//                                                                    $cityData = $query->result();
//                                                                    foreach ($cityData as $ctd) {
                                                                    ?>
                        <!--<option value="<?= $ctd->city_name ?>"><?= $ctd->city_name ?></option>-->
                                                                    <?php // }  ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group required">
                                                                <label class="control-label" >Pin Code</label>
                                                                <input type="text" name="postcode" value="<?php echo isset($userinfobasic[0]['pincode']) ? $userinfobasic[0]['pincode'] : '' ?>" placeholder="Pin Code" id="input-payment-postcode" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group required">
                                                                <label class="control-label" >Country</label>
                                                                <select name="country_id" id="input-payment-country" class="form-control">
                                                                    <!--<option value=""> --- Please Select --- </option>-->
                                                                    <option value="india">India</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group required">
                                                                <label class="control-label" >State</label>
                                                                <select name="state_id" id="input-payment-country" class="form-control">
                                                                    <!--<option value=""> --- Please Select --- </option>-->
                                                                    <option value="Maharashtra">Maharashtra</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="col-md-12">
                                                        <div class="col-md-10 text-right pdt10"> <input type="button" value="Continue" id="button-account" data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="btn btn-checkout"></div>
                                                        <!--<input type="button" value="Continue" name="AddDELAddress" id="edit_add_button" class="btn btn-checkout">-->
                                                    </div>
                                                    <!--</form>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading head">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="accordion-toggle ">
                                                3. Order Detail</a>
                                        </h4>
                                    </div>
                                    <div id="collapse3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row">
                                                <?php
                                                $i = 1;

                                                foreach ($cart as $item) {
                                                    $sql = "SELECT * FROM product_images where product_fk_id=" . $item['product_id'] . " LIMIT 1";
                                                    $query = $this->db->query($sql);
                                                    $itemImg = $query->result();
                                                    if ($query->num_rows() > 0) {
                                                        $prod_img = base_url() . 'assets/images/product_image/' . $itemImg[0]->file_name;
                                                    } else {
                                                        $prod_img = base_url() . 'assets/frontend/img/product1.jpg';
                                                    }
                                                    ?>
                                                    <div class="prod_info col-md-12">
                                                        <div class="col-md-2 no_padding">
                                                            <div class="prod_image">
                                                                <a href="">
                                                                    <img src="<?= $prod_img ?>" class="img-responsive">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-xs-11 prod_details">
                                                            <h3><a target="_blank" href=""><?php
                                                echo trim($item['name']);
//                                                                       
                                                    ?></a></h3>
                                                            <!--<p>Total Price: <span><i class="fa fa-rupee"></i> 345</span></p>-->

                                                            <div class="row add-to-cart">
                                                                <p  class="col-md-2">QTY:</p>
                                                                <div class="col-md-7 product-qty">
                                                                    <?php
                                                                    $cartdata = $this->cart->contents();
                                                                    $charge = 0;
                                                                    $delevery = array();
                                                                    foreach ($cartdata as $row) {
                                                                        $dch = array('Pa_product_id' => $row['product_id'],
                                                                            'area_pin' => $row['pincode']);
                                                                        $delevery = $this->db->select('*')
                                                                                        ->join('area', 'area.area_pk_id = product_area.pa_areaID')
                                                                                        ->where($dch)->get('product_area')->row();
                                                                       
                                                                        $charge += floatval($delevery->delivery_charges);
                                                                    }
                                                                    ?>
                                                                    <?= $item['qty'] ?>
                                                                    <!--<p><i class="fa fa-rupee"> </i> <?= $charge ?> </p>-->
                                                                </div>
                                                            </div>
                                                            <p>Color: <span><?= $item['color'] ?></span></p>
                                                            <!--<p>Seller: <span>Brand</span></p>-->
                                                        </div>
                                                        <div class="col-md-1 col-xs-1 prod_details">
                                                            <h3><i class="fa fa-rupee"></i> <?= $item['subtotal'] ?></h3>
                                                            
                                                        </div>
                                                        <div class="col-md-4 prod_details">
                                                            <div class="status_tracking">
                                                                <h3>
                                                                    <!--<span class="del_status">delivery by Thus, 18 May' 17</span>-->
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 prod_details">
                                                            <h3><a href="<?php echo base_url(); ?>shopping/remove/<?php echo $item['rowid']; ?>"><i class="fa fa-trash-o"></i></a></h3>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div> <hr>
                                            <div class="row">
                                                <div class="col-md-8 text-left pdt10"><span class=""><span>Order confirmation email will be sent to </span></span><?= $userinfobasic[0]['user_email'] ?></div>
                                                <button type="botton"  name="register" id="button-account" data-toggle="collapse" data-parent="#accordion" href="#payment" class="btn-upper btn btn-primary text-center">Continue</button>
                                                <!--<div class="col-md-4 text-right pdt10"> <input type="button" value="Continue" id="button-account" data-toggle="collapse" data-parent="#accordion" href="#payment" class="btn btn-checkout"></div>-->
                                            </div>
                                            <!--<button type="submit" class="btn purpleBtn" value="PayNow">Save & Continue</button>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading head">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#payment" class="accordion-toggle ">
                                                4. Payment </a>
                                        </h4>
                                    </div>
                                    <div id="payment" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="col-md-12 col-xs-12" style="padding:0 ;">
                                                <!--<Button href="" class="apply btn blue-white btn_effect" style="margin-bottom:10px;">Apply Coupons</Button>

                                                <div class="col-md-4 col-sm-11 col-xs-12 inputcode" style="display:none;padding:0 ;">
                                                        <div class="form-group">
                                                        <div class="input-group">
                                                                <input type="text" class="form-control" id="uLogin" placeholder="Enter Coupons Code">
                                                                <label for="uLogin" class="input-group-addon btn-checkout successbtn">Apply</label>
                                                        </div>
                                                        <label class="offertxt" style="display:none;color: green;">Code Apply Successfully</label>
                                                        </div>
                                                </div> <!-- /.form-group -->
                                            </div>
                                            <p>Please select the preferred payment method to use on this order.</p>

                                            <ul class="nav nav-tabs">
                                                <li class="active hidden-xs hidden-sm"><a data-toggle="tab" href="#home">Cash On Delivery</a></li>
                                                <li class="hidden-xs hidden-sm"><a data-toggle="tab" href="#menu1">Credit | Debit Cards</a></li>
                                                <li class="active hidden-md hidden-lg"><a data-toggle="tab" href="#home">COD</a></li>
                                                <li class="hidden-md hidden-lg"><a data-toggle="tab" href="#menu1">Debit Cards</a></li>
                                            </ul>
                                            <?php
                                                $Tqty = 0;
                                                $TSubT = 0;
                                                $delT = 0;
                                                foreach ($cart as $itm) {
                                                    $TSubT = $TSubT + $itm['subtotal'];
                                                    $Tqty = $Tqty + $itm['qty'];
                                                    $delT = $delT + 0;
                                                };
                                                ?>
                                            <div class="tab-content">
                                                <div id="home" class="tab-pane fade in active">
                                                    <div class="col-md-12">
                                                        <p></p>
                                                        <input type="submit" value="Confirm Order" id="button-account" data-loading-text="Loading..." class="btn btn-checkout collapsed" aria-expanded="false">
                                                    </div>
                                                </div>
                                                <div id="menu1" class="tab-pane fade">
                                                    <!-- <p><form action="" style="    font-size: 13px;">
                                                                                                              <input type="radio" name="gender" value="male" checked class="savedcard"> Saved Cards
                                                                                                              <input type="radio" name="gender" value="female" class="newcard"> New Card
                                                                                                            </form></p>  -->
                                                    <div class="col-md-12 savedcardform" style="padding:0">
                                                        <!-- CREDIT CARD FORM STARTS HERE -->
                                                        <!--<div  class="col-md-6 " style="padding: 0; margin-bottom: 10px;">
                                                                <div class="panel panel-default credit-card-box">
                                                                        <div class="panel-body">
                                                                                <form role="form" id="payment-form" method="POST" action="javascript:void(0);">
                                                                                        <div class="row">
                                                                                                <div class="col-xs-12">
                                                                                                        <div class="form-group">
                                                                                                                <label for="cardNumber">CARD NUMBER</label>
                                                                                                                <div class="input-group">
                                                                                                                        <input
                                                                                                                                type="tel"
                                                                                                                                class="form-control"
                                                                                                                                name="cardNumber"
                                                                                                                                placeholder="87XX XXXX XXXX XX56"
                                                                                                                                autocomplete="cc-number"
                                                                                                                                autofocus disabled
                                                                                                                        />
                                                                                                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-xs-7 col-md-7">
                                                                                                        <div class="form-group">
                                                                                                                <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                                                                                                <input
                                                                                                                        type="tel"
                                                                                                                        class="form-control"
                                                                                                                        name="cardExpiry"
                                                                                                                        value="12 / 22"
                                                                                                                        autocomplete="cc-exp"
                                                                                                                        required disabled
                                                                                                                />
                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="col-xs-5 col-md-5 pull-right">
                                                                                                        <div class="form-group">
                                                                                                                <label for="cardCVC">CV</label>
                                                                                                                <input
                                                                                                                        type="tel"
                                                                                                                        class="form-control"
                                                                                                                        name="cardCVC"
                                                                                                                        placeholder="CVC"
                                                                                                                        autocomplete="cc-csc"
                                                                                                                        required
                                                                                                                />
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>

                                                                                </form>
                                                                        </div>
                                                                </div>
                                                        </div>-->
                                                        <!-- CREDIT CARD FORM ENDS HERE -->
                                                        <!-- CREDIT CARD FORM STARTS HERE -->
                                                        <!--<div  class="col-md-6 " style="padding: 0; margin-bottom: 10px;">
                                                                <div class="panel panel-default credit-card-box">
                                                                        <div class="panel-body">
                                                                                <form role="form" id="payment-form" method="POST" action="javascript:void(0);">
                                                                                        <div class="row">
                                                                                                <div class="col-xs-12">
                                                                                                        <div class="form-group">
                                                                                                                <label for="cardNumber">CARD NUMBER</label>
                                                                                                                <div class="input-group">
                                                                                                                        <input
                                                                                                                                type="tel"
                                                                                                                                class="form-control"
                                                                                                                                name="cardNumber"
                                                                                                                                value="78XX XXXX XXXX XX24"
                                                                                                                                autocomplete="cc-number"
                                                                                                                                required autofocus disabled
                                                                                                                        />
                                                                                                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-xs-7 col-md-7">
                                                                                                        <div class="form-group">
                                                                                                                <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                                                                                                <input
                                                                                                                        type="tel"
                                                                                                                        class="form-control"
                                                                                                                        name="cardExpiry"
                                                                                                                        placeholder="01 / 25"
                                                                                                                        autocomplete="cc-exp"
                                                                                                                        required disabled
                                                                                                                />
                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="col-xs-5 col-md-5 pull-right">
                                                                                                        <div class="form-group">
                                                                                                                <label for="cardCVC">CV</label>
                                                                                                                <input
                                                                                                                        type="tel"
                                                                                                                        class="form-control"
                                                                                                                        name="cardCVC"
                                                                                                                        placeholder="CVC"
                                                                                                                        autocomplete="cc-csc"
                                                                                                                        required
                                                                                                                />
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                </form>
                                                                        </div>
                                                                </div>
                                                        </div> -->
                                                        <!-- CREDIT CARD FORM ENDS HERE -->
                                                        <div class="col-md-12" style="    margin-top: 15px;">
                                                            <div class="col-md-5 text-left col-xs-12">
                                                                    <!--<button class="subscribe btn btn-checkout btn-lg btn-block" type="button">Pay <i class="fa fa-rupee"></i> 98.00</button>-->
                                                                <!--<form class="deliveryDatailForm" action="<?= $action ?>" id="buy_now_form" onload="submitPayuForm()" method="post" name="payuForm" >-->
                                                                <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
                                                                <input type="hidden" name="productinfo" value="<?php echo htmlspecialchars($Prod_info); ?>" />
                                                                <input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
                                                                <input type="hidden" name="txnid" value="<?php echo $txnid; ?>" />
                                                                <input type="hidden" name="amount" value="<?php echo $tat = $TSubT + $charge; ?>" />
                                                                <input type="hidden" name="delivaraycharge" value="<?php echo $charge; ?>" />
                                                                <input type="hidden" name="surl" value="<?php echo base_url(); ?>products/payment_success" />
                                                                <input type="hidden" name="furl" value="<?php echo base_url(); ?>products/payment_failure" />
                                                                <input type="hidden" name="service_provider" value="mss" />
                                                                <input type="hidden" name="name" value="addss" />
                                                                <input type="hidden" name="email" value="asa" />
                                                                <input type="hidden" name="phone" value="232" />
                                                                <input type="hidden" name="udf5" value="1001" />
                                                                <button type="submit" class="subscribe btn btn-checkout btn-lg btn-block" value="PayNow">Pay <i class="fa fa-rupee"></i></button>
                                                                <!--</form>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div  class="newcardform" style="display:none">
                                                        <!-- CREDIT CARD FORM STARTS HERE -->
                                                        <!--<div  class="col-md-6 "  style="padding: 0; margin-bottom: 10px;">
                                                                <div class="panel panel-default credit-card-box">
                                                                        <div class="panel-body">
                                                                                <form role="form" id="payment-form" method="POST" action="javascript:void(0);">
                                                                                        <div class="row">
                                                                                                <div class="col-xs-12">
                                                                                                        <div class="form-group">
                                                                                                                <label for="cardNumber">CARD NUMBER</label>
                                                                                                                <div class="input-group">
                                                                                                                        <input
                                                                                                                                type="tel"
                                                                                                                                class="form-control"
                                                                                                                                name="cardNumber"
                                                                                                                                placeholder="Valid Card Number"
                                                                                                                                autocomplete="cc-number"
                                                                                                                                required autofocus
                                                                                                                        />
                                                                                                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-xs-7 col-md-7">
                                                                                                        <div class="form-group">
                                                                                                                <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                                                                                                <input
                                                                                                                        type="tel"
                                                                                                                        class="form-control"
                                                                                                                        name="cardExpiry"
                                                                                                                        placeholder="MM / YY"
                                                                                                                        autocomplete="cc-exp"
                                                                                                                        required
                                                                                                                />
                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="col-xs-5 col-md-5 pull-right">
                                                                                                        <div class="form-group">
                                                                                                                <label for="cardCVC">CV</label>
                                                                                                                <input
                                                                                                                        type="tel"
                                                                                                                        class="form-control"
                                                                                                                        name="cardCVC"
                                                                                                                        placeholder="CVC"
                                                                                                                        autocomplete="cc-csc"
                                                                                                                        required
                                                                                                                />
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-xs-12">
                                                                                                        <button class="subscribe btn btn-checkout btn-lg btn-block" type="button">Pay <i class="fa fa-rupee"></i> 98.00</button>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="row" style="display:none;">
                                                                                                <div class="col-xs-12">
                                                                                                        <p class="payment-errors"></p>
                                                                                                </div>
                                                                                        </div>
                                                                                </form>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <!-- CREDIT CARD FORM ENDS HERE -->
                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3" style="padding: 0;">
            <div class="checkout" >
                <div class="panel panel-default">
                    <div class="panel-heading head">Order Details</div>
                    <div class="panel-body">
                        <div>
                            
                            <div class="col-md-8 col-xs-8 text-left">
                                <p>Amount <span><?= $Tqty ?> Item<?php
                            if ($Tqty > 1) {
                                echo "s";
                            }
                                                ?></span></p>
                            </div>
                            <div class="col-md-4 col-xs-4 text-right">
                                <p><i class="fa fa-rupee"> </i> <?= number_format($TSubT, 2) ?></p>
                            </div>
                        </div>
<!--                        <div class="col-md-4 col-xs-4 text-right">
                            <?php
                            ////  $sql = "SELECT * FROM product_area where pa_areaID=" ;
//                                       $query = $this->db->query($sql);
//                                       $itemImg = $query->result();
                            ?>
                            <p><i class="fa fa-rupee"> </i> <?= floatval($charge) + floatval($TSubT) ?> </p>
                        </div>-->
                        <div>
                            <div class="col-md-8 col-xs-8 text-left">
                                <p>Delivery Charges</p>
                            </div>
                            <div class="col-md-4 col-xs-4 text-right">
                                <?php
                                ?>
                                <p><i class="fa fa-rupee"> </i> <?= $charge ?> </p>
                            </div>
                        </div>
                        <!--<div >
                            <div class="col-md-8 col-xs-8 text-left">
                                <p>Coupon Apply</p>
                            </div>
                            <div class="col-md-4 col-xs-4 text-right">
                                <p class="nocode"><i class="fa fa-rupee"> </i> 0.00 </p>
                                <p style="display:none" class="offertxt"><i class="fa fa-rupee" > </i> 20.00 </p>
                            </div>
                        </div>-->
                        <hr style="border: 1px solid #8c8787;">
                        <div>
                            <div class="col-md-8 col-xs-8 text-left">
                                <label>Total Amount</label>
                            </div>
                            <div class="col-md-4 col-xs-4 text-right">
                                <label><i class="fa fa-rupee"> </i> <?php echo $tat = $TSubT + $charge; ?>  </label>
                                <input type="hidden" name="incoiveamount" value="<?php echo $tat = $TSubT + $charge; ?>">
                                       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Address Edit Modal -->
<div class="modal fade" id="addressedit" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header head modelhead">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Address111</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <fieldset id="account">
                            <legend>Your Personal Details</legend>
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label class="control-label" >Full Name</label>
                                    <input type="text" name="Fullname" value="<?php echo isset($userinfobasic[0]['user_first_name']) ? $userinfobasic[0]['user_first_name'] : '' ?>" placeholder="Full Name" id="fullname" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required ">
                                    <label class="control-label" >E-Mail</label>
                                    <input type="text" name="user_email" value="<?php echo isset($userinfobasic[0]['user_email']) ? $userinfobasic[0]['user_email'] : '' ?>" placeholder="E-Mail" id="user_email" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label class="control-label" >Mobile</label>
                                    <input type="number" onKeyPress="if (this.value.length == 10)
                                                return false;" name="mobile" value="<?php echo isset($userinfobasic[0]['user_contact']) ? $userinfobasic[0]['user_contact'] : '' ?>" placeholder="Mobile" maxlength="10" id="mobile" class="form-control" readonly>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-sm-12">
                        <fieldset id="address" class="required">
                            <legend>Your Address</legend>
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label class="control-label" >Address 1</label>
                                    <input type="text" name="address_1" value=""  required placeholder="Address 1" id="address_1" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" >Address 2</label>
                                    <input type="text" name="address_2" value="" placeholder="Address 2" id="address_2" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label class="control-label">City</label>
                                    <select id="city_id" name="city_id" id="input-payment-zone" required class="form-control">
                                        <?php
                                        $sql = "select * from city where city_status=1";
                                        $query = $this->db->query($sql);
                                        $cityData = $query->result();

                                        foreach ($cityData as $ctd) {
                                            ?>
                                            <option value="<?= $ctd->city_pk_id ?>"><?= $ctd->city_name ?></option>
                                        <?php } ?>
                                    </select></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label class="control-label" >Pin Code</label>
                                    <input type="text" name="postcode" value="" required placeholder="Pin Code" id="postcode" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label class="control-label" >Country</label>
                                    <select name="country_id" id="input-payment-country" required class="form-control">
                                        <!-- <option value=""> --- Please Select --- </option>-->
                                        <option value="india">India</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label class="control-label" >State</label>
                                    <select name="state_id" id="input-payment-country" required class="form-control">
                                        <!-- <option value=""> --- Please Select --- </option>-->
                                        <option value="Maharashtra">Maharashtra</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="uda_id" id="uda_id" value="">
                        </fieldset>
                        <div class="col-md-12">
                            <input type="submit" value="Update & Delivery Here" name="updateAdd" id="button-account" class="btn btn-checkout">
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>


<!--<div class="modal fade" id="conforim" role="dialog">
    <div class="modal-dialog modal-sm">
         Modal content
        <div class="modal-content">
            <div class="modal-header head modelhead">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Order Received</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <fieldset id="account">
                            <p>Your Order has received. <br><b>Order No :</b> XCA123456 </p>
                            <p>Receiver Name :- <?php echo isset($userinfobasic[0]['user_first_name']) ? $userinfobasic[0]['user_first_name'] : '' ?></p>
                            <p>Receiver Email :- <?php echo isset($userinfobasic[0]['user_email']) ? $userinfobasic[0]['user_email'] : '' ?></p>
                            <p>Receiver Mobile :- <?php echo isset($userinfobasic[0]['user_contact']) ? $userinfobasic[0]['user_contact'] : '' ?></p>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <span id="msgotp"></span>
            <form id="clickOTP">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Enter OTP Here :</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="info-title" for="exampleInputPassword13">OTP <span>*</span></label>
                        <input type="text" class="form-control unicase-form-control text-input" style="border-radius: 0" id="otp">
                    </div>
                    <a href="javascript:void(0);"> <button type="button" class="btn-upper btn btn-primary" id="submit-opt">Submit</button></a>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

    $(document).ready(function () {
        $("#DeliveryHere").click(function () {
            var shipping_address = $('input[name="shipping_address"]:checked').val();
            var html = "<input type='hidden' name='" + shipping_address + "'>";

            return false;
        });
        /* $("form#addressIDForm").submit(function(event){
         
         event.preventDefault();
         alert();
         
         }); */
        $(".apply").click(function () {
            $(".inputcode").show();
            $(".apply").hide();
        });
        $(".successbtn").click(function () {
            $(".offertxt").show();
            $(".nocode").hide();

        });
        $(".savedcard").click(function () {
            $(".savedcardform").show();
            $(".newcardform").hide();

        });
        $(".newcard").click(function () {
            $(".newcardform").show();
            $(".savedcardform").hide();

        });
        $("form#SubLOg").submit(function (e) {

            e.preventDefault();
            var flag = Array();
            var i = 0;
            var email = $("#input-email").val();
            var password = $("#input-password").val();

            if (password == '' || email == '') {
                jQuery("#redErr").html('Invalid Email or Password').css('color', 'red');
                flag[i] = false;
                i++;
            } else {
                jQuery.ajax({
                    type: "POST",
                    data: {email: email, password: password},
                    url: "<?php echo base_url(); ?>users/login",
                    async: false,
                    success: function (msg) {
                        if (msg == 1) {
                            jQuery("#redErr").html('');
                            flag[i] = true;
                            i++;
                        } else {
                            jQuery("#redErr").html('Invalid Email or Password').css('color', 'red');
                            flag[i] = false;
                            i++;
                        }
                    }

                });
            }
            var n = 0;
            for (var j = 0; j < flag.length; j++) {
                if (flag[j] == false) {
                    n++;
                } else {

                }
            }
            if (n > 0) {
                return false;
            } else {
                jQuery.ajax({
                    type: "POST",
                    data: {email: email},
                    url: "<?php echo base_url(); ?>users/genOTPlogin",
                    async: false,
                    success: function (msg) {
                        if (msg == 1) {
                            $('#myModal').modal('show');
                            $('#submit-opt').click(function () {

                                var otp = $("#otp").val();
                                if (otp == '') {
                                    $('.msgotp').html('Please enter opt').css('color', 'red');
                                    return false;
                                }
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url(); ?>users/lotpverify",
                                    data: "&OTP=" + otp,
                                    success: function (result) {

                                        if (result != 0) {
                                            var otpmsgS = 'Successfully veryfied';
                                            $('#otpverifyFORM').html('');
                                            $('.msgotp').html(otpmsgS).css('color', 'green');
                                            $.ajax({
                                                type: "POST",
                                                url: "<?php echo base_url(); ?>users/lotpreset",
                                                success: function (result) {

                                                    if (result != 0) {

                                                        window.location.href = '<?php echo base_url(); ?>shopping/billing_view?checksign';
                                                        return false;

                                                    } else {
                                                        var otpmsgE = 'Sorry try agin';
                                                        $('.msgotp').html(otpmsgE).css('color', 'red');
                                                        return false;
                                                    }
                                                }
                                            });


                                        } else {
                                            var otpmsgE = 'Sorry try agin';
                                            $('.msgotp').html(otpmsgE).css('color', 'red');
                                            return false;
                                        }
                                    }
                                });
                                return false;

                            });

                        } else {
                            return false;
                        }
                    }
                });
                return true;
            }


        });
    });
    function edit_address(id, add1, add2, city, pin, state, country) {
        $("#pin").val(pin);
        $("#input-payment-zone").val(city);
        $("#add1").val(add1);
        $("#add2").val(add2);
        $("#uda_id").val(id);
        $('#addressedit').modal('show');


    }
</script>
<script>
    $(document).ready(function () {
        $("form#orderDetails").submit(function (event) {
            alert();
            event.preventDefault();
            var fname = $("#InputFullname").val();
            var phone = $("#phone").val();
            var email = $("#InputEmail1").val();
            var pass = $("#InputPassword1").val();
            $("#hemail").val(email);

            var flag = Array();
            var i = 0;

            var contact = $("#phone").val();
            if ((isNaN(contact)) || ($.trim(contact) == '')) {
                $(".contact").html("Please enter phone").css("color", "red");
                flag[i] = false;
                i++;
            } else if (contact.length != '10') {
                $(".contact").html("Please enter 10 digit phone").css("color", "red");
                flag[i] = false;
                i++;
            } else {
                $(".contact").html("");
                flag[i] = true;
                i++;
            }
            if (($.trim(email) == '')) {
                flag[i] = false;
                i++;
            } else {
                jQuery.ajax({
                    url: baseurl + "users/check_email",
                    data: {email: email},
                    type: "post",
                    async: false,
                    success: function (msg) {
                        if (msg > 0) {
                            jQuery(".email").html("");
                            flag[i] = true;
                            i++;

                        } else {
                            jQuery(".email").html("Email id already exist, Please try another!").css("color", "red");
                            flag[i] = false;
                            i++;
                        }
                    }
                });

            }

            var n = 0;
            for (var j = 0; j < flag.length; j++) {
                if (flag[j] == false) {
                    n++;
                } else {

                }
            }
            if (n > 0) {
                return false;
            } else {

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>users/register",
                    data: "fname=" + fname + "&phone=" + phone + "&email=" + email + "&pass=" + pass,
                    success: function (result) {
                        $('#myModal').modal('show');
                        $('#clickOTP').click(function () {

                            var hemail = $("#hemail").val();
                            var otp = $("#otp").val();
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>users/otpverify",
                                data: "HEmail=" + hemail + "&OTP=" + otp,
                                success: function (result) {
                                    if (result != 0) {
                                        var otpmsgS = 'Successfully veryfied';
                                        $('#otpverifyFORM').html('');
                                        $('.msgotp').html(otpmsgS).css('color', 'green');
                                        if (currentURL == 'checkout') {
                                            window.location.href = '<?php echo base_url(); ?>shopping/billing_view';
                                        } else {
                                            window.location.href = '<?php echo base_url(); ?>users/login';
                                        }
                                    } else {
                                        var otpmsgE = 'Sorry try agin';
                                        $('.msgotp').html(otpmsgE).css('color', 'red');
                                    }
                                }
                            });

                        });
                    }

                });
            }
        });
    });


</script>
