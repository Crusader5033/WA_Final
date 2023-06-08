<script>
 

  let username = '';
  let password = '';
  let message = '';

  async function register() {
    const response = await fetch('http://localhost:3000/api/register', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ username, password })
    });

    if (response.ok) {
      console.log('Registration successful');
      message = 'Registration successful';

    } else {
      console.error('Registration failed');
      message = 'Registration failed';

    }
  }
</script>


 <link rel="stylesheet" href="/Style/register.css">

 {#if message}
  <div class="message">{message}</div>
{/if}
<h2 class="text-center">Register</h2>

  <main>

      <div class="text-center">


<form on:submit|preventDefault={register}>
  <label>
    Username:
    <input type="text" bind:value={username} required />
  </label>

  <label>
    Password:
    <input type="password" bind:value={password} required />
  </label>

  <button type="submit">Register</button>
</form>
</div>
  </main>