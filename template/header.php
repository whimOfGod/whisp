<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<header class="d-flex flex-wrap justify-content-between align-items-center pb-3 px-1 px-sm-5 border-bottom">
    <!-- Logo -->
    <div class="d-flex align-items-center mt-3">
        <div class="d-xl-none" id="mobile-menu">
            <?php include 'template/nav.php' ?>
        </div>
        <h1 class="ms-2 text-primary fst-italic fw-bold">Wh!sp</h1>
    </div>
    <!-- Search form -->
    <form action="index.php" method="GET" class="mt-3">
        <label class="d-flex justify-content-center align-items-center">
            <input  type="search" name="research" placeholder="Rechercher..."
                    class="rounded-5 py-1 px-3 border-primary border-3 no-outline"
                    required />
                    <button type="submit" class="bg-primary rounded-circle border-0 d-flex justify-content-center align-items-center h-35 w-35 ms-3 box-shadow-light">
                <i class="fa-solid fa-magnifying-glass fa-lg icon-color-w "></i>
            </button>
        </label>
    </form>
</header>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>    

</body>
</html>
