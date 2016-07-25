<?php

$this->title = Yii::$app->name;
?>
<div class="post-default-index">
    <?php
    if (!empty($posts)) {
        foreach ($posts as $post) { ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= $post->title; ?></a>
                    </h3>
                </div>
                <div class="panel-body">
                    <?= $post->content; ?>
                </div>
            </div>
        <?php }
        echo \yii\widgets\LinkPager::widget(['pagination'=>$pages]);
    }
    ?>
</div>