<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Pages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Page', 'url'=>array('index')),
	array('label'=>'Create Page', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#page-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pages</h1>

<p><?php Category::all(); ?>
Here you can modify, delete, create any page you want. Be carefful! Rog fiti atenti!
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'page-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id'=>array(
			'name'=>'id',
			'headerHtmlOptions'=>array('width'=>30),
			),
		'title',
		'created'=>array(
			'name'=>'created',
			'value'=>'date("d-m-Y H:i", $data->created)',
			'filter'=>Category::all(),
			),
		'status'=>array(
			'name' =>'status',
			'value'=>'($data->status==1)?"Hidden":"Displayed"',
			'filter'=>array(1=>"Hidden",0=>"Displayed"),
			),
		'category_id'=>array(
			'name'=>'category_id',
			'value'=>'$data->category->id',
			'filter'=>Category::all(),
			),
		array(
			'class'=>'CButtonColumn',
		),
	),
));
?>
