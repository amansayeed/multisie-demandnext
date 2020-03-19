<?php
// Default template - post-final-default.psd

load_template( TDC_PATH_LEGACY_COMMON . '/wp_booster/td_single_template_vars.php', true );

get_header();

global $loop_sidebar_position;
?>
<?php if ( !td_util::tdc_is_installed() ) {
    $loop_sidebar_position = 'no_sidebar';
}
?>

    <div class="td-container td-post-template-default">
        <div class="td-container-border">
            <div class="td-pb-row">
                <?php
                switch ($loop_sidebar_position) {
                    default: // sidebar right
                        ?>
                        <div class="td-pb-span8 td-main-content" role="main">
                            <div class="td-ss-main-content">
                                <?php
                                require_once('loop-single.php');
                                comments_template('', true);
                                ?>
                            </div>
                        </div>
                        <div class="td-pb-span4 td-main-sidebar" role="complementary">
                            <div class="td-ss-main-sidebar">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                        <?php
                        break;

                    case 'sidebar_left':
                        ?>
                        <div class="td-pb-span8 td-main-content td-sidebar-left-content" role="main">
                            <div class="td-ss-main-content">
                                <?php
                                require_once('loop-single.php');
                                comments_template('', true);
                                ?>
                            </div>
                        </div>
                        <div class="td-pb-span4 td-main-sidebar" role="complementary">
                            <div class="td-ss-main-sidebar">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                        <?php
                        break;

                    case 'no_sidebar':
                        td_global::$load_featured_img_from_template = 'full';
                        ?>
                        <div class="td-pb-span12 td-main-content" role="main">
                            <div class="td-ss-main-content">
                                <?php
                                require_once('loop-single.php');
                                comments_template('', true);
                                ?>
                            </div>
                        </div>
                        <?php
                        break;

                }
                ?>
            </div> <!-- /.td-pb-row -->
        </div>
    </div> <!-- /.td-container -->

<?php

get_footer();