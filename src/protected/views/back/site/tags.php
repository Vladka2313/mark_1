<?php


	$this->breadcrumbs = array(
		Yii::t('admin', 'tags'),
	);
?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span3">&nbsp;</div>
		<div class="span6">
			<h1><?php echo Yii::t('admin', 'tags-header'); ?></h1>
			<div class="well">
				<h5><?php echo Yii::t('admin', 'main-tag-text') . ':'; ?></h5>
				
				<?php
					$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
						'id' => 'main-tag-form',
						'layout' => TbHtml::FORM_LAYOUT_INLINE,
					));	
	
					echo $form->textField($mainTag, 'value', array(
						'id' => 'main-tag-field',
						'class' => 'field',
						'append' => TbHtml::resetButton(Yii::t('admin', 'reset'), array(
							'color' => TbHtml::BUTTON_COLOR_WARNING,
						)) . ' ' . TbHtml::submitButton(Yii::t('admin', 'save'), array(
							'color' => TbHtml::BUTTON_COLOR_INVERSE,
							'name' => 'type',
							'value' => 'main',
						)),
					));
					
					$this->endWidget();
				?>
				<hr>
				<h5><?php echo Yii::t('admin', 'common-tag-text') . ':'; ?></h5>
				<?php
					$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
						'id' => 'common-tag-form',
						'layout' => TbHtml::FORM_LAYOUT_INLINE,
					));	
	
					echo $form->textField($commonTag, 'value', array(
						'id' => 'common-tag-field',
						'class' => 'field',
						'append' => TbHtml::resetButton(Yii::t('admin', 'reset'), array(
							'color' => TbHtml::BUTTON_COLOR_WARNING,
						)) . ' ' . TbHtml::submitButton(Yii::t('admin', 'save'), array(
							'color' => TbHtml::BUTTON_COLOR_INVERSE,
							'name' => 'type',
							'value' => 'common',
						)),
					));
					
					$this->endWidget();
				?>
				<p class="hint"><?php echo Yii::t('admin', 'regular') . ': ' . Yii::app()->params['regular']['code']; ?></p>
			</div>
		</div>
		<div class="span3">&nbsp;</div>
	</div>
</div>