<div class="user_account">
  <div class="pure-g user_account_menu">
    <div class="pure-u-8-24 user_account_menu_focus" id="user_data">個人檔案</div>
    <!--<div class="pure-u-6-24" id="bank_info">銀行帳號/信用卡</div>-->
    <div class="pure-u-8-24" id="receiptAddr">收貨地址</div>
    <div class="pure-u-8-24" id="pwChange">密碼修改</div>
  </div> 
  <div class="user_account_data">
    <div class="pure-g user_data">
      <div class="pure-u-16-24 pure-g">
        <div class="pure-u-4-24 user_data_left">
          <div class="user_data_row">Email:</div>
          <div class="user_data_row">手機號碼:</div>
          <div class="user_data_row">賣場名稱:</div>
          <div class="user_data_row">性別:</div>
          <div class="user_data_row">生日:</div>
        </div>
        <div class="pure-u-18-24 user_data_right">
          <form>
            <div class="user_data_row user_data_email">
              <input type="email" name="email" value="<?=$email?>"/>
            </div>
            <div class="user_data_row user_data_phone">
              <input type="text" name="phone" value="<?=$phone?>"/>
            </div>
            <div class="user_data_row user_data_marketName">
              <input type="text" name="marketName" value="<?=$marketName?>"/>
            </div>
            <div class="user_data_row user_data_gender">
              <div><input type="radio" name="gender" <?= $gender == 1 ? 'checked' : ''?>/>男性</div>
              <div><input type="radio" name="gender" <?= $gender == 0 ? 'checked' : ''?>/>女性</div>
              <div><input type="radio" name="gender" <?= $gender == 2 ? 'checked' : ''?>/>其他</div>
            </div>
            <div class="user_data_row user_data_birthday">
              <input type="date" name="birthday" value="<?=$birthday?>"/>
            </div>
            <div class="user_data_row user_data_submit">
              <input type="button" value="儲存"/>
            </div>
          </form>
        </div>
      </div>
      <div class="pure-u-7-24 user_data_img">
        <img src="<?=$baseUrl?>userImg/<?php echo $picture ? $picture : "user.svg"; ?>"/>
        <button>選擇圖片</button>
        <p>選擇檔案:最大1MB</p>
        <p>檔案格式:JPEG,PNG</p>
      </div>
    </div>
    <!--<div class="pure-g bank_info">
      <div class="pure-u-11-24 creditCar">
        <div class="bank_info_title">
          <p>我的信用卡</p>
          <button><span>+</span>新增信用卡</button>
        </div>
        <p class="bank_info_nonData">尚未有信用卡</p>
        <div class="bank_info_data">
          <div class="bank_info_data_row">
            <img/> 
            <p>VISA</p>
            <p>**** **** **** 4567</p>
            <p>刪除</p>
            <button>預設</button>
          </div>
        </div>
      </div> 
      <div class="pure-u-11-24 bank_account">
        <div class="bank_info_title">
          <p>銀行帳號</p>
          <button><span>+</span>新增帳號</button>
        </div>
        <p class="bank_info_nonData">尚未有銀行帳號</p>
        <div class="bank_info_data">
        </div>
      </div> 
    </div>-->
    <div class="receiptAddr">
      <div class="receiptAddr_title">
        <p>我的收貨地址</p>
      </div>
      <p class="receiptAddr_nonData">尚未有收穫地址</p>
      <div class="pure-g receiptAddr_data">
        <div class="pure-u-5-24 receiptAddr_data_item">
          <p>姓名</p>
          <p>手機</p>
          <p>超商</p>
          <p>地址</p>
        </div>
        <div class="pure-u-12-24">
          <p>威</p>
          <p>123456789</p>
          <p>全家</p>
          <p>新北勢</p>
        </div>
        <div class="pure-u-6-24 receiptAddr_data_botton">
          <button class="receiptAddr_data_botton_delete">刪除</button>
          <button class="receiptAddr_data_botton_preset receiptAddr_preset">預設</button>
        </div>
      </div>
    </div>
    <div class="pwChange">
      <div class="pwChange_title">
        <p>修改密碼</p>
      </div>
      <div class="pwChange_info">
        <form>
          <div>新的密碼<input type="password"/></div>
          <div>確認密碼<input type="password"/></div>
          <input type="submit" value="確認"/>
        </form>
      </div>
    </div>
  </div>
</div>
