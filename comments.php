<?php
    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');

    if ( post_password_required() ) { ?>
        <p class="nocomments">This post is password protected. Enter the password to view comments.</p>
    <?php
        return;
    }
?>

<!-- You can start editing here. -->
<?php if ( comments_open() ) : ?>
<div class="panel panel-default">
<h3 class="alert alert-info" style="border-radius:0"><?php comments_number('No comments', '1 comment', '% comments' );?></h3>

<?php if ( have_comments() ) : ?>
<ol class="jumbotron" style="border-radius:0">
<?php wp_list_comments(
    array(
        'avatar_size' => 55,
    ));
?>
</ol>

<div class="comment-nav">
<div class="alignleft"><?php previous_comments_link() ?></div>
<div class="alignright"><?php next_comments_link() ?></div>
</div>

<?php endif; ?>
<?php else :
// comments are closed ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>
<div class="">
  <div class="panel-heading">
    <h3 class="panel-title text-center">What is your perspective?</h3>
  </div>
  <div class="panel-body">
   
   
   
   
   
   
   




<div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>To post a comment first<a href="<?php echo wp_login_url( get_permalink() ); ?>">Please Login</a>.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class=commentform">

<?php if ( is_user_logged_in() ) : ?>

<p>User: <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Exit the site">Exit &raquo;</a></p>

<?php else : ?>
<p><input type="text" name="author" class="form-control"  value="Name" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" size="22" tabindex="1" /></p>

<p><input type="text" name="email" class="form-control" value="Email" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" size="22" tabindex="2" /></p>

<p><input type="text" name="url" class="form-control" value="Personal page" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" size="22" tabindex="3" /></p>


<?php endif; ?>

<textarea name="comment" class="form-control" rows="3"></textarea><br />

<input name="submit" type="submit" class="btn btn-default" tabindex="5" value="Send" />
<?php comment_id_fields(); ?>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif;
// registration required and not logged in ?>


   
   
   
   
   
   
   
   
   
  </div>
</div>

</div>
<?php else :
// comments are closed ?>
<?php endif;
// delete me and the sky will fall on your head ?>