<script>
    export let currentPage;
  
    import { onMount } from 'svelte';
  
    onMount(() => {
      const currentUrl = window.location.href;
      const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
  
      navLinks.forEach(link => {
        if (link.href === currentUrl) {
          link.classList.add('active');
        }
      });
    });
  </script>
  
  <link rel="stylesheet" href="/Style/header.css">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #808000;">
      <div class="container">
        <a class="navbar-brand title justify-content-start" href="/">
          <img src="sewing-machine.png" width="68" height="68" class="d-inline-block align-top " alt="Logo">
          TacGear
        </a>
  
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item m-2 links ">
              <a class:active={currentPage === '/'} class="nav-link" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item m-2 links " >
              <a class:active={currentPage === 'about'} class="nav-link" href="about">About Us</a>
            </li>
            <li class="nav-item m-2 links">
              <a class:active={currentPage === 'products'} class="nav-link" href="product">Products</a>
            </li>
            <li class="nav-item m-2 links">
              <a class:active={currentPage === 'contact'} class="nav-link" href="contact">Contact</a>
            </li> 
            <li class="nav-item m-2 ">
                <a href=""><button class="btn btn-outline-light ml-2 links">Cart</button></a>
              </li>
            <li class="nav-item m-2 ">
              <a href=""><button class="btn btn-outline-light ml-2 links">Login</button></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  