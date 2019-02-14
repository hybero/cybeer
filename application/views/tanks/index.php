<a href="<?php echo site_url('tanks/add_tank'); ?>">
    <div class="add-tank-button">
        <i class="material-icons">add_circle</i>
        <div class="text">Pridať Tank</div>
        <div class="float-fix"></div>
    </div>
</a>
<div class="tanks">
    <?php if(!empty($tanks)) { foreach ($tanks as $tanks_item): ?>

        <a href="<?php echo site_url('tanks/view/'.$tanks_item['id']); ?>">
            <div id="<?php echo $tanks_item['id']; ?>" class="tank">
                <h4 class="type"><?php echo $tanks_item['type']; ?></h3>
                <h3 class="name"><?php echo $tanks_item['name']; ?></h3>
                <div class="tank-filling-wrapper">
                    <div class="tank-filling">
                        <div class="filling" style="height: <?php echo $tanks_item['filling_amount_percent']; ?>%;"></div>
                        <div class="outer">
                          <div class="middle">
                            <div class="inner">
                                <div class="filling_number"><?php echo $tanks_item['status']; ?>L</div>
                                <div class="capacity">z <?php echo $tanks_item['capacity']; ?>L</div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="buttons">
                        <a href="<?php echo site_url('tanks/empty_tank/'.$tanks_item['id']); ?>">
                            <div class="button empty">Vyprázdniť</div>
                        </a>
                        <a href="<?php echo site_url('tanks/cast_tank/'.$tanks_item['id']); ?>">
                            <div class="button cast">Prečerpať</div>
                        </a>
                        <!-- <a href="<?php echo site_url('tanks/fill_tank/'.$tanks_item['id']); ?>">
                            <div class="button fill">Načerpať</div>
                        </a> -->
                        <a href="<?php echo site_url('export/create/'.$tanks_item['id']); ?>">
                            <div class="button fill">Exportovať</div>
                        </a>
                    </div>
                    <!-- <p><a href="<?php echo site_url('tanks/'.$tanks_item['id']); ?>">View tank</a></p> -->
                </div>
            </div>
        </a>

    <?php endforeach; } ?>
</div>
