<div class="well">
<?php
	//
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id' => 'change-login-form',
		'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
		),
	));	
	
	echo $form->textFieldControlGroup($model, 'login');
	
	echo TbHtml::submitButton(Yii::t('admin', 'change'), array(
		'class' => 'controls',
		'color' => TbHtml::BUTTON_COLOR_INVERSE,
		'name' => 'type',
		'value' => 'login',
	));
	
	$this->endWidget();
?>
</div>