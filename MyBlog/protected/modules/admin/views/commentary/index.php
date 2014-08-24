<?php
/* @var $this CommentaryController */
/* @var $model Commentary */

$this->breadcrumbs=array(
	'Commentaries'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Commentary', 'url'=>array('index')),
	array('label'=>'Create Commentary', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#commentary-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Commentaries</h1>

<p>
Here you can modify, delete, create any commentary you want. Be carefful! Rog fiti atenti!
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>



</div><!-- search-form -->
<?php
echo CHtml::form();
echo CHtml::submitButton('Show', array('name'=>'noban'));
echo CHtml::submitButton('Hide', array('name'=>'ban'));
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'commentary-grid',
	'selectableRows'=>2,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id'=>array(
			'name'=>'id',
			'headerHtmlOptions'=>array('width'=>30)),
		array(
			'class'=>'CCheckBoxColumn',
			'id'=>'post_id',
			),
		'content',
		'status'=>array(
			'name' =>'status',
			'value'=>'($data->status==1)?"Displayed":"Hidden"',
			'filter'=>array(1=>"Displayed",0=>"Hidden"),
			),
		'page_id'=>array(
			'name'=>'page_id',
			'value'=>'$data->page->title',
			//'filter'=>Page::all(),
			),
		'created'=>array(
			'name'=>'created',
			'value'=>'date("d-m-Y H:i", $data->created)',
			),
		'user_id'=>array(
			'name'=>'user_id',
			'value'=>'$data->user->username',
			//'filter'=>User::all(),
			),
		'guest',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<?php echo CHtml::endForm();?>