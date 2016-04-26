<div class="well">
<?php
	//
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id' => 'change-password-form',
		'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
		),
	));	

	echo $form->passwordFieldControlGroup($model, 'old');
	echo $form->passwordFieldControlGroup($model, 'pass');
	echo $form->passwordFieldControlGroup($model, 'repeat');
	
	echo TbHtml::submitButton(Yii::t('admin', 'change'), array(
		'class' => 'controls',
		'color' => TbHtml::BUTTON_COLOR_INVERSE,
		'name' => 'type',
		'value' => 'password',
	));
	
	$this->endWidget();
?>
</div>