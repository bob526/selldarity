<div class="products_type_info">
  <div class="products_type_info_content">
    <div class="shoppingCar_products shoppingCar_type" id="shoppingCar_products">
      <div class="pure-g shoppingCar_row">
        <div class="pure-u-2-24 shoppingCar_column checkBox_container">
          <input type="checkbox" checked>
          <span class="checkmark" id="shoppingCar_checkAll"></span>
        </div>
        <div class="pure-u-4-24 shoppingCar_column"></div>
        <div class="pure-u-4-24 shoppingCar_column">商品</div>
        <div class="pure-u-3-24 shoppingCar_column">折扣</div>
        <div class="pure-u-3-24 shoppingCar_column">單價</div>
        <div class="pure-u-3-24 shoppingCar_column">個數</div>
        <div class="pure-u-3-24 shoppingCar_column">總計</div>
        <div class="pure-u-2-24 shoppingCar_column">操作</div>
      </div>
      <?php if ($user_id): ?>
        <?php foreach ($shoppingCar['products'] as $item) :?>
          <div class="pure-g shoppingCar_row" data-pid="<?=$item['idx']?>">
            <div class="pure-u-2-24 shoppingCar_column checkBox_container">
              <input type="checkbox" class="shoppingCar_checkProductItem" checked>
              <span class="checkmark"></span>
            </div>
            <div class="pure-u-4-24 shoppingCar_column item_show">
              <img src="<?php echo PRODUCT_IMG; ?><?=$item['idx']?>/1"/>
            </div>
            <div class="pure-u-4-24 shoppingCar_column item_name"><?=$item['name']?></div>
            <div class="pure-u-3-24 shoppingCar_column item_off"><b><?=$item['off_percent']?></b>% off</div>
            <div class="pure-u-3-24 shoppingCar_column item_price">&#36; <del><?=$item['ori_price']?></del><span>﹥</span><b><?=$item['off_price']?></b></div>
            <div class="pure-u-3-24 shoppingCar_column">
              <div class="counter">
                <p class="counter__button" style="border-right:solid 1px #000;">-</p>
                <p class="counter__number"><?=$item['number']?></p>
                <p class="counter__button" style="border-left:solid 1px #000;">+</p>
              </div>
            </div>
            <div class="pure-u-3-24 shoppingCar_column item_total"><b><?php echo $item['off_price'] * $item['number']; ?></b></div>
            <div class="pure-u-2-24 shoppingCar_column delete_item" data-storeproduct="<?=$item['storeProductId']?>">刪除</div>
            <div class="otherInfo" style="display:none;">
              <div class="item_description">
                <?=$item['description']?>
              </div>
              <div class="item_storageCost">
                <?=$item['storage_cost']?>
              </div>
              <div class="item_highestDiscount">
                <?=$item['highest_discount']?>
              </div>
              <div class="item_toShip">
                <?=$item['to_ship']?>
              </div>
              <div class="item_toShipPencent">
                <?=$item['toShipPercent']?>
              </div>
              <div class="item_oriPrice">
                <?=$item['ori_price']?>
              </div>
              <div class="item_offPrice">
                <?=$item['off_price']?>
              </div>
              <div class="item_off">
                <?=$item['off_percent']?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <?php foreach ($shoppingCar['products'] as $item) :?>
          <div class="pure-g shoppingCar_row" data-pid="<?=$item['idx']?>">
            <div class="pure-u-2-24 shoppingCar_column checkBox_container">
              <input type="checkbox" class="shoppingCar_checkProductItem">
              <span class="checkmark"></span>
            </div>
            <div class="pure-u-4-24 shoppingCar_column item_show">
              <img src="<?php echo PRODUCT_IMG; ?><?=$item['idx']?>/1"/>
            </div>
            <div class="pure-u-4-24 shoppingCar_column item_name"><?=$item['name']?></div>
            <div class="pure-u-3-24 shoppingCar_column item_off"><b>0</b>% off</div>
            <div class="pure-u-3-24 shoppingCar_column item_price">&#36; <b><?=$item['ori_price']?></b></div>
            <div class="pure-u-3-24 shoppingCar_column">
              <div class="counter">
                <p class="counter__button" style="border-right:solid 1px #000;">-</p>
                <p class="counter__number"><?=$item['number']?></p>
                <p class="counter__button" style="border-left:solid 1px #000;">+</p>
              </div>
            </div>
            <div class="pure-u-3-24 shoppingCar_column item_total"><b><?php echo $item['ori_price'] * $item['number']; ?></b></div>
            <div class="pure-u-2-24 shoppingCar_column delete_item" data-storeproduct="<?=$item['storeProductId']?>">刪除</div>
            <div class="otherInfo" style="display:none;">
              <div class="item_description">
                <?=$item['description']?>
              </div>
              <div class="item_storageCost">
                <?=$item['storage_cost']?>
              </div>
              <div class="item_highestDiscount">
                <?=$item['highest_discount']?>
              </div>
              <div class="item_toShip">
                <?=$item['to_ship']?>
              </div>
              <div class="item_toShipPencent">
                <?=$item['toShipPercent']?>
              </div>
              <div class="item_oriPrice">
                <?=$item['ori_price']?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</div>
<div class="products_manage_right_foot">
  <div class="pure-g products_manage_foot_contain shoppingCar_foot shoppingCar_type">
    <p id="shoppingCar_item_total" class="pure-u-4-24">商品總金額 $<b><?=$shoppingCar['totalPrice']?></b></p>
    <p id="shoppingCar_item_freight" class="pure-u-3-24">運費總額 $<b><?=$shoppingCar['freight']?></b></p>
    <p id="shoppingCar_item_amount" class="pure-u-4-24">總付款金額: $<b><?php echo $shoppingCar['totalPrice'] + $shoppingCar['freight']; ?></b></p>
    <div class="pure-u-1-24"></div>
    <div class="pure-u-3-24 products_type_button"><button><img src="<?=$baseUrl?>/css/images/coupon_red.svg" />推薦人代碼</button></div>
    <div class="pure-u-3-24 products_type_button"><button><img src="<?=$baseUrl?>/css/images/warehouse_red.svg" />進貨至需倉庫</button></div>
    <div class="pure-u-3-24 products_type_shopping_button"><button><img src="<?=$baseUrl?>/css/images/shopping_cart_white.svg" />直接訂購</button></div>
  </div>
</div>
