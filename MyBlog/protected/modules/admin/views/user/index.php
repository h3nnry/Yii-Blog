<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Change Passowrd', 'url'=>array('password', 'id'=>$model->id)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>

<p>
Here you can modify, delete, create any category you want. Be carefful! Rog fiti atenti!
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php echo CHtml::form();
echo CHtml::submitButton('Ban',array('name'=>'noban'));
echo CHtml::submitButton('Unban',array('name'=>'ban'));
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'selectableRows'=>2,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id'=>array(
			'name'=>'id',
			'headerHtmlOptions'=>array('width'=>30)),
		array(
			'class'=>'CCheckBoxColumn',
			'id'=>'user_id',
			),
		'username',
		'email',
		'password',
		'created'=>array(
			'name'=>'created',
			'value'=>'date("d-m-Y H:i", $data->created)',
			),
		'ban'=>array(
			'name' =>'ban',
			'value'=>'($data->ban==1)?"Ban":"Free"',
			'filter'=>array(0=>"Free",1=>"Ban"),
			),
		'role'=>array(
			'name' =>'role',
			'value'=>'($data->role==1)?"User":"Admin"',
			'filter'=>array(2=>"Admin",1=>"User"),
			),
		/*
		'email',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<?php CHtml::endform();?>