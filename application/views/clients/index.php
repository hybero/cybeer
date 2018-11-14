
<div class="clients">
    <?php if(!empty($clients)) { foreach ($clients as $clients_item): ?>

        <div id="<?php echo $clients_item['id']; ?>" class="client">
            <h4 class="name"><?php echo $clients_item['name'].' '.$clients_item['surname']; ?></h3>
            <h3 class="company"><?php echo $clients_item['company']; ?></h3>
        </div>

    <?php endforeach; } ?>
</div>
