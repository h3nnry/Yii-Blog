<?php
/* @var $this CommentaryController */
/* @var $model Commentary */

$this->breadcrumbs=array(
	'Commentaries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Commentary', 'url'=>array('index')),
	array('label'=>'Manage Commentary', 'url'=>array('admin')),
);
?>

<h1>Create Commentary</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>