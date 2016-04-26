<?php


	$this->breadcrumbs = array(
		Yii::t('admin', 'add'),
	);
?>
<div class="row-fluid">
		<div class="row-fluid">
		<div class="span3">&nbsp;</div>
		<div class="span6">
	<h1 class="droid"><?php echo Yii::t('admin', 'add-header'); ?></h1>
	<p class="under-header droid"><?php echo Yii::t('admin', 'add-text'); ?></p>
	<hr>
	<?php
		//
		$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id' => 'suggest-form',
			'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
			'hideInlineErrors' => true,
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
			),
		));	
	
		echo $form->textFieldControlGroup($model, 'name', array('span' => 6, 'rows' => 3));
		echo $form->textFieldControlGroup($model, 'code', array('span' => 6));

		
		
		echo TbHtml::submitButton(Yii::t('admin', 'save'), array(
			'color' => TbHtml::BUTTON_COLOR_INVERSE,
			'class' => 'controls',
		));
	
	
		$this->endWidget();
	?>
		</div>
		</div>
</div>