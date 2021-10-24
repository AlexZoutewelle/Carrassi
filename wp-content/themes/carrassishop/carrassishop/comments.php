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
        <div class="row" >
            <div class="col-12">
                <?php
                // You can start editing here -- including this comment!
                if ( have_comments() ) :
                    ?>
                    <h3 class="comments-title mb-5">
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
                        wp_list_comments(
                            array(
                                'style'      => 'li',
                                'short_ping' => true,
                                'callback' => 'carrassishop_comment_callback'
                            )
                        );
                        ?>
                    </ol><!-- .comment-list -->

                <?php
                endif;

                $comments_args = array(
                    // change the title of send button
                    'label_submit'=>'Submit',
                    // change the title of the reply section
                    'title_reply'=>'Submit comment',
                    // remove "Text or HTML to be displayed after the set of comment fields"
                    'comment_form_top' => 'ds',
                    'comment_notes_before' => '',
                    'comment_notes_after' => '',
                    // redefine your own textarea (the comment body)
                    'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="Your Comment* " aria-required="true" rows="8" maxlength="5000"></textarea></p>',

                );

                add_filter('comment_form_default_fields', 'custom_form_fields');
                function custom_form_fields($fields) {
                    return array (
                        'author' =>
                            '<p class="comment-form-author">'  .
                            '<input id="author" class="blog-form-input" placeholder="Your Name* " name="author" type="text" value="" size="30" /></p>',

                        'email' =>
                            '<p class="comment-form-email">'.
                            '<input id="email" class="blog-form-input" placeholder="Your Email Address* " name="email" type="text" value="" size="30" /></p>',

                        'url' =>
                            '<p class="comment-form-url">'.
                            '<input id="url" class="blog-form-input" placeholder="Your Website URL" name="url" type="text" value="" size="30" /></p>'
                    );
                }

                ?>
                <div id="comment_form_spot">
                    <?php
                    comment_form($comments_args);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- #comments -->
