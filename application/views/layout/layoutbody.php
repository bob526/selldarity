<header>
  <div class="pure-g">
    <div class="leftHeader pure-u-1-4">  
      <img src="<?=$baseUrl?>/css/images/Selldarity_icon_chinese.svg" class="logo"/>
    </div>
    <div class="rightHeader pure-u-3-4">
      <div class="leftHeaderInfo" id="leftHeaderInfo">
        <?php if ($uidx) : ?>
          <p class="userName"><?=$userName?></p>
          <p class="level">LV.<?=$LV?></p>
        <?php else : ?>
          <p class="register" id="register">註冊</p>
          <button class="signIn">登入</button>
        <?php endif; ?>
      </div>
      <div class="rightHeaderInfo">
        <img src="<?=$baseUrl?>/css/images/notification.svg" class="notification"/>
        <img src="<?=$baseUrl?>/css/images/question.svg" class="question"/>
        <img src="<?=$baseUrl?>/css/images/search.svg" class="search"/>
      </div>
    </div>
  </div>
</header>
