<?php
/* @var $this PageController */

$this->breadcrumbs=array(
	'Category:'.$category->title,
);
?>
<?php
foreach($models as $row)
{
	echo CHtml::link('<h3>'.$row->title.'</h3>', array('view','id'=>$row->id));
	echo substr($row->content,0,300);
	echo CHtml::link('Read more...', array('view','id'=>$row->id));
	echo'<br /><hr />';
}
if(!$models)
echo "Shit...I have no posted anything here...";