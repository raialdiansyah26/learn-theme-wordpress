<?php 
// Jika post diproteksi password
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>

        <h3 class="comments-title">
            <?php
            printf(
                _nx(
                    '1 Komentar',
                    '%1$s Komentar',
                    get_comments_number(),
                    'comments title',
                    'textdomain'
                ),
                number_format_i18n( get_comments_number() )
            );
            ?>
        </h3>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style' => 'ol',
                'short_ping' => true,
            ) );
            ?>
        </ol>

    <?php endif; ?>

    <?php
    // Jika komentar ditutup 
    if ( ! comments_open() && get_comments_number() ) :
        ?>
        <p class="no-comments">Komentar ditutup.</p>
    <?php endif; ?>

    <?php comment_form(); ?>

</div>