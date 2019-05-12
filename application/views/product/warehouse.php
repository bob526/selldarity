<div class="products_type_info">
  <div class="products_type_info_content">
    <div class="warehouse_products warehouse_type">
      <div class="warehouse_label warehouse_store_label" id="warehouse_label_selected">
        <p>
          <img src="<?=$baseUrl?>/css/images/warehouse.svg" />
          庫存
        </p>
      </div>
      <div class="warehouse_label warehouse_purchase_label">
        <p>
          <img src="<?=$baseUrl?>/css/images/forklift.svg" />
          進貨
        </p>
      </div>
      <div class="warehouse_store">
        <div class="pure-g warehouse_row">
          <div class="pure-u-2-24 warehouse_column checkBox_container">
            <input type="checkbox" checked>
            <span class="checkmark" id="warehouse_store_checkAll"></span>
          </div>
          <div class="pure-u-4-24 warehouse_column"></div>
          <div class="pure-u-5-24 warehouse_column">商品</div>
          <div class="pure-u-4-24 warehouse_column">庫存</div>
          <div class="pure-u-4-24 warehouse_column">儲藏費用(單日)</div>
          <div class="pure-u-3-24 warehouse_column">我的賣場</div>
          <div class="pure-u-2-24 warehouse_column">操作</div>
        </div>

        <div class="pure-g warehouse_row">
          <div class="pure-u-2-24 warehouse_column checkBox_container">
            <input type="checkbox" class="warehouse_store_checkProductItem" checked>
            <span class="checkmark"></span>
          </div>
          <div class="pure-u-4-24 warehouse_column">
            <img src="<?php echo PRODUCT_IMG; ?>1/1"/>
          </div>
          <div class="pure-u-5-24 warehouse_column">iphone 7</div>
          <div class="pure-u-4-24 warehouse_column">10</div>
          <div class="pure-u-4-24 warehouse_column"><b>$29999元</b>/件</div>
          <div class="pure-u-3-24 warehouse_column checkBox_container">
            <input type="checkbox">
            <span class="checkmark" id="warehouse_checkAll"></span>
          </div>
          <div class="pure-u-2-24 warehouse_column">退貨</div>
        </div>
      </div>

      <div class="warehouse_purchase">
        <div class="pure-g warehouse_row">
          <div class="pure-u-2-24 warehouse_column checkBox_container">
            <input type="checkbox" checked>
            <span class="checkmark" id="warehouse_purchase_checkAll"></span>
          </div>
          <div class="pure-u-4-24 warehouse_column"></div>
          <div class="pure-u-5-24 warehouse_column">商品</div>
          <div class="pure-u-4-24 warehouse_column">當前價格</div>
          <div class="pure-u-5-24 warehouse_column">進貨個數</div>
          <div class="pure-u-2-24 warehouse_column">狀態</div>
          <div class="pure-u-2-24 warehouse_column">操作</div>
        </div>
        <?php foreach ($warehouse['products'] as $item): ?>
          <div class="pure-g warehouse_row">
            <div class="pure-u-2-24 warehouse_column checkBox_container">
              <input type="checkbox" class="warehouse_purchase_checkProductItem" checked>
              <span class="checkmark"></span>
            </div>
            <div class="pure-u-4-24 warehouse_column">
              <img src="<?php echo PRODUCT_IMG;?><?=$item['idx']?>/1"/>
            </div>
            <div class="pure-u-5-24 warehouse_column"><?=$item['name']?></div>
            <div class="pure-u-4-24 warehouse_column item_price">$<b><?=$item['off_price']?></b></div>
            <div class="pure-u-5-24 warehouse_column">
              <div class="counter">
                <p class="counter__button" style="border-right:solid 1px #000;">-</p>
                <p class="counter__number"><?=$item['number']?></p>
                <p class="counter__button" style="border-left:solid 1px #000;">+</p>
              </div>
            </div>
            <div class="pure-u-2-24 warehouse_column">退貨</div>
            <div class="pure-u-2-24 warehouse_column delete_item" data-storeproduct="<?=$item['storeProductId']?>">刪除</div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</div>
<div class="products_manage_right_foot">
  <div class="pure-g products_manage_foot_contain warehouse_store">
    <p class="pure-u-4-24">無庫存商品 6 件</p>
    <p class="pure-u-5-24">儲藏費用總額: $<b>123500</b> 元/日</p>
    <div class="pure-u-8-24"></div>
    <div class="pure-u-3-24 products_type_button"><button>加入我的賣場</button></div>
    <div class="pure-u-3-24 products_type_shopping_button"><button><img src="<?=$baseUrl?>/css/images/package_white.svg" />領取貨物</button></div>
  </div>

  <div class="pure-g products_manage_foot_contain warehouse_purchase">
    <p id="warehouse_item_total" class="pure-u-4-24">商品總金額 $<b><?=$warehouse['totalPrice']?></b></p>
    <div class="pure-u-15-24"></div>
    <div class="pure-u-4-24 products_type_shopping_button"><button><img src="<?=$baseUrl?>/css/images/warehouse_white.svg" />進貨至虛擬倉庫</button></div>
  </div>
</div>
