<!DOCTYPE html>
<html>
<head>
  <?=$layouthead?>
  <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>css/personalProductsManage.css?v=<?=time();?>">
  <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>css/productInfoDetail.css?v=<?=time();?>">
</head>
<body>
  <?=$layoutbody?>
  <div class="mainPage">
    <div class="title">
      <a href="<?=$baseUrl?>"> <img src="<?=$baseUrl?>/css/images/arrow-white-point-to-left.svg"/>
        <img src="<?=$baseUrl?>/css/images/shopping-cart-settings-white.svg"/>
        <p>商品管理</p>
      </a>
    </div>
    <div class="pure-g products_manage">
      <div class="pure-u-3-24 products_manage_left">
        <a href="<?=$baseUrl?>product/shoppingCar" class="product_type <?php echo $category == 'shoppingCar' ? 'product_type_focus' : '';?>" id="shoppingCar_type">購物車</a>
        <?php if ($user_id): ?>
          <a href="<?=$baseUrl?>product/warehouse" class="product_type <?php echo $category == 'warehouse' ? 'product_type_focus' : '';?>" id="warehouse_type">虛擬倉庫</a>
          <a href="<?=$baseUrl?>product/myMarket" class="product_type <?php echo $category == 'myMarket' ? 'product_type_focus' : '';?>" id="myMarket_type">我的賣場</a>
          <div class="user_message">
            <img src="<?php echo USER_IMG;?><?php echo $picture ? $picture : "user.svg"; ?>" />
            <p><?=$userName?></p>
            <p>LV. <?=$level?></p>
            <p>$ <?=$deposit?></p>
            <p>推薦人代碼 <?=$recommendCode?></p>
          </div>
        <?php endif; ?>
      </div>
      <div class="products_manage_right">
        <?=$userProductView?>
      </div>
    </div>
  </div>
</body>
<div class="pure-g productDetailInfo">
  <div class="pure-u-10-24 detailInfo__left">
    <div class="detailInfo__left__mainImg">
      <img class="mainImg" src=""/>
    </div>
    <div class="pure-g detailInfo__left__otherImg">
      <div class="pure-u-2-24 detailInfo__leftArrow"></div>
      <div class="pure-u-1-5 otherImg"><img class="selected" src=""/></div>
      <div class="pure-u-1-5 otherImg"><img src="" /></div>
      <div class="pure-u-1-5 otherImg"><img src="" /></div>
      <div class="pure-u-1-5 otherImg"><img src="" /></div>
      <div class="pure-u-2-24 detailInfo__rightArrow"></div>
    </div>
    <div class="detailInfo__left__shareItem">
      <p>分享至</p>
      <img src="<?=$baseUrl?>css/images/shareItem/facebook.svg" />
      <img src="<?=$baseUrl?>css/images/shareItem/google_plus.svg" />
      <img src="<?=$baseUrl?>css/images/shareItem/instagram.svg" />
      <img src="<?=$baseUrl?>css/images/shareItem/line.svg" />
      <img src="<?=$baseUrl?>css/images/shareItem/path.svg" />
      <img src="<?=$baseUrl?>css/images/shareItem/snapchat.svg" />
      <img src="<?=$baseUrl?>css/images/shareItem/twitter.svg" />
      <img src="<?=$baseUrl?>css/images/shareItem/link.svg" />
    </div>
    <div class="detailInfo__left__ship">
      <p>距離出貨還剩<b></b>件</p>
      <div class="detailInfo__left__ship_range">
        <div style="background:#f22;"></div>
      </div>
    </div>
  </div>
  <div class="pure-u-14-24 detailInfo__right">
    <div class="detailInfo__productInfo">
      <div class="pure-g detailInfo__productInfo__title">
        <?php if ($user_id): ?>
          <div class="pure-u-16-24 detailInfo__productInfo__title__left">
            <p></p>
            <p>$ <del></del> > <b></b></p>
          </div>
          <div class="pure-u-8-24 detailInfo__productInfo__title__right">
            <b></b>% off
          </div>
        <?php else: ?>
          <div class="pure-u-16-24 detailInfo__productInfo__title__left">
            <p></p>
            <p>$ <b></b></p>
          </div>
        <?php endif; ?>
      </div>
      <p class="detailInfo__discount">
        <img src="<?=$baseUrl?>css/images/coupon.svg" />
        本商品最高折扣<b></b>%
        <span>(折扣會隨著等級上升而增加，直到此上限)</span>
      </p>
      <div class="prodcut_manage_detailInfo_description">
        <p>產品描述</p>
      </div>
    </div>
  </div>
</div >
<html>
<script src="<?=$baseUrl?>js/product/productsManage.js?v=<?=time();?>"></script>
<script src="<?=$baseUrl?>js/product/<?=$category?>.js?v=<?=time();?>"></script>
<script>
let bridge = {
  baseUrl: "<?=$baseUrl?>",
  uid: "<?=$user_id?>",
  PRODUCT_IMG: "<?php echo PRODUCT_IMG; ?>",
};
</script>
