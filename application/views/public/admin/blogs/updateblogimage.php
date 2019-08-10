<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<?php $name = $this->session->userdata('username'); ?>
<?php $blogid = $this->uri->segment(3); ?>
<div class="container-fluid" style="background: #5fbeaa;">
        <div class="container">
            <h2 class="text-center">Change Blog Image</h2>
            <hr>
               <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                <?php if ($this->session->flashdata('duplicate')): ?>
                                <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('duplicate').'</p>'; ?>
                                <?php endif; ?>

                                <?php if ($this->session->flashdata('not_added')): ?>
                                <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('not_added').'</p>'; ?>
                                <?php endif; ?>   
                                
                                <?php if ($this->session->flashdata('added')): ?>
                                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('added').'</p>'; ?>
                                <?php endif; ?>   

                                <?php if ($this->session->flashdata('image_not_upload')): ?>
                                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('image_not_upload').'</p>'; ?>
                                <?php endif; ?>   


                                    <h2 class="m-t-0 header-title text-center"><b>Change Blog Image</b></h2>
                                    <a href="<?php echo base_url(); ?>admin" class="btn btn-warning">Dashboard</a>
                                    <h5>Posting by <?php echo $name; ?></h5>
                                    <hr>

                                            <div class="p-20">
                                                <form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>admin/updateimage/<?= $blogid; ?>" enctype="multipart/form-data">
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