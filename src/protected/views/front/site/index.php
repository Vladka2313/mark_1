<?php
	if(Yii::app()->user->hasFlash('notification'))
		echo TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS, Yii::app()->user->getFlash('notification'));	
?>
<div class="row-fluid droid">
	<div class="span6">
		<h1 class="droid"><?php echo Yii::t('main', 'popular-city'); ?></h1>
		<hr>
		<ul>
        <?php foreach($popular as $city): ?>
                <li><?php echo TbHtml::link(Yii::t('main', 'city-format',array('{n}'=>$city->name,'{m}'=>$city->code)), Yii::app()->createUrl('city/view', array('code' => $city->code)), array('pop' => $city->id)); ?></li> 
        <?php endforeach ?>
        </ul>
	</div>

	<div class="span6 about">
		<p><?php echo Yii::t('main', 'welcome'); ?></p>
		<p><?php echo Yii::t('main', 'about'); ?></p>
	</div>
</div>
