<?php
if( !function_exists( 'hanson_search_form' ) ) {
    function hanson_search_form( $form )
    {
        $form = sprintf( '<form action="%s" method="get" class="search-form">
			<input type="text" class="form-control" value="%s" required name="s" placeholder="%s">
			<button type="submit"><span><i class="fa fa-search" aria-hidden="true"></i></span></button>
		</form>', esc_url( home_url( '/' ) ), esc_attr( get_search_query() ), esc_html__( 'Type and Hit Enter', 'hanson' ) );
        return $form;
    }

    add_filter( 'get_search_form', 'hanson_search_form' );
}

if( !function_exists( 'hanson_readmore_btn' ) ) {
    function hanson_readmore_btn() { ?>
        <div class="read-more-btn">
            <a class="btn btn-readmore hvr-sweep-to-right" href="<?php print the_permalink(); ?>"><?php print esc_html_e( 'Read more...','hanson' ); ?></a>
        </div>
    <?php
    }
}

function hanson_excerpt_more( $excerpt ) {
    return ' ...';
}
add_filter( 'excerpt_more', 'hanson_excerpt_more' );

