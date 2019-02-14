
<div class="storage_history">
    <table class="table">
        <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Položka</th>
              <th scope="col">Množstvo</th>
              <th scope="col">Zdroj</th>
              <th scope="col">Akcia</th>
              <th scope="col">Vytvorené</th>
            </tr>
        </thead>
        <tbody>

            <?php if(!empty($storage_log)) { foreach ($storage_log as $row): ?>

                <tr>
                    <th scope="col"><?php echo $row['id']; ?></th>
                    <td scope="col"><?php echo $row['storage_item']['name']; ?></td>
                    <td scope="col"><?php echo $row['amount'].' '.$row['storage_item']['units']; ?></td>
                    <td scope="col"><?php echo $row['source']; ?></td>
                    <td scope="col"><?php echo $row['action']; ?></td>
                    <td scope="col"><?php echo $row['created']; ?></td>
                </tr>

            <?php endforeach; } ?>

        </tbody>
    </table>

</div>
