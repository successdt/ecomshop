<?php 
	$time = ( isset($time) && $time == 'yes' ) ? 'true' : 'false';
	$replies = ( isset($replies) && $replies == 'yes' ) ? 'true' : 'false';	
?>

<div class="<?php echo $class; ?>"></div>

<script type="text/javascript">
jQuery(function($){
    $('.<?php echo $class; ?>').tweetable({
        id: 'tweets',
        username: '<?php echo $username; ?>', 
        time: <?php echo $time; ?>, 
        limit: <?php echo $items; ?>, 
        replies: <?php echo $replies; ?>
    });
});
</script>