<!DOCTYPE html>
<html>
<body>
<div style='
    width: 100%;
    font-weight: bold;
    margin:0px auto;
'>
    <p style='font-size:80px;'><?=$errorMsg?></p>
    <p style='font-size:80px; margin:0px auto;'>(3秒後自動轉跳)</p>
</div>
</body>
<html>
<script>
  setTimeout(function(){history.go(-1);},3000);
</script>
