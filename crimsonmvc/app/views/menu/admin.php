<?php require APPROOT . '/views/inc/header.php'; ?> <!-- header needs to be changed to size view-->

<h1>ADMIN MENU PAGE</h1>

<section class="card-section pt-4 mx-4">
    <div class="my-5 mx-3">
        <h2>Menu</h2>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col"> <span class="material-symbols-outlined"> more_horiz </span> </th>
            </tr>
    </thead>
        <tbody>
            <tr>
                <?php
                $table = '';
                foreach ($data['menu'] as $item) {
                    $table .= '<td>' . $item->id . '</td>';
                    $table .= '<td>' . $item->photo . '</td>'; //Please fix photo later loading, template not in admin menu page.
                    $table .= '<td>' . $item->name . '</td>';
                    $table .= '<td>' . "$" . $item->price . '</td>';
                    $table .= '<td>' . $item->description . '</td>';
                    /*
                       Add Edit Icon + add functionality
                       Add link to correspond with selected
                    */
                    $table .= '<td><a href="#"> <span class="material-symbols-outlined">edit</span></a></td>';
                    $table .= '<td><a href="#"> <span class="material-symbols-outlined">delete</span></a></td>';

                    $table .= '</tr>';
                }

                echo $table;

                ?>
        </tbody>
    </table>
</section>

