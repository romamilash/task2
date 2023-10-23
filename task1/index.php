<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Загрузка файла</title>
</head>
<body>
<form action="/" enctype="multipart/form-data" method="post">
    <input type="file" name="document">
    <input type="submit">
</form>


<?php

$is_upload = null;

if (!empty($_FILES)) {
    if (move_uploaded_file($_FILES['document']['tmp_name'], __DIR__ .'/files/'.$_FILES['document']['name'])) {
        $filename = __DIR__ .'/files/'.$_FILES['document']['name'];
        $is_upload = true;
    } else {
        $is_upload = false;
    }
}

?>

<?php if ($is_upload === true): ?>
    <div class="success">
    </div>
<?php elseif ($is_upload === false): ?>
    <div class="failure">
    </div>
<?php endif; ?>

<?php if ($is_upload === true): {
    $text = file_get_contents($filename);
    $encoding = mb_detect_encoding($text, ['utf-8', 'cp1251']);
    $text = iconv($encoding,'UTF-8',$text);
    $text = explode(' ', $text);
}

?>

<?php foreach ($text as $item): ?>
<div class="string">
    <span><?= $item ?></span><span class="string__count"><?= preg_match_all( "/[0-9]/", $item ); ?></span>
</div>
<?php endforeach; ?>

<?php endif; ?>
</body>
</html>
