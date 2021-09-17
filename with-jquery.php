    <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="js/jssor.slider-28.0.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        var size = 0;
      //  window.addEventListener('load', (event) => {
          size = $(window).width();

        jQuery(document).ready(function ($) {

            var jssor_1_SlideoTransitions = [
              [{b:0,d:1300,x:70,e:{x:12}}],
              [{b:100,d:1200,x:80,e:{x:12}}],
              [{b:-1,d:1,cl:[245,114,36,1]},{b:340,d:660,y:240}],
              [{b:-1,d:1,kY:-6}],
              [{b:-1,d:1,x:30,kY:-10},{b:1400,d:1500,x:0,o:1,e:{x:27,o:6}}],
              [{b:-1,d:1,c:{t:0}},{b:1400,d:1500,c:{t:339},e:{c:{t:3}}}],
              [{b:-1,d:1,x:30,kY:-10},{b:1700,d:1500,x:0,o:1,e:{x:27,o:6}}],
              [{b:-1,d:1,c:{t:0}},{b:1700,d:1500,c:{t:339},e:{c:{t:3}}}],
              [{b:-1,d:1,sX:0.3,sY:0.3},{b:400,d:1000,o:1,sX:1,sY:1,e:{sX:3,sY:3}}],
              [{b:-1,d:1,sX:0.3,sY:0.3},{b:0,d:1800,x:-347,y:-94,o:1,sX:1,sY:1,e:{x:3,y:3,sX:3,sY:3}}],
              [{b:-1,d:1,sX:0.3,sY:0.3},{b:180,d:1520,x:-230,y:-217,o:1,sX:1,sY:1,e:{x:3,y:3,sX:3,sY:3}}],
              [{b:-1,d:1,sX:0.3,sY:0.3},{b:400,d:1500,x:-120,y:-179,o:1,sX:1,sY:1,e:{x:3,y:3,sX:3,sY:3}}],
              [{b:-1,d:1,sX:0.3,sY:0.3},{b:500,d:1600,x:120,y:-167,o:1,sX:1,sY:1,e:{x:3,y:3,sX:3,sY:3}}],
              [{b:-1,d:1,sX:0.3,sY:0.3},{b:800,d:800,x:301,y:-100,o:1,sX:1,sY:1,e:{x:3,y:3,sX:3,sY:3}}],
              [{b:-1,d:1,sX:0.3,sY:0.3},{b:600,d:1000,x:312,y:-92,o:1,sX:1,sY:1,e:{x:3,y:3,sX:3,sY:3}}],
              [{b:-1,d:1,sX:0.3,sY:0.3},{b:100,d:800,x:388,y:-161,o:1,sX:1,sY:1,e:{x:3,y:3,sX:3,sY:3}}],
              [{b:2000,d:1000,y:50,e:{y:3}}],
              [{b:-1,d:1,bl:[8]},{b:2000,d:1000,bl:[3],e:{bl:3}}],
              [{b:-1,d:1,rp:1},{b:2000,d:1000,o:0.6},{b:2000,d:1000,rp:0}],
              [{b:-1,d:1,sX:0.7}],
              [{b:1000,d:2000,y:195,e:{y:3}}],
              [{b:600,d:2000,y:195,e:{y:3}}],
              [{b:1400,d:2000,y:195,e:{y:3}}],
              [{b:-1,d:1,sX:0.7,ls:2},{b:0,d:800,o:1,ls:0,e:{ls:6}}],
              [{b:-1,d:801,rp:1}]
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $PauseOnHover: 0,
              $Idle: 6000,
              $SlideDuration: 1000,
              $SlideEasing: $Jease$.$InQuad,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = size;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        });
    </script>
    <style>
        .as{
          width: 100vw;
          overflow: hidden;
        }
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 051 css*/
        .jssorb051 .i {position:absolute;cursor:pointer;}
        .jssorb051 .i .b {fill:#fff;fill-opacity:0.5;}
        .jssorb051 .i:hover .b {fill-opacity:.7;}
        .jssorb051 .iav .b {fill-opacity: 1;}
        .jssorb051 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 051 css*/
        .jssora051 {display:block;position:absolute;cursor:pointer;}
        .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
        .jssora051:hover {opacity:.8;}
        .jssora051.jssora051dn {opacity:.5;}
        .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
    </style>
    <!-- #region Jssor Slider Begin -->
    <!-- Generator: Jssor Slider Composer -->
    <!-- Source: https://www.jssor.com/chanakalakshan/product.slider/=edit -->
    <div class="as">
      <svg viewbox="0 0 0 0" width="0" height="0" style="display:block;position:relative;left:0px;top:0px;">
          <defs>
              <mask id="jssor_1_msk_1">
                  <image data-load="href" width="980" height="380" x="0" y="0" style="position:absolute;max-width:980px;" href="img/makeup-mask.png"></image>
              </mask>
              <filter id="jssor_1_flt_2" x="-50%" y="-50%" width="200%" height="200%">
                  <feGaussianBlur id="jssor_1_gbl_2" stddeviation="8" data-t="17"></feGaussianBlur>
              </filter>
              <mask id="jssor_1_msk_3">
                  <path fill="#ffffff" d="M15.3,6.8C16.4,6.4 17.5,6 18.5,5.7C27.1,2.9 39-4.1 47.1,3.3C50.4,6.3 53.4,22.2 51.3,25.6C45.9,34.5 32.6,27.4 25.1,26.1C18.9,25 10.1,32.8 4.4,28.4C-5.6,20.7 8.9,9.3 15.3,6.8Z" x="0" y="0" style="position:absolute;overflow:visible;"></path>
              </mask>
              <filter id="jssor_1_flt_4" x="-50%" y="-50%" width="200%" height="200%">
                  <feGaussianBlur stddeviation="2" result="r1"></feGaussianBlur>
                  <feColorMatrix in="r1" type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 3 -1" result="r2"></feColorMatrix>
              </filter>
              <filter id="jssor_1_flt_5" x="-50%" y="-50%" width="200%" height="200%">
                  <feGaussianBlur stddeviation="10"></feGaussianBlur>
              </filter>
              <filter id="jssor_1_flt_6" x="-50%" y="-50%" width="200%" height="200%">
                  <feGaussianBlur stddeviation="10"></feGaussianBlur>
              </filter>
              <filter id="jssor_1_flt_7" x="-50%" y="-50%" width="200%" height="200%">
                  <feGaussianBlur stddeviation="10"></feGaussianBlur>
              </filter>
              <mask id="jssor_1_msk_9">
                  <text data-to="130px 50px" fill="#ffffff" id="jssor_1_lyr_8" text-anchor="middle" x="130" y="100" data-t="23" style="position:absolute;opacity:0;font-family:Arial,Helvetica,sans-serif;font-size:130px;font-weight:900;letter-spacing:2em;overflow:visible;">juice
                  </text>
              </mask>
          </defs>
      </svg>
      <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
          <!-- Loading Screen -->
          <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
              <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
          </div>
          <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
              <div>
                  <img data-u="image" src="img/sample-3.jpg" />
                  <div data-to="50% 50%" data-t="0" style="left:-250px;top:120px;width:258px;height:47px;position:absolute;color:#57B6F5;font-size:48px;line-height:1.2;text-align:center;font-weight: 600;">40% OFF</div>
                  <div data-to="50% 50%" data-t="1" style="left:-210px;top:185px;width:200px;height:40px;position:absolute;color:#000000;font-size:28px;line-height:1.2;text-align:center;font-weight: 400;">ON QLED TV<br /></div>
                  <a href="shopping.php" data-to="50% 50%" data-t="2" style="left:95px;top:400px;width: 70px;
                      font-size: 0.8vw;
                      color: #f57224;
                      font-weight: 600;
                      border: solid 2px #f57224;
                      border-radius: 20px;
                      padding: 8px 12px;position:absolute;">SHOP NOW</a>
              </div>
              <div>
                  <img data-u="image" src="img/makeup.jpg" />
                  <div data-to="50% 50%" data-ts="preserve-3d" data-t="3" style="left:505px;top:83px;width:400px;height:150px;position:absolute;mix-blend-mode:color-dodge;">
                      <div data-to="50% 50%" data-t="5" data-arr="4" style="left:46px;top:15px;width:339px;height:40px;position:absolute;opacity:0;color:#0d0800;font-size:20px;line-height:2;letter-spacing:0.08em;padding:0px 0px 0px 10px;box-sizing:border-box;background-color:#bf7c00;background-clip:padding-box;">Definite beauty defining you</div>
                      <div data-to="50% 50%" data-t="7" data-arr="6" style="left:16px;top:95px;width:339px;height:40px;position:absolute;opacity:0;color:#0d0800;font-size:20px;line-height:2;letter-spacing:0.1em;padding:0px 0px 0px 10px;box-sizing:border-box;background-color:#bf7c00;background-clip:padding-box;">Make up to a twisting trend</div>
                  </div>
                  <svg viewbox="0 0 980 380" data-ts="preserve-3d" width="980" height="380" style="left:0px;top:0px;display:block;position:absolute;overflow:visible;">
                      <g>
                          <svg viewbox="0 0 980 380" data-ts="preserve-3d" x="0" y="0" width="980" height="380" data-tchd="jssor_1_msk_1" style="position:absolute;overflow:visible;">
                              <g mask="url(#jssor_1_msk_1)">
                                  <image data-load="href" width="980" height="380" data-to="484.0px 428.0px" x="-6" y="10" data-t="8" style="position:absolute;opacity:0;max-width:980px;" href="img/makeup-items.png"></image>
                                  <image data-load="href" width="96" height="45" data-to="423px 366px" x="375" y="344" data-t="9" style="position:absolute;opacity:0;max-width:96px;" href="img/makeup-lipstick-1.png"></image>
                                  <image data-load="href" width="98" height="86" data-to="424px 387px" x="375" y="344" data-t="10" style="position:absolute;opacity:0;max-width:98px;" href="img/makeup-lipstick-2.png"></image>
                                  <image data-load="href" width="101" height="122" data-to="425px 381px" x="375" y="320" data-t="11" style="position:absolute;opacity:0;max-width:101px;" href="img/makeup-lipstick-3.png"></image>
                                  <image data-load="href" width="52" height="77" data-to="482px 428px" x="456" y="390" data-t="12" style="position:absolute;opacity:0;max-width:52px;" href="img/makeup-lipstick-4.png"></image>
                                  <image data-load="href" width="23" height="18" data-to="497px 435px" x="486" y="426" data-t="13" style="position:absolute;opacity:0;max-width:23px;" href="img/makeup-petal-1.png"></image>
                                  <image data-load="href" width="19" height="19" data-to="502px 434px" x="493" y="425" data-t="14" style="position:absolute;opacity:0;max-width:19px;" href="img/makeup-petal-2.png"></image>
                                  <image data-load="href" width="15" height="18" data-to="514px 422px" x="507" y="413" data-t="15" style="position:absolute;opacity:0;max-width:15px;" href="img/makeup-petal-3.png"></image>
                              </g>
                          </svg>
                      </g>
                  </svg>
              </div>
              <div>
                  <img data-u="image" src="img/juice.jpg" />
                  <img data-to="50% 50%" data-t="16" style="left:595px;top:-267px;width:271px;height:266px;position:absolute;max-width:271px;" src="img/juce-pomegranate.png" />
                  <svg viewbox="0 0 52 31" width="52" height="31" data-tchd="jssor_1_msk_3" style="left:766px;top:322px;display:block;position:absolute;overflow:visible;">
                      <g fill="rgb(0, 0, 0)" stroke="none" stroke-width="1" mask="url(#jssor_1_msk_3)">
                          <image data-load="href" width="63" height="20" filter="url(#jssor_1_flt_2)" x="-20" y="10" data-t="18" data-tsep="jssor_1_gbl_2" style="position:absolute;opacity:0;max-width:63px;" href="img/juce-pomegranate-shadow.png"></image>
                      </g>
                  </svg>
                  <svg viewbox="0 0 350 100" data-to="50% 50%" width="350" height="100" data-t="19" style="left:72px;top:100px;display:block;position:absolute;font-family:Arial,Helvetica,sans-serif;font-size:130px;font-weight:900;overflow:visible;">
                      <text fill="#6b0215" text-anchor="middle" x="175" y="100">juice
                      </text>
                  </svg>
                  <svg viewbox="0 0 260 130" data-ts="preserve-3d" width="260" height="130" data-t="24" data-tchd="jssor_1_msk_9" style="left:115px;top:100px;display:block;position:absolute;overflow:visible;">
                      <g mask="url(#jssor_1_msk_9)">
                          <path fill="#b10626" d="M260,0L260,130L0,130L0,0Z" x="0" y="0" style="position:absolute;overflow:visible;"></path>
                          <svg viewbox="0 0 260 130" data-ts="preserve-3d" x="0" y="0" width="260" height="130" style="position:absolute;overflow:visible;">
                              <g filter="url(#jssor_1_flt_4)">
                                  <image data-load="href" width="370" height="100" x="-66" y="35" style="position:absolute;max-width:370px;" href="img/fruit-splash.png"></image>
                                  <path data-to="25px -30px" filter="url(#jssor_1_flt_5)" fill="#d55a7d" d="M-5-30C-5-46.56854 8.43146-60 25-60C41.56854-60 55-46.56854 55-30C55-13.43146 41.56854,0 25,0C8.43146,0 -5-13.43146 -5-30Z" x="-5" y="-60" data-t="20" style="position:absolute;opacity:0.4;overflow:visible;"></path>
                                  <path data-to="94px -20px" filter="url(#jssor_1_flt_6)" fill="#d55a7d" d="M54-20C54-42.09139 71.90861-60 94-60C116.09139-60 134-42.09139 134-20C134,2.09139 116.09139,20 94,20C71.90861,20 54,2.09139 54-20Z" x="54" y="-60" data-t="21" style="position:absolute;opacity:0.4;overflow:visible;"></path>
                                  <path data-to="200px -10px" filter="url(#jssor_1_flt_7)" fill="#d55a7d" d="M150-10C150-37.61424 172.38576-60 200-60C227.61424-60 250-37.61424 250-10C250,17.61424 227.61424,40 200,40C172.38576,40 150,17.61424 150-10Z" x="150" y="-60" data-t="22" style="position:absolute;opacity:0.4;overflow:visible;"></path>
                              </g>
                          </svg>
                      </g>
                  </svg>
              </div><a data-u="any" href="https://www.jssor.com" style="display:none">web animation</a>
          </div>
          <!-- Bullet Navigator -->
          <div data-u="navigator" class="jssorb051" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
              <div data-u="prototype" class="i" style="width:16px;height:16px;">
                  <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                      <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                  </svg>
              </div>
          </div>
          <!-- Arrow Navigator -->
          <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
              <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                  <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
              </svg>
          </div>
          <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
              <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                  <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
              </svg>
          </div>
      </div>
      <!-- #endregion Jssor Slider End -->
