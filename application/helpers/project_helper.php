<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('generateToken'))
{
    function generateToken()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

        // 32 bits for "time_low"
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),

        // 16 bits for "time_mid"
        mt_rand(0, 0xffff),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand(0, 0x0fff) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand(0, 0x3fff) | 0x8000,

        // 48 bits for "node"
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}

if ( ! function_exists('genrateOTP'))
{
    function genrateOTP($length = 5, $chars = '1234567890')
    {
        $chars_length = (strlen($chars) - 1);
        $string = $chars{rand(0, $chars_length)};
        for ($i = 1; $i < $length; $i = strlen($string))
        {
        $r = $chars{rand(0, $chars_length)};
        if ($r != $string{$i - 1}) $string .= $r;
        }
        return $string;
    }
}

if ( ! function_exists('replaceMsg'))
{
    function replaceMsg($msg,$replacements)
    {
        $patterns = '#';
        return str_replace($patterns, $replacements, $msg);
    }
}


if ( ! function_exists('removeNull'))
{
    function removeNull($postData)
    {
        $pdData = array();
        foreach($postData as $key=>$value) {
            if($value != 'null') {
                $pdData[$key] = $value;
            }
        }
        return $pdData;
    }
}
function myfunction($products,$value)
{
   for($i=0;$i<count($products);$i++)
   {
	   if(strtolower($value) == strtolower($products[$i]['subject_name'])){
         return $i;
  	  }else{
   		return false;
      }
	}
}
if ( ! function_exists('uploadImage'))
{
    function uploadImage($BMPstring,$fileUploadPath)
    {
        $base = $BMPstring;
        $ext = 'jpg';
        $destPath = $_SERVER['DOCUMENT_ROOT']."/".$fileUploadPath;
        $fileName = "image_".rand().".".$ext;
        $fullpath = $destPath.$fileName;
        $binary = base64_decode($base);
        header('Content-Type: bitmap; charset=utf-8');
        $file = fopen($fullpath, 'wb');
        fwrite($file, $binary);
        fclose($file);
        return $getArray = array('FileName'=> $fileName);
    }
}


if ( ! function_exists('uploadProImage'))
{
    function uploadProImage($BMPstring,$fileUploadPath,$id)
    {
        $base = $BMPstring;
        $ext = 'jpg';
        $destPath = $_SERVER['DOCUMENT_ROOT']."/".$fileUploadPath;
        $fileName = "image_".$id.".".$ext;
        $fullpath = $destPath.$fileName;
        $binary = base64_decode($base);
        header('Content-Type: bitmap; charset=utf-8');
        $file = fopen($fullpath, 'wb');
        fwrite($file, $binary);
        fclose($file);
        return $getArray = array('FileName'=> $fileName);
    }
}

if ( ! function_exists('generatePassword'))
{
    function generatePassword() {
        $alphabet = '13f3a84ddeef55f3d4b6691833c6563c';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}
//to get week from current date
function x_week_range($date) {
		$ts = strtotime($date);
		$start = (date('w', $ts) == 0) ? $ts : strtotime('last monday', $ts);
		return array(date('Y-m-d', $start),
					 date('Y-m-d', strtotime('next saturday', $start)));
	}
if ( ! function_exists('IsAdminActive'))
{  
	function IsAdminActive() { 
		$CI = & get_instance(); //get instance, access the CI superobject
		$isLoggedIn = $CI->session->userdata('super_admin_logged_in');
		
		if($isLoggedIn && isset($CI->session->userdata('super_admin_logged_in')['SUPER_ADMIN_SESS_ID'])) { 
			return TRUE;
		}
		redirect(base_url().'login', 'refresh');
	}
}
if ( ! function_exists('IsOnlyParentActive'))
{
	function IsOnlyParentActive() {
		$CI = & get_instance(); //get instance, access the CI superobject
		$isLoggedIn = $CI->session->userdata('parent_logged_in');
		if($isLoggedIn) {
			return TRUE;
		}
		redirect(base_url().'parent_login', 'refresh');
	}
}
if ( ! function_exists('multi_in_array'))
{
	function multi_in_array($value, $array){
		foreach ($array AS $item)
		{

			if (!is_array($item))
			{
				//echo $item;
				if ($item == $value)
				{
					return true;
				}
				continue;
			}

			if (in_array($value, $item))
			{
				return true;
			}
			else if (multi_in_array($value, $item))
			{
				return true;
			}
		}
		return false;
	}
}
function search_in_array($srchvalue,$search_in, $array)
{
   //echo count($array);
	for($i=0;$i<count($array);$i++){
	   if($srchvalue == $array[$i][$search_in]){
			return $i;
		}else{
			return '00';
		}
   }
}
if ( ! function_exists('pre'))
{
	function pre($arr,$e=0) {
		echo "<pre>";print_r($arr);echo "</pre>";
		if($e == 1) { exit; }
	}
}

if ( ! function_exists('br'))
{
	function br() {
		echo "<br />";
	}
}

//get all the dates from week number and year
function getWeekDays($week, $year) {
	$weekdays = array();
	$dto = new DateTime();
	for($i=1; $i<7; $i++)
    {
		$weekdays[] = $dto->setISODate($year, $week, $i)->format('Y-m-d');
	}
	return $weekdays;
}
function getNumberByRoman($roman){
	$romans = array(
		'M' => 1000,
		'CM' => 900,
		'D' => 500,
		'CD' => 400,
		'C' => 100,
		'XC' => 90,
		'L' => 50,
		'XL' => 40,
		'X' => 10,
		'IX' => 9,
		'V' => 5,
		'IV' => 4,
		'I' => 1,
	);

	$result = 0;
	foreach ($romans as $key => $value) {
		while (strpos($roman, $key) === 0) {
			$result += $value;
			$roman = substr($roman, strlen($key));
		}
	}
	return $result;
}


/**
 * Copy a whole Directory
 *
 * Copy a directory recrusively ( all file and directories inside it )
 *
 * @access    public
 * @param    string    path to source dir
 * @param    string    path to destination dir
 * @return    array
 */
if(!function_exists('directory_copy'))
{
    function directory_copy($srcdir, $dstdir)
    {

        //preparing the paths
        $srcdir=rtrim($srcdir,'/');
        $dstdir=rtrim($dstdir,'/');

        //creating the destination directory
        if(!is_dir($dstdir))mkdir($dstdir, 0775, true);

        //Mapping the directory
        $dir_map=directory_map($srcdir); //pre($dir_map,1);
		$owner_name = get_current_user();
        foreach($dir_map as $object_key=>$object_value)
        {
            if(is_numeric($object_key)) {
                //echo 'numeric >> '.$object_key.' >> '.fileowner($srcdir.'/'.$object_value);
				copy($srcdir.'/'.$object_value,$dstdir.'/'.$object_value);//This is a File not a directory
				//chown($dstdir.'/'.$object_value,$owner_name);

			}
            else{
				//echo 'directory >> '.$object_key.' >> '.fileowner($srcdir.'/'.$object_key);

                directory_copy($srcdir.'/'.$object_key,$dstdir.'/'.$object_key);//this is a directory
				//chown($dstdir.'/'.$object_key,$owner_name);

			}

			//$stat = stat($dstdir.'/'.$object_key);
			//print_r(posix_getpwuid($stat['uid']));


        }

		return 1;
    }
}
?>
