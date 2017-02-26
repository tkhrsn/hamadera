<?php
  // 共通変数
  $img_dir = './img/';
  if (!is_dir($img_dir)) {
    mkdir($img_dir);
  }
  
  $cat_file = './img/cats.txt';
  
  // パラメータによる処理
  $st_make_cat = 'カテゴリ作成しちゃう';
  $flush = '';
  // カテゴリ作成
  if ($_GET['submit_type'] === $st_make_cat) {
    if (is_file($cat_file)) {
      $cats = explode("\n", file_get_contents($cat_file));
      $cat_num = count($cats);
    } else {
      $cats = [];
      $cat_num = 0;
    }
    
    $cat_name = $_GET['cat_name'];
    mkdir($img_dir . $cat_num);
    
    $put_txt = $cat_num.' '.$cat_name;
    if (empty($cats)) {
      file_put_contents($cat_file, $cat_name);
    } else {
      file_put_contents($cat_file, "\n".$cat_name, FILE_APPEND);
    }
    
    $flush = 'カテゴリ作ったお！！！！！！！';
  }
  
  $cats = explode("\n", file_get_contents($cat_file));
  
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="HTML,HTML5,タグ,たぐ,CSS,CSS3,スタイルシート,stylesheet,リファレンス,ウェブデザイン">
    <meta name="description" content="HTMLタグ・スタイルシート・特殊文字等の早見表">
    <title>はまでら</title>
    <link rel="stylesheet" href="./css/htmlq.css">
    <link rel="stylesheet" media="screen and (max-width:800px)" href="./css/htmlq_sp.css">
    <link rel="shortcut icon" href="http://www.htmq.com/favicon.ico">
  </head>
  <body>
    <h1 class="header1">小野寺</h2>
    <div id="bigbox">
    <div class="nowpage"><a href="/">トップページ </a>
    </div>
    
    <?php if ($flush):?>
      <b><?php echo $flush; ?></b>
    <?php endif; ?>
    
    <h2 class="header2">カテゴリ別小野寺一覧</h2>
    <h3 class="header3">小野寺のカテゴリを選べよ</h3>
    <div class="siyorei_source">
      <?php foreach ($cats as $no => $cat): ?>
        <a href="./list.php?cat=<?php echo $no?>"><?php echo $cat?></a><br><br>
      <?php endforeach; ?>
    </div>
    <h2 class="header2">カテゴリ作成</h2>
    <div class="siyorei_source">
    <form method="get">
      <input type="text" name="cat_name">
      <input type ="submit" name="submit_type" value="<?php echo $st_make_cat?>">
    </form>
    </div>
    <h2 class="header2">新たな小野寺をアップロード</h2>
    <div class="siyorei_source">
    <form enctype="multipart/form-data" action="./list.php" method="POST">
      <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
      <table border="0" cellspacing="0" cellpadding="5">
        <tr>
        <tr>
        <td nowrap>ファイル</td>
        <td valign="top" width="150"><input type="file" name="file"></td>
        </tr>
        <tr>
        <td nowrap>名前</td>
        <td valign="top" width="150"><input type="text" name="name"></td>
        </tr>
        </tr>
        <tr>
        <td nowrap>カテゴリ</td>
        <td valign="top" width="150">
          <select name="cat">
            <?php foreach ($cats as $no => $cat):?>
              <option value="<?php echo $no; ?>"><?php echo $cat; ?></option>
            <?php endforeach;?>
          </select>
        </td>
        </tr>
      </table>
      <br>
      <input type ="submit" name="submit_type" value="アップロード">
    </form>
    </div>
    </div>
  </body>
</html>