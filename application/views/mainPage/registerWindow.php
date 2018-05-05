<script src="<?=$baseUrl?>js/homeWindows.js?v=<?=time();?>"></script>
<div class="registerWindow__inside__content" id="registerWindow__inside__content">
  <div class="dialogWindow__inside__title">
    <img src="<?=$baseUrl?>/css/images/Selldarity_icon_chinese.svg" class="logo"/>
  </div>
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
</div>
