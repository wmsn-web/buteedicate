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
		$duration = $this->input->post("duration");
		if($intrvl == "D")
		{
			for ($i=1; $i < 91; $i++) { 
				if($duration == $i){$sl = "selected";}else{$sl="";}
				echo "<option ".$sl." value='".$i."'>".$i." Days</option>";
			}
		}
		elseif($intrvl == "W")
		{
			for ($i=1; $i < 53; $i++) { 
				if($duration == $i){$sl = "selected";}else{$sl="";}
				echo "<option ".$sl." value='".$i."'>".$i." Weeks</option>";
			}
		}
		elseif($intrvl == "M")
		{
			for ($i=1; $i < 12; $i++) { 
				if($duration == $i){$sl = "selected";}else{$sl="";}
				echo "<option ".$sl." value='".$i."'>".$i." Months</option>";
			}
		}
		elseif($intrvl == "Y")
		{
			for ($i=1; $i < 6; $i++) {
			if($duration == $i){$sl = "selected";}else{$sl="";} 
				echo "<option ".$sl." value='".$i."'>".$i." Years</option>";
			}
		}
		else
		{
			echo "<option value=''>Select</option>";
		}
	}

	public function get_folder_videos()
	{
		$data = $this->input->post();
		$this->db->order_by("id","ASC");
		$this->db->where($data);
		$get = $this->db->get("videos")->result_array();
		?>
			<?php if(empty($get)): ?>
				<h5>Video does not Exists</h5>
			<?php else: ?>
				<div class="col-md-12">
					<h5><?= $this->sw_vid_type($data['video_type']); ?></h5>
				</div>
				<?php foreach($get as $key): ?>
					<div class="col-md-3 mt-2">
						<a target="_blank" href="<?= base_url('my-account/course-videos/play/'.urlencode($key['vid_slug'])); ?>">
	                        <div class="vid_box_sm">
	                            <img src="<?= base_url('uploads/vid_thumb/'.$key['thumbnail']); ?>">
	                            <span class="play_btn"><i class="fas fa-play"></i> </span>
	                            <span class="vid_ttl"><?= $key['video_title']; ?></span>
	                        </div>
	                    </a>
                    </div>
				<?php endforeach; ?>
			<?php endif; ?>
		<?php
	}

	public function get_folder_plan_videos()
	{
		$data = $this->input->post();
		$this->db->order_by("id","ASC");
		$this->db->where($data);
		$get = $this->db->get("videos")->result_array();
		?>
			<?php if(empty($get)): ?>
				<h5>Video does not Exists</h5>
			<?php else: ?>
				<div class="col-md-12">
					<h5><?= $this->sw_vid_type($data['video_type']); ?></h5>
				</div>
				<?php foreach($get as $key): ?>
					<div class="col-md-3 mt-2">
						<a target="_blank" href="<?= base_url('my-account/premium-videos/play/'.urlencode($key['vid_slug'])); ?>">
	                        <div class="vid_box_sm">
	                            <img src="<?= base_url('uploads/vid_thumb/'.$key['thumbnail']); ?>">
	                            <span class="play_btn"><i class="fas fa-play"></i> </span>
	                            <span class="vid_ttl"><?= $key['video_title']; ?></span>
	                        </div>
	                    </a>
                    </div>
				<?php endforeach; ?>
			<?php endif; ?>
		<?php
	}

	public function sw_vid_type($type)
	{
		switch ($type) {
			case 'daily':
				return "Daily Videos";
				break;
			case 'weekly':
				return "Weekly Videos";
				break;
			case 'webinar':
				return "Webinar Videos";
				break;
			
			default:
				return "";
				break;
		}
	}
}