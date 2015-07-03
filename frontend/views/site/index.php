<?php
/* @var $this yii\web\View */

$this->title = 'Maykke Home Page';

?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?php echo Yii::t('frontend', 'Welcome to Maykke!');
                  if (Yii::$app->user->isGuest == FALSE) {
                      echo Yii::$app->user->identity->username;
                  }
                ?></h1>

        <p class="lead"><?php echo Yii::t('frontend', 'You are a few steps away from selling your product to USA.') ?></p>

        <?php if (Yii::$app->user->isGuest) { ?>
            <p><a class="btn btn-lg btn-success" href="/index.php?r=site/signup"><?php echo Yii::t('frontend', 'User Sign Up') ?></a></p>
        <?php } else { ?>    
            <p><a class="btn btn-lg btn-success" href="/index.php?r=company/create"><?php echo Yii::t('frontend', 'Company Sign Up') ?></a></p>
        <?php } ?>
    </div>

    
    <div class="body-content">

        <?php if (Yii::$app->user->isGuest) { ?>
    
        <div class="row">
            <div class="col-lg-4">
                <h2><?php echo Yii::t('frontend', 'Success Story') ?></h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/"><?php echo Yii::t('frontend', 'Maykke Documentation &raquo;') ?></a></p>
            </div>
            <div class="col-lg-4">
                <h2><?php echo Yii::t('frontend', 'Benefit') ?></h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/"><?php echo Yii::t('frontend', 'Maykke Forum &raquo;') ?></a></p>
            </div>
            <div class="col-lg-4">
                <h2><?php echo Yii::t('frontend', 'How it works') ?></h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Maykke Extensions &raquo;</a></p>
            </div>
        </div>

        <?php } ?>
    </div>
</div>
