<script>
  let count = 0
  const increment = () => {
    count += 1
  }

  let name = '';
  let password = '';
</script>

<div>
  <p>{name || 'Nome'}</p>
  <input bind:value={name} placeholder="">
  <p>{name || 'Senha'}</p>
  <input bind:value={password} placeholder="">
  

  <button>
    Login
  </button>

</div>


<style>
  div{
    background-color: rgba(241, 225, 225, 0.811);
    padding: 9em;
    border-radius: 6em;
  }
  input{
    width: 300px;
  }

  button {
    font-family: inherit;
    font-size: inherit;
    padding: 1em 2em;
    color: black;
    background-color: rgba(4, 0, 255, 0.1);
    border-radius: 2em;
    border: 2px solid rgba(47, 0, 255, 0);
    outline: none;
    width: 150px;
    font-variant-numeric: tabular-nums;
    cursor: pointer;
  }

  button:focus {
    border: 2px solid purple;
  }

  button:active {
    background-color: rgba(17, 0, 255, 0.2);
  }
</style>
