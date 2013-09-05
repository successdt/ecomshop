<?php
	$classes = array( 'three-fourth' );
	
    // additional classes
    if( $class != '' )    
        $classes[] = $class;
	
	// last
	$classes[] = (isset($last) && $last == 'yes' ) ? 'last' : '';
?>

<div class="<?php echo implode( $classes, ' ' ); ?>"><?php echo yit_addp($content); ?></div>