<?php get_header(); ?>

<main class="<?php echo get_theme_mod( 'main_width' ); ?> mt-<?php echo get_theme_mod( 'main_margin_top' ); ?> mb-<?php echo get_theme_mod( 'main_margin_bottom' ); ?>">


    <div class="row">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <!-- Blog Post -->

        <article class="col-md-<?php echo get_theme_mod( 'posts_col-size-home' ); ?>">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <?php  if ( has_post_thumbnail() ) {
                        the_post_thumbnail(array(200, 250, true), array('class' => ' card-img-top')); // add post thumbnail
                    }
                    ?>
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-success"><?php $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                        } ?></strong>
                    <h3 class="mb-0"><a href="<?php the_permalink() ?>" > <?php the_title(); ?></a></h3>
                    <div class="mb-1 text-muted"> <?php the_time('F j, Y'); ?> by <?php if(get_the_author() != "adam"): ?>, by

                <?php the_author_posts_link() ?>

                        <?php endif; ?></div>
                    <p class="mb-auto"><?php the_excerpt();?></p>
                    <a href="<?php the_permalink() ?>" class="stretched-link">Continue reading</a>
                </div>
                
            </div>
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
    <ul class="pagination justify-content-center mb-4">
        <div class="navigation">
            <div class="alignleft">
                <?php previous_posts_link('&laquo; Previous Entries') ?>
            </div>
            <div class="alignright">
                <?php next_posts_link('Next Entries &raquo;','') ?>
            </div>
        </div>
    </ul>


</div>
</main>
<?php get_footer(); ?>
