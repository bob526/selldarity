<!DOCTYPE html>
<html>
<head>
  <?=$layouthead?>
  <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>css/jquery-ui.css?v=<?=time();?>">
  <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>css/home.css?v=<?=time();?>">
  <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>css/productInfoDetail.css?v=<?=time();?>">
</head>
<body>
  <div class="showRandomMarketWindow">
  </div>
  <?=$layoutbody?>
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
    <div class="pure-g  productInfo">
      <div class="pure-u-3-24 classification__container" id="classification__container">
        <div class="classification">
          <div class="classification__type">
            <p>單位商品售價</p>
            <div id="amount-1-1" class="amount-left" disabled></div>
            <div id="amount-1-2" class="amount-right" disabled></div>
            <div id="slider-range-one" class="basis" style="height:5px;background:#ddd;"></div>
            <div class="classification__range">
              <p>0元</p>
              <p style="float:right;">40000元</p>
            </div>
          </div>
          <div class="classification__type">
            <p>優惠折扣</p>
            <div id="amount-2-1" class="amount-left" disabled></div>
            <div id="amount-2-2" class="amount-right" disabled></div>
            <div id="slider-range-two" class="basis" style="height:5px;background:#ddd;"></div>
            <div class="classification__range">
              <p>0%off</p>
              <p style="float:right;">60%off</p>
            </div>
          </div>
          <div class="classification__type">
            <p>團購達成率(剩餘數)</p>
            <div id="amount-3-1" class="amount-left" disabled></div>
            <div id="amount-3-2" class="amount-right" disabled></div>
            <div id="slider-range-three" class="basis" style="height:5px;background:#ddd;"></div>
            <div class="classification__range">
              <p>1個</p>
              <p style="float:right;">120個</p>
            </div>
          </div>
          <div class="classification__list">
            <ul>
              <?php foreach ($allDepartments as $key => $department) : ?>
                <?php if ($key == $productDepartment): ?>
                  <li class="select"><?=$department['type']?></li>
                <?php else: ?>
                  <a href="<?=$baseUrl."Home/mainPage/{$department['idx']}"?>"><li><?=$department['type']?></li></a>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="pure-u-15-24 show_products" id="show_products">
        <div class="class_products">
          <div class="class_products_title">
            <p><?=$allDepartments[$productDepartment]['type']?></p>
            <select class="class_products_select">
              <option value="1">購買量</option>
              <option value="2">價格</option>
              <option value="3">具離達標數</option>
            </select>
          </div>
          <div class="pure-g class_products_items">
            <?php if ($user_id): ?>
              <?php for ($i = 0; $i < 5; $i++): ?>
              <?php foreach ($products as $product): ?>
                <div id="product_<?=$product['idx']?>" class="pure-u-5-24 item_show" data-pidx="<?=$product['idx']?>">
                  <img src="<?php echo PRODUCT_IMG; ?><?=$product['idx']?>/1" draggable="true" ondragstart="Drag(event, <?=$product['idx']?>)"/>
                  <p class="item_name"><?=$product['name']?></p>
                  <p class="item_price">&#36; <del><?=$product['ori_price']?></del><span>﹥</span><b><?=$product['off_price']?></b><?php echo $product['unit'] ? "/".$product['unit'] : ""; ?></p>
                  <div class="ship_range"><div style="width:<?=$product['toShipPercent']?>%;background:#f22;"></div></div>
                  <div class="item_info">
                    <p><span><b class="item_toShip"><?=$product['to_ship']?></b><?=$product['unit']?></span>距離出貨還剩</p>
                    <p><span><b class="item_off"><?=$product['off_percent']?></b>%off</span>現在直接下訂</p>
                    <p><span>&#36;50</span>單次運費</p>
                  </div>
                  <div class="otherInfo" style="display:none;">
                    <div class="item_description">
                      <?=$product['description']?>
                    </div>
                    <div class="item_storageCost">
                      <?=$product['storage_cost']?>
                    </div>
                    <div class="item_highestDiscount">
                      <?=$product['highest_discount']?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endfor; ?>
            <?php else: ?>
              <?php for ($i = 0; $i < 5; $i++): ?>
              <?php foreach ($products as $product): ?>
                <div id="product_<?=$product['idx']?>" class="pure-u-5-24 item_show" data-pidx="<?=$product['idx']?>">
                  <img src="<?php echo PRODUCT_IMG; ?><?=$product['idx']?>/1" draggable="true" ondragstart="Drag(event, <?=$product['idx']?>)"/>
                  <p class="item_name"><?=$product['name']?></p>
                  <p class="item_price">&#36; <b><?=$product['ori_price']?></b><?php echo $product['unit'] ? "/".$product['unit'] : ""; ?></p>
                  <div class="ship_range"><div style="width:<?=$product['toShipPercent']?>%;background:#f22;"></div></div>
                  <div class="item_info">
                    <p><span><b class="item_toShip"><?=$product['to_ship']?></b><?=$product['unit']?></span>距離出貨還剩</p>
                    <p><span>&#36;50</span>單次運費</p>
                  </div>
                  <div class="otherInfo" style="display:none;">
                    <div class="item_description">
                      <?=$product['description']?>
                    </div>
                    <div class="item_storageCost">
                      <?=$product['storage_cost']?>
                    </div>
                    <div class="item_highestDiscount">
                      <?=$product['highest_discount']?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endfor; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="pure-u-5-24 products_manage" id="products_manage">
        <div id="directToPersonalProduct">
          <div class="manage_title" id="manage_title">
            <img src="<?=$baseUrl?>/css/images/arrow-white-point-to-left.svg"/>
            <img src="<?=$baseUrl?>/css/images/shopping-cart-settings-white.svg"/>
            <p>商品管理</p>
          </div>
        </div>
        <div class="manage_title_gap">
        </div>
        <div class="pure-g manage_cla">
          <?php if ($user_id): ?>
            <div id="shoppingCar_item" class="pure-u-1-3 manage_cla_item manage_select_cal" data-item="1" data-store_area="drop__store_shoppingCar">購物車</div>
            <div id="warehouse_item" class="pure-u-1-3 manage_cla_item" data-item="2" data-store_area="drop__store_warehouse">虛擬倉庫</div>
            <div id="personalStore_item" class="pure-u-1-3 manage_cla_item" data-item="3" data-store_area="drop__store_personal">我的賣場</div>
          <?php else: ?>
            <div id="shoppingCar_item" class="pure-u-1-1 manage_cla_item manage_select_cal" data-item="1" data-store_area="drop__store_shoppingCar">購物車</div>
          <?php endif; ?>
        </div>
        <div id="manage_drop" class="manage_drop" ondragover="AllowDrop(event)" ondrop="Drop(event)">
          <div id="drop__store_shoppingCar" class="drop__store drop__store_shoppingCar">
            <div class="pure-g drop_item_format" style="display:none;">
              <span class="drop_item_close" data-storeproduct="">&times;</span>
              <img class="pure-u-1-3" src=""/>
              <div class="pure-u-14-24 drop_item_info">
                <p></p>
                <?php if ($user_id): ?>
                  <p class="drop_item_highligh drop_shoppingCar_item">&#36; <del></del><span>﹥</span><b></b></p>
                <?php else: ?>
                  <p class="drop_item_highligh drop_shoppingCar_item">&#36; </p>
                <?php endif; ?>
                <div class="drop_item_number drop_shoppingCar_item">
                  個數:
                  <div class="counter">
                    <p class="counter__button" style="border-right:solid 1px #000;">-</p>
                    <p class="counter__number">0</p>
                    <p class="counter__button" style="border-left:solid 1px #000;">+</p>
                  </div>
                </div>
              </div>
            </div>
            <?php if (isset($shoppingCar)): ?>
              <?php if ($user_id): ?>
                <?php foreach ($shoppingCar as $product) : ?>
                  <div id="dropItem_<?=$product['idx']?>" class="pure-g drop_item" data-productid="<?=$product['idx']?>">
                    <span class="drop_item_close" data-storeproduct="<?=$product['storeProductId']?>">&times;</span>
                    <img class="pure-u-1-3" src="<?php echo PRODUCT_IMG;?><?=$product['idx']?>/1"/>
                    <div class="pure-u-14-24 drop_item_info">
                      <p><?=$product['name']?></p>
                      <p class="drop_item_highligh drop_shoppingCar_item">&#36; <del><?=$product['ori_price']?></del><span>﹥</span><b><?=$product['off_price']?></b></p>
                      <div class="drop_item_number drop_shoppingCar_item">
                        個數:
                        <div class="counter">
                          <p class="counter__button" style="border-right:solid 1px #000;">-</p>
                          <p class="counter__number"><?=$product['number']?></p>
                          <p class="counter__button" style="border-left:solid 1px #000;">+</p>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <?php foreach ($shoppingCar as $product) : ?>
                  <div id="dropItem_<?=$product['idx']?>" class="pure-g drop_item" data-productid="<?=$product['idx']?>">
                    <span class="drop_item_close" data-storeproduct="<?=$product['storeProductId']?>">&times;</span>
                    <img class="pure-u-1-3" src="<?php echo PRODUCT_IMG;?><?=$product['idx']?>/1"/>
                    <div class="pure-u-14-24 drop_item_info">
                      <p><?=$product['name']?></p>
                      <p class="drop_item_highligh drop_shoppingCar_item">&#36; <?=$product['ori_price']?></p>
                      <div class="drop_item_number drop_shoppingCar_item">
                        個數:
                        <div class="counter">
                          <p class="counter__button" style="border-right:solid 1px #000;">-</p>
                          <p class="counter__number"><?=$product['number']?></p>
                          <p class="counter__button" style="border-left:solid 1px #000;">+</p>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            <?php endif; ?>
          </div>
          <?php if ($user_id): ?>
            <div id="drop__store_warehouse" class="drop__store drop__store_warehouse">
              <div class="pure-g drop_item_format" style="display:none;">
                <span class="drop_item_close" data-storeproduct="">&times;</span>
                <img class="pure-u-1-3" src=""/>
                <div class="pure-u-14-24 drop_item_info">
                  <p class="storeProduct"></p>
                  <p class="drop_item_highligh drop_warehouse_item drop_warehouse_storeCost">費用: &#36;<b></b> * 0元/日</p>
                  <p class="drop_item_highligh drop_warehouse_item drop_personalStore_item">我的庫存: <b>0</b> 個</p>
                  <div class="drop_item_number drop_shoppingCar_item drop_warehouse_item">
                    個數:
                    <div class="counter">
                      <p class="counter__button" style="border-right:solid 1px #000;">-</p>
                      <p class="counter__number">0</p>
                      <p class="counter__button" style="border-left:solid 1px #000;">+</p>
                    </div>
                  </div>
                </div>
              </div>
              <?php if (isset($warehouse)): ?>
                <?php foreach ($warehouse as $product) : ?>
                  <div id="dropItem_<?=$product['idx']?>" class="pure-g drop_item" data-productid="<?=$product['idx']?>">
                    <span class="drop_item_close" data-storeproduct="<?=$product['storeProductId']?>">&times;</span>
                    <img class="pure-u-1-3" src="<?php echo PRODUCT_IMG;?><?=$product['idx']?>/1"/>
                    <div class="pure-u-14-24 drop_item_info">
                      <p class="storeProduct"><?=$product['name']?></p>
                      <p class="drop_item_highligh drop_warehouse_item drop_warehouse_storeCost">費用: &#36;<b><?=$product['storage_cost']?></b> * 0元/日</p>
                      <p class="drop_item_highligh drop_warehouse_item drop_personalStore_item">我的庫存: <b>0</b> 個</p>
                      <div class="drop_item_number drop_shoppingCar_item drop_warehouse_item">
                        個數:
                        <div class="counter">
                          <p class="counter__button" style="border-right:solid 1px #000;">-</p>
                          <p class="counter__number"><?=$product['number']?></p>
                          <p class="counter__button" style="border-left:solid 1px #000;">+</p>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          <?php endif; ?>
          <?php if ($user_id): ?>
            <div id="drop__store_personal" class="drop__store drop__store_personal">
              <div class="pure-g drop_item_format" style="display:none;">
                <span class="drop_item_close" data-storeproduct="">&times;</span>
                <img class="pure-u-1-3" src=""/>
                <div class="pure-u-14-24 drop_item_info">
                  <p class="storeProduct"></p>
                  <p class="drop_personalStore_item drop_personalStore_oriPrice">原價: <b></b></p>
                  <p class="drop_item_highligh drop_warehouse_item drop_personalStore_item">我的庫存: <b>0</b> 個</p>
                </div>
              </div>
              <?php if (isset($myMarket)): ?>
                <?php foreach ($myMarket as $product) :?>
                  <div id="dropItem_<?=$product['idx']?>" class="pure-g drop_item" data-productid="<?=$product['idx']?>">
                    <span class="drop_item_close" data-storeproduct="<?=$product['storeProductId']?>">&times;</span>
                    <img class="pure-u-1-3" src="<?php echo PRODUCT_IMG;?><?=$product['idx']?>/1"/>
                    <div class="pure-u-14-24 drop_item_info">
                      <p class="storeProduct"><?=$product['name']?></p>
                      <p class="drop_personalStore_item drop_personalStore_oriPrice">原價: <b><?=$product['ori_price']?></b></p>
                      <p class="drop_item_highligh drop_warehouse_item drop_personalStore_item">我的庫存: <b>0</b> 個</p>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endif;?>
            </div>
          <?php endif; ?>
        </div>
        <div id="shoppingCar_submit" class="shoppingCar_submit manage_submit">
          <p>等級越高，折扣越多喔!</p>
          <button>直接訂購</button>
        </div>
        <div id="warehouse_submit" class="warehouse_submit manage_submit">
          <p>預估儲藏費用<span>25 + <b>2.5</b></span>元/日</p>
          <button>直接進貨</button>
        </div>
        <div id="personalStore_submit" class="personalStore_submit manage_submit">
          <p>等級越高，折扣越多喔!</p>
          <button>加入我的賣場</button>
        </div>
      </div>
    </div>
  </div>
