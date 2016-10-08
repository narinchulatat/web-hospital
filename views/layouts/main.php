<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\MaterialAsset;

MaterialAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => '<img src="images/moph.png" style="display:inline; vertical-align: top; height:32px;"> โรงพยาบาลน้ำยืน',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => [
                    ['label' => 'หน้าแรก', 'url' => ['/site/index']],
                    [
                        'label' => 'เกี่ยวกับ รพ.', 'visible',
                        'items' => [
                            ['label' => 'ประวัติโรงพยาบาล', 'url' => ['/site/story']],
                            ['label' => 'โครงสร้างองค์กร', 'url' => ['/site/vision_mission']],
                            ['label' => 'วิสัยทัศน์ พันธกิจ', 'url' => ['/site/structure']],
                            ['label' => 'บุคลากร', 'url' => ['/site/personnel']],
                            ['label' => 'แผนที่', 'url' => ['/site/map']],
                        ],
                    ],
                    ['label' => 'นโยบายและแผน', 'url' => ['/site/policy_plan']],
                    ['label' => 'คลังข้อมูล', 'url' => ['/site/dhdcservice']],
                    //['label' => 'กิจกรรม', 'url' => ['/photo-library/index']],
                    ['label' => 'ดาวน์โหลด', 'url' => ['/freelance/index']],
                    ['label' => 'ติดต่อ', 'url' => ['/site/contact']],
                //['label' => 'เกี่ยวกับ', 'url' => ['/site/about']],
                ],
            ]);

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    [
                        'label' => 'จัดการเว็บไซต์', 'visible' => !Yii::$app->user->isGuest,
                        'items' => [
                            //'<li class="divider"></li>',
                            '<li class="dropdown-header">เมนูข่าว</li>',
                            ['label' => 'จัดการหมวดหมู่', 'url' => ['/newscategory/index'], 'visible' => !Yii::$app->user->isGuest],
                            ['label' => 'จัดการข่าวสาร', 'url' => ['/news/admin'], 'visible' => !Yii::$app->user->isGuest],
                            '<li class="dropdown-header">เมนูไฟล์</li>',
                            ['label' => 'อัพโหลดไฟล์', 'url' => ['/freelance/admin'], 'visible' => !Yii::$app->user->isGuest],
                            '<li class="dropdown-header">เมนูอัลบั้มภาพ</li>',
                            ['label' => 'เพิ่มอัลบั้มภาพ', 'url' => ['/photo-library/admin'], 'visible' => !Yii::$app->user->isGuest],
                            '<li class="dropdown-header">เมนูปฏิบัติงาน/กิจกรรม</li>',
                            ['label' => 'เพิ่มตารางปฏิบัติงาน/กิจกรรม', 'url' => ['/event/admin'], 'visible' => !Yii::$app->user->isGuest],
                        ],
                    ],
                    Yii::$app->user->isGuest ?
                            ['label' => 'เข้าสู่ระบบ', 'url' => ['/user/security/login']] :
                            ['label' => 'ยินดีต้อนรับ(' . Yii::$app->user->identity->username . ')', 'items' => [
                            ['label' => 'โพรไฟล์', 'url' => ['/user/profile']],
                            ['label' => 'ตั้งค่าโพรไฟล์', 'url' => ['/user/settings/profile']],
                            ['label' => 'จัดการผู้ใช้', 'url' => ['/user/admin/index']],
                            ['label' => 'ออกจากระบบ', 'url' => ['/user/security/logout'], 'linkOptions' => ['data-method' => 'post']],
                        ]],
                //['label' => 'สมัครสมาชิก', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]);

            NavBar::end();
            ?>

            <div class="container" style="margin-top: 70px;">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= $content ?>
            </div>

        </div>

        <!--<footer class="footer1">
            <div class="container">
                <p class="pull-left">&copy;  <?= date('Y') ?>  โรพยาบาลน้ำยืน อำเภอน้ำยืน จังหวัดอุบลราชธานี 34260 โทรศัพท์ : 0-4500-0000</p>
                <p class="pull-right">พัฒนาโดย <a href="https://www.facebook.com/FREEDOOM.FINO" target="_blank"> นายนรินทร์ จุลทัศน์ </a> ตำแหน่งนักวิชาการคอมพิวเตอร์ </p>
            </div>
        </footer>-->
        <?= \ibrarturi\scrollup\ScrollUp::widget([
        'theme' => 'image',   // pill, link, image, tab
        ]); ?>
        <footer class="text-center">
            <div class="footer-above">
                <div class="container">
                    <div class="row">
                        <div class="footer-col col-md-4">
                            <h3><i class="fa fa-map-marker" aria-hidden="true"></i> ที่ตั้ง</h3>
                            <p>โรงพยาบาลน้ำยืน 234 หมู่ 7
                                <br>ต.สีวิเชียร อ.น้ำยืน จ.อุบลราชธานี 34260
                                <br>โทร 0-4537-1097-8</p>

                        </div>
                        <div class="footer-col col-md-4">
                            <h3><i class="fa fa-fw fa-share-alt"></i> Around the Web</h3>
                            <ul class="list-inline">
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-col col-md-4">
                            <h3><i class="fa fa-fw fa fa-h-square"></i> เกี่ยวกับ</h3>
                            <p>กำลังปรับปรุง...</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-below">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="pull-left">&copy;  <?= date('Y') ?>  โรพยาบาลน้ำยืน</p>
                            <p class="pull-right">พัฒนาโดย <a href="https://www.facebook.com/FREEDOOM.FINO" target="_blank"> นายนรินทร์ จุลทัศน์ </a> ตำแหน่งนักวิชาการคอมพิวเตอร์ </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
