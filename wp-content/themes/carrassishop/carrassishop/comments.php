<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CarrassiShop
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<section id="comments" class="comments-area">
    <div class="container">
        <?php
        // You can start editing here -- including this comment!
        if ( have_comments() ) :
            ?>
            <h3 class="comments-title">
                <?php
                $comment_count = get_comments_number();

                printf(
                /* translators: 1: comment count number, 2: title. */
                    esc_html( _nx( '%1$s Response to &ldquo;%2$s&rdquo;', '%1$s Responses to &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'carrassishop' ) ),
                    number_format_i18n( $comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                );
                ?>
            </h3><!-- .comments-title -->


            <ol class="comment-list">
                <?php
//                wp_list_comments(
//                    array(
//                        'style'      => 'li',
//                        'short_ping' => true,
//                        'callback' => 'carrassishop_comment_callback'
//                    )
//                );
                ?>
            </ol><!-- .comment-list -->

        <?php
        endif;

//        comment_form();
        ?>

    </div>
</section><!-- #comments -->
