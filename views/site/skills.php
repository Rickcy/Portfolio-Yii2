<?php


use yii\helpers\Url;

$this->title = 'My Skills | Personal Page Portfolio';
?>
<div class="site-page">
    <section id="services" class="pfblock pfblock-gray">
        <div class="container">
            <div class="row">

                <div class="col-sm-6 col-sm-offset-3">

                    <div class="pfblock-header wow fadeInUp">
                        <h2 class="pfblock-title">This is what I do</h2>
                        <div class="pfblock-line"></div>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-sm-3">

                    <div class="iconbox wow slideInLeft">
                        <div class="iconbox-icon">
                            <span class="icon-magic-wand"></span>
                        </div>
                        <div class="iconbox-text">
                            <h3 class="iconbox-title">Web Design</h3>

                        </div>
                    </div>

                </div>

                <div class="col-sm-3">

                    <div class="iconbox wow slideInLeft">
                        <div class="iconbox-icon">
                            <span class="icon-puzzle"></span>
                        </div>
                        <div class="iconbox-text">
                            <h3 class="iconbox-title">Front-end</h3>

                        </div>
                    </div>

                </div>

                <div class="col-sm-3">

                    <div class="iconbox wow slideInRight">
                        <div class="iconbox-icon">
                            <span class="icon-puzzle"></span>
                        </div>
                        <div class="iconbox-text">
                            <h3 class="iconbox-title">Back-end</h3>

                        </div>
                    </div>

                </div>

                <div class="col-sm-3">

                    <div class="iconbox wow slideInRight">
                        <div class="iconbox-icon">
                            <span class="icon-question"></span>
                        </div>
                        <div class="iconbox-text">
                            <h3 class="iconbox-title">Consultation</h3>

                        </div>
                    </div>

                </div>

            </div><!-- .row -->
        </div><!-- .container -->
    </section>

<section class="pfblock pfblock-gray" id="skills">



        <div class="row skills">
            <div class="container">
            <div class="row">

                <div class="col-sm-6 col-sm-offset-3">

                    <div class="pfblock-header wow fadeInUp">
                        <h2 class="pfblock-title">My Skills</h2>
                        <div class="pfblock-line"></div>

                    </div>

                </div>

            </div><!-- .row -->
            <div class="col-sm-6 col-md-2 text-center">
						<span data-percent="55" class="chart easyPieChart" style="width: 140px; height: 140px; line-height: 140px;">
                            <span class="percent">55</span>
                        </span>
                <h4 class="text-center">Photoshop|Illustrator</h4>
            </div>
            <div class="col-sm-6 col-md-2 text-center">
						<span data-percent="90" class="chart easyPieChart" style="width: 140px; height: 140px; line-height: 140px;">
                            <span class="percent">90</span>
                        </span>
                <h4 class="text-center">HTML|CSS</h4>
            </div>
            <div class="col-sm-6 col-md-2 text-center">
						<span data-percent="65" class="chart easyPieChart" style="width: 140px; height: 140px; line-height: 140px;">
                            <span class="percent">65</span>
                        </span>
                <h4 class="text-center">AngularJS</h4>
            </div>
            <div class="col-sm-6 col-md-2 text-center">
						<span data-percent="80" class="chart easyPieChart" style="width: 140px; height: 140px; line-height: 140px;">
                            <span class="percent">80</span>
                        </span>
                <h4 class="text-center">Javascript|Jquery</h4>
            </div>
            <div class="col-sm-6 col-md-2 text-center">
						<span data-percent="60" class="chart easyPieChart" style="width: 140px; height: 140px; line-height: 140px;">
                            <span class="percent">60</span>
                        </span>
                <h4 class="text-center">PHP|Mysql</h4>
            </div>

            <div class="col-sm-6 col-md-2 text-center">
						<span data-percent="50" class="chart easyPieChart" style="width: 140px; height: 140px; line-height: 140px;">
                            <span class="percent">50</span>
                        </span>
                <h4 class="text-center">Java|Grails|SpringMVC</h4>
            </div>


        </div><!--End row -->
</div>


</section>
    <section class="calltoaction">
        <div class="container">

            <div class="row">

                <div class="col-md-12 col-lg-12">
                    <h2 class="wow slideInRight" data-wow-delay=".1s">ARE YOU READY TO START?</h2>
                    <div class="calltoaction-decription wow slideInLeft" data-wow-delay=".2s">
                        I'm available for freelance projects.
                    </div>
                </div>

                <div class="col-md-12 col-lg-12 calltoaction-btn wow slideInRight" data-wow-delay=".3s">
                    <a href="<?=Url::to('/site/feedback') ?>" class="btn btn-lg">Hire Me</a>
                </div>

            </div><!-- .row -->
        </div><!-- .container -->
    </section>
</div>