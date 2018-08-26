<!DOCTYPE html>
<html>
<head>
  <?=$layouthead?>
  <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>css/jquery-ui.css?v=<?=time();?>">
  <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>css/userInfo.css?v=<?=time();?>">
  <script src="<?=$baseUrl?>js/jquery-ui/external/jquery/jquery.js?v=<?=time();?>"></script>
  <script src="<?=$baseUrl?>js/jquery-ui/jquery-ui.min.js?v=<?=time();?>"></script>
  <script src="<?=$baseUrl?>js/userInfo.js?v=<?=time();?>"></script>
</head>
<body>
  <?=$layoutbody?>
  <div class="mainPage">
    <div class="title">
      <a href="<?=$baseUrl?>">
        <img src="<?=$baseUrl?>/css/images/arrow-point-to-left.svg"/>
        <p>返回賣場</p>
      </a>
    </div>
    <div class="pure-g userInfo">
      <div class="userInfo_left">
        <a class="userInfo_type" href="<?=$baseUrl?>/user/userInfo/1">個人帳戶</a>
        <a class="userInfo_type" href="<?=$baseUrl?>/user/userInfo/2">銷售紀錄</a>
        <a class="userInfo_type" href="<?=$baseUrl?>/user/userInfo/3">交易動態</a>
        <a class="userInfo_type" href="<?=$baseUrl?>/user/userInfo/4">個人賣場</a>
        <a class="userInfo_type" href="<?=$baseUrl?>/user/userInfo/5">虛擬倉庫</a>
        <a class="userInfo_type" href="<?=$baseUrl?>/user/userInfo/6">通知總攬</a>
        <a class="userInfo_type" href="<?=$baseUrl?>/user/userInfo/7">錢包資訊</a>
      </div>
      <div class="userInfo_right">
        <?=$userInfoType?> 
      </div>
    </div>
  </div>
</body>
<html>
<script>
baseUrl = "<?=$baseUrl?>";
uid = "<?=$uidx?>";
</script>
