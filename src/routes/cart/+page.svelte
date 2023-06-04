<main class="container">
   <h2 style="font-size:35px; font-weight:400; " class="p-2 mt-2">Your cart:</h2>
  
    {#if basketProducts.length > 0}
      <table class="table">
        <thead>
          <tr>
            <th>Product</th>
            <th>Description</th>
            <th>Price</th>
            <th>Remove</th>
          </tr>
        </thead>
        <tbody>
          {#each basketProducts as product, index}
            <tr key={`${product.id}-${index}`}>
              <td>{product.name}</td>
              <td>{product.description}</td>
              <td>${product.price.toFixed(2)}</td>
              <td>
                <button on:click={() => removeFromCart(product.id)} class="btn btn-danger">Remove</button>
              </td>
            </tr>
          {/each}
        </tbody>
      </table>
      <button on:click={clearCart} class="btn text-light m-3 "  style="background-color: #808000;">Clear Cart</button>
    {:else}
      <p class="m-3">Your cart is empty.</p>
    {/if}
  
    <a href="product" class="btn text-light m-3 "  style="background-color: #808000;">Continue Shopping</a>
  </main>
  
  <script>
    
    let basketProducts = JSON.parse(localStorage.getItem('basketProducts')) || [];
  
   
    const removeFromCart = (productId) => {
      
      basketProducts = basketProducts.filter((product) => product.id !== productId);
    
      localStorage.setItem('basketProducts', JSON.stringify(basketProducts));
    };
  
   
    const clearCart = () => {
      
      basketProducts = [];
      
      localStorage.setItem('basketProducts', JSON.stringify(basketProducts));
    };
  </script>
  