<div class="form">
<?php
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id' => 'login-form',
		'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
	));
?>
	<div class="logo vera-humana">
	<?php echo Yii::t('admin', 'name'); ?>
	</div>
	<div class="form-content">
	<?php
		echo $form->textField($model, 'login', array('required' => 'required', 'placeholder' => Yii::t('admin', 'login-placeholder'), 'class' => 'login'));
		echo $form->passwordField($model, 'password', array('required' => 'required', 'placeholder' => Yii::t('admin', 'password-placeholder'), 'class' => 'pass'));
		echo $form->checkBoxControlGroup($model, 'rem');
	?>
		<div class="action">
			<div class="white">&nbsp;</div>
			<div>
			<?php
				echo TbHtml::submitButton(Yii::t('admin', 'login'), array('color' => TbHtml::BUTTON_COLOR_INVERSE));
			?>
			</div>
		</div>
	</div>
<?php
	$this->endWidget();	
?>
</div>