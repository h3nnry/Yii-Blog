<?php
/* @var $this MyController */

$this->breadcrumbs=array(
	'My',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'sorterHeader' => 'Sortare dupa',
    'summaryText'=>'{start} - {end} din {count}',
    'sortableAttributes' => array('title', 'created'),
)); ?>
