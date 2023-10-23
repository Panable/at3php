<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- References -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/custom-bootstrap.css" rel="stylesheet">
    <link href="./javascript/main.js" rel="stylesheet">

    <title>NonMVC - Menu Page</title>
</head>

<body>
    <?php require_once "template.php"; ?>
    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg py-lg-4 bg-dark">
        <div class="col-sm">
        </div>

        <div class="col-md">
            <h1 class="text-white text-center"> Crimson Cafe</h1>
        </div>
        <!-- Right Side Navbar -->
        <div class="col-sm">
            <!-- change this to a list with ul & li -->
            <div class="container my-2-md-0 mr-md-3">
                <a class="p-2 text-white">Menu</a>
                <a class="p-2 text-white">"Profile Login"</a>
                <a class="p-2 text-white">Staff Login</a>
            </div>
    </nav>
    <!-- Navbar Section End-->

    <!-- Main Section-->
    <section class="card-section pt-4 mx-4">
        <div class="my-5 mx-3">
            <h2> Menu </h2>
        </div>
        <div class="row">
            <div class="col-md-4 my-3">
                <?php echo $card ?>
            </div>
            <div class="col-md-4 my-3">
                <?php echo $card ?>
            </div>
            <div class="col-md-4 my-3">
                <?php echo $card ?>
            </div>

            <div class="col-md-4">
                <?php echo $card ?>
            </div>

        </div>
    </section>

    <footer class="pt-4 bg-dark">
        <div class="container">

        </div>
    </footer>

</body>

</html>

