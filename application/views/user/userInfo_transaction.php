<div class="transaction">
  <div class="transaction_title">
    <div class="pure-g transaction_filter">
      <div class="pure-u-6-24 pure-g transaction_type">
        <span class="pure-u-1-2 transaction_type_row transaction_type_selected" id="transaction_type_shopping">購物</span>
        <span class="pure-u-1-2 transaction_type_row" id="transaction_type_sale">銷售</span>
      </div>
      <div class="pure-u-2-24 pure-g transaction_filter_decorate">
        <div class="pure-u-1-2 transaction_filter_decorate_triangle">
        </div>
        <div class="pure-u-1-2 transaction_filter_decorate_triangle_space">
          <div class="transaction_filter_decorate_triangle_space_up">
          </div>
          <div class="transaction_filter_decorate_triangle_space_down">
          </div>
        </div>
      </div>
      <div class="pure-u-15-24 pure-g transaction_type_shopping">
        <span class="pure-u-1-5 transaction_type_item_row transaction_type_shopping_selected">待付款</span>
        <span class="pure-u-1-5 transaction_type_item_row">待收貨</span>
        <span class="pure-u-1-5 transaction_type_item_row">交易中</span>
        <span class="pure-u-1-5 transaction_type_item_row">已完成</span>
        <span class="pure-u-1-5 transaction_type_item_row">已取消</span>
      </div>
      <div class="pure-u-16-24 transaction_type_sale" style="display:none;">
        <span class="pure-u-1-5 transaction_type_item_row transaction_type_sale_selected">未付款</span>
        <span class="pure-u-1-5 transaction_type_item_row">交易中</span>
        <span class="pure-u-1-5 transaction_type_item_row">已完成</span>
        <span class="pure-u-1-5 transaction_type_item_row">已取消</span>
        <span class="pure-u-1-5 transaction_type_item_row">退款/退貨</span>
      </div>
    </div> 
    <div class="searchArea">
      <form>
        <div class="searchBar">
          <div class="searchBar_flex">
            <img src="<?=$baseUrl?>/css/images/search_gray.svg"/>
            <input type="text" placeholder="搜尋訂單"/>
          </div>
        </div>
        <div class="searchArea_right">
          <div class="searchDate">
            訂單成立時間： 
            <input type="date"/>
            <b>-</b>
            <input type="date"/>
          </div>
          <input type="submit" value="送出"/>
        </div>
      </form>
    </div>
  </div>
  <div class="transaction_data">
    <div class="transaction_info">
      <div class="pure-g transaction_info_title">
        <div class="pure-u-7-24 transaction_info_title_buyer">
          買家: 
          <img src="<?=$baseUrl?>userImg/user.svg"/>
          1243333333
        </div>
        <div class="pure-u-4-24">
          買家應付金額
        </div>
        <div class="pure-u-4-24">
          狀態
        </div>
        <div class="pure-u-4-24">
          物流方式
        </div>
        <div class="pure-u-5-24">
          訂單編號: 1234567890
        </div>
      </div>
      <div class="pure-g transaction_info_content">
        <div class="pure-u-7-24">
          <div class="pure-g transaction_info_content_product">
            <div class="pure-u-1-4 transaction_info_content_product_img">
              <img src="<?=$baseUrl?>/products/1/1"/> 
            </div>
            <div class="pure-u-3-4 transaction_info_content_product_name">
              iphone 7 * 10
            </div>
          </div>
          <div class="pure-g transaction_info_content_product">
            <div class="pure-u-1-4 transaction_info_content_product_img">
              <img src="<?=$baseUrl?>/products/1/1"/> 
            </div>
            <div class="pure-u-3-4 transaction_info_content_product_name">
              iphone 7 * 10
            </div>
          </div>
        </div>
        <div class="pure-u-4-24 transaction_info_content_money">
          <p class="color-red">$5300</p>
          <p class="color-orange">(貨到付款)</p>
        </div>
        <div class="pure-u-4-24 transaction_info_content_status">
          <p class="color-green">運貨中</p>
          <p class="color-gray">(處理中)</p>
        </div>
        <div class="pure-u-4-24 transaction_info_content_receiver">
          全家
        </div>
        <div class="pure-u-5-24 transaction_info_content_detail">
          <button>查看詳情</button>
        </div>
      </div>
    </div>
  </div>
</div>
