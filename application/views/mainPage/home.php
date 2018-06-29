<!DOCTYPE html>
<html>
<head>
  <?=$layouthead?>
  <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>css/jquery-ui.css?v=<?=time();?>">
  <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>css/home.css?v=<?=time();?>">
  <script src="<?=$baseUrl?>js/jquery-ui/external/jquery/jquery.js?v=<?=time();?>"></script>
  <script src="<?=$baseUrl?>js/jquery-ui/jquery-ui.min.js?v=<?=time();?>"></script>
  <script src="<?=$baseUrl?>js/home.js?v=<?=time();?>"></script>
</head>
<body>
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
      <div class="classification__container" id="classification__container">
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
              <li class="select"><?=$allDepartments['selectedItem']['name']?></li>
              <?php foreach ($allDepartments['departments'] as $department) : ?>
                <a href="<?=$baseUrl."?dep={$department['idx']}"?>"><li><?=$department['name']?></li></a>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="pure-u-15-24 show_products" id="show_products">
        <div class="class_products">
          <div class="class_products_title">
            <p><?=$allDepartments['selectedItem']['name']?></p>
            <select class="class_products_select">
              <option value="1">購買量</option>
              <option value="2">價格</option>
              <option value="3">具離達標數</option>
            </select>
          </div>
          <div class="pure-g class_products_items">
            <?php foreach ($products as $product): ?>
              <div class="pure-u-5-24 item_show" data-pidx="<?=$product['idx']?>">
                <img src="<?=$baseUrl?>/products/<?=$product['idx']?>/1" draggable="true" ondragstart="Drag(<?=$product['idx']?>)"/> 
                <p class="item_name"><?=$product['name']?></p>
                <p class="item_price">&#36; <del><?=$product['ori_Price']?></del><span>﹥</span><b><?=$product['off_Price']?></b></p>
                <div class="ship_range"><div style="width:<?=$product['toShipPercent']?>%;background:#f22;"></div></div>
                <div class="item_info">
                  <p><span><b class="item_toShip"><?=$product['to_Ship']?></b>件</span>距離出貨還剩</p>
                  <p><span><b class="item_off"><?=$product['off_Percent']?></b>%off</span>現在直接下訂</p>
                  <p><span>&#36;50</span>單次運費</p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div> 
      </div>
      <div class="pure-u-5-24 products_manage" id="products_manage">
        <div class="manage_title" id="manage_title">
          <img src="<?=$baseUrl?>/css/images/arrow-white-point-to-left.svg"/>
          <img src="<?=$baseUrl?>/css/images/shopping-cart-settings-white.svg"/>
          <p>個人商品管理</p>
        </div>
        <div class="manage_title_gap">
        </div>
        <div class="pure-g manage_cla">
          <div id="shoppingCar_item" class="pure-u-1-3 manage_cla_item manage_select_cal">購物車</div>
          <div id="warehouse_item" class="pure-u-1-3 manage_cla_item">虛擬倉庫</div>
          <div id="personalStore_item" class="pure-u-1-3 manage_cla_item">個人拍賣</div>
        </div>
        <div class="manage_drop" ondragover="AllowDrop(event)" ondrop="Drop()">
          <div id="drop__store" class="drop__store">
          </div>
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
          <button>推廣個人賣場</button>
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
