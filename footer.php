<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">&copy;
            <?php echo date('Y'); ?>
            <?php bloginfo('name'); ?>
            <br />
            Powered by
            <a href="http://wordpress.org/">WordPress
            </a>.
        </p>
    </div>
    <!-- /.container -->
</footer>
<!-- Bootstrap core JavaScript -->
<script src="<?php bloginfo('stylesheet_directory'); ?>/vendor/jquery/jquery.min.js">
</script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js">
</script>
<?php wp_footer(); ?>
</body>
</html>