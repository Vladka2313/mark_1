<?php
	$this->breadcrumbs = array(
		Yii::t('admin', 'tools'),
	);
?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span4"></div>
		<div class="span4">
			<h1><?php echo Yii::t('admin', 'change-form-header'); ?></h1>
		</div>
		<div class="span4"></div>
	</div>
	<div class="row-fluid">
		<div class="span3"></div>
		<div class="span6">
			<?php
				if(Yii::app()->user->hasFlash('notification'))
					echo TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS, Yii::app()->user->getFlash('notification'));
				
				if(Yii::app()->user->hasFlash('error'))
					echo TbHtml::alert(TbHtml::ALERT_COLOR_ERROR, Yii::app()->user->getFlash('error'));
				
				echo TbHtml::tabbableTabs(array(
					array(
						'label' => Yii::t('admin', 'change-login'),
						'content' => $this->renderPartial('change_login', array('model' => $user), true),
						'active' => ($tab === 'login'),
					),
					array(
						'label' => Yii::t('admin', 'change-password'),
						'content' => $this->renderPartial('change_password', array('model' => $form), true),
						'active' => ($tab === 'password'),
					),
				), array(
					'placement' => TbHtml::TABS_PLACEMENT_LEFT,
				));
			?>	
		</div>
		<div class="span3"></div>
	</div>
</div>