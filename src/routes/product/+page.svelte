<script>
    import { fade } from 'svelte/transition';
  let products = [
    {
      id: 1,
      name: "Tactical Backpack",
      description: "A durable backpack for carrying all your gear",
      price: 59.99,
      image: "nalgeneMain.jpg"
    },
    {
      id: 2,
      name: "Utility Pouch",
      description: "A versatile pouch for storing small items",
      price: 19.99,
      image: "nalgeneMain.jpg"
    },
    {
      id: 3,
      name: "Mobile Holder",
      description: "A versatile pouch for storing small items",
      price: 19.99,
      image: "nalgeneMain.jpg"
    },
    {
      id: 4,
      name: "Dump pouch",
      description: "A versatile pouch for storing small items",
      price: 19.99,
      image: "nalgeneMain.jpg"
    },
    {
      id: 5,
      name: "Dump pouch",
      description: "A versatile pouch for storing small items",
      price: 19.99,
      image: "nalgeneMain.jpg"
    },
    {
      id: 6,
      name: "Dump pouch",
      description: "A versatile pouch for storing small items",
      price: 19.99,
      image: "nalgeneMain.jpg"
    },
  ];
  const addToCart = (product) => {
    let basketProducts = JSON.parse(localStorage.getItem('basketProducts')) || [];
    basketProducts.push(product);
    localStorage.setItem('basketProducts', JSON.stringify(basketProducts));
  };
  let fadeDuration = 1000;
  
</script>

<main class="container">
  <h1 class="text-center">Products</h1>
  
  <div class="row">
    {#each products as product (product.id)}
      <div class="col-md-4" transition:fade="{{ duration: fadeDuration }}">
        <div class="card mb-4">
          <img src={product.image} class="card-img-top" alt={product.name}>
          <div class="card-body">
            <h5 class="card-title">{product.name}</h5>
            <p class="card-text">{product.description}</p>
            <p class="card-text">${product.price.toFixed(2)}</p>
            <button on:click={() => addToCart(product)} class="btn text-light" style="background-color: #808000;">Add to Cart</button>
          </div>
        </div>
      </div>
    {/each}
  </div>
</main>

