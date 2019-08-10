 								<div class="tg-widgettitle">
                                        <h3>Categories</h3>
                                    </div>
                                    <div class="tg-widgetcontent">
                                        <ul>
                                            <?php foreach ($getAllCategoryDetails as $row): ?>
                                            <li><a href="<?php echo base_url(); ?>home/category/<?= $row->slug; ?>"><span><?php echo $row->name; ?></span><?php echo $row->blogcounter; ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>