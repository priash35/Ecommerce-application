<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->model('user_model');
		$this->load->model('frontend_model');
		$this->load->model('product_model');
	}

	//load frontend_slider list view
	public function frontend_slider(){
		IsAdminActive();
		
		$f_data = $this->frontend_model->get_slider_list();
		
		
		$isSuccess='';
		$sendData = array('frontend_slider_data'=>$f_data,'isSuccess'=>$isSuccess);
		self::slicing('frontend_slider',$sendData);
	}
	//load frontend_slider_home list view
	public function frontend_slider_home(){
		IsAdminActive();
		
		$category_data = $this->product_model->get_all_category();
		
		$f_data = $this->frontend_model->get_slider_home_page_list();
		$secondsection = $this->frontend_model->get_home_secondsection_list();
		$thirdsection  = $this->frontend_model->get_home_thirdsection_list();
		$isSuccess='';
		$sendData = array('frontend_slider_data'=>$f_data,'secondsection'=>$secondsection,'thirdsection'=>$thirdsection,'category_data'=>$category_data,'isSuccess'=>$isSuccess);
		self::slicing('frontend_slider_home',$sendData);
	} 
	//load menupagesmanagment list view
	public function menupagesmanagment(){
		IsAdminActive();
		
		$category_data = $this->product_model->get_all_category();
		
		 
		$mens = $this->frontend_model->get_slider_cat_page_list('mens');
		
		$womens = $this->frontend_model->get_slider_cat_page_list('womens');
		$kids = $this->frontend_model->get_slider_cat_page_list('kids');
		$Electronis = $this->frontend_model->get_slider_cat_page_list('electronics');
		$Sports = $this->frontend_model->get_slider_cat_page_list('sports');
		$Food = $this->frontend_model->get_slider_cat_page_list('food');
		$catarr = array("0"=>'mens',"1"=>'womens',"2"=>'kids',"3"=>'electronics',"4"=>'sports',"5"=>'food');
		foreach($catarr as $caDATA){
			$res[] = $this->frontend_model->get_first_cat_page_list($caDATA);
		}
		foreach($catarr as $caDATA){
			$resSec[] = $this->frontend_model->get_second_cat_page_list($caDATA);
		}
		foreach($catarr as $caDATA){
			$resTh[] = $this->frontend_model->get_third_cat_page_list($caDATA);
		}foreach($catarr as $caDATA){
			$resFO[] = $this->frontend_model->get_fourth_cat_page_list($caDATA);
		}foreach($catarr as $caDATA){
			$resFI[] = $this->frontend_model->get_five_cat_page_list($caDATA);
		}
		$secondsection = $this->frontend_model->get_home_secondsection_list();
		$thirdsection  = $this->frontend_model->get_home_thirdsection_list();
		$isSuccess='';
		$sendData = array('catarr'=>$catarr,'mens'=>$mens,'womens'=>$womens,'kids'=>$kids,'Electronis'=>$Electronis,'Sports'=>$Sports,'Food'=>$Food,'resFI'=>$resFI,'resFO'=>$resFO,'resTh'=>$resTh,'res'=>$res,'resSec'=>$resSec,'secondsection'=>$secondsection,'thirdsection'=>$thirdsection,'category_data'=>$category_data,'isSuccess'=>$isSuccess);
		self::slicing('menupagesmanagment',$sendData);
	} 
	public function edit_menupage($sectionT,$menuT){
		if($sectionT!=''){
			if($this->input->post()) { 
					
					$ctn = 1;
					//print_r($_POST['slid_id']); die;
					foreach($_POST['slid_id'] as $SID){ 
					
						  $FullPath =  DOCUMENT_ROOT.'assets/images/slider';
							if (!file_exists($FullPath)) {
								mkdir($FullPath, 0777, true);
							}
							$FullPathThumb = DOCUMENT_ROOT.'assets/images/slider/thumb/';
							if (!file_exists($FullPathThumb)) {
								mkdir($FullPathThumb, 0777, true);
							} 
							if(isset($_FILES['img_'.$ctn]['name']) && !empty($_FILES['img_'.$ctn]['name'])){
								
								
									 $prd_img = $_FILES['img_'.$ctn]['name'];
									if($prd_img!=''){ 
										$sliderss = explode('.',$prd_img);
										//print_r($sliderss); die;
										$productimages = time().'img_'.$ctn.$sliderss[0].".".$sliderss[1];


										$target = $FullPath.'/'.$productimages;
										if(move_uploaded_file($_FILES['img_'.$ctn]['tmp_name'], $target)){

										$image_path = $productimages;
										$config['image_library'] = 'gd2';
										$config['source_image'] = DOCUMENT_ROOT.'assets/images/slider/'.$productimages;
										$config['create_thumb'] = TRUE;
										$config['maintain_ratio'] = False;
										$config['height'] = 200;
										$config['width'] = 300;
										$config['new_image'] = DOCUMENT_ROOT.'assets/images/slider/thumb/'.$productimages;
										$this->image_lib->initialize($config);
										$this->image_lib->resize();
										
										
									}
								
								
							}else{
								$productimages = $_POST['oldslide_'.$ctn];
							}
								$data = array( 
									"slide"=>$productimages
										 
									);	
								if($sectionT=='slider'){$tableN='catslider';}elseif($sectionT=='catfirst'){$tableN='catfirst';}
				elseif($sectionT=='catsecond'){$tableN='catsecond';}elseif($sectionT=='catthird'){$tableN='catthird';}
				elseif($sectionT=='catfourth'){$tableN='catfourth';}elseif($sectionT=='catfive'){$tableN='catfive';}
									
									$update_category = $this->frontend_model->update_cat_page_section($data,$SID,$tableN);
							
								} 
						 
						
						$ctn++;
						
					} 
					redirect(base_url().'frontend/menupagesmanagment', 'refresh');
				}
			
		}
		IsAdminActive();
		//$id=intval(preg_replace('/[^0-9]+/', '', $id));
		$category_data = $this->product_model->get_all_category();
		$catarr = array("0"=>'mens',"1"=>'womens',"2"=>'kids',"3"=>'electronics',"4"=>'sports',"5"=>'food');
		foreach($catarr as $caDATA){
			if($menuT==$caDATA){
				if($sectionT=='slider'){$tableN='catslider';}elseif($sectionT=='catfirst'){$tableN='catfirst';}
				elseif($sectionT=='catsecond'){$tableN='catsecond';}elseif($sectionT=='catthird'){$tableN='catthird';}
				elseif($sectionT=='catfourth'){$tableN='catfourth';}elseif($sectionT=='catfive'){$tableN='catfive';}
				$listData = $this->frontend_model->get_cat_page_data_by_cat($caDATA,$tableN);
			}
			
		}
		
		
		$isSuccess='';
		
		$sendData = array('frontend_slider_data'=>$listData,'category_data'=>$category_data,'isSuccess'=>$isSuccess);
		self::slicing('edit_menupage',$sendData);
	}public function edit_home_slider(){
		IsAdminActive();
		//$id=intval(preg_replace('/[^0-9]+/', '', $id));
		$category_data = $this->product_model->get_all_category();
		$f_data = $this->frontend_model->get_slider_home_page_list();
		$secondsection = $this->frontend_model->get_home_secondsection_list();
				if($this->input->post()) { 
					
					$ctn = 1;
					//print_r($_POST['slid_id']); die;
					foreach($_POST['slid_id'] as $SID){ 
					
						  $FullPath =  DOCUMENT_ROOT.'assets/images/slider';
							if (!file_exists($FullPath)) {
								mkdir($FullPath, 0777, true);
							}
							$FullPathThumb = DOCUMENT_ROOT.'assets/images/slider/thumb/';
							if (!file_exists($FullPathThumb)) {
								mkdir($FullPathThumb, 0777, true);
							} 
							if(isset($_FILES['img_'.$ctn]['name']) && !empty($_FILES['img_'.$ctn]['name'])){
								
								
									 $prd_img = $_FILES['img_'.$ctn]['name'];
									if($prd_img!=''){ 
										$sliderss = explode('.',$prd_img);
										//print_r($sliderss); die;
										$productimages = time().'img_'.$ctn.$sliderss[0].".".$sliderss[1];


										$target = $FullPath.'/'.$productimages;
										if(move_uploaded_file($_FILES['img_'.$ctn]['tmp_name'], $target)){

										$image_path = $productimages;
										$config['image_library'] = 'gd2';
										$config['source_image'] = DOCUMENT_ROOT.'assets/images/slider/'.$productimages;
										$config['create_thumb'] = TRUE;
										$config['maintain_ratio'] = False;
										$config['height'] = 200;
										$config['width'] = 300;
										$config['new_image'] = DOCUMENT_ROOT.'assets/images/slider/thumb/'.$productimages;
										$this->image_lib->initialize($config);
										$this->image_lib->resize();
										
										
									}
								
								
							}else{
								$productimages = $_POST['oldslide_'.$ctn];
							}
								$data = array( 
									"slide"=>$productimages
										 
									);	
								
								$update_category = $this->frontend_model->update_home_slides($data,$SID);

								} 
						 
						
						$ctn++;
						
					} 
					redirect(base_url().'frontend/frontend_slider_home', 'refresh');
				}
		$isSuccess='';
		
		$sendData = array('frontend_slider_data'=>$f_data,'category_data'=>$category_data,'isSuccess'=>$isSuccess);
		self::slicing('edit_home_slider',$sendData);
	}
	public function edit_homesecondsection(){
		IsAdminActive();
		//$id=intval(preg_replace('/[^0-9]+/', '', $id));
		$category_data = $this->product_model->get_all_category();
		
		$f_data = $this->frontend_model->get_home_secondsection_list();
				if($this->input->post()) { 
					
					$ctn = 1;
					//print_r($_POST['slid_id']); die;
					foreach($_POST['slid_id'] as $SID){ 
					
						  $FullPath =  DOCUMENT_ROOT.'assets/images/slider';
							if (!file_exists($FullPath)) {
								mkdir($FullPath, 0777, true);
							}
							$FullPathThumb = DOCUMENT_ROOT.'assets/images/slider/thumb/';
							if (!file_exists($FullPathThumb)) {
								mkdir($FullPathThumb, 0777, true);
							} 
							if(isset($_FILES['img_'.$ctn]['name']) && !empty($_FILES['img_'.$ctn]['name'])){
								
								
									 $prd_img = $_FILES['img_'.$ctn]['name'];
									if($prd_img!=''){ 
										$sliderss = explode('.',$prd_img);
										//print_r($sliderss); die;
										$productimages = time().'img_'.$ctn.$sliderss[0].".".$sliderss[1];


										$target = $FullPath.'/'.$productimages;
										if(move_uploaded_file($_FILES['img_'.$ctn]['tmp_name'], $target)){

										$image_path = $productimages;
										$config['image_library'] = 'gd2';
										$config['source_image'] = DOCUMENT_ROOT.'assets/images/slider/'.$productimages;
										$config['create_thumb'] = TRUE;
										$config['maintain_ratio'] = False;
										$config['height'] = 200;
										$config['width'] = 300;
										$config['new_image'] = DOCUMENT_ROOT.'assets/images/slider/thumb/'.$productimages;
										$this->image_lib->initialize($config);
										$this->image_lib->resize();
										
										
									}
								
								
							}else{
								$productimages = $_POST['oldslide_'.$ctn];
							}
								$data = array( 
									"slide"=>$productimages
										 
									);	
								
								$update_category = $this->frontend_model->update_home_secondsection($data,$SID);

								} 
						 
						
						$ctn++;
						
					} 
					redirect(base_url().'frontend/frontend_slider_home', 'refresh');
				}
		$isSuccess='';
		
		$sendData = array('frontend_slider_data'=>$f_data,'category_data'=>$category_data,'isSuccess'=>$isSuccess);
		self::slicing('edit_homesecondsection_slider',$sendData);
	}public function edit_homethirdsection(){
		IsAdminActive();
		//$id=intval(preg_replace('/[^0-9]+/', '', $id));
		$category_data = $this->product_model->get_all_category();
		
		$f_data = $this->frontend_model->get_home_thirdsection_list();
				if($this->input->post()) { 
					
					$ctn = 1;
					//print_r($_POST['slid_id']); die;
					foreach($_POST['slid_id'] as $SID){ 
					
						  $FullPath =  DOCUMENT_ROOT.'assets/images/slider';
							if (!file_exists($FullPath)) {
								mkdir($FullPath, 0777, true);
							}
							$FullPathThumb = DOCUMENT_ROOT.'assets/images/slider/thumb/';
							if (!file_exists($FullPathThumb)) {
								mkdir($FullPathThumb, 0777, true);
							} 
							if(isset($_FILES['img_'.$ctn]['name']) && !empty($_FILES['img_'.$ctn]['name'])){
								
								
									 $prd_img = $_FILES['img_'.$ctn]['name'];
									if($prd_img!=''){ 
										$sliderss = explode('.',$prd_img);
										//print_r($sliderss); die;
										$productimages = time().'img_'.$ctn.$sliderss[0].".".$sliderss[1];


										$target = $FullPath.'/'.$productimages;
										if(move_uploaded_file($_FILES['img_'.$ctn]['tmp_name'], $target)){

										$image_path = $productimages;
										$config['image_library'] = 'gd2';
										$config['source_image'] = DOCUMENT_ROOT.'assets/images/slider/'.$productimages;
										$config['create_thumb'] = TRUE;
										$config['maintain_ratio'] = False;
										$config['height'] = 200;
										$config['width'] = 300;
										$config['new_image'] = DOCUMENT_ROOT.'assets/images/slider/thumb/'.$productimages;
										$this->image_lib->initialize($config);
										$this->image_lib->resize();
										
										
									}
								
								
							}else{
								$productimages = $_POST['oldslide_'.$ctn];
							}
								$data = array( 
									"slide"=>$productimages
										 
									);	
								
								$update_category = $this->frontend_model->update_home_thirdsection($data,$SID);

								} 
						 
						
						$ctn++;
						
					} 
					redirect(base_url().'frontend/frontend_slider_home', 'refresh');
				}
		$isSuccess='';
		
		$sendData = array('frontend_slider_data'=>$f_data,'category_data'=>$category_data,'isSuccess'=>$isSuccess);
		self::slicing('edit_homethirdsection_slider',$sendData);
	}
	//load second_adv list view
	public function second_adv(){
		IsAdminActive();
		
		$f_data = $this->frontend_model->get_adverties_list();
		
		$isSuccess='';
		$sendData = array('frontend_adverties_data'=>$f_data,'isSuccess'=>$isSuccess);
		self::slicing('second_adv',$sendData);
	}
	//load third_adv list view
	public function third_adv(){
		IsAdminActive();
		
		$f_data = $this->frontend_model->get_third_adv_list();
		$isSuccess='';
		$sendData = array('frontend_adverties_data'=>$f_data,'isSuccess'=>$isSuccess);
		self::slicing('third_adv',$sendData);
	}//load forth_adv list view
	public function forth_adv(){
		IsAdminActive();
		
		$f_data = $this->frontend_model->get_fourth_adv_list();
		$isSuccess='';
		$sendData = array('frontend_adverties_data'=>$f_data,'isSuccess'=>$isSuccess);
		self::slicing('forth_adv',$sendData);
	}//load banner_adv list view
	public function banner_adv(){
		IsAdminActive();
		
		$f_data = $this->frontend_model->get_banner_adv_list();
		$isSuccess='';
		$sendData = array('frontend_adverties_data'=>$f_data,'isSuccess'=>$isSuccess);
		self::slicing('banner_adv',$sendData);
	}
	public function edit_slider($id){
		IsAdminActive();
		$id=intval(preg_replace('/[^0-9]+/', '', $id));
		
		if($this->input->post()) { 
			$ctn = 1;
			foreach($_POST['slide_id'] as $SID){ 
			//echo '<pre>';
				 //print_r($_FILES);
				  $FullPath =  DOCUMENT_ROOT.'assets/images/slider';
					if (!file_exists($FullPath)) {
						mkdir($FullPath, 0777, true);
					}
					$FullPathThumb = DOCUMENT_ROOT.'assets/images/slider/thumb/';
					if (!file_exists($FullPathThumb)) {
						mkdir($FullPathThumb, 0777, true);
					} 
					if(isset($_FILES['img_'.$ctn]['name']) && !empty($_FILES['img_'.$ctn]['name'])){
						
						
							 $prd_img = $_FILES['img_'.$ctn]['name'];
							if($prd_img!=''){ 
								$sliderss = explode('.',$prd_img);
								//print_r($sliderss); die;
								$productimages = time().'img_'.$ctn.$sliderss[0].".".$sliderss[1];


								$target = $FullPath.'/'.$productimages;
								if(move_uploaded_file($_FILES['img_'.$ctn]['tmp_name'], $target)){

								$image_path = $productimages;
								$config['image_library'] = 'gd2';
								$config['source_image'] = DOCUMENT_ROOT.'assets/images/slider/'.$productimages;
								$config['create_thumb'] = TRUE;
								$config['maintain_ratio'] = False;
								$config['height'] = 200;
								$config['width'] = 300;
								$config['new_image'] = DOCUMENT_ROOT.'assets/images/slider/thumb/'.$productimages;
								$this->image_lib->initialize($config);
								$this->image_lib->resize();
								
								
							}
						
						
					}else{
						$productimages = $_POST['oldslide_'.$ctn];
					}
						$data = array( 
							"slide_image"=>$productimages
								 
							);	
						$update_category = $this->frontend_model->update_slides($data,$SID);

						} 
				 
				
				$ctn++;
			}
			redirect(base_url().'frontend/frontend_slider', 'refresh');
		}
		 
		 
		
		$f_data = $this->frontend_model->get_slides_list_by_id($id);
		
		$isSuccess='';
		$sendData = array('frontend_slider_data'=>$f_data,'isSuccess'=>$isSuccess);
		self::slicing('edit_frontend_slider',$sendData);
	}
	public function edit_third_adv($id){
		IsAdminActive();
		$id=intval(preg_replace('/[^0-9]+/', '', $id));
		
		if($this->input->post()) { 
			$ctn = 1;
			foreach($_POST['slide_id'] as $SID){ 
			//echo '<pre>';
				 //print_r($_FILES);
				  $FullPath =  DOCUMENT_ROOT.'assets/images/slider';
					if (!file_exists($FullPath)) {
						mkdir($FullPath, 0777, true);
					}
					$FullPathThumb = DOCUMENT_ROOT.'assets/images/slider/thumb/';
					if (!file_exists($FullPathThumb)) {
						mkdir($FullPathThumb, 0777, true);
					} 
					if(isset($_FILES['img_'.$ctn]['name']) && !empty($_FILES['img_'.$ctn]['name'])){
						
						
							 $prd_img = $_FILES['img_'.$ctn]['name'];
							if($prd_img!=''){ 
								$sliderss = explode('.',$prd_img);
								//print_r($sliderss); die;
								$productimages = time().'img_'.$ctn.$sliderss[0].".".$sliderss[1];


								$target = $FullPath.'/'.$productimages;
								if(move_uploaded_file($_FILES['img_'.$ctn]['tmp_name'], $target)){

								$image_path = $productimages;
								$config['image_library'] = 'gd2';
								$config['source_image'] = DOCUMENT_ROOT.'assets/images/slider/'.$productimages;
								$config['create_thumb'] = TRUE;
								$config['maintain_ratio'] = False;
								$config['height'] = 200;
								$config['width'] = 300;
								$config['new_image'] = DOCUMENT_ROOT.'assets/images/slider/thumb/'.$productimages;
								$this->image_lib->initialize($config);
								$this->image_lib->resize();
								
								
							}
						
						
					}else{
						$productimages = $_POST['oldslide_'.$ctn];
					}
						$data = array( 
							"sec_advrt_baner_image"=>$productimages
								 
							);	
						$update_category = $this->frontend_model->update_third_advrt_baner($data,$SID);
						} 
				 
				
				$ctn++;
			}
			redirect(base_url().'frontend/third_adv', 'refresh');
		}
		 
		 
		
		$f_data = $this->frontend_model->get_third_adv_baner_list_by_id($id);
		
		$isSuccess='';
		$sendData = array('frontend_slider_data'=>$f_data,'isSuccess'=>$isSuccess);
		self::slicing('edit_third_adv',$sendData);
	}
	public function edit_third_adverties($id){
		IsAdminActive();
		$id=intval(preg_replace('/[^0-9]+/', '', $id));
		
		if($this->input->post()) { 
			$ctn = 1;
			foreach($_POST['slide_id'] as $SID){ 
			//echo '<pre>';
				 //print_r($_FILES);
				  $FullPath =  DOCUMENT_ROOT.'assets/images/slider';
					if (!file_exists($FullPath)) {
						mkdir($FullPath, 0777, true);
					}
					$FullPathThumb = DOCUMENT_ROOT.'assets/images/slider/thumb/';
					if (!file_exists($FullPathThumb)) {
						mkdir($FullPathThumb, 0777, true);
					} 
					if(isset($_FILES['img_'.$ctn]['name']) && !empty($_FILES['img_'.$ctn]['name'])){
						
						
							 $prd_img = $_FILES['img_'.$ctn]['name'];
							if($prd_img!=''){ 
								$sliderss = explode('.',$prd_img);
								//print_r($sliderss); die;
								$productimages = time().'img_'.$ctn.$sliderss[0].".".$sliderss[1];


								$target = $FullPath.'/'.$productimages;
								if(move_uploaded_file($_FILES['img_'.$ctn]['tmp_name'], $target)){

								$image_path = $productimages;
								$config['image_library'] = 'gd2';
								$config['source_image'] = DOCUMENT_ROOT.'assets/images/slider/'.$productimages;
								$config['create_thumb'] = TRUE;
								$config['maintain_ratio'] = False;
								$config['height'] = 200;
								$config['width'] = 300;
								$config['new_image'] = DOCUMENT_ROOT.'assets/images/slider/thumb/'.$productimages;
								$this->image_lib->initialize($config);
								$this->image_lib->resize();
								
								
							}
						
						
					}else{
						$productimages = $_POST['oldslide_'.$ctn];
					}
						$data = array( 
							"sec_advrt_baner_image"=>$productimages
								 
							);	
						$update_category = $this->frontend_model->update_sec_advrt_baner($data,$SID);
						} 
				 
				
				$ctn++;
			}
			redirect(base_url().'frontend/edit_third_adv', 'refresh');
		}
		 
		 
		
		$f_data = $this->frontend_model->get_third_adv_baner_list_by_id($id);
		
		$isSuccess='';
		$sendData = array('frontend_slider_data'=>$f_data,'isSuccess'=>$isSuccess);
		self::slicing('edit_third_adv',$sendData);
	}
