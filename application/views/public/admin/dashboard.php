
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
                            <div class="col-lg-12 col-xl-4">
                                <div class="card-box widget-box-1 bg-white">
                                    <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Last 24 Hours"></i>
                                    <h4 class="text-dark font-18">Blog Stats</h4>
                                    <h2 class="text-pink text-center"><span data-plugin="counterup"><?php echo $totalBlogs; ?></span></h2>
                                    <p class="text-muted">Total Blogs Posted: <?php echo $totalBlogs; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-4">
                                <div class="card-box widget-box-1 bg-white">
                                    <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Last 24 Hours"></i>
                                    <h4 class="text-dark font-18"><?php echo $mostCommnetedBlogTitle; ?></h4>
                                    <h2 class="text-warning text-center"><span data-plugin="counterup"><?php echo $mostCommnets; ?></span></h2>
                                    <p class="text-muted">Most comments on blog</p>
                                </div>
                            </div>
                            

                             <div class="col-lg-12 col-xl-4">
                                <div class="card-box widget-box-1 bg-white">
                                    <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Last 24 Hours"></i>
                                    <h4 class="text-dark font-18">Most viewed By Users</h4>
                                    <h2 class="text-warning text-center"><span data-plugin="counterup">10</span></h2>
                                    <p class="text-muted">Most views on blog</p>
                                </div>
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

                                <?php if ($this->session->flashdata('image_updated')): ?>
                                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('image_updated').'</p>'; ?>
                                <?php endif; ?> 

                                <?php if ($this->session->flashdata('blog_updated')): ?>
                                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('blog_updated').'</p>'; ?>
                                <?php endif; ?> 
                                <div class="portlet"><!-- /primary heading -->
                                    <div class="portlet-heading">
                                        <h3 class="portlet-title text-dark">
                                            Recent Blogs
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
                                                        <th>Title</th>
                                                        <th>Category</th>
                                                        <th>Publish By</th>
                                                        <th>Created on</th>
                                                        <th style="">Action</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <?php  $count = 1; //For Sr. Number?> 
                                                    <?php foreach ($recentBlogs as $row): ?>
                                                        <tr>
                                                    <td><?php  echo $count;  $count = $count + 1;  ?></td>
                                                    <td><?php echo $row->title; ?></td>
                                                    <td><?php echo $row->category; ?></td>
                                                    <td><?php echo $row->publishby; ?></td>
                                                    <td><span class="date sub-text"><?php $the_date = date('l jS \of F Y', $row->upload_date);
                                                                            echo $the_date; ?> </span>    </td>
                                                    <td> <a href="<?php echo base_url()?>blogs/view/<?= $row->url; ?>">
                                                        <button class="btn btn-info">View</button>
                                                        </a>
                                                    </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <a href="<?php echo base_url();?>blogs/allblogs">View All</a>
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



      