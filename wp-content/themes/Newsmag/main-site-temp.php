<?php
/*  ----------------------------------------------------------------------------
Template Name:Main Site Homepage
 */


get_header();
?>
<style>
    
    @media only screen and (min-width: 768px) {
      .border-right{ border-right:solid #ccc 1px;}    
 
      .half-width {
        width:50%;
        float:left;
      }
      .one-third {
        width:67%;
        float:left;
        margin-right:25px;
      }
      .one-fourth {
        width:30%;
        float:left;
      }
      .column-two li {width: 49%;
        margin: 0px 0 5px 5px;
        float: left;position:relative;}
              .column-two li img{max-height: 175px;
        width: 100%;}
    }
    .homepagecontent .td-pb-row {
        *zoom: 1;
        margin-right: -24px;
        margin-left: -24px;
        position: relative;
    }
    .column-two li {position:relative;}
    .column-two li .carousel-caption2 {position:absolute; left:0;
    	right:0;
    	bottom:0;
    	text-align:left;
    	padding:10px;
    	background:rgba(0,0,0,0.6);
    	text-shadow:none;padding:0;}
    .column-two{ list-style:none;}
    .column-two li .carousel-caption2 p {color:#fff; margin:0; font-size:12px; padding:5px 10px; line-height:18px;}
    .column-two h3{color:#333; font-size:13px; line-height:18px;padding:5px; background-color:#f4f4f4;margin:0; height:47px;}
    #myCarousel .carousel-caption {
        left:0;
    	right:0;
    	bottom:0;
    	text-align:left;
    	padding:10px;
    	background:rgba(0,0,0,0.6);
    	text-shadow:none;
    }
    .td-module-comments{ display:none;}
    @media only screen and (max-width: 768px) {
    .column-two{margin-top:15px;
      }
      .column-two li{margin:0 0 15px 0;
      }
    }
    
    .newssection .td_module_6{
        padding-bottom: 15px;
    }
    .newssection .td_module_6 h3{}
    .home-images .entry-thumb{max-height:75px;}
    .countfive:nth-of-type(1n+6),.countfive2:nth-of-type(1n+6) {display: none;}
    .hottopics .td_module_6 img{max-height:70px;max-width:100px;}
</style>
<div class="td-main-content-wrap td-container-wrap">
    <div class="td-container tdc-content-wrap">
        <div class="td-pb-row" style="margin-top:10px;margin-bottom:10px;">
            <div class="td-pb-span12">
                <div class="half-width">
                    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
                    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                    <!------ Include the above in your HEAD tag ---------->
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        
                          <!-- Wrapper for slides -->
                          <div class="carousel-inner">
                              
                                <?php
                                $all_blog = get_last_updated();
                                $countpost = 1;
                                foreach ($all_blog as $key=>$current_blog) {
                                    if($current_blog['blog_id'] != 1){    
                                    switch_to_blog($current_blog['blog_id']);

                                    global $post;
                                    $args = array( 'posts_per_page' => 1,'orderby' => 'ID',
	'order' => 'DESC',  );
                                    $myposts = get_posts( $args );
                                    foreach ( $myposts as $post ) : setup_postdata( $post ); 
                                    $fimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                                    $fimageurl = $fimage[0];
                                    ?>
                                       <div class="item <?php if($countpost == 1){ ?>active<?php }?>">
                                          <a href="<?php the_permalink(); ?>">
                                              <img src="<?php echo $fimageurl;?>">
                                               <div class="carousel-caption">
                                                <p><?php echo substr(get_the_excerpt( $post->ID),0,125);?>...</p>
                                               </div>
                                          </a>
                                        </div><!-- End Item -->
                                    <?php endforeach; 
                                    wp_reset_postdata();?>
                                    <?php
                                    restore_current_blog();
                                    $countpost++;
                                    }
                                }
                                ?> 
                          </div><!-- End Carousel Inner -->
                    
                          <!-- Controls -->
                          <div class="carousel-controls">
                              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                              </a>
                              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                              </a>
                          </div>
                    
                        </div><!-- End Carousel -->
                </div>
                <div class="half-width"><ul class="column-two">
                        
                        <?php
                        
                        global $post;
                        $args = array( 'posts_per_page' => 4, 'post_type' => 'sponsors','orderby' => 'ID',
	'order' => 'DESC' );
                        
                        $myposts = get_posts( $args );
                        foreach ( $myposts as $post ) : setup_postdata( $post ); 
                        $fimage2 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
                        $fimageurl2 = $fimage2[0];
                        ?>
                        	<li>
                        		<a href="<?php  echo get_field( "url" );?>"> 
                                              <img src="<?php echo $fimageurl2;?>">
                                              <div class="carousel-caption2">
                                                <p><?php the_title();?><br><?php echo substr(get_the_content( $post->ID),0,50);?></p>
                                              </div>
                                </a>
                        	</li>
                        <?php endforeach; 
                        wp_reset_postdata();?>
                        </ul>
                </div>
            </div>   
        </div>
        <!-- End-->
        <!-- End-->
        <div class="td-pb-row">
            <div class="td-pb-span12">
                <div class="one-third">
                    <!-- Start -->
                    <div class="td-block-row">
             <?
             switch_to_blog(10);
             
             /*Start Code */
             global $post;
             $args = array( 'posts_per_page' => 1,'orderby' => 'ID',
	'order' => 'DESC');
                  
             $myposts = get_posts( $args );
             foreach ( $myposts as $post ){
                  
                 setup_postdata( $post );
                 $fimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
                 $fimageurl = $fimage[0];
                 echo '<div class="td-block-span6">';
                 ?>
                    
                        <div class="td_module_4 td_module_wrap td-animation-stack">
                            <div class="td-module-image">
                                <div class="td-module-thumb">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark" class="td-image-wrap" title="<?php the_title();?>">
                                        <img width="324" height="235" class="entry-thumb td-animation-stack-type0-1" src="<?php echo $fimageurl; ?>" alt="<?php the_title();?>" title="<?php the_title();?>">
                                        </a></div></div>
                
                            <h3 class="entry-title td-module-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                            <div class="td-module-meta-info">
                                <span class="td-post-author-name"><a href="https://www.mytechmag.com/author/admin">Admin</a> <span>-</span> </span>                <span class="td-post-date"><time class="entry-date updated td-module-date" datetime="2018-10-31T06:52:29+00:00"><?php the_date();?></time></span>                <div class="td-module-comments"><a href="https://iot.mytechmag.com/the-new-challenges-of-iot-605.html#respond">0</a></div>            </div>
                
                            <div class="td-excerpt">
                                <?php the_excerpt();?>           </div>
                
                            
                        </div>
                        
                    
                    <?php
                    echo '</div>';
                 
                 
             }       
             /*End Code */
             
             restore_current_blog();
    ?>
    <?
    echo '<div class="td-block-span6">';
                    $all_blog = array(3,13,14,15);
                    foreach ($all_blog as $current_blog) {
                        switch_to_blog($current_blog);
             
             /*Start Code */
             global $post;
             $args = array( 'posts_per_page' => 2,'orderby' => 'ID',
	'order' => 'DESC');
                  
             $myposts = get_posts( $args );
             foreach ( $myposts as $post ){
                  
                 setup_postdata( $post );
                 $fimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
                 $fimageurl = $fimage[0];
                 
                 ?>
                        <div class="td_module_6 td_module_wrap td-animation-stack home-images countfive" style="padding-bottom:15px;">

        <div class="td-module-thumb"><a href="<?php the_permalink(); ?>" rel="bookmark" class="td-image-wrap" title="<?php the_title();?>">
            <img width="100" height="70" class="entry-thumb td-animation-stack-type0-1" src="<?php echo $fimageurl; ?>" alt="" title="<?php the_title();?>"></a></div>
        <div class="item-details">
            <h3 class="entry-title td-module-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title();?>"><?php the_title(); ?></a></h3>            
            <div class="td-module-meta-info">
                                                <span class="td-post-date"><time class="entry-date updated td-module-date" datetime="2019-01-31T09:08:23+00:00"><?php the_date();?></time></span>                            </div>
        </div>

        </div>
                        <?
                    
             }       
             /*End Code */
             
             restore_current_blog();
            }
            echo '</div>';
    ?>
	 <!-- ./td-block-span6 --></div>
	<!-- End -->
		<!-- Start -->
<div class="td-block-row hottopics">
    <div class="td-block-span12">
<div class="td-block-title-wrap"><h4 class="block-title td-block-title"><span class="td-pulldown-size">Editor’s Picks</span></h4></div>
</div>
	
	<?
             $all_blog2 = wp_get_sites();
             $countpost =1;
             foreach ($all_blog2 as $key=>$current_blog) {
             if($current_blog['blog_id'] != 1){    
             switch_to_blog($current_blog['blog_id']);
             /*Start Code */
             global $post;
             $args = array( 'post_type'  => 'post',
  'meta_key'   => 'cxo_thoughts',
  'meta_value' => 'yes','posts_per_page' => 1, 'offset' => 1,'orderby' => 'ID',
	'order' => 'DESC');
                  
             $myposts = get_posts( $args );
             foreach ( $myposts as $post ){
                  
                 setup_postdata( $post );
                 $fimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
                 $fimageurl = $fimage[0];
                 echo '<div class="td-block-span6">';
                 ?>
                    
                        <div class="<? if($countpost > 2){ echo 'td_module_6';}else{ echo 'td_module_2';} ?> td_module_wrap td-animation-stack">
                            <div class="td-module-image">
                                <div class="td-module-thumb">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark" class="td-image-wrap" title="<?php the_title();?>">
                                        <img width="324" height="235" class="entry-thumb td-animation-stack-type0-1" src="<?php echo $fimageurl; ?>" alt="<?php the_title();?>" title="<?php the_title();?>">
                                        </a></div></div>
                <? if($countpost > 2){ echo '<div class="item-details">';} ?>
                            <h3 class="entry-title td-module-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                            <div class="td-module-meta-info">
                                <span class="td-post-author-name"><a href="https://www.mytechmag.com/author/admin">Admin</a> <span>-</span> </span>                <span class="td-post-date"><time class="entry-date updated td-module-date" datetime="2018-10-31T06:52:29+00:00"><?php the_date();?></time></span>                <div class="td-module-comments"><a href="https://iot.mytechmag.com/the-new-challenges-of-iot-605.html#respond">0</a></div>            </div>
                            <? if($countpost > 2){ echo '</div>';} ?>    
                
                            
                        </div>
                        
                    
                    <?php
                    echo '</div>';
                 $countpost++;
                 
             }       
             /*End Code */
             
             restore_current_blog();
                        }
                    }
    ?>
	<div style="clear:both"></div>
	</div>
	
	<!-- End -->
	<!-- Start -->
                    <div class="td-block-row">
                        <div class="td-block-span12">
<div class="td-block-title-wrap"><h4 class="block-title td-block-title"><span class="td-pulldown-size">Hot Topics</span></h4></div>
</div>
             <?
             switch_to_blog(16);
             
             /*Start Code */
             global $post;
             $args = array( 'posts_per_page' => 1,'orderby' => 'ID',
	'order' => 'DESC');
                  
             $myposts = get_posts( $args );
             foreach ( $myposts as $post ){
                  
                 setup_postdata( $post );
                 $fimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
                 $fimageurl = $fimage[0];
                 echo '<div class="td-block-span6">';
                 ?>
                    
                        <div class="td_module_4 td_module_wrap td-animation-stack">
                            <div class="td-module-image">
                                <div class="td-module-thumb">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark" class="td-image-wrap" title="<?php the_title();?>">
                                        <img width="324" height="235" class="entry-thumb td-animation-stack-type0-1" src="<?php echo $fimageurl; ?>" alt="<?php the_title();?>" title="<?php the_title();?>">
                                        </a></div></div>
                
                            <h3 class="entry-title td-module-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                            <div class="td-module-meta-info">
                                <span class="td-post-author-name"><a href="https://www.mytechmag.com/author/admin">Admin</a> <span>-</span> </span>                <span class="td-post-date"><time class="entry-date updated td-module-date" datetime="2018-10-31T06:52:29+00:00"><?php the_date();?></time></span>                <div class="td-module-comments"><a href="https://iot.mytechmag.com/the-new-challenges-of-iot-605.html#respond">0</a></div>            </div>
                
                            <div class="td-excerpt">
                                <?php echo substr(get_the_excerpt(),0,300);?>...          </div>
                
                            
                        </div>
                        
                    
                    <?php
                    echo '</div>';
                 
                 
             }       
             /*End Code */
             
             restore_current_blog();
    ?>
    <?
    echo '<div class="td-block-span6">';
                    $all_blog = array(7,8);
                    foreach ($all_blog as $current_blog) {
                        switch_to_blog($current_blog);
             
             /*Start Code */
             global $post;
             $args = array( 'posts_per_page' => 3,'orderby' => 'ID',
	'order' => 'DESC');
                  
             $myposts = get_posts( $args );
             foreach ( $myposts as $post ){
                  
                 setup_postdata( $post );
                 $fimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
                 $fimageurl = $fimage[0];
                 
                 ?>
                        <div class="td_module_6 td_module_wrap td-animation-stack home-images countfive2" style="padding-bottom:15px;">

        <div class="td-module-thumb"><a href="<?php the_permalink(); ?>" rel="bookmark" class="td-image-wrap" title="<?php the_title();?>"><img width="100" height="70" class="entry-thumb td-animation-stack-type0-1" src="<?php echo $fimageurl; ?>" alt="" title="<?php the_title();?>"></a></div>
        <div class="item-details">
            <h3 class="entry-title td-module-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title();?>"><?php the_title();?></a></h3>            <div class="td-module-meta-info">
                                                <span class="td-post-date"><time class="entry-date updated td-module-date" datetime="2019-01-31T09:08:23+00:00"><?php the_date();?></time></span>                            </div>
        </div>

        </div>
                        <?
                    
             }       
             /*End Code */
             
             restore_current_blog();
            }
            echo '</div>';
    ?>
	 <!-- ./td-block-span6 --></div>
	<!-- End -->
	
	<!-- End -->
	<div class="td-block-row newssection">
<?php

//Connecting to external database

$extDB = new wpdb( 'mytechma_common', 'qot2T@+TaDr*', 'mytechma_news', 'localhost' );

$allnews = $extDB->get_results("SELECT * FROM wp_posts where post_type='post' order by ID DESC limit 6", ARRAY_A);

?>
    <div class="td-block-span12">
<div class="td-block-title-wrap"><h4 class="block-title td-block-title"><span class="td-pulldown-size">Top Headlines</span></h4></div>
</div>
	<div class="td-block-span6 border-right">
        <?php
        foreach($allnews as $news)
        {
            ?>
            <div class="td_module_6 td_module_wrap td-animation-stack">
                <h3 class="entry-title td-module-title">
                    <a href="<?php echo $news['guid'];?>" rel="bookmark" title=""><?php echo substr($news['post_title'],0,30);?></a>...</h3>
                    <div class="td-module-meta-info">
                     <span class="td-post-date"><time class="entry-date updated td-module-date" datetime="<?php echo date("M d, Y",strtotime($news['post_date']));?>"><?php echo date("M d, Y",strtotime($news['post_date']));?></time></span>                            </div>
            </div>
            <?
        }
        ?>
	</div> <!-- ./td-block-span6 -->

	<div class="td-block-span6">

        <?php
        $allnews2 = $extDB->get_results("SELECT * FROM wp_posts where  post_type='post' order by ID DESC limit 6,6", ARRAY_A);
        foreach($allnews2 as $news)
        {
            ?>
            <div class="td_module_6 td_module_wrap td-animation-stack">
                <h3 class="entry-title td-module-title">
                    <a href="<?php echo $news['guid'];?>" rel="bookmark" title=""><?php echo substr($news['post_title'],0,30);?>...</a></h3>
                    <div class="td-module-meta-info">
                     <span class="td-post-date"><time class="entry-date updated td-module-date" datetime="<?php echo date("M d, Y",strtotime($news['post_date']));?>"><?php echo date("M d, Y",strtotime($news['post_date']));?></time></span>                            </div>
            </div>
            <?
        }
        ?>
        
	</div> <!-- ./td-block-span6 --></div>
	<!-- End -->
                </div>
                <div class="one-fourth">
                    <?php get_sidebar(); ?>
                </div>
            </div>   
        </div>
        <div class="homepagecontent">
        <?php
            	if (have_posts()) { ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                       <?php the_content(); ?>
                    <?php endwhile; ?>
                <?php }
            	?>
        </div> 
    </div>
</div> 
<?
get_footer();