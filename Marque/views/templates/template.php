<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="/public/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@600&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <div class="nav d-flex justify-content-between">
      <div class="logo col-4 d-flex align-items-center justify-content-center">
        <img src="/public/img/logo.png" alt="logo">
      </div>
      <div class="tag col-8 d-flex align-items-center justify-content-end">
        <ul class="d-flex">
          <li class="flex-grow-1 p-5"><a href="">Les instruments</a></li>
          <li class="flex-grow-1 p-5"><a href="">Les marques</a></li>
          <li class="flex-grow-1 p-5"><a href="">Les types</a></li>
        </ul>
      </div>
    </div>
  </header>
  <main>

    <h1 class="p-5"><?= $title ?></h1>

    <div class="content">
      <?= $content ?>
    </div>

  </main>
  <footer>

  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>