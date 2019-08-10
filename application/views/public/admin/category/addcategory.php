
        <!-- Begin page -->
        <div id="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <?php $this->load->view('public/admin/leftbar'); ?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Admin Panel</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                    <li class="breadcrumb-item active">Category</li>
                                    <li class="breadcrumb-item active">New</li>
                                </ol>

                            </div>
                        </div>

                        <div class="row">

                            <div class="col-12">
                                <?php if ($this->session->flashdata('added_successfully')): ?>
                                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('added_successfully').'</p>'; ?>
                                <?php endif; ?>    

                                 <?php if ($this->session->flashdata('not_added')): ?>
                                <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('not_added').'</p>'; ?>
                                <?php endif; ?> 

                                <?php if ($this->session->flashdata('duplicate_title')): ?>
                                <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('duplicate_title').'</p>'; ?>
                                <?php endif; ?>     
                            </div> <!-- end col -->

                        </div>
                          <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Add Category</b></h4>
                                    <hr>

                                            <div class="p-20">
                                                <form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>category/add">
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-sm-12 col-form-label">Name:</label>
                                                        <div class="col-lg-10 col-sm-12">
                                                            <input type="text" class="form-control" placeholder="Category name" name="category_name">
                                                        </div>
                                                    </div>
                                                     <div class="form-group row">
                                                        <label class="col-lg-2 col-sm-12 col-form-label" for="example-email">Select Parent Category:</label>
                                                        <div class="col-lg-10 col-sm-12">
                                                            <select class="form-control" id="sub-category" name="parent_category">
                                                                <option value="">--Select Parent Category--</option>
                                                                <option value="none">None</option>
                                                                <?php foreach($category as $abs_category){ ?>
                                                                <option value="<?php echo $abs_category->name; ?>">
                                                                <?php echo $abs_category->name; ?>
                                                                </option>';
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-sm-12 col-form-label">Decription:</label>
                                                        <div class="col-lg-10 col-sm-12">
                                                            <textarea name="category_desc" id="" cols="30" rows="10" class="form-control"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-4">
                                                            <input type="submit" class="btn btn-info" value="Add Category">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>


                                    <!-- end row -->

                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->
    