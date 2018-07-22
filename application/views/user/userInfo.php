<!DOCTYPE html>
<html>
<head>
  <?=$layouthead?>
  <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>css/jquery-ui.css?v=<?=time();?>">
  <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>css/userInfo.css?v=<?=time();?>">
  <script src="<?=$baseUrl?>js/jquery-ui/external/jquery/jquery.js?v=<?=time();?>"></script>
  <script src="<?=$baseUrl?>js/jquery-ui/jquery-ui.min.js?v=<?=time();?>"></script>
  <script src="<?=$baseUrl?>js/personalProductsManage.js?v=<?=time();?>"></script>
</head>
<body>
  <?=$layoutbody?>
  <div class="mainPage">
    <div class="title">
      <a href="<?=$baseUrl?>"><img src="<?=$baseUrl?>/css/images/arrow-white-point-to-left.svg"/></a>
      <img src="<?=$baseUrl?>/css/images/shopping-cart-settings-white.svg"/>
      <p>返回賣場</p>
    </div>
    <div class="pure-g userInfo">
      <div class="userInfo_left">
        <p class="userInfo_type userInfo_type_focus" id="">個人帳戶</p>
        <p class="userInfo_type" id="">銷售紀錄</p>
        <p class="userInfo_type" id="">交易動態</p>
        <p class="userInfo_type" id="">個人賣場</p>
        <p class="userInfo_type" id="">虛擬倉庫</p>
        <p class="userInfo_type" id="">通知總攬</p>
        <p class="userInfo_type" id="">錢包資訊</p>
      </div>
      <div class="userInfo_right">
        <div class="user_account">
          <div class="pure-g  user_account_menu">
            <div class="pure-u-6-24 user_account_menu_focus">個人檔案</div>
            <div class="pure-u-6-24">銀行帳號/信用卡</div>
            <div class="pure-u-6-24">收貨地址</div>
            <div class="pure-u-6-24">密碼修改</div>
          </div> 
          <div class="user_account_data">
            <div class="pure-g user_data">
              <div class="pure-u-18-24 pure-g">
                <div class="pure-u-3-24 user_data_left">
                  <div class="user_data_row">Email:</div>
                  <div class="user_data_row">手機號碼:</div>
                  <div class="user_data_row">賣場名稱:</div>
                  <div class="user_data_row">性別:</div>
                  <div class="user_data_row">生日:</div>
                </div>
                <div class="pure-u-18-24 user_data_right">
                  <form>
                    <div class="user_data_row user_data_email">
                      <input type="text" name="email" value="way11229@gmail.com" disabled/>
                      <p class="user_data_email_change">變更</p>
                    </div>
                    <div class="user_data_row user_data_phone">
                      <p>新增</p>
                    </div>
                    <div class="user_data_row user_data_marketName">
                      <input type="text" name="markName"/>
                    </div>
                    <div class="user_data_row user_data_gender">
                      <div><input type="radio" name="gender"/>男性</div>
                      <div><input type="radio" name="gender"/>女性</div>
                      <div><input type="radio" name="gender"/>其他</div>
                    </div>
                    <div class="user_data_row user_data_birthday">
                      <input type="date" name="birthday"/>
                    </div>
                    <div class="user_data_row user_data_submit">
                      <input type="button" value="儲存"/>
                    </div>
                  </form>
                </div>
              </div>
              <div class="pure-u-6-24 user_data_img">
                <img src="<?=$baseUrl?>userImg/user.svg"/>
                <button>選擇圖片</button>
                <p>選擇檔案:最大1MB</p>
                <p>檔案格式:JPEG,PNG</p>
              </div>
            </div>
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
