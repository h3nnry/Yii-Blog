<?php
/* @var $this PageController */

$this->breadcrumbs=array(
	'Category:'.$models->category->title=>array('index','id'=>$models->category_id),
	$models->title,
);
?>
<h1><?php echo $models->title;?></h1>
<h5>Creation date: <?php echo date('d-m-Y H:i',$models->created)?></h5>
<?php
echo $models->content;
?>


<hr width="100%" />
<?php if(Yii::app()->user->hasFlash('comment')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('comment'); ?>
</div>
<?php else: ?>
	<?php
	echo $this->renderPartial('commentary',array('model'=>$newComment));
	?>
<?php endif; ?>
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>Commentary::getComment($models->id),
    'itemView'=>'viewComment',
)); ?>