<div class="delete-item-wrapper">
    <div class="text">Naozaj chcete zmazať položku?</div>
    <div class="item-detail">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Názov</th>
                <th>Množstvo</th>
                <th>Jednotky</th>
            </thead>
            <tbody>
                <td scope="col"><?php echo $storage['id']; ?></td>
                <td scope="col"><?php echo $storage['name']; ?></td>
                <td scope="col"><?php echo $storage['amount']; ?></td>
                <td scope="col"><?php echo $storage['units']; ?></td>
            </tbody>
        </table>
    </div>
    <div class="buttons">
        <a href="<?php echo site_url('storage/index'); ?>">
            <div id="empty-tank-no-button">Nie</div>
        </a>
        <a href="<?php echo site_url('storage/delete/' . intval($storage['id']) . '/true'); ?>">
            <div id="empty-tank-yes-button">Áno</div>
        </a>
    </div>
</div>
