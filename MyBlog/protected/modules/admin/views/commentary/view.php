<?php
/* @var $this CommentaryController */
/* @var $model Commentary */

$this->breadcrumbs=array(
	'Commentaries'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Commentary', 'url'=>array('index')),
	array('label'=>'Create Commentary', 'url'=>array('create')),
	array('label'=>'Update Commentary', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Commentary', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Commentary', 'url'=>array('admin')),
);
?>

<h1>View Commentary #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'content',
		'page_id',
		'created',
		'user_id',
		'guest',
	),
)); ?>
