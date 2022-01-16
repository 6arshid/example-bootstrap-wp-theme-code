<!-- Footer -->
<footer class="py-5" style="background-color: <?php echo get_theme_mod( 'footer_bg_color' ); ?>">
    <div class="container">
        <p class="m-0 text-center text-white">&copy;
            <?php echo date('Y'); ?>
            <?php bloginfo('name'); ?> - <?php echo get_theme_mod( 'footer_more_text' ); ?> - <a href="http://danskesite.com/" target="_blank">Danske Site
            </a>
        </p>
    </div>
    <!-- /.container -->
</footer>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php wp_footer(); ?>

</body>
</html>