<!DOCTYPE html>
<html>
<head>
  <?=$layouthead?>
  <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>css/home.css?v=<?=time();?>">
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
    <div class="pure-g">
      <div class="pure-u-1-7"></div>
      <div class="pure-u-4-7"></div>
      <div class="pure-u-2-7"></div>
    </div>
  </div>
</body>
<html>
<script>
baseUrl = "<?=$baseUrl?>";
</script>
