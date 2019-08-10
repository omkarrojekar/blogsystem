<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<?php $name = $this->session->userdata('username'); ?>
<div class="container-fluid" style="background: #5fbeaa;">
  <?php foreach ($getSingleBlog as $row): ?>
        <div class="container">
            <h2 class="text-center">Edit Blog</h2>
            <hr>
               <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                <?php if ($this->session->flashdata('image_updated')): ?>
                                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('image_updated').'</p>'; ?>
                                <?php endif; ?>   


                                    <h2 class="m-t-0 header-title text-center"><b>Edit Blog</b></h2>
                                    <a href="<?php echo base_url(); ?>admin" class="btn btn-warning">Dashboard</a>
                                    <h5>Posted by <?php echo $name; ?></h5>
                                    <hr>

                                            <div class="p-20">
                                                <form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>admin/update/<?= $row->id*1548; ?>" enctype="multipart/form-data">
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-sm-12 col-form-label">TItle:</label>
                                                        <div class="col-lg-10 col-sm-12">
                                                            <input type="text" class="form-control" placeholder="Title" name="title" value="<?php echo $row->title; ?>" disabled=disabled>
                                                            <?php echo form_error('title', '<div class="error" style="color:red;">', '</div>'); ?>
                                                        </div>
                                                    </div>
                                                     <div class="form-group row">
                                                        <label class="col-lg-2 col-sm-12 col-form-label" for="example-email">Select Category:</label>
                                                        <div class="col-lg-10 col-sm-12">
                                                            <select class="form-control selectpicker" id="category" name="category[]" multiple data-live-search="true">
                                                                <option value="">--Select Category--</option>
                                                                <?php foreach($category as $abs_category){ ?>
                                                                <option value="<?php echo $abs_category->name; ?>" <?php if(isset($_POST['category']) && $_POST['category'] == "$abs_category->name") echo 'selected="selected"';?>>
                                                                <?php echo $abs_category->name; ?>
                                                                </option>';
                                                                <?php } ?>
                                                            </select>
                                                            <?php echo form_error('category', '<div class="error" style="color:red;">', '</div>'); ?>
                                                        </div>
                                                    </div>
                                                       <div class="col-xl-12">
                                                         <div class="form-group row">
                                                            <label class="col-lg-2 col-sm-12 col-form-label">Body:</label>
                                                            <div class="col-lg-10 col-sm-12">
                                                                <textarea  id="body" name="body" class="form-control summernote" rows="10"><?php echo $row->body; ?></textarea>
                                                                <?php echo form_error('body', '<div class="error" style="color:red;">', '</div>'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-xl-12">
                                                         <div class="form-group row">
                                                            <label class="col-lg-2 col-sm-12 col-form-label">Description:</label>
                                                            <div class="col-lg-10 col-sm-12">
                                                                <textarea  id="description" name="description" class="form-control" rows="6" placeholder="Description"><?php echo $row->description; ?></textarea>
                                                                <?php echo form_error('description', '<div class="error" style="color:red;">', '</div>'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-xl-12">
                                                         <div class="form-group row">
                                                            <label class="col-lg-2 col-sm-12 col-form-label">Tags:</label>
                                                            <div class="col-lg-10 col-sm-12">
                                                                 <input type="text" placeholder="Add Tags" data-role="tagsinput" class="form-control" name="tags" value="<?php echo $row->tags; ?>"/>
                                                                 <?php echo form_error('tags', '<div class="error" style="color:red;">', '</div>'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                        <div class="col-xl-12">
                                                         <div class="form-group row">
                                                            <label class="col-lg-2 col-sm-12 col-form-label">Keywords:</label>
                                                            <div class="col-lg-10 col-sm-12">
                                                                 <input type="text" placeholder="Add Keywords" data-role="tagsinput" class="form-control" name="keywords" value="<?php echo $row->keywords; ?>"/>
                                                                 <?php echo form_error('tags', '<div class="error" style="color:red;">', '</div>'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                       <div class="col-xl-12">
                                                         <div class="form-group row">
                                                            <label class="col-lg-2 col-sm-12 col-form-label">Mini Description:</label>
                                                            <div class="col-lg-10 col-sm-12">
                                                                <textarea  id="mini_description" name="mini_description" class="form-control" rows="2" placeholder="Mini Description"><?php echo $row->minidescription; ?></textarea>
                                                                <?php echo form_error('mini_description', '<div class="error" style="color:red;">', '</div>'); ?>
                                                            </div>
                                                            <?php 
                                                              $ip_address = $this->input->ip_address();
                                                              //echo " dsdfdsfdfsf ".$ip_address;
                                                              ?>
                                                         </div>
                                                      </div>
                                                      <div class="form-group row">
                                                        <label class="col-lg-2 col-sm-12 col-form-label" for="example-email">Allow Commenting:</label>
                                                        <div class="col-lg-10 col-sm-12">
                                                            <select class="form-control" id="allow" name="allow">
                                                                <option value="">--Select Permission--</option>
                                                                <option value="yes" <?php if($row->commenting == "yes") echo 'selected="selected"';?>>Yes</option>
                                                                <option value="no" <?php if($row->commenting == "no") echo 'selected="selected"';?>>No</option>
                                                            </select>
                                                            <?php echo form_error('allow', '<div class="error" style="color:red;">', '</div>'); ?>
                                                        </div>
                                                    </div>
                                                         <!--IMAGE-->
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-sm-12 col-form-label" for="example-email">Cover Image:</label>
                                                        <div class="col-lg-8 col-sm-12">
                                                          <img src="<?php echo base_url();?>upload/<?php echo $row->image;?>" alt="">
                                                        </div>
                                                        <div class="col-lg-2 col-sm-12">
                                                              <a href="<?php echo base_url(); ?>admin/changeimage/<?= $row->id; ?>" class="btn btn-info">Change Image</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-4">
                                                            <input type="submit" class="btn btn-info" value="Update">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                </div> <!-- end card-box -->
                        </div><!-- end col -->
                </div>
        </div>
        <?php endforeach; ?>
</div>


<script type="text/javascript">
    function registerSummernote(element, placeholder, max, callbackMax) {
    $(element).summernote({
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'superscript', 'subscript', 'strikethrough', 'clear']],
        ['fontname', ['fontname']],     
        ['fontsize', ['fontsize']], 
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video', 'hr']],
        ['view', ['fullscreen', 'codeview']],
        ['help', ['help']]
      ],
      height : 250,
      placeholder,
    });
  }


$(function(){
  registerSummernote('.summernote', 'Blog body', 400, function(max) {
    $('#maxContentPost').text(max)
  });
});
</script>

<script>
var citynames = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: {
    filter: function(list) {
      return $.map(list, function(cityname) {
        return { name: cityname }; });
    }
  }
});
citynames.initialize();

$('input').tagsinput({
  typeaheadjs: {
    name: 'citynames',
    displayKey: 'name',
    valueKey: 'name',
    source: citynames.ttAdapter()
  }
});
</script>

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
<script type="text/javascript">
  $('select').selectpicker();
</script>