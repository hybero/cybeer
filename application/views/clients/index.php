
<a href="<?php echo site_url('clients/create'); ?>">
    <div class="add-client-button">
        <i class="material-icons">add_circle</i>
        <div class="text">Pridať Klienta</div>
        <div class="float-fix"></div>
    </div>
</a>

<div class="clients">
    <table class="table">
        <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Meno</th>
              <th scope="col">Priezvisko</th>
              <th scope="col">Firma</th>
              <th scope="col">Telefón</th>
              <th scope="col">Mesto</th>
              <th scope="col">Adresa</th>
              <th scope="col">PSČ</th>
              <th scope="col">Akcia</th>
            </tr>
        </thead>
        <tbody>

            <?php if(!empty($clients)) { foreach ($clients as $clients_item): ?>

                <tr>
                    <th scope="col"><?php echo $clients_item['id']; ?></th>
                    <td scope="col"><?php echo $clients_item['name']; ?></td>
                    <td scope="col"><?php echo $clients_item['surname']; ?></td>
                    <td scope="col"><?php echo $clients_item['company']; ?></td>
                    <td scope="col"><?php echo $clients_item['phone']; ?></td>
                    <td scope="col"><?php echo $clients_item['town']; ?></td>
                    <td scope="col"><?php echo $clients_item['address']; ?></td>
                    <td scope="col"><?php echo $clients_item['postcode']; ?></td>
                    <td scope="col">
                        <div class="action-icon update-icon icon">
                            <a href=""><i class="material-icons">edit</i></a>
                        </div>
                        <div class="action-icon delete-icon icon">
                            <a href="<?php echo site_url('clients/delete/'.$clients_item['id']); ?>"><i class="material-icons">delete</i></a>
                        </div>
                        <div class="float-fix"></div>
                    </td>
                </tr>

            <?php endforeach; } ?>

        </tbody>
    </table>

</div>