public function edit_fourth_adv($id){
		IsAdminActive();
		$id=intval(preg_replace('/[^0-9]+/', '', $id));
		
		if($this->input->post()) { 
			$ctn = 1;
			foreach($_POST['slide_id'] as $SID){ 
			//echo '<pre>';
				 //print_r($_FILES);
				  $FullPath =  DOCUMENT_ROOT.'assets/images/slider';
					if (!file_exists($FullPath)) {
						mkdir($FullPath, 0777, true);
					}
					$FullPathThumb = DOCUMENT_ROOT.'assets/images/slider/thumb/';
					if (!file_exists($FullPathThumb)) {
						mkdir($FullPathThumb, 0777, true);
					} 
					if(isset($_FILES['img_'.$ctn]['name']) && !empty($_FILES['img_'.$ctn]['name'])){
						
						
							 $prd_img = $_FILES['img_'.$ctn]['name'];
							if($prd_img!=''){ 
								$sliderss = explode('.',$prd_img);
								//print_r($sliderss); die;
								$productimages = time().'img_'.$ctn.$sliderss[0].".".$sliderss[1];


								$target = $FullPath.'/'.$productimages;
								if(move_uploaded_file($_FILES['img_'.$ctn]['tmp_name'], $target)){

								$image_path = $productimages;
								$config['image_library'] = 'gd2';
								$config['source_image'] = DOCUMENT_ROOT.'assets/images/slider/'.$productimages;
								$config['create_thumb'] = TRUE;
								$config['maintain_ratio'] = False;
								$config['height'] = 200;
								$config['width'] = 300;
								$config['new_image'] = DOCUMENT_ROOT.'assets/images/slider/thumb/'.$productimages;
								$this->image_lib->initialize($config);
								$this->image_lib->resize();
								
								
							}
						
						
					}else{
						$productimages = $_POST['oldslide_'.$ctn];
					}
						$data = array( 
							"sec_advrt_baner_image"=>$productimages
								 
							);	
						$update_category = $this->frontend_model->update_fourth_advrt_baner($data,$SID);
						} 
				 
				
				$ctn++;
			}
			redirect(base_url().'frontend/forth_adv', 'refresh');
		}
		 
		 
		
		$f_data = $this->frontend_model->get_fourth_adv_baner_list_by_id($id);
		
		$isSuccess='';
		$sendData = array('frontend_slider_data'=>$f_data,'isSuccess'=>$isSuccess);
		self::slicing('edit_forth_adv',$sendData);
	}
	public function edit_banner_adv($id){
		IsAdminActive();
		$id=intval(preg_replace('/[^0-9]+/', '', $id));
		
		if($this->input->post()) { 
			$ctn = 1;
			foreach($_POST['slide_id'] as $SID){ 
			//echo '<pre>';
				 //print_r($_FILES);
				  $FullPath =  DOCUMENT_ROOT.'assets/images/slider';
					if (!file_exists($FullPath)) {
						mkdir($FullPath, 0777, true);
					}
					$FullPathThumb = DOCUMENT_ROOT.'assets/images/slider/thumb/';
					if (!file_exists($FullPathThumb)) {
						mkdir($FullPathThumb, 0777, true);
					} 
					if(isset($_FILES['img_'.$ctn]['name']) && !empty($_FILES['img_'.$ctn]['name'])){
						
						
							 $prd_img = $_FILES['img_'.$ctn]['name'];
							if($prd_img!=''){ 
								$sliderss = explode('.',$prd_img);
								//print_r($sliderss); die;
								$productimages = time().'img_'.$ctn.$sliderss[0].".".$sliderss[1];


								$target = $FullPath.'/'.$productimages;
								if(move_uploaded_file($_FILES['img_'.$ctn]['tmp_name'], $target)){

								$image_path = $productimages;
								$config['image_library'] = 'gd2';
								$config['source_image'] = DOCUMENT_ROOT.'assets/images/slider/'.$productimages;
								$config['create_thumb'] = TRUE;
								$config['maintain_ratio'] = False;
								$config['height'] = 200;
								$config['width'] = 300;
								$config['new_image'] = DOCUMENT_ROOT.'assets/images/slider/thumb/'.$productimages;
								$this->image_lib->initialize($config);
								$this->image_lib->resize();
								
								
							}
						
						
					}else{
						$productimages = $_POST['oldslide_'.$ctn];
					}
						$data = array( 
							"sec_advrt_baner_image"=>$productimages
								 
							);	
						$update_category = $this->frontend_model->update_banner_advrt_baner($data,$SID);
						} 
				 
				
				$ctn++;
			}
			redirect(base_url().'frontend/banner_adv', 'refresh');
		}
		 
		 
		
		$f_data = $this->frontend_model->get_banner_adv_baner_list_by_id($id);
		
		$isSuccess='';
		$sendData = array('frontend_slider_data'=>$f_data,'isSuccess'=>$isSuccess);
		self::slicing('edit_banner_adv',$sendData);
	}
    function slicing($viewTemp,$sendArray)
    {
		$this->load->view('superadmin/master/header');
		$this->load->view('superadmin/'.$viewTemp,$sendArray);
		$this->load->view('superadmin/master/left');
		$this->load->view('superadmin/master/footer');
	}
}

?>
