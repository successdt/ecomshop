<?php	
	$last_class = ( isset($last) && $last == 'yes' ) ? ' last' : '';
?>

<div class="<?php echo $class.$last_class; ?>">
	<h3><span><?php echo $title; ?></span></h3> 
	<?php echo $content; ?>
</div>