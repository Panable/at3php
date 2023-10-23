<?php
$image = '<div class="feature rounded-3 my-5 mt-n4 bg-white">
            <img src="https://wiki.teamfortress.com/w/images/f/f4/Backpack_Sandvich.png"
                 alt="Heavy\'s Sandvich">
        </div>';


$description = $description = '<div class="card-body bg-light">
                                   <div class="container">
                                       <div class="row">
                                           <div class="col-md-6 text-md-left"> <!-- Adjust the column size for "Sandvich" -->
                                               <h2 class="text-left fs-4 fw-bold">Sandvich</h2>
                                           </div>
                                           <div class="col-md-6 text-md-end"> <!-- Adjust the column size for the price and align it to the right -->
                                               <h2 class="fs-4 fw-bold">$12</h2>
                                           </div>
                                       </div>
                                   </div>
                                   <p class="mb-0">Bread and Grains group +20 Health, Vegetable Group (2 Services) +40 Health,
                                       Cheese and Dairy Group +20 Health, Meat and Poultry Group +20 Health, Bread and Grains Group
                                       +20 Health</p>
                               </div>';


$card = '<div class="card bg-light border-0 h-55">
            <div class="shadow p-3 card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                ' . $image . '
                ' . $description . '
            </div>
        </div>';


?>
