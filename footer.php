        <footer id="site-footer" role="contentinfo" class="wrapper">

            <section class="main-footer">

                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="home-link">

                <?php

                if ( has_custom_logo() ) :

                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );

                    echo '<span class="bloginfo"><img src="' . $image[0] . '" alt="' . get_bloginfo( 'name' ) . '" /></span>';

                else :

                    echo '<span class="bloginfo">' . get_bloginfo( 'name' ) . '</span>';

                endif;

                ?>

                </a>

                <?php if ( has_nav_menu( 'mainmenu' ) || has_nav_menu( 'secondarymenu' ) ) : ?>

                <nav class="footer-nav" role="navigation" aria-label="footer navigation">

                    <ul id="footernav">

                    <?php
                    
                    if ( has_nav_menu( 'mainmenu' ) ) {

                        wp_nav_menu( array(
                            'theme_location'	=> 'mainmenu',
                            'items_wrap'        =>'%3$s', 
                            'container'         => false,
                            'link_before' 		=> '<span class="link-text">',
                            'link_after' 		=> '</span>',
                            'fallback_cb'    	=> false,
                        ) );

                    }
                    
                    if ( has_nav_menu( 'secondarymenu' ) ) {

                        wp_nav_menu( array(
                            'theme_location'	=> 'secondarymenu',
                            'items_wrap'        =>'%3$s', 
                            'container'         => false,
                            'link_before' 		=> '<span class="link-text">',
                            'link_after' 		=> '</span>',
                            'fallback_cb'    	=> false,
                        ) );
                        
                    }
                    
                    if ( has_nav_menu( 'home_cta' ) ) {

                        wp_nav_menu( array(
                            'theme_location'	=> 'home_cta',
                            'items_wrap'        =>'%3$s', 
                            'container'         => false,
                            'before'            => '<span class="cta">',
                            'after'             => '</span>',
                            'link_before' 		=> '<span class="link-text">',
                            'link_after' 		=> '</span>',
                            'fallback_cb'    	=> false,
                        ) );
                        
                    }
                    
                    ?>

                    </ul>

                </nav>

                <?php endif; ?>

            </section>

            <section class="copyright">

                <?php

                $attr_url = 'https://spencercreative.co';

                printf(
                    '<p>&copy %1$s <a href="%2$s">%3$s</a>, all rights reserved. Designed by <a href="%4$s" target="_blank">%5$s</a>.</p>',
                    date('Y'),
                    home_url('/'),
                    get_bloginfo( 'name' ),
                    $attr_url,
                    __('Spencer Creative Co')
                );
                    
                if ( has_nav_menu( 'footermenu' ) ) {

                    wp_nav_menu( array(
                        'theme_location'	=> 'footermenu',
                        'items_wrap'        =>'%3$s', 
                        'container'         => false,
                        'link_before' 		=> '<span class="link-text">',
                        'link_after' 		=> '</span>',
                        'fallback_cb'    	=> false,
                    ) );
                    
                }

                ?>

            </section>

        </footer>
        
        <?php wp_footer(); ?>

    </body>
    
</html>