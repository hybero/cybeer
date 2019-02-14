
<a href="<?php echo site_url('export/create'); ?>">
    <div class="add-export-button">
        <i class="material-icons">add_circle</i>
        <div class="text">Exportovať pivo</div>
        <div class="float-fix"></div>
    </div>
</a>

<div class="export">
    <table class="table">
        <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Klient</th>
              <th scope="col">Pivo</th>
              <th scope="col">Množstvo</th>
              <th scope="col">Balenie</th>
              <th scope="col">Sudy / fľaše vrátené</th>
              <th scope="col">Vytvorené</th>
              <th scope="col">Upravené</th>
              <th scope="col">Akcia</th>
            </tr>
        </thead>
        <tbody>

            <?php if(!empty($exports)) { foreach ($exports as $export): ?>

                <tr>
                    <th scope="col"><?php echo $export['id']; ?></th>
                    <td scope="col"><?php echo $export['client']['name']; ?></td>
                    <td scope="col"><?php echo $export['tank']['name']; ?></td>
                    <td scope="col"><?php echo $export['amount']; ?> L</td>
                    <td scope="col"><?php echo $export['packaging']; ?></td>
                    <td scope="col"><?php echo $export['packaging_returned']; ?></td>
                    <th scope="col"><?php echo $export['created']; ?></th>
                    <th scope="col"><?php echo $export['updated']; ?></th>
                    <td scope="col">
                        <div class="action-icon update-icon icon">
                            <a href="<?php echo site_url('storage/update/'.$export['id']); ?>"><i class="material-icons">edit</i></a>
                        </div>
                        <div class="float-fix"></div>
                    </td>
                </tr>

            <?php endforeach; } ?>

        </tbody>
    </table>

</div>
