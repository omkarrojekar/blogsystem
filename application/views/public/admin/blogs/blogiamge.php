<?php $name = $this->session->userdata('username'); ?>
<div class="container-fluid" style="background: #5fbeaa;">
        <div class="container">
            <h2 class="text-center">New Blog</h2>
            <hr>
               <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h2 class="m-t-0 header-title text-center"><b>New Blog</b></h2>
                                    <a href="<?php echo base_url(); ?>admin" class="btn btn-warning">Dashboard</a>
                                    <h5>Posting by <?php echo $name; ?></h5>
                                    <hr>

                                            <div class="p-20">
                                                <form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>blogs/uploadimage" enctype="multipart/form-data">
                                         
                                                         <!--IMAGE-->
                                                      <div class="col-xl-12">
                                                          <div class="form-group row">
                                                            <label class="col-lg-2 col-sm-12 col-form-label">Upload Image:</label>
                                                            <div class="col-lg-10 col-sm-12">
                                                                <input type="file" class="form-control" id="file" name="file" value="<?php echo set_value('file'); ?>" onchange="showImage.call(this);">
                                                                (only .jpg, .jpeg, .png images maximun size 200KB)
                                                                <h6 id="preview"></h6>
                                                                <img src="" alt="" class="img img-responsive img-thumbnail" id="image"  title="Image Preview" onchange="showImage.call(this);">
                                                            </div>
                                                          </div>
                                                      </div>

                                                    <div class="form-group row">
                                                        <div class="col-4">
                                                            <input type="submit" class="btn btn-info" value="Upload">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                </div> <!-- end card-box -->
                        </div><!-- end col -->
                </div>
        </div>
</div>

<script type="text/javascript">
  function showImage()
  {
    if(this.files && this.files[0])
    {
      var obj = new FileReader();
      obj.onload = function(data)
      {
        var image = document.getElementById("image");
        var title = document.getElementById("preview");
        title.innerHTML = "Cover Image Preview";
        image.src = data.target.result;
        image.style.display = "block";
      }
      obj.readAsDataURL(this.files[0]);
    }
  }
</script>