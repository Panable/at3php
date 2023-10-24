<?php require APPROOT . '/views/inc/header.php'; ?> <!-- header needs to be changed to size view-->
<h1><?php echo $data['tableName'] ?></h1>


<table class="table">
    <thead>
        <tr>
            <?php
            $tableData = $data[$data['tableName']];
            $firstRow = $tableData[0];
            $columnNames = array_keys((array)$firstRow);
            foreach ($columnNames as $columnName) {

                echo '<th scope="col">' . $columnName . '</th>';
            }
            ?>
            <th scope="col">EDIT</th>
            <th scope="col">DELETE</th>
            <th scope="col"><a href="http://localhost/crud/<?php echo $data['tableName']; ?>/create/"><span class="material-symbols-outlined">add</span></a>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            $table = '';
            foreach ($tableData as $item) {

                foreach ($columnNames as $columnName) {

                    $table .= '<td>' . $item->$columnName . '</td>';
                }
                /*
                       Add Edit Icon + add functionality
                       Add link to correspond with selected
                    */
                $table .= '<td><a href="http://localhost/crud/' . $data['tableName'] . '/update/' . $item->id . '"><span class="material-symbols-outlined">edit</span></a></td>';
                $table .= '<td><a href="http://localhost/crud/' . $data['tableName'] . '/delete/' . $item->id . '"><span class="material-symbols-outlined">delete</span></a></td>';

                $table .= '</tr>';
            }

            echo $table;

            ?>
    </tbody>
</table>
<?php require APPROOT . '/views/inc/footer.php'; ?>
