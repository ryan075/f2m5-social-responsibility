<ul>
    <li>
        <a href="<?php echo url( 'home' ) ?>"<?php if ( current_route_is( 'home' ) ): ?> class="active"<?php endif ?>>Home</a>
        <a href="<?php echo url( 'main' ) ?>"<?php if ( current_route_is( 'main' ) ): ?> class="active"<?php endif ?>>Home</a>
        <a href="<?php echo url( 'register' ) ?>"<?php if ( current_route_is( 'register' ) ): ?> class="active"<?php endif ?>>register</a>
    </li>
</ul>