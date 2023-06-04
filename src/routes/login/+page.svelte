<script>
    let username = '';
    let password = '';
    let error = '';
  
    const handleSubmit = async () => {
      // Make an HTTP request to the login.php file
      const response = await fetch('/php/login.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ username, password })
      });
  
      if (response.ok) {
        // Successful login
        const data = await response.json();
        console.log(data.message); // You can customize the behavior here
      } else {
        // Failed login
        const data = await response.json();
        error = data.message;
      }
    };
  </script>
  
  <main>
    <h1>Login</h1>
    
    {#if error}
      <p class="error">{error}</p>
    {/if}
  
    <form on:submit|preventDefault={handleSubmit}>
      <div>
        <label for="username">Username:</label>
        <input type="text" id="username" bind:value={username} required />
      </div>
      <div>
        <label for="password">Password:</label>
        <input type="password" id="password" bind:value={password} required />
      </div>
      <button type="submit">Login</button>
    </form>
  </main>
  
  <style>
    .error {
      color: red;
    }
  </style>
  