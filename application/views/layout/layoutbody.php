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
      <ul class="rightHeaderInfo">
        <li class="notification">
          <img src="<?=$baseUrl?>/css/images/notification.svg"/>
        </li>
        <li class="question">
          <img src="<?=$baseUrl?>/css/images/question.svg"/>
          <ul class="submenu">
            <li class="question_area_text">
              請問在使用上遇到什麼問題嗎?
            </li>
            <li class="question_area_email">
              <input style="text" name="question_userEmail" placeholder="您的Email"/>
            </li>
            <li class="question_area_content">
              <textarea placeholder="請在此寫下您的問題，我們將盡速回信給您"></textarea>
            </li>
            <li class="question_area_submit">
              <button class="question_attach">新增附件</button>
              <button class="question_send">寄出</button>
              <button class="question_cancel">取消</button>
            </li>
          </ul>
        </li>
        <!--<li class="search">
        <img src="<?=$baseUrl?>/css/images/search.svg"/>
        <ul class="submenu">
        <li class="search_area"><input style="text" name="searchItem" placeholder="收尋商品、品牌"/></li>
      </ul>
      </li>-->
    <li class="tri_point">
      <img src="<?=$baseUrl?>/css/images/tri_point.svg"/>
      <ul class="submenu">
        <li class="menuList provisionArea">供貨專區</li>
        <li class="menuList">聯絡客服</li>
        <li class="menuList" id="newProductSearch">商品推薦</li>
        <li class="menuList" id="returnProduct">取消訂貨&退貨</li>
        <li class="menuList">關於團隊拍賣</li>
        <?php if ($uidx) : ?>
          <li id="logout" class="menuList logout">登出</li>
        <?php endif; ?>
      </ul>
    </li>
  </ul>
</div>
</div>
</header>
<div class="dialogArea" id="dialogArea">
  <div class="dialogWindow__outside">
    <div id="dialogWindow__inside" class="dialogWindow__inside">
      <span class="close" id="close">&times;</span>
      <div class="dialogWindow_content" id="dialogWindow_content">
        <?php if ($registeredInfo): ?>
          <?=$registeredInfo?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<div class="headerHeight">
</div>
