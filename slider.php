<input checked type="radio" name="respond" id="desktop">
<article id="slider">
    <?php
    $photo_dir = 'work_photos/';
    $photos = glob($photo_dir . '*.svg');
    $total_photos = count($photos);
    $photos_per_article = 3;

    echo '
        <input checked type="radio" name="slider" id="switch1">
        <input type="radio" name="slider" id="switch2">
        <input type="radio" name="slider" id="switch3">
        <input type="radio" name="slider" id="switch4">
        <input type="radio" name="slider" id="switch5">
    ';
    echo '<div id="slides"><div id="overflow"><div class="image">';
    $current_photo = 0;
    while ($current_photo < $total_photos) {
        echo '<article style="display: flex;">';
        for ($i = 0; $i < $photos_per_article && $current_photo < $total_photos; $i++, $current_photo++) {
            echo '<img src="' . $photos[$current_photo] . '">';
        }
        echo '</article>';
    }
    echo '</div></div></div>';
    ?>
    <div id="controls">
        <?php
        $labels = '';
        for ($i = 1; $i <= ceil($total_photos / $photos_per_article); $i++) {
            $labels .= '    <label for="switch' . $i . '"></label>';
        }
        echo $labels
        ?>
    </div>
    <div id="active">
        <?php
        $labels = '';
        for ($i = 1; $i <= ceil($total_photos / $photos_per_article); $i++) {
            $labels .= '    <label for="switch' . $i . '"></label>';
        }
        echo $labels
        ?>
    </div>
</article>