<!DOCTYPE html>
<html>
<head>
  <?=$layouthead?>
  <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>css/jquery-ui.css?v=<?=time();?>">
  <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>css/home.css?v=<?=time();?>">
  <script src="<?=$baseUrl?>js/jquery-ui/external/jquery/jquery.js?v=<?=time();?>"></script>
  <script src="<?=$baseUrl?>js/jquery-ui/jquery-ui.min.js?v=<?=time();?>"></script>
  <script src="<?=$baseUrl?>js/home.js?v=<?=time();?>"></script>
</head>
<body>
  <?=$layoutbody?>

  <div class="dialogArea" id="dialogArea">
    <div class="dialogWindow__outside">
      <span class="close" id="close">&times;</span>
      <div class="dialogWindow__inside">
        <div class="dialogWindow__inside__title">
          <img src="<?=$baseUrl?>/css/images/Selldarity_icon_chinese.svg" class="logo"/>
        </div>
        <div class="registerWindow__inside__content" id="registerWindow__inside__content">
          <div class="registerInput" id="registerInput">
            <p id="registerNotification">以您的電子郵件註冊</br>即可在團結拍賣獲得全新的拍賣體驗</p>
            <input type="email" required="required" placeholder="電子郵件" id="registerEmail"/>
            <input type="email" required="required" placeholder="確認郵件" id="registerReEmail"/>
            <input type="password"  required="required" placeholder="密碼" id="registerPassword"/>
            <input type="text"  required="required" placeholder="我們該怎麼稱呼你?" id="registerUserName"/>
            <input type="submit" id="registerSubmit" value="註冊">
            <p>已經加入團結拍賣? <span class="registerToSignIn">登入</span></p>
          </div>
          <div class="verMailInfo" id="verMailInfo">
            <p>驗證信已寄送至您的信箱，</br>驗證後就可以開始在團結拍賣購物囉</p>
          </div>
          <?php if (isset($registeredInfo)) :?>
            <?=$registeredInfo?>
          <?php endif; ?>
        </div>
        <div class="signInWindow__inside__content" id="signInWindow__inside__content">
          <p id="signInNotification">以您的電子郵件登入</br>即可在團結拍賣獲得全新的拍賣體驗</p>
          <input type="email" required="required" placeholder="電子郵件" id="signInEmail"/>
          <input type="password"  required="required" placeholder="密碼" id="signInPassword"/>
          <p class="rememberMe">記住我</p>
          <p class="forgotLink"><a href="#">忘記密碼?</a></p>
          <input type="submit" id="signInSubmit" value="登入">
          <p>還沒加入團結拍賣? <span class="signInToRegister">登入</span></p>
        </div>
      </div>
    </div>
  </div>
  <div class="mainPage">
    <div class="pure-g">
      <div class="leftBigADArea pure-u-2-3">
        <div id="leftBigAD" class="leftBigAD AD">
          <ul>
            <li class="selected"><img src="<?=$baseUrl?>/css/images/Selldarity_icon_chinese.svg" /></li>
            <li><img src="<?=$baseUrl?>/css/images/notification.svg" /></li>
            <li><img src="<?=$baseUrl?>/css/images/search.svg" /></li>
            <li><img src="<?=$baseUrl?>/css/images/tri_point.svg" /></li>
            <li><img src="<?=$baseUrl?>/css/images/question.svg" /></li>
          </ul>
        </div>
      </div>
      <div class="pure-u-1-3">
        <div class="rightSmallTopADArea">
          <div class="rightSmallTopAD AD"></div>
        </div>
        <div class="rightSmallDownADArea">
          <div class="rightSmallDownAD AD"></div>
        </div>
      </div>
    </div>
    <div class="pure-g  productInfo">
      <div class="pure-u-1-7  classification">
        <div class="classification__type">
          <p>單位商品售價</p>
          <div id="amount-1-1" class="amount-left" disabled></div>
          <div id="amount-1-2" class="amount-right" disabled></div>
          <div id="slider-range-one" class="basis" style="height:5px;background:#ddd;"></div>
          <div class="classification__range">
            <p>0元</p>
            <p style="float:right;">37650元</p>
          </div>
        </div> 
        <div class="classification__type">
          <p>優惠折扣</p>
          <div id="amount-2-1" class="amount-left" disabled></div>
          <div id="amount-2-2" class="amount-right" disabled></div>
          <div id="slider-range-two" class="basis" style="height:5px;background:#ddd;"></div> 
          <div class="classification__range">
            <p>10%off</p>
            <p style="float:right;">60%off</p>
          </div>
        </div> 
        <div class="classification__type">
          <p>團購達成率(剩餘數)</p>
          <div id="amount-3-1" class="amount-left" disabled></div>
          <div id="amount-3-2" class="amount-right" disabled></div>
          <div id="slider-range-three" class="basis" style="height:5px;background:#ddd;"></div>
          <div class="classification__range">
            <p>1個</p>
            <p style="float:right;">120個</p>
          </div>
        </div> 
        <div class="classification__list">
          <ul>
            <li class="select">全部</li>
            <li>3C相關</li>
            <li>家電影音</li>
            <li>女裝</li>
            <li>女性配件</li>
            <li>女鞋</li>
            <li>彩妝</li>
            <li>女性包包</li>
          </ul>
        </div>
      </div>
      <div class="pure-u-4-7 show_products">
        <div class="class_products">
          <div class="class_products_title">
            <p>3C相關</p>
            <select>
              <option value="1">購買量</option>
              <option value="2">價格</option>
              <option value="3">具離達標數</option>
            </select>
          </div>
          <div class="class_products_items">
            <div class="item_show">
              <img src="<?=$baseUrl?>/products/iphone7plus.jpg" /> 
              <p class="item_name">iphone7plus</p>
              <p class="item_price">&#36;<del>22222</del><span>﹥<span>66666</p>
              <div class="ship_range"><div style="width:50%;background:#f22;"></div></div>
              <div class="item_info">
                <p><span>25件</span>距離出貨還剩</p>
                <p><span>40%off</span>現在直接下訂</p>
                <p><span>&#36;50</span>單次運費</p>
              </div>
            </div>
          </div>
        </div> 
      </div>
      <div class="pure-u-2-7"></div>
    </div>
  </div>
</body>
<html>
<script>
baseUrl = "<?=$baseUrl?>";
</script>
