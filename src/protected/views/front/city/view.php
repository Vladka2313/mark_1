<?php
/* @var $this CityController */
/* @var $model City */
?>
<div class="span7" >
<h2><?php echo Yii::t('main','looking-for',$code) ?></h2>
<?php $count=count($model); ?>
<?php if($isFound): ?>
        <?php if($subCode==''): ?>
				<span class="span7"><h4><?php echo  Yii::t('main','city-number',$count).$code; ?></h4></span><br>
		<?php else: ?>
				<span class="span7"><h4><?php echo Yii::t('main', 'city-founded',array('{code}'=>$code,'{searchCode}'=>$searchCode,'{subCode}'=>$subCode)); ?></h4></span><br>
				<span class="span7"><h4><?php echo  Yii::t('main','city-number',$count).$searchCode; ?></h4></span><br>
		<?php endif ?>	
		<span class="span6">
		<ol>
		<?php foreach($model as $city): ?>
				<li><?php echo Yii::t('main', 'city-format',array('{n}'=>$city->name,'{m}'=>$city->code)); ?></li>  
		<?php endforeach ?>
		</ol>
		</span>		
		<br>
		<script>
				$(document).ready(function() {
				initialize('<?php echo $model[0]->name;?>');
				});
		</script>
		<div id="map_canvas" class="google_map_style"></div>
<?php else: ?>
<h3><?php echo Yii::t('main','posible'); ?></h3>  
<?php
		$this->widget('bootstrap.widgets.TbGridView', array(
			'id' => 'question-grid',
			'type' => array(TbHtml::GRID_TYPE_CONDENSED, TbHtml::GRID_TYPE_BORDERED),
			'dataProvider' => $model,
			'template' => '<div class="sub">{items}</div><div class="row-fluid page">{pager}</div>',
			'pager' => array(
				'class' => 'bootstrap.widgets.TbPager',
				'maxButtonCount' => 10,
			),
			'columns' => array(
				array(
					'name' => 'City',
					'type' => 'raw',
					'value' => function($data)
					{
						echo TbHtml::link(Yii::t('main', 'city-format',array('{n}'=>$data->name,'{m}'=>$data->code)), Yii::app()->createUrl('city/view', array('code' => $data->code)), array('pop' => $data->id));
					},
				),
			),
		));
	?>

<?php endif; ?>
</div>
<div class="span4"> <h4><?php echo Yii::t('admin', 'site-map',$code); ?> </h4><br>
<?php if(strlen($code)<12): ?>	
		<h5><?php echo Yii::t('admin', 'site-map-down'); ?> </h5><br>
			<ul>
			<?php
			for($i=0;$i<10;$i++){
					echo '<li>'.TbHtml::link($code.$i, Yii::app()->createUrl('city/view', array('code' => $code.$i))).'</li>';  
			}
			?>
			</ul>
							
<?php endif ?>
<?php if(strlen($code)>1): ?>	
		<h5><?php echo Yii::t('admin', 'site-map-up'); ?> </h5><br>
			<?php
				echo '<li>'.TbHtml::link(substr($code, 0, strlen($code)-1), Yii::app()->createUrl('city/view', array('code' => substr($code, 0, strlen($code)-1)))).'</li>';  
			?>
							
<?php endif ?>
</div>



