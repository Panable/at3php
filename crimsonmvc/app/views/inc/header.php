<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo SITENAME; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- I think bootstrap cdn link can be removed? although I could be potentially wrong-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="<?php echo URLROOT; ?>css/style.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg py-lg-4 bg-dark">
        <div class="col-sm">
        </div>

        <div class="col-md">
            <h1 class="text-white text-center"> Crimson Cafe</h1>
        </div>
        <!-- Right Side Navbar -->
        <div class="col-sm">
            <div class="container my-2-md-0 mr-md-3">
                <a class="p-2 text-white">Menu</a>
                <a class="p-2 text-white">"Profile Login"</a>
                <a class="p-2 text-white">Staff Login</a>
                <?php if (getSession('user_id')) {
                    echo "hi";
                    echo '<a class="p-2 text-white">logged in as - ' . getSession('user_name') . '</a>';
                    echo getSession('user_name');
                } ?>
            </div>
    </nav>
