<?php
/* @var $this CommentaryController */
/* @var $model Commentary */

$this->breadcrumbs=array(
	'Commentaries'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Commentary', 'url'=>array('index')),
	array('label'=>'Create Commentary', 'url'=>array('create')),
	array('label'=>'View Commentary', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Commentary', 'url'=>array('admin')),
);
?>

<h1>Update Commentary <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>