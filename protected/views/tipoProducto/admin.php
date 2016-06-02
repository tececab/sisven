<?php
/* @var $this TipoProductoController */
/* @var $model TipoProductoModel */

$this->breadcrumbs=array(
	'Tipo Producto Models'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TipoProductoModel', 'url'=>array('index')),
	array('label'=>'Create TipoProductoModel', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tipo-producto-model-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tipo Producto Models</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tipo-producto-model-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID_TPRO',
		'ID_EST',
		'TIPO_TPRO',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
