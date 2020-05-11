<!--News & Updates Start-->
<section class="news-updates wf100 p90 pb180 blue-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title white">
                    <h2>Naujienos</h2>
                </div>
            </div>
            <div class="col-md-12">
                <div id="newsupdate-slider" class="owl-carousel owl-theme">
                @for($i = 0; $i < 6; $i++)
                    <!--Item Start-->
                        <div class="item">
                            <div class="hnews-box">
                                @if($i == 1)
                                    <div class="thumb new-thumb" style="background-image: url('https://alytausgidas.lt/foto/8d04da7e.jpg')"><a href="#"><i class="fas fa-link"></i></a></div>
                                @else
                                    <div class="thumb new-thumb" style="background-image: url('https://alytausgidas.lt/phpThumb.php?src=foto/39ce1d02.jpg&w=870&h=440&zc=1')"><a href="#"><i class="fas fa-link"></i></a></div>
                                @endif
                                <div class="hnews-txt">
                                    <ul class="news-meta">
                                        <li><i class="fas fa-calendar-alt"></i> 2020 Rugp. 8</li>
                                    </ul>
                                    <h4><a href="#">L. Savastas per karantiną renkasi virtualų futbolą ir serialus</a>
                                    </h4>
                                    <a class="rm" href="#">Skaityti naujieną <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--Item End-->
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>
<!--News & Updates End-->
