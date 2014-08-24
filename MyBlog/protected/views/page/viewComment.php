<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
    <?php echo CHtml::encode($data->content); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
    <?php echo date("d-m-Y H:i", $data->created); ?>
    <br />

    <?php if($data->user_id != false): ?>
    <b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
    <?php echo CHtml::encode($data->user->username); ?>
    <br />
    <?php endif;?>

    <?php if($data->user_id == false): ?>
    <b><?php echo CHtml::encode($data->getAttributeLabel('guest')); ?>:</b>
    <?php echo CHtml::encode($data->guest); ?>
    <br />
    <?php endif;?>
    <hr />

</div>
