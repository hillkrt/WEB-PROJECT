<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>JS Bin</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://npmcdn.com/minigrid@3.0.1/dist/minigrid.min.js"></script>



  <script type="text/javascript">

    (function(){
      var grid;
      function init() {
        grid = new Minigrid({
          container: '.cards',
          item: '.card',
          gutter: 1
        });
        grid.mount();
      }

  // mount
  function update() {
    grid.mount();
  }

  document.addEventListener('DOMContentLoaded', init);
  window.addEventListener('resize', update);
})();

</script>

<style type="text/css">

  .card {
    width: 160px;
  }


  /* Anything bellow here isn't necessary, it's only for the demo */

  .card {
    background-color: #F25D9C ; 
  }

  /* Set some height to cards */
  .card:nth-child(1) {
    height: 240px;
  }

  .card:nth-child(2) {
    height: 190px;
  }

  .card:nth-child(3) {
    height: 210px;
  }

  .card:nth-child(4) {
    height: 230px;
  }

  .card:nth-child(5) {
    height: 180px;
  }

  .card:nth-child(6) {
    height: 200px;
  }

  body {
    background-color: #F9F7F7;
  }

  .cards {
    width: 100%;
    max-width: 1040px;
    margin: 0 auto;
    text-align: center;
  }
</style>

</head>
<body>
  <div class="cards">
    <div class="card"></div>
    <div class="card"></div>
    <div class="card"></div>
    <div class="card"></div>
    <div class="card"></div>
    <div class="card"></div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>