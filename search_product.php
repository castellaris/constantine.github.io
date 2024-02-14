<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
<?php
$query = $_GET['query'];
$xml = simplexml_load_file('45.xml');

$productInfo = '';

foreach ($xml->section as $section) {
    foreach ($section->item as $item) {
        $name = (string)$item->name;
        if (strpos($name, $query) !== false) {
            $productInfo .= "<h2>$name</h2>";
            $productInfo .= "<p>Вывод 1: " . (string)$item->param1 . "</p>";
            $productInfo .= "<p>Значение 2: " . (string)$item->param2 . "</p>";
            $productInfo .= "<p>Значение 3: " . (string)$item->param3 . "</p>";
        }
    }
}
echo $productInfo;
?>

</body>
</html>