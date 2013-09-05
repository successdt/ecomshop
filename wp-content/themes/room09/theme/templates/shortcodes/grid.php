<?php
	if ( !isset($columns) && $columns == '' ) $columns = 1;
?>
<?php if ( (isset($first) && $first == 'yes' ) ) : ?><div class="row"><?php endif ?>
	<span class="span<?php echo $columns ?>">
		<?php echo do_shortcode($content) ?>
	</span>
<?php if ( (isset($last) && $last == 'yes' ) ) : ?></div><?php endif ?>