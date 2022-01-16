<?php get_header(); ?>
<main class="<?php echo get_theme_mod( 'single_width' ); ?> mt-<?php echo get_theme_mod( 'main_margin_top' ); ?> mb-<?php echo get_theme_mod( 'main_margin_bottom' ); ?>">

    <div class="row g-5 mt-3">
        <div class="col-md-8">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="blog-post">
                <h2 class="blog-post-title"> <a href="<?php the_permalink() ?>" ><?php the_title(); ?></a></h2>
                <p class="blog-post-meta">   <?php the_time('F j, Y'); ?> by    <?php if(get_the_author() != "adam"): ?>, by

                <?php the_author_posts_link() ?>

                    <?php endif; ?></p>
                <hr>
                <?php  if ( has_post_thumbnail() ) {
                    the_post_thumbnail(array(800, 400, true), array('class' => ' card-img-top')); // add post thumbnail
                }
                ?>
                <?php the_content();?>
                            </article>

            <?php endwhile; else: ?>
                <?php comments_template(); ?>

                <div class="no-results">
                    <p>
                        <strong>There has been an error.
                        </strong>
                    </p>
                    <p>We apologize for any inconvenience, please
                        <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>">return to the home page
                        </a> or use the search form below.
                    </p>
                    <?php get_search_form(); /* outputs the default Wordpress search form */ ?>
                </div>
                <!--noResults-->
            <?php endif; ?>
            <!-- Pagination -->

            <nav class="blog-pagination" aria-label="Pagination">
                <?php previous_posts_link('&laquo; Previous Entries') ?>
                <?php next_posts_link('Next Entries &raquo;','') ?>
            </nav>

        </div>

        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                <?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
                    <?php dynamic_sidebar( 'home_right_1' ); ?>
                <?php endif; ?>




            </div>
        </div>
    </div>



</main>
<?php get_footer(); ?>
