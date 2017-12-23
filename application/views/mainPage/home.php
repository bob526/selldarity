<head>
  <?=$layouthead?>
  <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>css/home.css?v=<?=time();?>">
  <script src="<?=$baseUrl?>js/home.js?v=<?=time();?>"></script>
</head>
<body>
  <?=$layoutbody?>

  <div class="registerArea" id="registerArea">
    <div class="registerWindow__outside">
      <span class="close" id="close">&times;</span>
      <div class="registerWindow__inside">
        <div class="registerWindow__inside__title">
          <img src="<?=$baseUrl?>/css/images/Selldarity_icon_chinese.svg" class="logo"/>
        </div>
        <div class="registerWindow__inside__content">
          <p>以您的電子郵件註冊</br>即可在團結拍賣獲得全新的拍賣體驗</p>
          <form>
            <input type="email" required="required" placeholder="電子郵件"/>
            <input type="email" required="required" placeholder="確認郵件"/>
            <input type="password"  required="required" placeholder="密碼"/>
            <input type="text"  required="required" placeholder="我們該怎麼稱呼你?"/>
            <input type="submit" value="註冊">
          </form>
          <p>已經加入團結拍賣? <span class="registerToSignIn">登入</span></p>
        </div>
      </div>
    </div>
  </div>
</body>
