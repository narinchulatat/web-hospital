<?php

use yii\widgets\ListView;
use yii\grid\GridView;
//use app\components\RctReplyWidget;
use kartik\tabs\TabsX;
use yii\helpers\Url;
use evgeniyrru\yii2slick\Slick;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
$this->title = 'โรงพยาบาลน้ำยืน อำเภอน้ำยืน จังหวัดอุบลราชธานี';
?>
<div class="container">
    <div class="site-index">
        <!-- begin carousel -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="images/image1.jpg">
                </div>
                <div class="item">
                    <img src="images/image2.jpg">
                </div>
                <div class="item">
                    <img src="images/image3.jpg">
                </div>
            </div>
        </div>
        <!-- </div> -->
        <!-- Controls -->
        <p />
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bullhorn fa-flip-horizontal"></i> ข่าวประชาสัมพันธ์</h3>
                    </div>
                    <?php
                    $newsall = $this->render('newsall', [
                        'dataProvider' => $dataProvider
                    ]);
                    $newspurchase = $this->render('newspurchase', [
                        'newspurchase' => $newspurchase
                    ]);
                    $newswork = $this->render('newswork', [
                        'newswork' => $newswork
                    ]);
                    $items = [
                        [
                            'label' => '<i class="glyphicon glyphicon-list"></i> ข่าวทั่วไป',
                            'content' => $newsall,
                            'active' => true
                        ],
                        [
                            'label' => '<i class="glyphicon glyphicon-list"></i> ข่าวรับสมัครงาน',
                            'content' => $newswork,
                        ],
                        [
                            'label' => '<i class="glyphicon glyphicon-list"></i> ข่าวจัดซื้อจัดจ้าง',
                            'content' => $newspurchase,
                        ],
                    ];
                    echo TabsX::widget([
                        'items' => $items,
                        'position' => TabsX::POS_ABOVE,
                        'bordered' => true,
                        'encodeLabels' => false
                    ]);
                    ?>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-picture-o" aria-hidden="true"></i> อัลบั้มภาพ</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        echo ListView::widget([
                            'dataProvider' => $dataProvider2,
                            'itemView' => '/photo-library/_item',
                            'layout' => '{items}{pager}',
                        ]);
                        ?>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-calendar" aria-hidden="true"></i> ตารางปฏิบัติงาน / กิจกรรม</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        echo \yii2fullcalendar\yii2fullcalendar::widget(array(
                            'id' => 'calendar',
                            'events' => $events,
                            'options' => [
                                'lang' => 'th',
                            ],
                            'clientOptions' => [
                                'eventMouseover' => new \yii\web\JsExpression("function (cellInfo, jsEvent) { eventDetail(cellInfo, jsEvent); }"),
                                'eventMouseout' => new \yii\web\JsExpression("function (cellInfo, jsEvent) { eMouseremove(cellInfo, jsEvent); }")
                            ]
                        ));
                        ?>

                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-chain-broken" aria-hidden="true"></i> ระบบ Intranet</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="bg-info">
                                    <div class="widget navy-bg p-lg text-center">
                                        <div class="m-b-md">
                                            <h2 class="font-bold no-margins">
                                                ระบบจองห้องประชุม
                                            </h2>
                                        </div>
                                        <div class="text-center">
                                            <a class="btn btn-md btn-success" href="#"> คลิกเข้าสู่ระบบ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="bg-info">
                                    <div class="widget lazur-bg p-lg text-center">
                                        <div class="m-b-md">
                                            <h2 class="font-bold no-margins">
                                                ระบบขอใช้รถส่วนกลาง
                                            </h2>
                                        </div>
                                        <div class="text-center">
                                            <a class="btn btn-md btn-danger" href="#"> คลิกเข้าสู่ระบบ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="bg-info">
                                    <div class="widget red-bg p-lg text-center">
                                        <div class="m-b-md">
                                            <h2 class="font-bold no-margins">
                                                ระบบจัดการความเสี่ยง
                                            </h2>
                                        </div>
                                        <div class="text-center">
                                            <a class="btn btn-md btn-warning" href="#"> คลิกเข้าสู่ระบบ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="bg-info">
                                    <div class="widget blue-bg p-lg text-center">
                                        <div class="m-b-md">
                                            <h2 class="font-bold no-margins">
                                                ระบบบุคลากร
                                            </h2>
                                        </div>
                                        <div class="text-center">
                                            <a class="btn btn-md btn-primary" href="#"> คลิกเข้าสู่ระบบ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-md-4">
                    <!--<div class="panel-group">-->
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-user-md" aria-hidden="true"></i> ผู้บริหาร</h4></div>
                        <div class="panel-body">
                            <div class="thumbnail" align="center">
                                <img src="images/boss_man-128.png" alt="...">
                                <div class="caption">
                                    <h4>นพ.ชัยวัฒน์  ดาราสิชฌน์</h4>
                                    <h4>ผู้อำนวยการโรงพยาบาลน้ำยืน</h4>
                                </div>
                            </div>
                            <ul class="xoxo blogroll">
                            </ul>
                        </div>
                    </div>
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="col-xs-6 col-md-4">-->
                    <!--<div class="panel-group">-->
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-link" aria-hidden="true"></i> หน่วยงานที่เกี่ยวข้อง</h4></div>
                        <div class="panel-body">
                            <ul class="xoxo blogroll">
                                <li><a href="http://www.ddc.moph.go.th/index.php" target="_blank"> กรมควบคุมโรค</a></li>
                                <li><a href="http://www.moph.go.th" target="_blank"> กระทรวงสาธารณสุข</a></li>
                                <li><a href="http://www.oic.go.th/ginfo/" target="_blank"> ฐานข้อมูลหน่วยงานภาครัฐ (GINFO²)</a></li>
                                <li><a href="http://www.thaihealth.or.th" target="_blank"> สสส.</a></li>
                                <li><a href="http://www.nhso.go.th" target="_blank"> สำนักงานหลักประกันสุขภาพแห่งชาติ</a></li>
                                <li><a href="http://www.spbket10.com/" target="_blank"> สำนักงานเขตสุขภาพที่ 10</a></li>
                                <li><a href="http://ops.moph.go.th/" target="_blank"> สำนักปลัดกระทรวงสาธารณสุข</a></li>
                                <li><a href="http://beid.ddc.moph.go.th/beid_2014/th/home" target="_blank"> สำนักโรคติดต่ออุบัติใหม่</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="col-xs-6 col-md-4">-->
                    <!--<div class="panel-group">-->
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-cogs" aria-hidden="true"></i> ระบบ MIS</h4></div>
                        <div class="panel-body">
                            <ul class="xoxo blogroll">
                                <li><a href="#" target="_blank"> DHDC</a></li>
                                <li><a href="http://203.157.166.6/chronic/index.php" target="_blank"> Chronic Link</a></li>
                                <li><a href="http://eclaim.nhso.go.th/webComponent/contact/ContactAction.do" target="_blank"> e-Claim</a></li>
                                <li><a href="http://hdc.phoubon.in.th/hdc/main/index.php" target="_blank"> Health Data Center (HDC)</a></li>
                                <li><a href="http://eclaim.nhso.go.th/webComponent/" target="_blank"> OP/PP Individual Record</a></li>
                                <li><a href="http://203.157.81.35/mis/" target="_blank"> Thai Traditional Medicine (TTM)</a></li>
                                <li><a href="http://www.coopubon.com/coopubon/info_coop1/coop_login.php" target="_blank"> ข้อมูลสมาชิกสหกรณ์ออมทรัพย์ฯ</a></li>
                                <li><a href="http://www.phoubon.in.th/html/fct.html" target="_blank"> ทีมหมอครอบครัว (FCT)</a></li>
                                <li><a href="http://203.157.166.6/chronic/index.php" target="_blank"> ระบบคลังข้อมูลโรคไม่ติดต่อเรื้อรัง</a></li>
                                <li><a href="http://phoubonbook.phoubon.in.th/" target="_blank"> ระบบหนังสือเวียน (สสจ.อุบลราชธานี)</a></li>
                                <li><a href="http://www.osccthailand.go.th/Front/" target="_blank"> ศูนย์ช่วยเหลือสังคม (OSCC)</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="col-xs-6 col-md-4">-->
                    <!--<div class="panel-group">-->
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-h-square" aria-hidden="true"></i> โรงพยาบาลชุมชน</h4></div>
                        <div class="panel-body">
                            <div>
                                <ul class="xoxo blogroll">
                                    <li><a href="http://www.kkphospital.go.th" target="_blank">โรงพยาบาลกุดข้าวปุ้น</a></li>
                                    <li><a href="http://www.dmdhospital.com/" target="_blank">โรงพยาบาลดอนมดแดง</a></li>
                                    <li><a href="http://www.trakanhospital.org/" target="_blank">โรงพยาบาลตระการพืชผล</a></li>
                                    <li><a href="http://www.tansumhospital.go.th/" target="_blank">โรงพยาบาลตาลสุม</a></li>
                                    <li><a href="http://www.nlhospital.go.th/" target="_blank">โรงพยาบาลนาจะหลวย</a></li>
                                    <li><a href="http://www.cupnatan.com/" target="_blank">โรงพยาบาลนาตาล</a></li>
                                    <li><a href="http://www.bundharikhos.com/hospital/" target="_blank">โรงพยาบาลบุณฑริก</a></li>
                                    <li><a href="http://www.pbhosp.com/" target="_blank">โรงพยาบาลพิบูลมังสาหาร</a></li>
                                    <li><a href="http://www.m30hosp.com/" target="_blank">โรงพยาบาลม่วงสามสิบ</a></li>
                                    <li><a href="http://www.warin.go.th/" target="_blank">โรงพยาบาลวารินชำราบ</a></li>
                                    <li><a href="http://www.smmhospital.com/" target="_blank">โรงพยาบาลศรีเมืองใหม่</a></li>
                                    <li><a href="http://www.detudomhospital.org" target="_blank">โรงพยาบาลสมเด็จพระยุพราชเดชอุดม</a></li>
                                    <li><a href="https://sunpasit.go.th/2014/index.php" target="_blank">โรงพยาบาลสรรพสิทธิประสงค์</a></li>
                                    <li><a href="http://www.sirinhospital.go.th/" target="_blank">โรงพยาบาลสิรินธร</a></li>
                                    <li><a href="http://www.kmhos.org/main/" target="_blank">โรงพยาบาลเขมราฐ</a></li>
                                    <li><a href="http://www.knhosp.go.th/" target="_blank">โรงพยาบาลเขื่องใน</a></li>
                                    <li><a href="http://www.khongchiamhospital.com/" target="_blank">โรงพยาบาลโขงเจียม</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div
</div>
<?php
$this->registerJsFile('@web/js/main.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