</body>
<div class="loginWindow__inside__content">
  <div class="dialogWindow__inside__title">
    <img src="<?=$baseUrl?>/css/images/Selldarity_icon_chinese.svg" class="logo"/>
  </div>
  <p class="loginNotification">以您的電子郵件登入</br>即可在團結拍賣獲得全新的拍賣體驗</p>
  <input type="email" required="required" placeholder="電子郵件" class="loginEmail"/>
  <input type="password"  required="required" placeholder="密碼" class="loginPassword"/>
  <div class="rememberMe"><input type="checkbox" name="rememberMe" value="true"/>記住我</div>
  <p class="forgotLink"><a href="#">忘記密碼?</a></p>
  <input type="submit" class="loginSubmit" value="登入">
  <p>還沒加入團結拍賣? <span class="loginToRegister">註冊</span></p>
</div>
<div class="registerWindow__inside__content" id="registerWindow__inside__content">
  <div class="dialogWindow__inside__title">
    <img src="<?=$baseUrl?>/css/images/Selldarity_icon_chinese.svg" class="logo"/>
  </div>
  <div class="registerInput" id="registerInput">
    <p>以您的電子郵件註冊</br>即可在團結拍賣獲得全新的拍賣體驗</p>
    <input type="text"  required="required" placeholder="我們該怎麼稱呼你?" id="registerUserName"/>
    <input type="email" required="required" placeholder="電子郵件" id="registerEmail"/>
    <input type="password"  required="required" placeholder="密碼 8~16字 包含數字與英文字母" id="registerPassword"/>
    <input type="password" required="required" placeholder="密碼確認" id="registerRePassword"/>
    <input type="submit" class="registerSubmit" id="registerSubmit" value="註冊" disabled>
    <p>已經加入團結拍賣? <span class="ToSignIn">登入</span></p>
  </div>
  <div class="registerNotification"  id="registerNotification">
  </div>
