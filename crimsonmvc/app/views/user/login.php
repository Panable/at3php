<link href="<?php echo URLROOT; ?>css/style.css" rel="stylesheet">
<?php require APPROOT . '/views/inc/header2.php'; ?>

<section class="vh-100 bg-main-background">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-black">
                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                    <form action="<?php echo URLROOT; ?>user/login" method="post" style="width: 23rem;">

                        <h2 class="fw-normal mb-3 pb-3 text-center">Log in</h2>


                            <!-- Email Address -->
                            <!-- difference between form-outline and form-group -->
                            <div class="form-outline my-5">
                                <label for="email" class="form-label">Email address</label>
                                <label>

                                    <input type="email" name="email" class="form-control form-control-lg pl-5 <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" />
                                </label>
                                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                            </div>


                            <!-- Password input -->
                            <div class="form-outline my-5">
                                <label for="password" class="form-label">Password</label>
                                <label>

                                    <input type="password" name="password" class="form-control form-control-lg material-symbols-outlined pl-5 <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" placeholder="lock" />
                                </label>
                                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                            </div>

                            <!-- Login Button -->
                            <div class="pt-1 mb-4">
                                <input type="submit" value="Login" class="btn btn-success btn-block">
                            </div>

                    </form>
                </div>
            </div>

            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="https://media.gettyimages.com/id/1134383746/vector/coffee-wallpaper-pattern.jpg?s=2048x2048&w=gi&k=20&c=VQIxPcep7snuh4cyHKOMrH_CGYAPzLSRiHlSupHQsmI=" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>

        </div>
    </div>
</section>
