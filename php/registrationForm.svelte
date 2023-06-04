<script>
    import { onMount } from 'svelte';
    import { fade } from 'svelte/transition';
  
    let fadeDuration = 1000;
  
    let username = '';
    let password = '';
  
    const register = async () => {
      // Send the registration data to the server
      const response = await fetch('registration.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ username, password })
      });
  
      // Check the response from the server
      if (response.ok) {
        // Registration successful
        console.log('Registration successful');
        // You can perform additional actions here, such as redirecting to another page
      } else {
        // Registration failed
        const data = await response.json();
        console.error('Registration failed:', data.message);
      }
    };
  </script>
  
  <main class="container">
    <h1 class="text-center">Registration</h1>
  
    <div class="row">
      <div class="col-md-6 offset-md-3" transition:fade="{{ duration: fadeDuration }}">
        <form>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" class="form-control" bind:value="{username}">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" class="form-control" bind:value="{password}">
          </div>
          <button type="button" class="btn btn-primary" on:click="{register}">Register</button>
        </form>
      </div>
    </div>
  </main>
  