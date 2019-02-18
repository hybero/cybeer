<div class="delete-client-wrapper">
    <div class="text">Naozaj chcete zmazať klienta?</div>
    <div class="client">
        <table class="table">
            <tbody>
                <td scope="col"><?php echo $client['id']; ?></td>
                <td scope="col"><?php echo $client['name']; ?></td>
                <td scope="col"><?php echo $client['surname']; ?></td>
                <td scope="col"><?php echo $client['company']; ?></td>
                <td scope="col"><?php echo $client['phone']; ?></td>
                <td scope="col"><?php echo $client['town']; ?></td>
                <td scope="col"><?php echo $client['address']; ?></td>
                <td scope="col"><?php echo $client['postcode']; ?></td>
            </tbody>
        </table>
    </div>
    <div class="buttons">
        <a href="<?php echo site_url('clients/index'); ?>">
            <div id="empty-tank-no-button">Nie</div>
        </a>
        <a href="<?php echo site_url('clients/delete/' . intval($client['id']) . '/true'); ?>">
            <div id="empty-tank-yes-button">Áno</div>
        </a>
    </div>
</div>
