<div id="overall" class="overall">
  <ul id="drop-down-menu" data-show="false">
    <div id="triangle"></div>
    <li class="menuList provisionArea">供貨專區</li>
    <li class="menuList">語言</li>
    <li class="menuList">檢舉</li>
    <li class="menuList">問題回報</li>
    <li class="menuList">關於團隊拍賣</li>
    <?php if ($uidx) : ?>
      <li id="logout" class="menuList logout">登出</li>
    <?php endif; ?>
  </ul>
</div>
<header>
  <div class="pure-g">
    <div class="leftHeader pure-u-1-4">  
      <img src="<?=$baseUrl?>/css/images/Selldarity_icon_chinese.svg" class="logo"/>
    </div>
    <div class="rightHeader pure-u-3-4">
      <div class="leftHeaderInfo" id="leftHeaderInfo">
        <?php if ($uidx) : ?>
          <p class="userPicture"><img src="<?=$baseUrl?>userImg/<?php echo $picture ? $picture : "user.svg"; ?>"/></p>
          <p class="userName" id="userName"><?=$userName?></p>
          <p class="level">LV.<?=$LV?></p>
        <?php else : ?>
          <p class="register" id="register">註冊</p>
          <button class="login" id="login">登入</button>
        <?php endif; ?>
      </div>
      <div class="rightHeaderInfo">
        <div>
          <img src="<?=$baseUrl?>/css/images/notification.svg" class="notification"/>
        </div>
        <div>
          <img src="<?=$baseUrl?>/css/images/question.svg" class="question"/>
        </div>
        <div>
          <img src="<?=$baseUrl?>/css/images/search.svg" class="search"/>
        </div>
        <div id="tri_point">
          <img src="<?=$baseUrl?>/css/images/tri_point.svg" class="tri_point"/>
        </div>
      </div>
    </div>
  </div>
</header>
<div class="dialogArea" id="dialogArea">
  <div class="dialogWindow__outside">
    <div id="dialogWindow__inside" class="dialogWindow__inside">
      <span class="close" id="close">&times;</span>
      <?php if ($registeredInfo): ?>
        <?=$registeredInfo?>
      <?php endif; ?>
    </div>
  </div>
</div>
<div class="headerHeight">
</div>
