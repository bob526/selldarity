<div class="pure-g drop_item">
  <span class="drop_item_close" data-storeproduct="<?=$storeProductId?>">&times;</span>
  <img class="pure-u-1-3" src="<?=$baseUrl?>products/<?=$product['idx']?>/1"/> 
  <div class="pure-u-14-24">
    <p class="storeProduct" data-storeProduct="<?=$storeProductId?>"><?=$product['name']?></p>
    <p class="drop_item_highligh drop_warehouse_item">費用: <b>&#36;<?=$product['storage_Cost']?></b> * 0元/日</p>
    <p class="drop_item_highligh drop_warehouse_item drop_personalStore_item">個人庫存: <b><?=$numOfWarehouseProduct?></b> 個</p>
    <div class="drop_item_number drop_shoppingCar_item drop_warehouse_item">
      個數:
      <div class="counter">
        <p class="counter__button" style="border-right:solid 1px #000;">-</p>
        <p class="counter__number"><?=$numOfStoreProduct?></p>
        <p class="counter__button" style="border-left:solid 1px #000;">+</p>
      </div>
    </div>
  </div>
</div>

<script>
  $(".drop_item_close").click(function() {
    let storeProductIdx = $(this).data("storeproduct");
    $(this).parent().remove();
    $.post("<?=$baseUrl?>product/ajaxDeleteStoreProduct", {idx: storeProductIdx});
  });

  $(".counter__button").click(function() {
    let counterNum = $(this).parent().children(".counter__number");
    let insertNum = 0;

    if ($(this).html() == "+") {
      insertNum = parseInt(counterNum.html()) + 1;
    } else {
      insertNum = parseInt(counterNum.html()) - 1;
      if (insertNum < 0) insertNum = 0;
    }

    counterNum.html(insertNum);
  });
</script>
