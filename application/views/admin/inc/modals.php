
 <div class="modal fade" id="edtCatForm" role="dialog">
    <div class="modal-dialog modal-md">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Condition Category</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>          
        </div>
        <div class="modal-body">
          <div id="condCat"></div>
        </div>
      </div>
    </div>
 </div>

 <div class="modal fade" id="edtUserForm" role="dialog">
    <div class="modal-dialog modal-md">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <a href="">
            <button type="button" class="close">&times;</button>
          </a>       
        </div>
        <div class="modal-body">
          <div id="profUser"></div>
        </div>
      </div>
    </div>
 </div>

 <div class="modal fade" id="ordTest" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Test Details</h4>
          <a href="">
            <button type="button" class="close">&times;</button>
          </a>          
        </div>
        <div class="modal-body">
          <div id="tsts"></div>
        </div>
      </div>
    </div>
 </div>
 <div class="modal fade" id="ordTrans" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Transaction Details</h4>
          <a href="">
            <button type="button" class="close">&times;</button>
          </a>          
        </div>
        <div class="modal-body">
          <div id="trans">
            
          </div>
        </div>
      </div>
    </div>
 </div>

 <div class="modal fade" id="EdtDskLnk" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Community Access</h4>
          <a href="">
            <button type="button" class="close">&times;</button>
          </a>          
        </div>
        <div class="modal-body">
          <div id="edtFormDsk">
            
          </div>
        </div>
      </div>
    </div>
 </div>

 <div class="modal fade" id="meetModal" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Online Meeting</h4>
          <a href="">
            <button type="button" class="close">&times;</button>
          </a>          
        </div>
        <div class="modal-body">
          <div id="mtLinkForm">
            
          </div>
        </div>
      </div>
    </div>
 </div>

 <div class="modal fade" id="dscrModal" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Discord Invite request</h4>
          <a href="">
            <button type="button" class="close">&times;</button>
          </a>          
        </div>
        <div class="modal-body">
          <div id="dscrLnkFrm">
            
          </div>
        </div>
      </div>
    </div>
 </div>

 <div class="modal fade" id="AddVideo" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Video links</h4>
          <a href="">
            <button type="button" class="close">&times;</button>
          </a>          
        </div>
        <div class="modal-body">
          <form action="<?= base_url('auth/admin/Add_contents/add_video_link'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Upload Thumbnail</label>
              <input type="file" name="thumbnail" class="form-control">
            </div>
            <div class="form-group">
              <label>Video Title</label>
              <input type="text" name="video_title" class="form-control">
            </div>
            <div class="form-group">
              <label>Video Type</label>
              <select name="video_type" class="form-control">
                <option value="daily">Daily videos</option>
                <option value="weekly">Weekly videos</option>
                <option value="webinar">Webinar</option>
              </select>
            </div>
            <div class="form-group">
              <label>Video Link</label>
              <input type="text" name="vid_file" class="form-control">
            </div>
            <div class="form-group">
              <input type="hidden" name="prod_id" id="ProdIds">
              <button class="btn btn-primary">Save Link</button>
            </div>
          </form>
        </div>
      </div>
    </div>
 </div>

 