<script>
  import Counter from './lib/Counter.svelte'
</script>

<main>
  <h1>Agenda de Reuniões</h1>

  <Counter />
</main>

<style>
  :root {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen,
      Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  }

  main {
    text-align: center;
    padding: 1em;
    margin: 0 auto;
  }

  h1 {
    color:black;
    font-size: 3rem;
    font-weight: 100;
    line-height: 1.1;
    margin: 2rem auto;
    max-width: 14rem;
    font-family: 'Comic Sans MS', cursive;
  }

  @media (min-width: 480px) {
    h1 {
      max-width: none;
    }
  }
</style>
