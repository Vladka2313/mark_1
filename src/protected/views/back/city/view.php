<?php

$this->breadcrumbs=array(
	 Yii::t('admin', 'city'),
);


?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span4">
			<h1><?php echo Yii::t('admin', 'city-header'); ?></h1>
			<div class="well">
			<h4><?php echo wordwrap($model->name, 60, '<br/>', true); ?></h4>
			<hr>

			<h5><?php echo Yii::t('admin', 'city-code') . ':'; ?></h5>
			<?php
				$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
					'id' => 'text-form',
					'layout' => TbHtml::FORM_LAYOUT_INLINE,
				));	


				echo $form->textField($model, 'code', array(
					'class' => 'field',
					'append' =>  TbHtml::submitButton(Yii::t('admin', 'update'), array(
						'color' => TbHtml::BUTTON_COLOR_WARNING,
					))
				));
				echo '<h5>'. Yii::t('admin', 'city-name') . ':'.'</h5>';
				echo $form->textField($model, 'name', array(
					'class' => 'field',
					'append' => TbHtml::button(Yii::t('admin', 'delete'), array(
						'color' => TbHtml::BUTTON_COLOR_WARNING,
						'onclick' => 'javascript: if(confirm("'.yii::t('admin','confirm').'")){document.location.href=\'' . Yii::app()->urlManager->createUrl('city/delete', array('id' => $model->id)) . '\'}',
					)) . ' ' . TbHtml::submitButton(Yii::t('admin', 'save'), array(
						'color' => TbHtml::BUTTON_COLOR_INVERSE,
					))
				));
				$this->endWidget();
			?>
			</div>
		</div>
		<div class="span8">

		</div>
	</div>
</div>


