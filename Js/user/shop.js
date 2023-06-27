                // AUTOCOMPELTION //

// Retrieve the search input element
const searchInput = document.getElementById('search-input');
const autoCompletionMsg = document.getElementById('autocompletion-msg');
const bar = document.getElementById('bar')
const container = document.querySelector('.container');
const originalTableContent = container.innerHTML;

searchInput.addEventListener('input', function() {
    const searchTerm = searchInput.value.trim().toLowerCase();
    fetch('http://localhost/boutique2/user/sa')
        .then(response => response.json())
        .then(productsData => {
            const matchedProducts = productsData.filter(product => {
                const productName = product.name.toLowerCase();
                return productName.includes(searchTerm);
            });
            console.log(matchedProducts);

            const matchedProductsLength = parseInt(matchedProducts.length, 10) || 0;

            // Clear the existing tables
            container.innerHTML = '';
            container.appendChild(bar);
            container.appendChild(autoCompletionMsg)

            if (searchTerm === '') {
                autoCompletionMsg.innerHTML = '';
            }

            else if (searchTerm !== '') {
                
            }

            if (matchedProductsLength > 1) {
                autoCompletionMsg.innerHTML = matchedProductsLength + ' résultats trouvés';
                console.log('Produits trouvés: ' + matchedProductsLength);

                matchedProducts.forEach(product => {
                    const productName = product.name;
                    const productDescription = product.description;
                    const productPrice = product.price;

                    // Create a new table for each matched product
                    const table = document.createElement('table');
                    table.classList.add('table', 'product-table');

                    // Create a new table row for each matched product
                    const newRow = document.createElement('tr');
                    newRow.classList.add('table-content');
                    newRow.innerHTML = `
                        <td>
                            <div class="tooltip">
                                <img src="http://localhost/boutique2/webfiles/img/shop/${product.image}" width="150px">
                                <span class="tooltip-text">
                                    <strong class="product-name">Nom:</strong> ${productName}<br>
                                    <strong class="product-description">Description:</strong> ${productDescription}<br>
                                    <strong class="product-price">Prix:</strong> ${productPrice}€
                                </span>
                            </div>
                        </td>
                        <td><a href="${URL}user/v/${product.id}"><button class="view-btn">Voir</button></a></td>
                        <td><a href="${URL}user/ac/${product.id}"><button class="bookmark-btn">Ajouter</button></a></td>
                        <td><a href="${URL}user/b/${product.id}"><button class="buy-product-btn">Acheter</button></a></td>
                    `;

                    // Append the new row to the table
                    table.appendChild(newRow);

                    // Append the table to the container
                    container.appendChild(table);
                });

            } else if (matchedProductsLength === 1) {
                autoCompletionMsg.innerHTML = matchedProductsLength + ' résultat trouvé';

                matchedProducts.forEach(product => {
                    const productName = product.name;
                    const productDescription = product.description;
                    const productPrice = product.price;

                    // Create a new table for each matched product
                    const table = document.createElement('table');
                    table.classList.add('table', 'product-table');

                    // Create a new table row for each matched product
                    const newRow = document.createElement('tr');
                    newRow.classList.add('table-content');
                    newRow.innerHTML = `
                        <td>
                            <div class="tooltip">
                                <img src="http://localhost/boutique2/webfiles/img/shop/${product.image}" width="150px">
                                <span class="tooltip-text">
                                    <strong class="product-name">Nom:</strong> ${productName}<br>
                                    <strong class="product-description">Description:</strong> ${productDescription}<br>
                                    <strong class="product-price">Prix:</strong> ${productPrice}€
                                </span>
                            </div>
                        </td>
                        <td><a href="${URL}user/v/${product.id}"><button class="view-btn">Voir</button></a></td>
                        <td><a href="${URL}user/ac/${product.id}"><button class="bookmark-btn">Ajouter</button></a></td>
                        <td><a href="${URL}user/b/${product.id}"><button class="buy-product-btn">Acheter</button></a></td>
                    `;

                    // Append the new row to the table
                    table.appendChild(newRow);

                    // Append the table and search bar to the container
                    container.appendChild(table);
                });
            } else {
                if (searchTerm === '') {
                    autoCompletionMsg.innerHTML = '';

                matchedProducts.forEach(product => {
                    const productName = product.name;
                    const productDescription = product.description;
                    const productPrice = product.price;

                    // Create a new table for each matched product
                    const table = document.createElement('table');
                    table.classList.add('table', 'product-table');

                    // Create a new table row for each matched product
                    const newRow = document.createElement('tr');
                    newRow.classList.add('table-content');
                    newRow.innerHTML = `
                        <td>
                            <div class="tooltip">
                                <img src="http://localhost/boutique2/webfiles/img/shop/${product.image}" width="150px">
                                <span class="tooltip-text">
                                    <strong class="product-name">Nom:</strong> ${productName}<br>
                                    <strong class="product-description">Description:</strong> ${productDescription}<br>
                                    <strong class="product-price">Prix:</strong> ${productPrice}€
                                </span>
                            </div>
                        </td>
                        <td><a href="${URL}user/v/${product.id}"><button class="view-btn">Voir</button></a></td>
                        <td><a href="${URL}user/ac/${product.id}"><button class="bookmark-btn">Ajouter</button></a></td>
                        <td><a href="${URL}user/b/${product.id}"><button class="buy-product-btn">Acheter</button></a></td>
                    `;

                    // Append the new row to the table
                    table.appendChild(newRow);

                    // Append the table and search bar to the container
                    container.appendChild(table);
                });
                } else {
                    autoCompletionMsg.innerHTML = '';

                matchedProducts.forEach(product => {
                    const productName = product.name;
                    const productDescription = product.description;
                    const productPrice = product.price;

                    // Create a new table for each matched product
                    const table = document.createElement('table');
                    table.classList.add('table', 'product-table');

                    // Create a new table row for each matched product
                    const newRow = document.createElement('tr');
                    newRow.classList.add('table-content');
                    newRow.innerHTML = `
                        <td>
                            <div class="tooltip">
                                <img src="http://localhost/boutique2/webfiles/img/shop/${product.image}" width="150px">
                                <span class="tooltip-text">
                                    <strong class="product-name">Nom:</strong> ${productName}<br>
                                    <strong class="product-description">Description:</strong> ${productDescription}<br>
                                    <strong class="product-price">Prix:</strong> ${productPrice}€
                                </span>
                            </div>
                        </td>
                        <td><a href="${URL}user/v/${product.id}"><button class="view-btn">Voir</button></a></td>
                        <td><a href="${URL}user/ac/${product.id}"><button class="bookmark-btn">Ajouter</button></a></td>
                        <td><a href="${URL}user/b/${product.id}"><button class="buy-product-btn">Acheter</button></a></td>
                    `;

                    // Append the new row to the table
                    table.appendChild(newRow);

                    // Append the table and search bar to the container
                    container.appendChild(table);
                });
                }
                // Restore the original table content
                container.innerHTML = originalTableContent;
            }
        })
        .catch(error => {
            console.log('Error fetching autocomplete data:', error);
        });
});