</div>
<div class="returnWindow">
  <div class="dialogWindow__inside__title">
    <p>
      退貨、取消訂貨
    </p>
  </div>
  <input type="email" required="required" placeholder="您的Email" class="returnEmail"/>
  <input type="text"  required="required" placeholder="商品訂單編號" class="returnProductNumber"/>
  <textarea class="returnInfo" placeholder="請寫下您遇到的難題，我們將盡速為您處理"></textarea>
  <div class="returnSubmit">
    <button class="return_attach">新增附件</button>
    <button class="return_send">寄出</button>
    <button class="return_cancel">取消</button>
  </div>
  <p class="returnRemind">
    (為了加快處理速度，請將商品相片經由"新增附件"上傳)
  </p>
</div>
<div class="newProductSearchWindow">
  <div class="dialogWindow__inside__title">
    <p>
      新商品調查
    </p>
  </div>
  <input type="email" required="required" placeholder="您的Email" class="newProductSearchEmail"/>
  <textarea class="newProductSearchInfo" placeholder="請寫下您想推薦的商品，我們將盡速向您請教"></textarea>
  <div class="newProductSearchSubmit">
    <button class="newProductSearch_attach">新增附件</button>
    <button class="newProductSearch_send">寄出</button>
    <button class="newProductSearch_cancel">取消</button>
  </div>
  <div class="otherRecommendProdcts">
    <p>其他夥伴想在團結拍賣銷售的商品</p>
    <div class="recommendProductItem pure-g">
      <div class="pure-u-6-24">
        <img src="<?php echo PRODUCT_IMG;?>2/1"/>
      </div>
      <p class="pure-u-8-24">ps4</p>
      <p class="pure-u-5-24">53人支持</p>
      <button type="button">支持</button>
    </div>
  </div>
