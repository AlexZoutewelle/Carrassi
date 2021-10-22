<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package CarrassiShop
 */

if ( ! function_exists( 'carrassishop_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function carrassishop_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
            $time_string
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;

if ( ! function_exists( 'carrassishop_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function carrassishop_posted_by() {
	    $author = get_the_author();
	    $author_id = get_the_author_meta( 'ID' );
	    $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
        $author_avatar = get_avatar_url($author_id, array('size' => 450));
        $author_description = get_the_author_meta('description');

        ?>
            <div class="row g-0 post_author">

                <div class="col-4 col-sm-4 col-md-3 col-lg-2">
                    <img src="http://carrassi/wp-content/uploads/2021/10/wOezUV1n_400x400.jpg">
                </div>
                <div class="col-8 col-sm-8 col-md-9 col-lg-10 px-3">
                    <h4 class="author-name">
                        <a href="<?php echo esc_url($author_url); ?>"> <?php echo esc_html($author); ?></a>
                    </h4>
                    <p class="author-bio"><?php echo esc_html($author_description) ?></p>
                </div>
            </div>
        <?php
//		$byline = sprintf(
//			/* translators: %s: post author. */
//			esc_html_x( 'by %s', 'post author', 'carrassishop' ),
//			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
//		);
//
//		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists('carrassishop_share_this_post')) :
    function carrassishop_share_this_post() { ?>
        <div class="row g-0 p-2 share_this_post">
            <div class="col-6">
                <h4>Share this post</h4>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <i class="fab fa-linkedin fa-2x"></i>
                <i class="fab fa-twitter fa-2x"></i>
                <i class="fab fa-facebook fa-2x"></i>
            </div>
        </div>
    <?php }
endif;

if ( ! function_exists('carrassishop_comments_no') ) :
    function carrassishop_comments_no() {
        $comment_count = get_comments_number();
        $comment_noun = $comment_count > 1 ? __('comments', 'carrassishop') : __('comment', 'carrassishop');
    ?>
    	    <span class="comment_count"> <?php echo $comment_count . " " .  $comment_noun; ?> </span>

    <?php }

endif;

if ( ! function_exists('carrassishop_tags')) :
    function carrassishop_tags() {

        $tags = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'carrassishop' ) );

        if($tags) { ?>
                <span class="meta-tags">
                    <?php printf( '<span class="tags-links">' . esc_html__( '%1$s', 'carrassishop' ) . '</span>', $tags ); ?>
                </span>
       <?php }
    }
endif;

if ( ! function_exists( 'carrassishop_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function carrassishop_entry_footer() {

        carrassishop_posted_by();
        carrassishop_share_this_post();
        ?> <hr> <?php
//        echo '<span class="comments-link">';
//        comments_popup_link(
//            sprintf(
//                wp_kses(
//                    /* translators: %s: post title */
//                    __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'carrassishop' ),
//                    array(
//                        'span' => array(
//                            'class' => array(),
//                        ),
//                    )
//                ),
//                wp_kses_post( get_the_title() )
//            )
//        );
//        echo '</span>';
//
//		edit_post_link(
//			sprintf(
//				wp_kses(
//					/* translators: %s: Name of current post. Only visible to screen readers */
//					__( 'Edit <span class="screen-reader-text">%s</span>', 'carrassishop' ),
//					array(
//						'span' => array(
//							'class' => array(),
//						),
//					)
//				),
//				wp_kses_post( get_the_title() )
//			),
//			'<span class="edit-link">',
//			'</span>'
//		);
	}
endif;

if ( ! function_exists( 'carrassishop_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function carrassishop_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) : ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->
		<?php endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

if( ! function_exists('carrassishop_comment_callback')) {
    function carrassishop_comment_callback($comment, $args, $depth) {
        $author_avatar = get_avatar_url($comment->comment_ID, array('size' => 450));
        ?>
            <li class="comment <?php echo $depth % 2 == 0 ? 'even' : 'uneven'; ?>">
                <div class="row p-2">
                    <div class="col-1">
                        <img src="<?php echo esc_url($author_avatar); ?>" />
                    </div>
                    <div class="col-11">
                        <div class="comment-author-meta mb-1">
                            <strong><?php echo esc_html($comment->comment_author, 'carrassishop'); ?></strong> • <?php echo date("M d Y h:i a", strtotime($comment->comment_date))?>
                        </div>
                        <div class="comment-content">
                            <?php echo esc_html($comment->comment_content); ?>
                        </div>
                    </div>
                    <div class="col-12 reply"><?php
                        // Display comment reply link
                        comment_reply_link( array_merge( $args, array(
                            'add_below' => 'div-comment',
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth']
                        ) ) ); ?>
                    </div>
                </div>
        <?php

    }
}