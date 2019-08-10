
        <!--************************************
                Main Start
        *************************************-->
        <main id="tg-main" class="tg-main tg-haslayout">
            <div class="container">
                <div class="row">
                    <section class="tg-main-section tg-haslayout">
                        <div id="tg-twocolumns" class="tg-twocolumns">
                            <div class="col-xs-12 col-sm-7 col-md-9 col-lg-9">
                                <div id="tg-content" class="tg-content">
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="tg-borderheading">
                                                <h3>Posts on "<?php echo $tagName; ?>" Tag</h3>
                                            </div>
                                            <div class="tg-postmargin">
                                                <?php foreach ($getAllPostedBlogsByTag as $row): ?>
                                                <article class="tg-post tg-postleftimg">
                                                    <figure class="tg-postimg">
                                                        <a href="javascript:void(0);"><img src="<?php echo base_url(); ?>upload/<?php echo $row->image?>" alt="image description"></a>
                                                        <a class="tg-btnview" href="<?php echo base_url(); ?>home/view/<?= $row->url; ?>">view post</a>
                                                    </figure>
                                                    <div class="tg-postcontent">
                                                        <div class="tg-borderleft">
                                                            <div class="tg-posttitle tg-posttitlelarge">
                                                                <h3><a href="javascript:void(0);"><?php  echo $row->title; ?></a></h3>
                                                            </div>
                                                        </div>
                                                        <div class="tg-description">
                                                            <p><?php echo $row->minidescription; ?></p>
                                                        </div>
                                                        <ul class="tg-postmatadata">
                                                            <li>
                                                                <a href="javascript:void(0);">
                                                                    <span class="lnr lnr-calendar-full"></span>
                                                                    <span><?php $the_date = date('l jS \of F Y', $row->upload_date);
                                                                        echo $the_date; ?></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);">
                                                                    <span class="lnr lnr-user"></span>
                                                                    <span>By: <?php echo $row->publishby; ?></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="tg-postbtnbox">
                                                            <a class="tg-btn" href="<?php echo base_url(); ?>home/view/<?= $row->url; ?>">view post</a>
                                                        </div>
                                                    </div>
                                                </article>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5 col-md-3 col-lg-3">
                                <aside id="tg-sidebar" class="tg-sidebar">
                                <div class="tg-widget tg-widgetcategories">
                                    <div class="tg-widgettitle">
                                        <h3>Categories</h3>
                                    </div>
                                    <div class="tg-widgetcontent">
                                        <ul>
                                           <?php foreach ($getAllCategoryDetails as $row): ?>
                                            <li><a href="<?php echo base_url(); ?>home/category/<?= $row->slug; ?>/<?= $row->name; ?>"><span class="text-left"><?php echo $row->name; ?></span><?php echo $row->blogcounter; ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>                                   
                                </aside>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
        <!--************************************
                Main End
        *************************************-->
       