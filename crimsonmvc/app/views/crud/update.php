<?php require APPROOT . '/views/inc/header.php'; ?>

<h1>Edit <?php echo $data['tableName'] ?></h1>

<form action="http://localhost/crud/<?php echo $data['tableName']; ?>/update/<?php echo $data[$data['tableName']]->id; ?>" method="post">
    <?php
    foreach ($data[$data['tableName']] as $key => $value) {
        if ($key === 'id') {
            echo '<div class="form-group">';
            echo '<label for="' . $key . '">' . $key . '</label>';
            echo '<input type="text" name="' . $key . '" id="' . $key . '" class="form-control" value="' . $value . '" readonly>';
            echo '</div>';
        } else {
            echo '<div class="form-group">';
            echo '<label for="' . $key . '">' . $key . '</label>';
            echo '<input type="text" name="' . $key . '" id="' . $key . '" class="form-control" value="' . $value . '">';
            echo '</div>';
        }
    }
    ?>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php require APPROOT . '/views/inc/footer.php'; ?>
