<?php
  // 共通変数
  $img_dir = './img/';
  
  
  // パラメータによる処理
  $flush = '';
  
  // ファイルアップロード
  if ($_POST['submit_type'] === 'アップロード') {
    $cat           = $_POST['cat'];
    $name          = $_POST['name'];
    $name_file = './img/cat_'.$cat.'.txt';
    
    if (is_file($name_file)) {
      $names = file_get_contents($name_file);
      $name_no = count($names);
      file_put_contents($name_file, "\n".$name, FILE_APPEND);
    } else {
      $names = [];
      $name_no = 0;
      file_put_contents($name_file, $name);
    }
    $orig_filename = $_FILES['file']['name'];
    $ext           = end(explode('.', $orig_filename));
    $tmp_filepath  = $_FILES['file']['tmp_name'];
    $up_file_path  = sprintf('%s%s/%s.%s', $img_dir, $cat , $name_no , $ext);
    move_uploaded_file($tmp_filepath, $up_file_path);
    
    $flush = 'うｐしたお！！！！！！';
  }
  
  if (strlen($cat) === 0) {
    $cat = $_GET['cat'];
  }
  
  // 対象カテゴリのファイル一覧取得
  $cat_dir = $img_dir . $cat . '/';
  $files = array_splice(scandir($cat_dir), 2);

  $cats = explode("\n", file_get_contents('./img/cats.txt'));
  $cat_name = $cats[$cat];
  
  $name_file = './img/cat_'.$cat.'.txt';
  $names = explode("\n", file_get_contents($name_file));
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
    <link rel="stylesheet" href="http://www.htmq.com/htmq.css">
    <link rel="stylesheet" media="screen and (max-width:800px)" href="http://www.htmq.com/htmq_sp.css">
    <link rel="shortcut icon" href="http://www.htmq.com/favicon.ico">
  </head>
  <body>
    <h1 class="header1">小野寺</h2>
    <div id="bigbox">
    <div class="nowpage"><a href="/">トップページ</a> > <a href="/list.php?cat=<?php echo $cat?>"><?php echo $cat_name?></a>
    </div>
    
    <?php if ($flush):?>
      <b><?php echo $flush; ?></b>
    <?php endif; ?>
    
    <h2 class="header2"><?php echo $cat_name; ?> の画像一覧ッッッッ！！！！</h2>
    <div class="siyorei_source">
    <?php foreach ($files as $no => $file): ?>
      <img src="./img/<?php echo $cat.'/'.$file ?>" /><?php echo $names[$no] ?><br>
    <?php endforeach; ?>
    </div>
    </div>
  </body>
</html>