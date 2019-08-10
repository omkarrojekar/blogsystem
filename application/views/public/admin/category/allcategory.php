
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
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>

                            </div>
                        </div>

                        <div class="row">

                            <div class="col-12">
                                <?php if ($this->session->flashdata('problem_to_load_abstract')): ?>
                                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('problem_to_load_abstract').'</p>'; ?>
                                <?php endif; ?>    

                                 <?php if ($this->session->flashdata('no_such_abstract')): ?>
                                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('no_such_abstract').'</p>'; ?>
                                <?php endif; ?> 

                                 <?php if ($this->session->flashdata('updated_successfully')): ?>
                                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('updated_successfully').'</p>'; ?>
                                <?php endif; ?>     

                                <div class="portlet"><!-- /primary heading -->
                                    <div class="portlet-heading">
                                        <h3 class="portlet-title text-dark">
                                            Categories
                                        </h3>
                                        <div class="portlet-widgets">
                                            <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                            <span class="divider"></span>
                                            <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i class="ion-minus-round"></i></a>
                                            <span class="divider"></span>
                                            <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="portlet2" class="panel-collapse collapse show">
                                        <div class="portlet-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover mails m-0 table table-actions-bar">
                                                    <thead>
                                                    <tr>
                                                        <th>Sr. No.</th>
                                                        <th>Name</th>
                                                        <th>Description</th>
                                                        <th style="">Action</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <?php  $count = 1; //For Sr. Number?> 
                                                    <?php foreach ($getAllCategory as $row): ?>
                                                        <tr>
                                                    <td><?php  echo $count;  $count = $count + 1;  ?></td>
                                                    <td><?php echo $row->name; ?></td>
                                                    <td><?php echo $row->description; ?></td>
                                                    <td><a href="<?php echo base_url();?>category/singlecategory/<?= $row->slug; ?>">
                                                        <button class="btn btn-info">View</button>
                                                        </a></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->

                        </div>

                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->



      