<?php /**
 * 
 */
class AjaxController extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_book_by_languages()
	{
		$post = $this->input->post();
		$this->db->where($post);
		$ebooks = $this->db->get("ebooks")->result_array();
		?>
			<?php if(!empty($ebooks)): ?>
                <?php foreach($ebooks as $ebook): ?>
                    <div class="col-md-4">
                    	<a target="_blank" href="<?= base_url('my-account/ebooks/download/'.urlencode(base64_encode($ebook['ebook_file']))); ?>" class="nav-link text-dark">
	                        <div class="card">
	                            <div class="card-body">
	                                <span class="circlex">
	                                    <i class="fas fa-file-pdf fa-2x text-danger"></i>
	                                </span> <span class="badge badge-success"><?= $ebook['language']; ?></span><br>
	                                <span class="tx-16"><b><?= $ebook['book_title']; ?></b></span>
	                            </div>
	                        </div>
	                    </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
		<?php
	}

	public function get_durations()
	{
		$intrvl = $this->input->post("intrvl");
		if($intrvl == "D")
		{
			for ($i=1; $i < 91; $i++) { 
				echo "<option value='".$i."'>".$i." Days</option>";
			}
		}
		elseif($intrvl == "W")
		{
			for ($i=1; $i < 53; $i++) { 
				echo "<option value='".$i."'>".$i." Weeks</option>";
			}
		}
		elseif($intrvl == "M")
		{
			for ($i=1; $i < 12; $i++) { 
				echo "<option value='".$i."'>".$i." Months</option>";
			}
		}
		elseif($intrvl == "Y")
		{
			for ($i=1; $i < 6; $i++) { 
				echo "<option value='".$i."'>".$i." Years</option>";
			}
		}
		else
		{
			echo "<option value=''>Select</option>";
		}
	}
}