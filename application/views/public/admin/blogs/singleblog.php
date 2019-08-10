
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

                                <div class="portlet"><!-- /primary heading -->
                                    <div class="portlet-heading">
                                        <h3 class="portlet-title text-dark">
                                            View Blog
                                        </h3>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="portlet2" class="panel-collapse collapse show">
                                        <div class="portlet-body">
                                            <div class="row">
                                                <!--Blog View Start-->
                                            <?php foreach ($getSingleBlog as $row): ?>
                                                <?php $blogID = $row->id; ?>
                                                <div class="col-md-3" style="border-right: 1px solid;">
                                                    <h4 class="text-left related-blogs">Tags</h4>
                                                    <?php 
                                                        $allTags = $row->tags;
                                                        $tags = explode(',',$allTags); ?>
                                                        <p class="tags"><?php foreach ($tags as $singleTag): ?><span><a href="<?php echo base_url(); ?>blogs/tag/<?= $singleTag?>">#<?php echo $singleTag;?> </a></span><?php endforeach; ?></p>
                                                </div>



                                                <div class="col-md-6" style="border-right: 1px solid;">

                                                    <?php  
                                                        $blogID = $row->id; 
                                                        $blogURL = $row->url;
                                                        $commenting = $row->commenting;
                                                    ?>
                                                    <h1 class="text-center"><?php echo $row->title?></h1>
                                                   <p class="text-right">  
                                                    posted on 
                                                    <?php $the_date = date('l jS \of F Y', $row->upload_date);
                                                     echo $the_date; ?>
                                                   </p> 
                                                    <hr>
                                                    <img src="<?php echo base_url();?>upload/<?php echo $row->image; ?>" alt="<?php echo $row->image; ?>" class="img img-responsive" style="width: 100%; margin-top: 20px;">
                                                    <div id="blog-body"><?php echo $row->body; ?></div>
                                                    <p class="text-right">--<?php echo $row->publishby; ?></p>
                                                            <!--SOCIAL MEDIA ACCOUNTS-->
                                                            <a href="#" class="fa fa-facebook"></a>
                                                            <a href="#" class="fa fa-twitter"></a>
                                                            <a href="#" class="fa fa-google"></a>
                                                            <a href="#" class="fa fa-linkedin"></a>
                                                            <a href="#" class="fa fa-instagram"></a>
                                                    <!--Blog View End-->
                                                    <hr>
                                                    <?php if($commenting == 'yes') 
                                                        {
                                                            ?>
                                                            <h1 class="text-center">Comments</h1>
                                                             <!--Comment View start-->
                                                    <div class="detailBox" id="comment">
                                                        <div class="titleBox">
                                                          <label>Comments (<?php echo $BlogCommentCount; ?>)</label>
                                                            <button type="button" class="close" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="commentBox">
                                                            
                                                            <p class="taskDescription"><h4 class="text-center"><?php echo $row->title?></h4></p>
                                                        </div>
                                                        <div class="actionBox">
                                                            <ul class="commentList">
                                                                <?php if ($this->session->flashdata('only_admin_can_delete')): ?>
                                                                <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('only_admin_can_delete').'</p>'; ?>
                                                                <?php endif; ?>
                                                                    
                                                                <!--Comment--> 
                                                                <?php foreach ($getSingleBlogComment as $row): ?>
                                                                <li>
                                                                    <div class="commentText">
                                                                        <p title="<?php echo $row->email; ?>"><strong><?php echo $row->comment_by?></strong></p><p class=""><?php echo $row->comment; ?>
                                                                        <!--Only For Admin-->
                                                                        <?php 
                                                                        if($this->session->userdata('userid'))
                                                                        {
                                                                            ?>
                                                                                <a href="<?php echo base_url();?>/comments/delete/<?= $blogURL; ?>/<?= $row->id; ?>" class="btn">delete </a>
                                                                            <?php
                                                                        }
                                                                         ?>
                                                                        
                                                                          <?php
                                                                         $currentTime = time(); 
                                                                         $difference = $currentTime - $row->comment_date;
                                                                         if($difference <= 60)
                                                                         {
                                                                            ?>
                                                                            <span class="date sub-text"><?php echo $difference; ?> seconds ago</span>
                                                                            <?php
                                                                         }
                                                                         elseif($difference <= 3600)
                                                                         {
                                                                            ?>
                                                                            <span class="date sub-text"><?php echo (int)($difference/60); ?> minutes ago</span>
                                                                            <?php
                                                                         }
                                                                         elseif($difference <= 86400)
                                                                         {
                                                                            ?>
                                                                            <span class="date sub-text"><?php echo (int)($difference/3600); ?> hours ago</span>
                                                                            <?php
                                                                         }
                                                                         else
                                                                         {
                                                                            ?>
                                                                            <span class="date sub-text"><?php $the_date = date('l jS \of F Y', $row->comment_date);
                                                                            echo $the_date; ?> (<?php echo $row->comment_time;?>)</span>        
                                                                            <?php
                                                                         }
                                                                        ?>
                                                                       </p>
                                                                    </div>
                                                                </li>
                                                                <hr>    
                                                                <!--Comment END--> 
                                                                <?php endforeach; ?>
                                                            </ul>
                                                            <form  action="<?php echo base_url(); ?>comments/comment/<?= $blogURL; ?>/<?= $blogID*1555; ?>" class="" role="form" method="POST">
                                                                <div class="row">
                                                                     <div class="col-md-10">
                                                                        <div class="form-group comment-form">
                                                                            <input type="text" name="name" class="form-control" placeholder="Your Name" required="required">
                                                                        </div>  
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <div class="form-group">
                                                                            <input type="email" name="email" class="form-control comment-form" placeholder="Your Email" required="required">
                                                                        </div>  
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <div class="form-group">
                                                                            <textarea class="form-control comment-form" name="comment" id="comment" cols="30" rows="4" placeholder="Your comment" required="required"></textarea>
                                                                        </div>  
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <button type="submit" class="btn btn-default form-group comment-form">Add Comment</button>
                                                                        </div>      
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                </div>

                                                <!--Comment View End-->

                                                            <?php 
                                                           
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <h4>Commenting is Not Allowed</h4>
                                                            <?php
                                                        }
                                                    ?>
                                                <?php endforeach; ?>
                                                <a href="<?php echo base_url(); ?>admin/edit/<?= $blogID; ?>" class="btn btn-info">Edit</a>
                                                </div> 

                                                    

                                                <div class="col-md-3">
                                                    <hr>
                                                    <h4 class="text-center related-blogs">Recent Blogs</h4>
                                                    <hr>
                                                    <?php foreach ($getRecentFiveBlogs as $row): ?>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <img src="<?php echo base_url();?>upload/<?php echo $row->image;?>" alt="<?php echo $row->title; ?>"class="img img-fluid" id="related-blogs-image">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h6><a href="<?php echo base_url()?>blogs/view/<?= $row->url; ?>" class="related-blogs-h6"><?php echo $row->title?></a></h6>
                                                        (posted on <?php $the_date = date('l jS \of F Y', $row->upload_date);
                                                     echo $the_date; ?>)
                                                        </div>
                                                    </div>
                                                    <?php endforeach; ?>
                                                    <hr>
                                             <!--Recent Blog View start-->
                                                    <!--Recent Blog View End-->
                                                    <!--Related Blog View start-->
                                                    <h4 class="text-center related-blogs">Related Blogs</h4>
                                                    <hr>
                                                     <?php foreach ($getRelatedFiveBlogs as $row): ?>
                                                       <div class="row">
                                                        <div class="col-md-4">
                                                          <img src="<?php echo base_url();?>upload/<?php echo $row->image;?>" alt="<?php echo $row->title; ?>"class="img img-fluid related-blogs-image" id="related-blogs-image">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h6><a href="<?php echo base_url()?>blogs/view/<?= $row->url; ?>" class="related-blogs-h6"><?php echo $row->title?></a></h6>
                                                        (posted on <?php $the_date = date('l jS \of F Y', $row->upload_date);
                                                     echo $the_date; ?>)
                                                        </div>
                                                    </div>
                                                    <?php endforeach; ?>
                                                    <!--Related Blog View End-->

                                                    
                                                </div>    
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

