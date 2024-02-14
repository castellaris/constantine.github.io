fetch('46.php')
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
      `;
      productsSection.appendChild(productDiv);
    });
  })
  .catch(error => console.error('Error fetching products:', error));
