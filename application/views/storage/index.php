
<a href="<?php echo site_url('storage/add'); ?>">
    <div class="add-storage-button">
        <i class="material-icons">add_circle</i>
        <div class="text">Pridať položku</div>
        <div class="float-fix"></div>
    </div>
</a>

<a href="<?php echo site_url('storage/history'); ?>">
    <div class="storage-history-button">
        <i class="material-icons">add_circle</i>
        <div class="text">História skladu</div>
        <div class="float-fix"></div>
    </div>
</a>

<div class="storage">
    <table class="table">
        <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Názov</th>
              <th scope="col">Množstvo</th>
              <th scope="col">Jednotky</th>
              <th scope="col">Akcia</th>
            </tr>
        </thead>
        <tbody>

            <?php if(!empty($storage)) { foreach ($storage as $storage_item): ?>

                <tr>
                    <th scope="col"><?php echo $storage_item['id']; ?></th>
                    <td scope="col"><?php echo $storage_item['name']; ?></td>
                    <td scope="col"><?php echo $storage_item['amount']; ?></td>
                    <td scope="col"><?php echo $storage_item['units']; ?></td>
                    <td scope="col">
                        <div class="action-icon update-icon icon">
                            <a href="<?php echo site_url('storage/update/'.$storage_item['id']); ?>"><i class="material-icons">edit</i></a>
                        </div>
                        <div class="action-icon delete-icon icon">
                            <a href="<?php echo site_url('storage/delete/'.$storage_item['id']); ?>"><i class="material-icons">delete</i></a>
                        </div>
                        <div class="float-fix"></div>
                    </td>
                </tr>

            <?php endforeach; } ?>

        </tbody>
    </table>

</div>
