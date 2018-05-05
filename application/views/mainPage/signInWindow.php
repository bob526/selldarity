<script src="<?=$baseUrl?>js/homeWindows.js?v=<?=time();?>"></script>
<div class="signInWindow__inside__content" id="signInWindow__inside__content">
  <div class="dialogWindow__inside__title">
    <img src="<?=$baseUrl?>/css/images/Selldarity_icon_chinese.svg" class="logo"/>
  </div>
  <p id="signInNotification">以您的電子郵件登入</br>即可在團結拍賣獲得全新的拍賣體驗</p>
  <input type="email" required="required" placeholder="電子郵件" id="signInEmail"/>
  <input type="password"  required="required" placeholder="密碼" id="signInPassword"/>
  <p class="rememberMe">記住我</p>
  <p class="forgotLink"><a href="#">忘記密碼?</a></p>
  <input type="submit" id="signInSubmit" value="登入">
  <p>還沒加入團結拍賣? <span class="signInToRegister">登入</span></p>
</div>
