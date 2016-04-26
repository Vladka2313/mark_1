<!doctype html>
        <!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en-US"> <![endif]-->
        <!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en-US"> <![endif]-->
        <!--[if IE 8]>    <html class="lt-ie9" lang="en-US"> <![endif]-->
        <!--[if gt IE 8]><!--> <html lang="en-US"> <!--<![endif]-->
        <head>
                <!-- META TAGS -->
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <title><?php echo CHtml::encode($this -> pageTitle); ?></title>

                <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/images/favicon.png" />


                <!-- Google Web Fonts-->
                <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
                <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
                <link href="http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css">

                <!-- Style Sheet-->
                <?php $this->tryIncludeCss('/../css/responsive5152.css', 'all'); ?>
                <?php $this->tryIncludeCss('/../js/prettyphoto/prettyPhotoaeb9.css', 'all'); ?>
                <?php $this->tryIncludeCss('/../css/main5152.css', 'all'); ?>
                <?php $this->tryIncludeCss('/../css/custom5152.css', 'all'); ?>
    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?sensor=FALSE&language=de">//key=AIzaSyD1e8z6tu-H4FBN8DmBNKdIc9AkHcOEfsU
    </script>

                <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
                <!--[if lt IE 9]>
                <script src="js/html5.js"></script>
                <![endif]-->
        </head>

        <body>

                <!-- Start of Header -->
                <div class="header-wrapper">
                        <header>
                                <div class="container">


                                        <div class="logo-container">
                                                <!-- Website Logo -->
                                                <a href="<?php echo Yii::app()->createUrl('site/index'); ?>"  title="<?php echo Yii::t('main', 'name')?>">
                                                	<span class="logo droid"><?php echo Yii::t('main', 'name'); ?></span>
                                                </a>
                                        </div>


                                        <!-- Start of Main Navigation -->
                                        <nav class="main-nav">
                                                <div  class="menu-top-menu-container">
									<?php
										$this->widget('zii.widgets.CMenu', array(
											'htmlOptions' => array( 'class' => 'clearfix','id'=>'menu-top-menu'),
											'activeCssClass'=>'current-menu-item',
											'submenuHtmlOptions' => array( 'class' =>'sub-menu'),
											'items' => array(
												 array('label' => Yii::t('main','menu-title')),
                                                //array('label' => '02', 'url' => array('vorwahl/02')),
												array('label' => '03', 'url' => array('vorwahl/03')),
												array('label' => '04', 'url' => array('vorwahl/04')),
												array('label' => '05', 'url' => array('vorwahl/05')),
												array('label' => '06', 'url' => array('vorwahl/06')),
												//array('label' => '07', 'url' => array('vorwahl/07')),
                                                //array('label' => '08', 'url' => array('vorwahl/08')),
												//array('label' => '09', 'url' => array('vorwahl/09')),
											),
										));
									?>
                                                </div>
                                        </nav>
                                        <!-- End of Main Navigation -->

                                </div>
                        </header>
                </div>
                <!-- End of Header -->

                <!-- Start of Search Wrapper -->
                <div class="search-area-wrapper">
                        <div class="search-area container">
                                <p class="search-tag-line"><?php echo Yii::t('main', 'search-title'); ?></p>
								<?php									
									echo TbHtml::beginFormTb(TbHtml::FORM_LAYOUT_INLINE, array('site/search'), 'get', array(
										'id' => 'search-form',
										'class' => 'search-form clearfix',
										'autocompete' => 'off',
									));
									
									echo TbHtml::textField('token', $this->searchQuery, array('id' => 'search', 'class' => 'search-term', 'placeholder' => Yii::t('main', 'search-query')));
									//echo TbHtml::numberField('code', $this->searchCode, array( 'class' => 'search-term length', 'min'=>0, 'placeholder' => Yii::t('main', 'search-code')));
									
									echo TbHtml::submitButton(Yii::t('main', 'search-button'), array('class' => 'search-btn', 'name' => ''));
									echo TbHtml::endForm();
								?>
                        </div>
                </div>
                <!-- End of Search Wrapper -->

                <!-- Start of Page Container -->
                <div class="page-container">
                        <div  class="container">
								<?php echo $content; ?>
                        </div>
                </div>
                <!-- End of Page Container -->

                <!-- Start of Footer -->
                <footer id="footer-wrapper">

                        <!-- Footer Bottom -->
                        <div id="footer-bottom-wrapper">
                                <div id="footer-bottom" class="container">
                                        <div  class="row">
                                                <div class="span6">
                                                        <p class="copyright">
                                                        <?php echo Yii::t('main', 'copyright'); ?>
                                                        </p>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <!-- End of Footer Bottom -->

                </footer>
                <!-- End of Footer -->

                <a href="#top" id="scroll-top"></a>

                <!-- script -->
                <!--<script type='text/javascript' src='js/jquery-1.8.3.min.js'></script>-->
                <?php $this->tryIncludeJs('/../js/jquery.easing.1.3.js', CClientScript::POS_END); ?>
                <?php $this->tryIncludeJs('/../js/prettyphoto/jquery.prettyPhoto.js', CClientScript::POS_END); ?>
                <?php $this->tryIncludeJs('/../js/jflickrfeed.js', CClientScript::POS_END); ?>
                <?php $this->tryIncludeJs('/../js/jquery.liveSearch.js', CClientScript::POS_END); ?>
                <?php $this->tryIncludeJs('/../js/jquery.form.js', CClientScript::POS_END); ?>
                <?php $this->tryIncludeJs('/../js/jquery.validate.min.js', CClientScript::POS_END); ?>
                <?php $this->tryIncludeJs('/../js/custom.js', CClientScript::POS_END); ?>
        </body>
</html>