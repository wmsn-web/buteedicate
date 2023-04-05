<?php /**
 * 
 */
class Test_video extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$sess_id = uniqid();

		$this->session->userdata("setToken",true);
		$token = "aa.mp4";
		$token_encrypted = base64_encode($token.'__'.$sess_id);
		$data['vid'] = $token_encrypted;
		$this->load->view("Test_video",$data); 
	}

	public function play($token)
	{
		$token = base64_decode($token);
		$tokx = explode("__", $token);
		$tok = $tokx[0];
		$folder = "video/";
		if(file_exists($folder.$tok))
		{
		  

		  $file = $folder.$tok;
		  $file_size = filesize($file);
		  $file_pointer = fopen($file, "rb");
		  $data = fread($file_pointer, $file_size);
		  header("Content-type: video/mp4");

		  echo "https://filedn.eu/lueLaT5iuWB7k49NhPqY6n7/aa.mp4";
		  ?>
		  <!--video width="320" height="240" controls="">
			  <source src="<?= $file; ?>">
			</source></video-->
		  <?php
		}
		else {
		  echo "Error: File Does not exists";
		}
	}
}