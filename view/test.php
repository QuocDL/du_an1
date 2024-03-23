<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../asset/css/loading.css">
</head>
<style>
  body {
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>

<body>
  <div id="click_me" style="cursor: pointer;">
    Click Me !
  </div>
  <div style=" position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.3);">
    <?php require "../includes/loading.php" ?>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $("#click_me").on("click", function() {
    $(".loader").show();
    console.log("hello");
  });
</script>

</html>