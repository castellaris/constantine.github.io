<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Product Store</title>
  <link href="46.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <header>
    <h1>Welcome to Our Product Store</h1>
  </header>

  <nav>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Products</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </nav>

  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, description, price, category FROM products";
$result = $conn->query($sql);

$products = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $products[] = array(
      'id' => $row['id'],
      'name' => $row['name'],
      'description' => $row['description'],
      'price' => $row['price'],
      'category' => $row['category']
    );
  }
}

echo json_encode($products);

$conn->close();
?>


  <section id="products">
  </section>

  <footer>
    <p>&copy; 2022 Product Store</p>
  </footer>

  <script>
    fetch('get_products.php')
      .then(response => response.json())
      .then(data => {
        const productsSection = document.getElementById('products');
        data.forEach(product => {
          const productDiv = document.createElement('div');
          productDiv.classList.add('product');
          productDiv.innerHTML = `
            <h3>${product.name}</h3>
            <p>${product.description}</p>
            <p>Price: $${product.price}</p>
            <p>Category: ${product.category}</p>
          `;
          productsSection.appendChild(productDiv);
        });
      })
      .catch(error => console.error('Error fetching products:', error));
  </script>
</body>
</html>