<div class="delete-tank-wrapper">
    <div class="text">Naozaj chcete zmazať tank?</div>
    <div class="tank-detail">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Typ</th>
                <th>Pivo</th>
                <th>Kapacita</th>
                <th>Status</th>
                <th>Naplnenie v %</th>
            </thead>
            <tbody>
                <td scope="col"><?php echo $tank['id']; ?></td>
                <td scope="col"><?php echo $tank['type']; ?></td>
                <td scope="col"><?php echo $tank['name']; ?></td>
                <td scope="col"><?php echo $tank['capacity']; ?></td>
                <td scope="col"><?php echo $tank['status']; ?></td>
                <td scope="col"><?php echo $tank['filling_amount_percent']; ?></td>
            </tbody>
        </table>
    </div>
    <div class="buttons">
        <a href="<?php echo site_url('tanks/index'); ?>">
            <div id="empty-tank-no-button">Nie</div>
        </a>
        <a href="<?php echo site_url('tanks/delete/' . intval($tank['id']) . '/true'); ?>">
            <div id="empty-tank-yes-button">Áno</div>
        </a>
    </div>
</div>
