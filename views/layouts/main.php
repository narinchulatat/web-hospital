<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\MaterialAsset;
use app\assets\AppAsset;

MaterialAsset::register($this);
// popup css
$this->registerCssFile("http://www.jacklmoore.com/colorbox/example1/colorbox.css");
// popup js
$this->registerJsFile("http://www.jacklmoore.com/colorbox/jquery.colorbox.js", ['depends' => [\yii\web\JqueryAsset::className()]]);
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
    <style>
    .black-ribbon {   position: fixed;   z-index: 9999;   width: 70px; }
    @media only all and (min-width: 768px) { .black-ribbon { width: auto; } }

    .stick-left { left: 0; }
    .stick-right { right: 0; }
    .stick-top { top: 0; }
    .stick-bottom { bottom: 0; }
    </style>
    <!-- เริ่ม popup -->
    <!-- <script>
        function openColorBox(){
          $.colorbox({iframe:true, width:"900px", height:"600px", href: "images/1.png"});
        }
        function countDown(){
          seconds--
          $("#seconds").text(seconds);
          if (seconds === 0){
            openColorBox();
            clearInterval(i);
          }
        }
        var seconds = 2,
            i = setInterval(countDown, 1000);
    </script> -->
    <!-- สิ้นสุด popup -->
      <body>
        <?php $this->beginBody() ?>
        <img src="images/black_ribbon_top_left.png" class="black-ribbon stick-top stick-left"/>
        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => '<img src="images/moph.png" style="display:inline; vertical-align: top; height:32px;" class="img-responsive"> โรงพยาบาลน้ำยืน',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'encodeLabels'=>false,
                'items' => [
                    ['label' => '<i class="glyphicon glyphicon-home"></i> หน้าแรก', 'url' => ['/site/index']],
                    [
                        'label' => 'เกี่ยวกับ รพ.', 'visible',
                        'items' => [
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> ประวัติโรงพยาบาล', 'url' => ['/site/story']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> โครงสร้างองค์กร', 'url' => ['/site/vision_mission']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> วิสัยทัศน์ พันธกิจ', 'url' => ['/site/structure']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> บุคลากร', 'url' => ['/site/personnel']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> แผนที่', 'url' => ['/site/map']],
                        ],
                    ],
                    ['label' => 'นโยบายและแผน', 'url' => ['/site/policy_plan']],
                    ['label' => 'คลังข้อมูล', 'url' => ['/site/dhdcservice']],
                    ['label' => 'การให้บริการ', 'url' => ['/site/service']],
                    ['label' => 'ดาวน์โหลด', 'url' => ['/freelance/index']],
                    ['label' => 'ติดต่อ', 'url' => ['/site/contact']],
                //['label' => 'เกี่ยวกับ', 'url' => ['/site/about']],
                ],
            ]);

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'encodeLabels'=>false,
                'items' => [
                    [
                        'label' => 'จัดการเว็บไซต์', 'visible' => !Yii::$app->user->isGuest,
                        'items' => [
                            //'<li class="divider"></li>',
                            '<li class="dropdown-header">เมนูข่าว</li>',
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> จัดการหมวดหมู่', 'url' => ['/newscategory/index'], 'visible' => !Yii::$app->user->isGuest],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> จัดการข่าวสาร', 'url' => ['/news/admin'], 'visible' => !Yii::$app->user->isGuest],
                            '<li class="dropdown-header">เมนูไฟล์</li>',
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> อัพโหลดไฟล์', 'url' => ['/freelance/admin'], 'visible' => !Yii::$app->user->isGuest],
                            '<li class="dropdown-header">เมนูอัลบั้มภาพ</li>',
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> เพิ่มอัลบั้มภาพ', 'url' => ['/photo-library/admin'], 'visible' => !Yii::$app->user->isGuest],
                            '<li class="dropdown-header">เมนูปฏิบัติงาน/กิจกรรม</li>',
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> เพิ่มตารางปฏิบัติงาน/กิจกรรม', 'url' => ['/event/admin'], 'visible' => !Yii::$app->user->isGuest],
                            '<li class="dropdown-header">จัดการภาพ Slide</li>',
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> เพิ่มภาพ Slide', 'url' => ['/slide/index'], 'visible' => !Yii::$app->user->isGuest],

                        ],
                    ],
                    Yii::$app->user->isGuest ?
                            ['label' => 'เข้าสู่ระบบ', 'url' => ['/user/security/login']] :
                            ['label' => 'ยินดีต้อนรับ (' . Yii::$app->user->identity->username . ')', 'items' => [
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> โพรไฟล์', 'url' => ['/user/profile']],
//                            ['label' => 'ตั้งค่าโพรไฟล์', 'url' => ['/user/settings/profile']],
                            ['label' => '<i class="glyphicon glyphicon-menu-right"></i> จัดการผู้ใช้', 'url' => ['/user/admin/index']],
                            ['label' => '<i class="glyphicon glyphicon-log-out"></i> ออกจากระบบ', 'url' => ['/user/security/logout'], 'linkOptions' => ['data-method' => 'post']],
                        ]],
                //['label' => 'สมัครสมาชิก', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]);

            NavBar::end();
            ?>

            <div class="container" style="margin-top: 65px;">
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
        <?=
        \ibrarturi\scrollup\ScrollUp::widget([
            'theme' => 'image', // pill, link, image, tab
        ]);
        ?>
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
                        <div class="footer-col col-md-4" align="center">
                            <h3><i class="fa fa-globe"></i> จำนวนผู้เข้าชมเว็บ</h3>
                            <p>
                              <script type='text/javascript' src='https://www.siamecohost.com/member/gcounter/graphcount.php?page=namyuenhosp.in.th&style=02&maxdigits=10'></script>                        </div>
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
