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
          <div class="registeredInfo" id="registeredInfo">
            <p class="congratulation">恭喜您正式加入團結拍賣!</p>
            <p class="userInfo">您可以在平台中找尋喜歡的商品，放入個人賣場，</br>並且經由銷售這些商品來獲取報酬</p>
            <p class="userInfo">在整個拍賣過程中，您只需要知道您想賣什麼，</br>以及賣給誰，其餘的全由我們為您解決</p>
            <p class="aboutUs">零資本也可以做社群網拍</p>
            <p class="aboutUs">批貨，倉儲，物流，交易，皆不需要親自處理</p>
            <p class="aboutUs">精心挑選最可靠的貨源</p>
            <p class="shareLink"><a href="#">藉由分享可以得到更多優惠!</a></p>
          </div>
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

  <div class="pure-g">
    <div class="pure-u-2-3"></div>
    <div class="pure-u-1-3"></div>
  </div>
</body>
<script>
  baseUrl = "<?=$baseUrl?>";
</script>
