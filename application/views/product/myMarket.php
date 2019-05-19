<div class="products_type_info">
  <div class="products_type_info_content">
    <div class="myMarket_products myMarket_type">
      <div class="myMarket_label myMarket_manage_label" id="myMarket_label_selected">
        <p>
          <img src="<?=$baseUrl?>/css/images/settings.svg" />
          商品上架
        </p>
      </div>
      <div class="myMarket_label myMarket_state_label">
        <p>
          <img src="<?=$baseUrl?>/css/images/notes.svg" />
          銷售狀態
        </p>
      </div>
      <div class="myMarket_manage">
        <div class="pure-g myMarket_row">
          <div class="pure-u-2-24 myMarket_column checkBox_container">
            <input type="checkbox" checked>
            <span class="checkmark" id="myMarket_checkAll"></span>
          </div>
          <div class="pure-u-4-24 myMarket_column"></div>
          <div class="pure-u-5-24 myMarket_column">商品</div>
          <div class="pure-u-5-24"></div>
          <div class="pure-u-3-24 myMarket_column">庫存數量</div>
          <div class="pure-u-3-24 myMarket_column">原價</div>
          <div class="pure-u-2-24 myMarket_column">操作</div>
        </div>

        <?php foreach ($myMarket['products'] as $item) : ?>
          <div class="pure-g myMarket_row" data-pid="<?=$item['idx']?>">
            <div class="pure-u-2-24 myMarket_column checkBox_container">
              <input type="checkbox" class="myMarket_checkProductItem" checked>
              <span class="checkmark"></span>
            </div>
            <div class="pure-u-4-24 myMarket_column item_show">
              <img src="<?php echo PRODUCT_IMG;?><?=$item['idx']?>/1"/>
            </div>
            <div class="pure-u-5-24 myMarket_column item_name"><?=$item['name']?></div>
            <div class="pure-u-5-24"></div>
            <div class="pure-u-3-24 myMarket_column">10</div>
            <div class="pure-u-3-24 myMarket_column">$<?=$item['ori_price']?></div>
            <div class="pure-u-2-24 myMarket_column delete_item" data-storeproduct="<?=$item['storeProductId']?>">刪除</div>
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
      </div>

      <div class="myMarket_state">
        <div class="pure-g myMarket_row">
          <div class="pure-u-4-24 myMarket_column"></div>
          <div class="pure-u-5-24 myMarket_column">商品</div>
          <div class="pure-u-4-24 myMarket_column">購買人</div>
          <div class="pure-u-3-24 myMarket_column">購買數量</div>
          <div class="pure-u-3-24 myMarket_column">獲利</div>
          <div class="pure-u-3-24 myMarket_column">實際獲利</div>
          <div class="pure-u-2-24 myMarket_column">狀態</div>
        </div>

        <div class="pure-g myMarket_row">
          <div class="pure-u-4-24 myMarket_column">
            <img src="<?php echo PRODUCT_IMG; ?>1/1"/>
          </div>
          <div class="pure-u-5-24 myMarket_column">iphone 7</div>
          <div class="pure-u-4-24 myMarket_column">司馬遷</div>
          <div class="pure-u-3-24 myMarket_column">10</div>
          <div class="pure-u-3-24 myMarket_column">$1500</div>
          <div class="pure-u-3-24 myMarket_column">N/A</div>
          <div class="pure-u-2-24 myMarket_column">運貨中</div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="products_manage_right_foot">
  <div class="pure-g myMarket_type products_manage_foot_contain">
    <div class="pure-u-3-24 products_type_shopping_button"><button><img src="<?=$baseUrl?>/css/images/conveyor_white.svg" />我要供貨</button></div>
    <div class="pure-u-17-24"></div>
    <div class="pure-u-4-24 products_type_shopping_button"><button><img src="<?=$baseUrl?>/css/images/shop_white.svg" />加入我的賣場</button></div>
  </div>
</div>
