<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form">
    <label>
        <input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search...', 'stike' ); ?>" value="<?php echo get_search_query(); ?>" name="s" id="s" required>
    </label>
    <button type="submit"><i class="bx bx-search"></i></button>
</form>