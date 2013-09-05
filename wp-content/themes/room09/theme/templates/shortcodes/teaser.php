<?php

$title = ( isset($title) ) ? $title : '';
$image = ( isset($image) ) ? esc_url($image) : '';
$link = ( isset($link) ) ? esc_url($link) : '';
$read_more = ( isset($read_more) ) ? $read_more : '';
?>

<div class="teaser">
    <div class="image">
        <img src="<?php echo $image ?>" alt="<?php echo $title ?>" />
        <?php if ( $title != '' ) { ?>
            <h2><?php echo $title ?></h2>
        <?php } ?>
        <?php if ( $link != '') { ?>
            <p><a href="<?php echo $link ?>"><?php echo $read_more ?></a></p>
        <?php } else { ?>
            <p><?php echo $read_more ?></p>
        <?php } ?>
    </div>
</div>