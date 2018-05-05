<script src="<?=$baseUrl?>js/homeWindows.js?v=<?=time();?>"></script>
<div class="pure-g productDetailInfo">
        <div class="pure-u-10-24 detailInfo__left">
          <div class="detailInfo__left__mainImg">
            <img id="mainImg" src="<?=$baseUrl?>products/<?=$product['idx']?>/1"/>
          </div>
          <div class="pure-g detailInfo__left__otherImg">
            <div id="detailInfo__leftArrow" class="pure-u-2-24 detailInfo__leftArrow"></div>
            <div class="pure-u-1-5 otherImg"><img class="selected" src="<?=$baseUrl?>products/<?=$product['idx']?>/1"/></div>
            <div class="pure-u-1-5 otherImg"><img src="<?=$baseUrl?>products/<?=$product['idx']?>/2" /></div>
            <div class="pure-u-1-5 otherImg"><img src="<?=$baseUrl?>products/<?=$product['idx']?>/3" /></div>
            <div class="pure-u-1-5 otherImg"><img src="<?=$baseUrl?>products/<?=$product['idx']?>/4" /></div>
            <div id="detailInfo__rightArrow" class="pure-u-2-24 detailInfo__rightArrow"></div>
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
            <p>距離出貨還剩<b><?=$product['to_Ship']?>件</b></p>
            <div class="detailInfo__left__ship_range"><div style="width:<?=$product['toShipPercent']?>%;background:#f22;"></div></div>
          </div>
        </div>
        <div class="pure-u-14-24 detailInfo__right">
          <div class="detailInfo__productInfo">
            <div class="pure-g detailInfo__productInfo__title">
              <div class="pure-u-16-24 detailInfo__productInfo__title__left">
                <p><?=$product['name']?></p>
                <p>$ <del><?=$product['ori_Price']?></del> > <?=$product['off_Price']?></p>
              </div>
              <div class="pure-u-8-24 detailInfo__productInfo__title__right">
                <?=$product['off_Percent']?>% off
              </div>
            </div> 
            <p class="detailInfo__discount">
              <img src="<?=$baseUrl?>css/images/coupon.svg" />
              本商品最高折扣<b><?=$product['highest_discount']?>%</b>
              <span>(折扣會隨著等級上升而增加，直到此上限)</span>
            </p>
            <p class="detailInfo__feight">
              <img src="<?=$baseUrl?>css/images/delivery_truck.svg" />
              運費
              <select>
                <?php foreach ($freight as $mode): ?>
                  <option value="<?=$mode['fee']?>"><?=$mode['mode']?>: <?=$mode['fee']?></option>
                <?php endforeach; ?>
              </select>
            </p>
            <p class="detailInfo__wareHouse">
              <img src="<?=$baseUrl?>css/images/warehouse.svg" />
              虛擬倉庫<b><?=$product['storage_Cost']?></b>元/日<b>(每件)</b>
            </p>
            <div class="detailInfo__counter">
              個數
              <div class="counter">
                <p id="counter-reduce" class="counter__button" style="border-right:solid 1px #000;">-</p>
                <p id="counter-number" class="counter__number">0</p>
                <p id="counter-add" class="counter__button" style="border-left:solid 1px #000;">+</p>
              </div>
            </div>
            <div class="detailInfo__description">
              <p>產品描述</p>
              <?=$product['description']?>
            </div>
          </div>
          <div class="pure-g detailInfo__button__area">
            <div class="pure-u-1-3 detailInfo__button"><button><img src="<?=$baseUrl?>/css/images/warehouse_red.svg" />加入虛擬倉庫</button></div>
            <div class="pure-u-1-3 detailInfo__button"><button><img src="<?=$baseUrl?>/css/images/online_shop_red.svg" />加入我的拍賣</button></div>
            <div class="pure-u-1-3 detailInfo__shopping__button"><button><img src="<?=$baseUrl?>/css/images/shopping_cart_white.svg" />加入購物車</button></div>
          </div>
        </div>
      </div>
