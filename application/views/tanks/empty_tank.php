<div class="empty-tank-wrapper">
    <div class="text">Naozaj chcete vyprázdniť tank?</div>
    <div class="buttons">
        <a href="<?php echo site_url('tanks/index'); ?>">
            <div id="empty-tank-no-button">Nie</div>
        </a>
        <a href="<?php echo site_url('tanks/empty_tank/' . intval($tank['id']) . '/true'); ?>">
            <div id="empty-tank-yes-button">Áno</div>
        </a>
    </div>
</div>