</div>

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
      <p class="detailInfo__wareHouse">
        <img src="<?=$baseUrl?>css/images/warehouse.svg" />
        虛擬倉庫<b></b>元/日<b>(每件)</b>
      </p>
      <div class="detailInfo__counter">
        個數
        <div class="counter">
          <p class="counter__button" style="border-right:solid 1px #000;">-</p>
          <p class="counter__number">0</p>
          <p class="counter__button" style="border-left:solid 1px #000;">+</p>
        </div>
      </div>
      <div class="detailInfo__description">
        <p>產品描述</p>
      </div>
    </div>
    <div class="pure-g detailInfo__button__area">
      <?php if ($user_id): ?>
        <div class="pure-u-1-3 detailInfo__button"><button onclick="dragToStore(2)"><img src="<?=$baseUrl?>/css/images/warehouse_red.svg" />加入虛擬倉庫</button></div>
        <div class="pure-u-1-3 detailInfo__button"><button onclick="dragToStore(3)"><img src="<?=$baseUrl?>/css/images/online_shop_red.svg" />加入我的賣場</button></div>
      <?php else: ?>
        <div class="pure-u-2-3"></div>
      <?php endif; ?>
      <div class="pure-u-1-3 detailInfo__shopping__button"><button onclick="dragToStore(1)"><img src="<?=$baseUrl?>/css/images/shopping_cart_white.svg" />加入購物車</button></div>
    </div>
  </div>
