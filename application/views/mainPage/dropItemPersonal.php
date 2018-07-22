<div class="pure-g drop_item">
  <span class="drop_item_close" data-storeproduct="<?=$storeProductId?>">&times;</span>
  <img class="pure-u-1-3" src="<?=$baseUrl?>products/<?=$product['idx']?>/1"/> 
  <div class="pure-u-14-24">
    <p class="storeProduct" data-storeProduct="<?=$storeProductId?>"><?=$product['name']?></p>
    <p class="drop_personalStore_item">原價: <?=$product['ori_Price']?></p>
    <p class="drop_item_highligh drop_warehouse_item drop_personalStore_item">個人庫存: <b><?=$numOfWarehouseProduct?></b> 個</p>
    <p class="drop_item_highligh drop_personalStore_item">進貨折扣: <b><?=$product['off_Percent']?>% off</b></p>
  </div>
</div>

<script>
  $(".drop_item_close").click(function() {
    let storeProductIdx = $(this).data("storeproduct");
    $(this).parent().remove();
    $.post("<?=$baseUrl?>product/ajaxDeleteStoreProduct", {idx: storeProductIdx});
  });
</script>
