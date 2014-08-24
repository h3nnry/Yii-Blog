<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
	array('label'=>'Change Password', 'url'=>array('passowrd', 'id'=>$model->id)),
);
?>

<?php
echo CHtml::form();
echo CHtml::textField('password');
echo CHtml::submitButton('Schimba');
echo CHtml::endForm();
?>