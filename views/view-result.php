<div class="opcion">
    <?php
        $widthBar = $porcentage * 5;
        $style = 'bar';

        if ($survey->getOptionSelected() == $food['food']) {
            $style = 'selected';
        }

        echo $food['food'];       
    ?>

    <div class="<?php echo $style;?>" style="width: <?php echo $widthBar . 'px;'?>"></div>
</div>