<script>

    import { fade } from 'svelte/transition';
  let products = [
    {
      id: 1,
      name: "Tactical Backpack",
      description: "A durable backpack for carrying all your gear",
      price: 59.99,
      image: "pack.jpeg"
    },
    {
      id: 2,
      name: "Utility Pouch",
      description: "A simple zippered pouch for storing small items",
      price: 12.99,
      image: "uniMain.jpg"
    },
    {
      id: 3,
      name: "Dump pouch",
      description: "A dump pouch for your empty mags",
      price: 18.99,
      image: "odhazovak.jpg"
    },
    {
      id: 4,
      name: "Nalgene pouch",
      description: "A buckled pouch that can hold 1l nalgene bottle.",
      price: 19.99,
      image: "nalgeneMain.jpg"
    },
    {
      id: 5,
      name: "Double mag pouch",
      description: "A versatile pouch mainly for two Ak mags,but its rather universal.",
      price: 17.99,
      image: "doublemag.jpg"
    },
    {
      id: 6,
      name: "Shoulder bag",
      description: "Simple shoulder bag,that offers good organisation of all your things with our organizer.",
      price: 24.99,
      image: "shoulderbag.jpg"
    },
  ];
  const addToCart = (product) => {
    let basketProducts = JSON.parse(localStorage.getItem('basketProducts')) || [];
    basketProducts.push(product);
    localStorage.setItem('basketProducts', JSON.stringify(basketProducts));
  };
  let fadeDuration = 1000;
  
</script>
<link rel="stylesheet" href="/Style/product.css">

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

