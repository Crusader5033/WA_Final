<script>
  let username = '';
  let password = '';
  let message = '';

  async function login() {
    const response = await fetch('http://localhost:3000/api/login', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ username, password })
    });

    if (response.status === 200) {
      
      console.log('Login successful');
      message = 'Login successful';
    } else if (response.status === 401) {
      console.error('Invalid username or password');
      message = 'Login not successful';

    } else {
      console.error('An error occurred');
    }
  }
</script>

<link rel="stylesheet" href="/Style/login.css">

 {#if message}
  <div class="message">{message}</div>
{/if}
 <main>

  <div class="text-center">

<h2 class="text-center">Login</h2>

<form on:submit|preventDefault={login}>
  <label>
    Username:
    <input type="text" bind:value={username} />
  </label>

  <label>
    Password:
    <input type="password" bind:value={password} />
  </label>

  <button type="submit">Login</button>
</form></div>
 </main>