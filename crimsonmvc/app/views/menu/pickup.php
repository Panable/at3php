<?php require APPROOT . '/views/inc/header.php'; ?>
<h1>
    <?php echo $data['title']; ?>
</h1>
<ul>
<?php foreach ($data['menu'] as $item): ?>

    <li><?php echo $item->name; ?></li>
<?php endforeach; ?>
</ul>
<?php require APPROOT . '/views/inc/footer.php'; ?>
