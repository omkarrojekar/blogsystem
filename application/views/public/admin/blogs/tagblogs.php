
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
                                <div class="portlet"><!-- /primary heading -->
                                    <div class="portlet-heading">
                                        <h3 class="portlet-title text-dark">
                                            All Blogs
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
                                           <!--LIST OF BLOGS START--> 
                                           <div class="container" id="tourpackages-carousel">
                                              <div class="row">
                                                <?php foreach ($getAllPostedBlogsByTag as $row): ?>
                                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                                  <div class="thumbnail">
                                                   <a href="<?php echo base_url()?>blogs/view/<?= $row->url; ?>"> <img src="<?php echo base_url(); ?>upload/<?php echo $row->image; ?>" alt=""></a>
                                                      <div class="caption">
                                                        <h4 style="padding-bottom: 5px;"><?php echo $row->title; ?></h4>
                                                        <p><?php echo $row->minidescription; ?></p>
                                                        <p>post by <a href="<?php echo base_url(); ?>blogs/postby/<?= $row->publishbyurl; ?>"><?php echo $row->publishby; ?></a></p>
                                                        <?php 
                                                        $allTags = $row->tags;
                                                        $tags = explode(',',$allTags); ?>
                                                      <!--  <p><?php foreach ($tags as $singleTag): ?><span><a href="<?php echo base_url(); ?>blogs/tag/<?= $singleTag?>">#<?php echo $singleTag;?> </a></span><?php endforeach; ?></p> -->
                                                    </div>
                                                  </div>
                                                </div>
                                                <?php endforeach; ?>
                                              </div><!-- End row -->
                                          </div><!-- End container -->
                                           <!--LIST OF BLOGS END-->
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



      