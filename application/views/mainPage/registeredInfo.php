<script src="<?=$baseUrl?>js/homeWindows.js?v=<?=time();?>"></script>
<div class="registeredInfo" id="registeredInfo">
  <div class="dialogWindow__inside__title">
    <img src="<?=$baseUrl?>/css/images/Selldarity_icon_chinese.svg" class="logo"/>
  </div>
  <p class="congratulation">恭喜您正式加入團結拍賣!</p>
  <p class="userInfo">您可以在平台中找尋喜歡的商品，放入個人賣場，</br>並且經由銷售這些商品來獲取報酬</p>
  <p class="userInfo">在整個拍賣過程中，您只需要知道您想賣什麼，</br>以及賣給誰，其餘的全由我們為您解決</p>
  <p class="aboutUs">零資本也可以做社群網拍</p>
  <p class="aboutUs">批貨，倉儲，物流，交易，皆不需要親自處理</p>
  <p class="aboutUs">精心挑選最可靠的貨源</p>
  <p class="shareLink"><a href="#">藉由分享可以得到更多優惠!</a></p>
</div>

<style>
.registeredInfo {
  text-align: center;
  width: 400px;
  background: #fff;
  padding: 20px 0px;
}

.aboutUs {
  text-align: left;
  font-size: 15px; 
  font-weight: bold;
  padding-bottom: 15px;
  padding-left: 40px
}

.congratulation {
  padding: 25px;
  font-weight: bold;
  font-size: 25px;
}

.shareLink {
  font-size: 20px;
}

.shareLink a {
  color: #0099FF;
}

.registerInput {
  display: none;
}

.userInfo {
  font-size: 15px;
  color: #aaa;
  padding-bottom: 25px;
}

#dialogArea {
  display: block;
}

#registerWindow__inside__content {
  display: block;
}
</style>
