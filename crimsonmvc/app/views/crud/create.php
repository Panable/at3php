<?php require APPROOT . '/views/inc/header.php'; ?>

<h1>Create <?php echo $data['tableName'] ?></h1>

<form action="http://localhost/crud/<?php echo $data['tableName']; ?>/create/" method="post">
    <?php
    $tableData = $data['tableData'];
    foreach ($tableData as $item) {
        if ($item->Field !== 'id') {
            echo '<div class="form-group">';
            echo '<label for="' . $item->Field . '">' . $item->Field . '</label>';
            echo '<input type="text" name="' . $item->Field . '" id="' . $item->Field . '" class="form-control">';
            echo '</div>';
        }
    }
    ?>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php require APPROOT . '/views/inc/footer.php'; ?>
