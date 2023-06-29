const RoundBtnCart = document.getElementById("round-btn");
const ItemCount = document.getElementById("item-count");
const BookmarkBtns = document.getElementsByClassName("bookmark-btn");

const updateItemCount = (count) => {
    ItemCount.textContent = count;
  };
  

const checkUserCart = () => {
  fetch('http://localhost/boutique2/user/gc')
    .then(response => response.json())
    .then(userCart => {
      RoundBtnCart.style.backgroundColor = userCart ? 'green' : 'red';
    })
    .catch(error => {
      console.log('Error:', error);
    });
};

const checkUserCartItems = () => {
    fetch('http://localhost/boutique2/user/gc')
      .then(response => response.json())
      .then(userCart => {
        const itemCount = userCart ? userCart.products.length : 0;
        updateItemCount(itemCount);
        incrementRoundBtns(userCart.products);
      })
      .catch(error => {
        console.log('Error:', error);
      });
};
  
const incrementRoundBtns = (products) => {
    Array.from(BookmarkBtns).forEach(btn => {
      const productId = btn.dataset.productId;
      const cartItem = products.find(item => item.productId === productId);
      if (cartItem) {
        const quantity = cartItem.quantity;
        const roundBtn = btn.nextElementSibling.nextElementSibling;
        roundBtn.textContent = quantity;
        roundBtn.style.display = 'block';
      }
    });
  };

window.addEventListener('load', () => {
    checkUserCart();
    checkUserCartItems();
  });
  
Array.from(BookmarkBtns).forEach(btn => {
    btn.addEventListener('click', () => {
      const productId = btn.dataset.productId;
      const price = btn.dataset.price;
      addProductToCart(productId, price);
    });
});