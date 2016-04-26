<?php

$this->breadcrumbs=array(
	 Yii::t('admin', 'city'),
);


?>
<div class="container-fluid">
	<div class="row-fluid">
<div class="span7">

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
				'id' => 'question-grid',
				'type' => array(TbHtml::GRID_TYPE_CONDENSED),
				'dataProvider' => $data,
				'filter' => $model,
				'template' => "<div class=\"row-fluid\">{pager}</div>\n{items}\n<div class=\"row-fluid\">{pager}</div>",
				'pager' => array(
					'class' => 'bootstrap.widgets.TbPager',
					'maxButtonCount' => 10,
				),
				'columns' => array(
					array(
						'name' => 'id',
						'header' => '#',
						'htmlOptions' => array('style' => 'width: 5%'),
					),
					array(
						'name' => 'name',
						'value' => '$data->name',
					),
					array(
						'name' => 'code',
						'value' => '$data->code',
					),
					array(
						'header' => Yii::t('admin', 'actions'),
						'type' => 'raw',
						'value' => function($data)
						{
							echo '&nbsp;'; 
							echo TbHtml::button(Yii::t('admin', 'view'), array(
								'color' => TbHtml::BUTTON_COLOR_INVERSE,
								'size' => TbHtml::BUTTON_SIZE_MINI,
								'class' => 'action',
								'onclick' => 'javascript: document.location.href=\'' . Yii::app()->urlManager->createUrl('city/view', array('id' => $data->id)) . '\'',
							));
							
							echo TbHtml::button(Yii::t('admin', 'delete'), array(
								'color' => TbHtml::BUTTON_COLOR_WARNING,
								'size' => TbHtml::BUTTON_SIZE_MINI,
								'class' => 'action',
								'onclick' => 'javascript: if(confirm("'.yii::t('admin','confirm').'")){document.location.href=\'' . Yii::app()->urlManager->createUrl('city/delete', array('id' => $data->id)) . '\'}',
							));

						},
						'htmlOptions' => array('style' => 'width: 140px;'),
					),
				),
			));
						
	
	?>


</div>
<div class="span4"> <h4><?php echo Yii::t('admin', 'site-map',$code); ?> </h4><br>
<?php if(strlen($code)<12): ?>	
		<h5><?php echo Yii::t('admin', 'site-map-down'); ?> </h5><br>
			<?php
			for($i=0;$i<10;$i++){
					echo '<li>'.TbHtml::link($code.$i, Yii::app()->createUrl('city/index', array('code' => $code.$i))).'</li>';  
			}
			?>
							
<?php endif ?>
<?php if(strlen($code)>1): ?>	
		<h5><?php echo Yii::t('admin', 'site-map-up'); ?> </h5><br>
			<?php
				echo '<li>'.TbHtml::link(substr($code, 0, strlen($code)-1), Yii::app()->createUrl('city/index', array('code' => substr($code, 0, strlen($code)-1)))).'</li>';  
			?>
							
<?php endif ?>
</div>
	</div>
</div>