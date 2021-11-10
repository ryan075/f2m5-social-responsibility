<ul>
    <li>
        <a href="<?php echo url( 'home' ) ?>"<?php if ( current_route_is( 'home' ) ): ?> class="active"<?php endif ?>>Home</a>
    </li>
    <br>
    <li>
        <a href="<?php echo url( 'register.form' ) ?>"<?php if ( current_route_is( 'register.form' ) ): ?> class="active"<?php endif ?>>Aanmelden</a>
    </li>
    <br>
    <li>
        <a href="<?php echo url( 'login.form' ) ?>"<?php if ( current_route_is( 'login.form' ) ): ?> class="active"<?php endif ?>>Inloggen</a>
    </li>
    <br>
    <li>
        <a href="<?php echo url( 'about' ) ?>"<?php if ( current_route_is( 'about' ) ): ?> class="active"<?php endif ?>>Over Ons</a>
    </li>
</ul>