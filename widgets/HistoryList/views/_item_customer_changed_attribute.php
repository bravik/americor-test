<?php

/**
 * @var $event \app\models\history\events\customer\AbstractCustomerAttributesChangedEvent
 */

/* @var $content string */
?>


<div class="bg-success ">
    <?php echo Yii::t(
            'events',
            $event->getMessage()->getKey() . '-html',
            $event->getMessage()->getParams()
    ); ?>
    <span><?= \app\widgets\DateTime\DateTime::widget(['dateTime' => $event->getTimestamp()]) ?></span>
</div>

<?php if ($event->getUser()): ?>
    <div class="bg-info"><?= $event->getUser()->username; ?></div>
<?php endif; ?>

<?php if (isset($content) && $content): ?>
    <div class="bg-info">
        <?php echo $content ?>
    </div>
<?php endif; ?>