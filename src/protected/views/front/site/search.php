<div class="row-fluid droid">
	<div class="span12">
		<h2 class="droid"><?php echo Yii::t('main', 'result') ; ?></h2>
		<hr>
		
		<?php if(count($cities)): ?>
			<ol>
			
			<?php foreach($cities as $city): ?>
				<li><?php echo TbHtml::link(Yii::t('main', 'city-format',array('{n}'=>$city->name,'{m}'=>$city->code)), Yii::app()->createUrl('city/view', array('code' => $city->code)), array('pop' => $city->id)); ?></li>
			<?php endforeach ?>
			
			<?php if(count($cities) < $max): ?>
				<p class="nothing"><?php echo Yii::t('main', 'nothing-more'); ?></p>
			<?php endif ?>
			</ol>
		<?php else: ?>
			<p class="nothing"><?php echo Yii::t('main', 'nothing'); ?></p>
		<?php endif ?>
	
	</div>

</div>
