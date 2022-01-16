<?php get_header(); ?>
<main class="<?php echo get_theme_mod( 'page_width' ); ?> mt-<?php echo get_theme_mod( 'page_margin_top' ); ?> mb-<?php echo get_theme_mod( 'page_margin_bottom' ); ?>">

    <div class="row">
        <div class="col-md-12">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="blog-post">
                <?php the_content();?>
                            </article>

            <?php endwhile; else: ?>
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
    </div>
</main>
<?php get_footer(); ?>
