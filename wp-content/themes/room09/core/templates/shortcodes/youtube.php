<?php $video_id = preg_replace( '/[&|&amp;]feature=([\w\-]*)/', '', $video_id ) ?>
<div class="post_video youtube">
    <iframe wmode="transparent" width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="http://www.youtube.com/embed/<?php echo $video_id; ?>?wmode=transparent" frameborder="0" allowfullscreen></iframe>
</div>