<!DOCTYPE html>
<html>
<head>
  <?=$layouthead?>
  <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>css/jquery-ui.css?v=<?=time();?>">
  <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>css/personalProductsManage.css?v=<?=time();?>">
  <script src="<?=$baseUrl?>js/jquery-ui/external/jquery/jquery.js?v=<?=time();?>"></script>
  <script src="<?=$baseUrl?>js/jquery-ui/jquery-ui.min.js?v=<?=time();?>"></script>
  <script src="<?=$baseUrl?>js/personalProductsManage.js?v=<?=time();?>"></script>
</head>
<body>
  <?=$layoutbody?>
  <div class="mainPage">
    <div class="title">
       <a href="<?=$baseUrl?>"> <img src="<?=$baseUrl?>/css/images/arrow-white-point-to-left.svg"/></a>
      <img src="<?=$baseUrl?>/css/images/shopping-cart-settings-white.svg"/>
      <p>個人商品管理</p>
    </div>
    <div class="pure-g products_manage">
      <div class="pure-u-3-24 products_manage_left">
        <p class="product_type product_type_focus" id="shoppingCar_type">購物車</p>
        <p class="product_type" id="warehouse_type">虛擬倉庫</p>
        <p class="product_type" id="personal_sale_type">個人拍賣</p>
        <div class="user_message">
          <img src="<?=$baseUrl?>userImg/<?php echo $picture ? $picture : "user.svg"; ?>" />
          <p><?=$userName?></p>
          <p>LV. <?=$LV?></p>
          <p>$ 65000</p>
          <p>推薦代碼 12345$$</p>
        </div>
      </div>
      <div class="products_manage_right">
        <div class="products_type_info">
          <div class="products_type_info_content">
            <div class="shoppingCar_products shoppingCar_type" id="shoppingCar_products">
              <div class="pure-g shoppingCar_row">
                <div class="pure-u-2-24 shoppingCar_column checkBox_container">
                  <input type="checkbox">
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

              <div class="pure-g shoppingCar_row">
                <div class="pure-u-2-24 shoppingCar_column checkBox_container">
                  <input type="checkbox" class="shoppingCar_checkProductItem">
                  <span class="checkmark"></span>
                </div>
                <div class="pure-u-4-24 shoppingCar_column">
                  <img src="<?=$baseUrl?>/products/1/1"/> 
                </div>
                <div class="pure-u-4-24 shoppingCar_column">iphone 7</div>
                <div class="pure-u-3-24 shoppingCar_column"><b>10% off</b></div>
                <div class="pure-u-3-24 shoppingCar_column"><b>&#36; <del>20000</del><span>﹥</span>15000</b></div>
                <div class="pure-u-3-24 shoppingCar_column">
                  <div class="counter">
                    <p id="counter-reduce" class="counter__button" style="border-right:solid 1px #000;">-</p>
                    <p id="counter-number" class="counter__number">0</p>
                    <p id="counter-add" class="counter__button" style="border-left:solid 1px #000;">+</p>
                  </div>
                </div>
                <div class="pure-u-3-24 shoppingCar_column"><b>100000</b></div>
                <div class="pure-u-2-24 shoppingCar_column shoppingCar_item_delete">刪除</div>
              </div>

              <div class="pure-g shoppingCar_row">
                <div class="pure-u-2-24 shoppingCar_column checkBox_container">
                  <input type="checkbox" class="shoppingCar_checkProductItem">
                  <span class="checkmark"></span>
                </div>
                <div class="pure-u-4-24 shoppingCar_column">
                  <img src="<?=$baseUrl?>/products/1/1"/> 
                </div>
                <div class="pure-u-4-24 shoppingCar_column">iphone 7</div>
                <div class="pure-u-3-24 shoppingCar_column"><b>10% off</b></div>
                <div class="pure-u-3-24 shoppingCar_column"><b>&#36; <del>20000</del><span>﹥</span>15000</b></div>
                <div class="pure-u-3-24 shoppingCar_column">
                  <div class="counter">
                    <p id="counter-reduce" class="counter__button" style="border-right:solid 1px #000;">-</p>
                    <p id="counter-number" class="counter__number">0</p>
                    <p id="counter-add" class="counter__button" style="border-left:solid 1px #000;">+</p>
                  </div>
                </div>
                <div class="pure-u-3-24 shoppingCar_column"><b>100000</b></div>
                <div class="pure-u-2-24 shoppingCar_column delete_item">刪除</div>
              </div>

            </div>

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
                    <input type="checkbox">
                    <span class="checkmark" id="warehouse_store_checkAll"></span>
                  </div>
                  <div class="pure-u-4-24 warehouse_column"></div>
                  <div class="pure-u-5-24 warehouse_column">商品</div>
                  <div class="pure-u-4-24 warehouse_column">庫存</div>
                  <div class="pure-u-4-24 warehouse_column">儲藏費用(單日)</div>
                  <div class="pure-u-3-24 warehouse_column">個人拍賣</div>
                  <div class="pure-u-2-24 warehouse_column">操作</div>
                </div>
          
                <div class="pure-g warehouse_row">
                  <div class="pure-u-2-24 warehouse_column checkBox_container">
                    <input type="checkbox" class="warehouse_store_checkProductItem">
                    <span class="checkmark"></span>
                  </div>
                  <div class="pure-u-4-24 warehouse_column">
                    <img src="<?=$baseUrl?>/products/1/1"/> 
                  </div>
                  <div class="pure-u-5-24 warehouse_column">iphone 7</div>
                  <div class="pure-u-4-24 warehouse_column">10</div>
                  <div class="pure-u-4-24 warehouse_column"><b>$0.5元</b>/件</div>
                  <div class="pure-u-3-24 warehouse_column checkBox_container">
                    <input type="checkbox">
                    <span class="checkmark" id="warehouse_checkAll"></span>
                  </div>
                  <div class="pure-u-2-24 warehouse_column delete_item">退貨</div>
                </div>
              </div>

              <div class="warehouse_purchase">
                <div class="pure-g warehouse_row">
                  <div class="pure-u-2-24 warehouse_column checkBox_container">
                    <input type="checkbox">
                    <span class="checkmark" id="warehouse_purchase_checkAll"></span>
                  </div>
                  <div class="pure-u-4-24 warehouse_column"></div>
                  <div class="pure-u-4-24 warehouse_column">商品</div>
                  <div class="pure-u-3-24 warehouse_column">當前價格</div>
                  <div class="pure-u-3-24 warehouse_column">平均進貨價格</div>
                  <div class="pure-u-4-24 warehouse_column">進貨個數</div>
                  <div class="pure-u-2-24 warehouse_column">狀態</div>
                  <div class="pure-u-2-24 warehouse_column">操作</div>
                </div>
          
                <div class="pure-g warehouse_row">
                  <div class="pure-u-2-24 warehouse_column checkBox_container">
                    <input type="checkbox" class="warehouse_purchase_checkProductItem">
                    <span class="checkmark"></span>
                  </div>
                  <div class="pure-u-4-24 warehouse_column">
                    <img src="<?=$baseUrl?>/products/1/1"/> 
                  </div>
                  <div class="pure-u-4-24 warehouse_column">iphone 7</div>
                  <div class="pure-u-3-24 warehouse_column">$34566</div>
                  <div class="pure-u-3-24 warehouse_column">$4567</div>
                  <div class="pure-u-4-24 warehouse_column">
                    <div class="counter">
                      <p id="counter-reduce" class="counter__button" style="border-right:solid 1px #000;">-</p>
                      <p id="counter-number" class="counter__number">0</p>
                      <p id="counter-add" class="counter__button" style="border-left:solid 1px #000;">+</p>
                    </div>
                  </div>
                  <div class="pure-u-2-24 warehouse_column">退貨</div>
                  <div class="pure-u-2-24 warehouse_column delete_item">刪除</div>
                </div>
              </div>
            </div>

            <div class="personal_sale_products personal_sale_type">
              <div class="personal_sale_label personal_sale_manage_label" id="personal_sale_label_selected">
                <p>
                  <img src="<?=$baseUrl?>/css/images/settings.svg" />
                  拍賣管理 
                </p>
              </div>
              <div class="personal_sale_label personal_sale_state_label">
                <p>
                  <img src="<?=$baseUrl?>/css/images/notes.svg" />
                  銷售狀態
                </p>
              </div>
              <div class="personal_sale_manage">
                <div class="pure-g personal_sale_row">
                  <div class="pure-u-4-24 personal_sale_column"></div>
                  <div class="pure-u-5-24 personal_sale_column">商品</div>
                  <div class="pure-u-3-24 personal_sale_column">庫存數量</div>
                  <div class="pure-u-3-24 personal_sale_column">原始價格</div>
                  <div class="pure-u-3-24 personal_sale_column">進貨折扣</div>
                  <div class="pure-u-4-24 personal_sale_column">出貨折扣</div>
                  <div class="pure-u-2-24 personal_sale_column">操作</div>
                </div>
          
                <div class="pure-g personal_sale_row">
                  <div class="pure-u-4-24 personal_sale_column">
                    <img src="<?=$baseUrl?>/products/1/1"/> 
                  </div>
                  <div class="pure-u-5-24 personal_sale_column">iphone 7</div>
                  <div class="pure-u-3-24 personal_sale_column">10</div>
                  <div class="pure-u-3-24 personal_sale_column">$30000</div>
                  <div class="pure-u-3-24 personal_sale_column">40%off</div>
                  <div class="pure-u-4-24 personal_sale_column">
                    <div class="counter">
                      <p id="counter-reduce" class="counter__button" style="border-right:solid 1px #000;">-</p>
                      <p id="counter-number" class="counter__number">0</p>
                      <p id="counter-add" class="counter__button" style="border-left:solid 1px #000;">+</p>
                    </div>
                    %off
                  </div>
                  <div class="pure-u-2-24 personal_sale_column delete_item">退貨</div>
                </div>
              </div>

              <div class="personal_sale_state">
                <div class="pure-g personal_sale_row">
                  <div class="pure-u-4-24 personal_sale_column"></div>
                  <div class="pure-u-5-24 personal_sale_column">商品</div>
                  <div class="pure-u-4-24 personal_sale_column">購買人</div>
                  <div class="pure-u-3-24 personal_sale_column">購買數量</div>
                  <div class="pure-u-3-24 personal_sale_column">獲利</div>
                  <div class="pure-u-3-24 personal_sale_column">實際獲利</div>
                  <div class="pure-u-2-24 personal_sale_column">狀態</div>
                </div>
          
                <div class="pure-g personal_sale_row">
                  <div class="pure-u-4-24 personal_sale_column">
                    <img src="<?=$baseUrl?>/products/1/1"/> 
                  </div>
                  <div class="pure-u-5-24 personal_sale_column">iphone 7</div>
                  <div class="pure-u-4-24 personal_sale_column">司馬遷</div>
                  <div class="pure-u-3-24 personal_sale_column">10</div>
                  <div class="pure-u-3-24 personal_sale_column">$1500</div>
                  <div class="pure-u-3-24 personal_sale_column">N/A</div>
                  <div class="pure-u-2-24 personal_sale_column">運貨中</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="products_manage_right_foot">
          <div class="products_manage_foot_contain shoppingCar_foot shoppingCar_type">
            <p>商品總金額 $123420</p>
            <p>運費總額 $80</p>
            <p>總付款金額: <b>$123500</b></p>
            <div class="products_type_button"><button><img src="<?=$baseUrl?>/css/images/warehouse_red.svg" />推薦人代碼</button></div>
            <div class="products_type_button"><button><img src="<?=$baseUrl?>/css/images/warehouse_red.svg" />進貨至需倉庫</button></div>
            <div class="products_type_shopping_button"><button><img src="<?=$baseUrl?>/css/images/shopping_cart_white.svg" />直接訂購</button></div>
          </div>
          
          <div class="warehouse_type">
            <div class="products_manage_foot_contain warehouse_store">
              <p>無庫存商品 6 件</p>
              <p>儲藏費用總額: <b>$123500</b> 元/日</p>
              <div class="products_type_button"><button>加入個人拍賣</button></div>
              <div class="products_type_shopping_button"><button><img src="<?=$baseUrl?>/css/images/package_white.svg" />領取貨物</button></div>
            </div>
          
            <div class="products_manage_foot_contain warehouse_purchase">
              <p>商品總金額 $123420</p>
              <p>運費總額 $80</p>
              <p>總付款金額: <b>$123500</b></p>
              <div class="products_type_shopping_button"><button><img src="<?=$baseUrl?>/css/images/warehouse_white.svg" />進貨至虛擬倉庫</button></div>
            </div>
          </div>

          <div class="personal_sale_type products_manage_foot_contain">
            <div class="products_type_shopping_button"><button><img src="<?=$baseUrl?>/css/images/shopping_cart_white.svg" />我要供貨</button></div>
            <div class="products_type_button"><button><img src="<?=$baseUrl?>/css/images/warehouse_red.svg" />生成網址連結</button></div>
            <div class="products_type_shopping_button"><button><img src="<?=$baseUrl?>/css/images/shopping_cart_white.svg" />推廣個人賣場</button></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<html>
<script>
baseUrl = "<?=$baseUrl?>";
uid = "<?=$uidx?>";
</script>
