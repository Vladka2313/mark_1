<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title><?php echo CHtml::encode($this -> pageTitle); ?></title>
		<link rel="shortcut icon" href="images/favicon.png" />
	</head>
	<body class="euro-sans-pro">
		<nav>
			<?php
				$this->widget('bootstrap.widgets.TbNavbar', array(
				    'brandLabel' => false,
				    'items' => array(
				        array(
				            'class' => 'bootstrap.widgets.TbNav',
				            'items' => array(
				                array('label' => Yii::t('admin', 'City'), 'url' => array('city/index')), // 'active' => true
								array('label' => Yii::t('admin', 'Add'), 'url' => array('site/add')),
				                array('label' => Yii::t('admin', 'tags'), 'url' => array('site/tags')),
				                array('label' => Yii::t('admin', 'tools'), 'url' => array('site/tools')),
				                array('label' => Yii::t('admin', 'logout'), 'url' => array('site/logout')),
				            ),
				        ),
				    ),
				));
			?>
		</nav>
		<header class="admin-header vera-humana">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span6 header">
					<?php echo Yii::t('admin', 'name'); ?>
					</div>
					<div class="span4 stat">
					<?php echo Yii::t('admin', 'city-statistic', City::model()->count()); ?><br />

					</div>
					<div class="span2"></div>
				</div>
			</div>
		</header>
		<section class="bar">
			<?php if($this->breadcrumbs): ?>
			<div class="breadcrumbs"><?php $this->widget('bootstrap.widgets.TbBreadcrumb', array('links' => $this->breadcrumbs)); ?></div>
			<?php endif ?>
		</div>
		<section class="content">
			<?php echo $content; ?>
		</section>	
	</body>
</html>
