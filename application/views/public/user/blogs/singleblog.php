            <!--************************************
                Inner Page Banner Start
        *************************************-->
        <?php foreach ($getSingleBlog as $row): ?>
            <?php
                 $blogID = $row->id; 
                $blogURL = $row->url;
                $commenting = $row->commenting;
                $blogKeywords = $row->keywords;
                    ?>
        <div class="tg-bannerinnerpage">
            <div class="container">
                <ol class="tg-breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Blogs</a></li>
                    <li class="tg-active"><?php echo $row->title; ?></li>
                </ol>
            </div>
        </div>
        <!--************************************
                Inner Page Banner End
        *************************************-->
        <!--************************************
                Main Start
        *************************************-->
        <main id="tg-main" class="tg-main tg-haslayout">
            <div class="container">
                <div class="row">
                    <div id="tg-twocolumns" class="tg-twocolumns">
                        <div class="col-xs-12 col-sm-7 col-md-9 col-lg-9">
                            <div id="tg-content" class="tg-content">
                                <div class="tg-post tg-postdetailpage">
                                    <div class="tg-posttitle">
                                        <h1><?php echo $row->title; ?></h1>
                                    </div>
                                    <ul class="tg-postmatadata">
                                        <li>
                                            <a href="javascript:void(0);">
                                                <span class="lnr lnr-calendar-full"></span>
                                                <span> <?php $the_date = date('l jS \of F Y', $row->upload_date);
                                                     echo $the_date; ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="tg-socialblackwhite tg-socialicons">
                                        <li class="tg-facebook">
                                            <a class="tg-roundicontext" href="javascript:void(0);">
                                                <em class="tg-usericonholder">
                                                    <i class="fa fa-facebook-f"></i>
                                                    <span>share on facebook</span>
                                                </em>
                                            </a>
                                        </li>
                                        <li class="tg-twitter">
                                            <a class="tg-roundicontext" href="javascript:void(0);">
                                                <em class="tg-usericonholder">
                                                    <i class="fa fa-twitter"></i>
                                                    <span>share on twitter</span>
                                                </em>
                                            </a>
                                        </li>
                                        <li class="tg-linkedin">
                                            <a class="tg-roundicontext" href="javascript:void(0);">
                                                <em class="tg-usericonholder">
                                                    <i class="fa fa-linkedin"></i>
                                                    <span>share on linkdin</span>
                                                </em>
                                            </a>
                                        </li>
                                    </ul>
                                    <figure class="tg-postimg">
                                        <?php 
                                            if($row->image != 'nopreview.png')
                                            {
                                                ?>
                                                <img src="<?php echo base_url(); ?>upload/<?php echo $row->image; ?>" alt="image description">
                                                <?php
                                            }
                                         ?>
                                    </figure>
                                    <div class="tg-description">
                                        <!--<p><?php echo  $row->description; ?></p>-->
                                            <?php echo $row->body; ?>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="tg-tagspostshare">
                                        <div class="tg-tags">
                                            <span>Tags:</span>
                                            <div class="tg-tagholder">
                                                <?php 
                                                $allTags = $row->tags;
                                                $tags = explode(',',$allTags); ?>
                                            <?php foreach ($tags as $singleTag): ?>
                                                <a href="<?php echo base_url(); ?>home/tag/<?= trim(urldecode($singleTag)); ?>"class="tg-tag" href="#"><?php echo $singleTag;?></a>
                                                <?php endforeach; ?>
                                            </div>
                                        </li>
                                        </div>
                                    </div>
                                </div>
                                <div class="tg-nextprevposts">
                                    <?php foreach ($getNextBlog as $row): ?>
                                        <div class="tg-btnprevpost">
                                            <a href="<?php echo base_url(); ?>home/view/<?= $row->url; ?>">
                                                <figure>
                                                    <img src="<?php echo base_url(); ?>upload/<?php echo $row->image; ?>" alt="image description">
                                                    <figcaption><i class="lnr lnr-arrow-left"></i></figcaption>
                                                </figure>
                                                <div class="tg-posttname">
                                                    <h3><?php echo $row->title; ?></h3>
                                                    <span>Previous blog</span>
                                                </div>
                                            </a>
                                        </div>
                                        <?php endforeach; ?>
                                        <?php foreach ($getPreviousBlog as $row): ?>
                                        <div class="tg-btnnextpost">
                                            <a href="<?php echo base_url(); ?>home/view/<?= $row->url; ?>">
                                                <div class="tg-posttname">
                                                    <h3><?php echo $row->title; ?></h3>
                                                    <span>Next blog</span>
                                                </div>
                                                <figure>
                                                   <img src="<?php echo base_url(); ?>upload/<?php echo $row->image; ?>" alt="image description">
                                                    <figcaption><i class="lnr lnr-arrow-right"></i></figcaption>
                                                </figure>
                                            </a>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                <div class="tg-author">
                                    <div class="tg-authorbox">
                                        <figure class="tg-authorimg"><img src="<?php echo base_url(); ?>assets/local/images/doctor.jpg" alt="image description" class="img img-responsive" style="width: 80px;"></figure>
                                        <div class="tg-authorhead">
                                            <div class="tg-leftarea">
                                                <h3><?php echo $row->publishby; ?></h3>
                                                <span>MBBS, MD - General Medicine cGeneral Physician, 28 Years Experience</span>
                                            </div>
                                            <div class="tg-rightarea">
                                                <ul class="tg-socialicons tg-socialiconsround">
                                                    <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                                    <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                                                    <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                                                    <li class="tg-youtube"><a href="javascript:void(0);"><i class="fa fa-youtube"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tg-description">
                                            <p>Dr. Avinash Deo is a Medical Oncologist and General Physician in Vileparle West, Mumbai and has an experience of 28 years in these fields. Dr. Avinash Deo practices at Nanavati Super Speciality Hospital in Vileparle West, Mumbai,Criti Care Multi Speciality Hospital & Research Centre in Andheri West, Mumbai and Belle Vue Multispeciality Hospital in Andheri, Mumbai. She completed MBBS from King Edward Memorial Hospital and Seth Gordhandas Sunderdas Medical College in 1986 and MD - General Medicine from King Edward Memorial Hospital and Seth Gordhandas Sunderdas Medical College in 1989.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tg-relatedposts">
                                    <div class="tg-borderheading">
                                        <h3>Related Posts</h3>
                                    </div>
                                    <div class="row">
                                        <div id="tg-featuredpostslider2" class="tg-featuredpostslider">
                                            <?php foreach ($getRelatedFiveBlogs as $row): ?>
                                            <div class="item">
                                                <article class="tg-post">
                                                    <figure class="tg-postimg">
                                                       <a href="<?php echo base_url(); ?>home/view/<?= $row->url; ?>"><img src="<?php echo base_url(); ?>upload/<?php echo $row->image; ?>" alt="<?php echo $row->title; ?>"></a>
                                                    </figure>
                                                    <div class="tg-postcontent">
                                                        <div class="tg-borderleft">
                                                            <div class="tg-posttitle">
                                                                <h3><a href="javascript:void(0);"><?php echo $row->title; ?></a></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="tg-slidecount">
                                            <span class="tg-currentItem"><span class="tg-result"></span></span>
                                            <span>/</span>
                                            <span class="tg-owlItems"><span class="tg-result"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <!--************************************
                                        Comment Start
                                *************************************-->
                                <!--<button class="btn btn-success" onclick="hide()">View Comments</button>-->
                                <div class="tg-reviews">
                                    <div class="tg-borderheading">
                                        <h3><?php echo $BlogCommentCount;?> Comments</h3>
                                    </div>
                                    <ul class="comments">
                                        <?php foreach ($getSingleBlogComment as $row): ?>
                                        <li>
                                            <div class="tg-commenter">
                                                <div class="tg-commenterbox">
                                                    <div class="tg-commenterhead">
                                                        <div class="tg-leftarea">
                                                            <h3><?php echo $row->comment_by; ?></h3>
                                                            <span>
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
                                                            </span>
                                                        </div>
                                                        <div class="tg-rightarea">
                                                            <?php if($this->session->userdata('userid')) 
                                                                {
                                                                    ?>
                                                                    <a class="tg-btnreply" href="#"><i class="fa fa-remove"></i></a>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="tg-description">
                                                        <p><?php echo $row->comment; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <!--************************************
                                        Commnent End
                                    *************************************-->
                                <div class="tg-leavereview">
                                    <div class="tg-borderheading">
                                        <h3>Comment</h3>
                                    </div>
                                    <form class="form-horizontal" action="<?php echo base_url();?>comments/comment/<?= $blogURL; ?>/<?= $blogID*1555; ?>" method = "post">
                                        
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="Name*">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="Email* (Your email address will not be published.)">
                                            </div>
                                            <div class="form-group">
                                                <textarea placeholder="Comment"  name="comment" rows= "8" class="form-control"></textarea>
                                            </div>
                                             <div class="form-group">
                                                <input type="submit" class="btn btn-success"  value="Comment">
                                            </div>
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-5 col-md-3 col-lg-3">
                            <aside id="tg-sidebar" class="tg-sidebar">
                                <div class="tg-widget tg-widgetlatestposts">
                                    <div class="tg-widgettitle">
                                        <h3>Recent Blogs</h3>
                                    </div>
                                    <div class="tg-widgetcontent">
                                        <div class="tg-postmargin">
                                            <?php foreach ($getRecentFiveBlogs as $row): ?>
                                            <article class="tg-post">
                                                <figure class="tg-postimg">
                                                    <img src="<?php echo base_url(); ?>upload/<?php echo $row->image; ?>" alt="<?php echo $row->title;?>">
                                                    <a class="tg-btnview" href="<?php echo base_url(); ?>home/view/<?= $row->url; ?>">view</a>
                                                </figure>
                                                <div class="tg-postcontent">
                                                    <div class="tg-borderleft">
                                                        <div class="tg-posttitle">
                                                            <h3><a href="javascript:void(0);"><?php echo $row->title;?></a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div> 
                                <div class="tg-widget tg-widgetcategories">
                                <div class="tg-widgettitle">
                                        <h3>Categories</h3>
                                    </div>
                                    <div class="tg-widgetcontent">
                                        <ul>
                                            <?php foreach ($getAllCategoryDetails as $row): ?>
                                            <li><a href="<?php echo base_url(); ?>home/category/<?= $row->slug; ?>"><span class="text-left"><?php echo $row->name; ?></span><?php echo $row->blogcounter; ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!--************************************
                Main End
        *************************************-->
        
<?php endforeach; ?>