</div>
<div class="randomMarketWindow">
  <div class="dialogWindow__inside__title">
    <p>團結拍賣</p>
  </div>
  <div class="searchMarket">
    <p>想在 團結拍賣 尋找更優惠的價格?</p>
    <img src="<?=$baseUrl?>/css/images/sale_big.svg"/>
    <button id="searchRandomMarket" type="button">立即尋找優惠賣場</button>
  </div>
  <div class="randomMarket pure-g" hidden>
    <div class="pure-u-1-3">
      <img src="" />
    </div>
    <div class="personal_market pure-u-1-3">
      <p>最高優惠價格</p>
      <p></p>
    </div>
    <p class="shareMarketInfo">
      分享 團結拍賣 即可進入優惠商場!!
    </p>
    <button id="shareMarketInfo" type="button">分享並前往優惠賣場</button>
  </div>
  <p>已經找到加盟對象了 ? <span class="ToSignIn">登入</span></p>
</div>
<div class="shareWindow">
  <div class="dialogWindow__inside__title">
    <p>分享並獲得優惠</p>
  </div>
  <div class="shareWindow_shareItem">
    <img src="<?=$baseUrl?>css/images/shareItem/facebook.svg" />
    <img src="<?=$baseUrl?>css/images/shareItem/google_plus.svg" />
    <img src="<?=$baseUrl?>css/images/shareItem/instagram.svg" />
    <img src="<?=$baseUrl?>css/images/shareItem/line.svg" />
    <img src="<?=$baseUrl?>css/images/shareItem/path.svg" />
    <img src="<?=$baseUrl?>css/images/shareItem/snapchat.svg" />
    <img src="<?=$baseUrl?>css/images/shareItem/twitter.svg" />
    <img src="<?=$baseUrl?>css/images/shareItem/link.svg" />
  </div>
</div>
<html>
<script src="<?=$baseUrl?>js/jquery-ui/jquery-ui.min.js?v=<?=time();?>"></script>
<script src="<?=$baseUrl?>js/home.js?v=<?=time();?>"></script>
<script src="<?=$baseUrl?>js/homeWindows.js?v=<?=time();?>"></script>
<script>
baseUrl = "<?=$baseUrl?>";
PRODUCT_IMG = "<?php echo PRODUCT_IMG; ?>";
USER_IMG = "<?php echo USER_IMG; ?>";
uid = "<?=$user_id?>";
distinctId = "<?php echo $user_id ? $user_id : $stranger_id;?>";
</script>
