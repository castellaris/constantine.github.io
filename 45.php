<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поисковик товаров</title>
</head>
<body>
    <h1>Поиск товара</h1>
    <input type="text" id="searchInput" placeholder="Введите название товара">
    <button onclick="searchProduct()">Найти</button>
    <div id="productInfo"></div>

    <script>
        function searchProduct() {
            var searchQuery = document.getElementById('searchInput').value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("productInfo").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "search_product.php?query=" + searchQuery, true);
            xmlhttp.send();
        }
    </script>
</body>
</html>