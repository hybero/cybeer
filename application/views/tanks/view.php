
<div class="tank-view">
    <div class="left-column">
        <table class="table">
            <tbody>
                <tr>
                    <td>Typ tanku:</td>
                    <td><?php echo $tanks_item['type']; ?></td>
                </tr>
                <tr>
                    <td>Názov piva v tanku:</td>
                    <td><?php echo $tanks_item['name']; ?></td>
                </tr>
                <tr>
                    <td>Kapacita tanku:</td>
                    <td><?php echo $tanks_item['capacity']; ?></td>
                </tr>
                <tr>
                    <td>množstvo piva v tanku:</td>
                    <td><?php echo $tanks_item['status']; ?></td>
                </tr>
                <tr>
                    <td>Množstvo piva v tanku v percentách:</td>
                    <td><?php echo $tanks_item['filling_amount_percent']; ?>%</td>
                </tr>
            </tbody>
        </table>
        <a href="<?php echo site_url('tanks/delete/'.$tanks_item['id']); ?>">
            <div class="button delete">Zmazať tank</div>
        </a>
    </div>

    <div class="right-column">
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
    </div>

    <div class="middle-column">
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
    </div>

    <div class="float-fix"></div>

    <div class="brew-list">
        <div class="float-left">
            <h2>Varný list</h2>
        </div>
        <a href="<?php echo site_url('brewing/finish/'.$tanks_item['id']); ?>">
            <div class="finish-brewing-button">
                <i class="material-icons">add_circle</i>
                <div class="text">Ukončiť varenie</div>
                <div class="float-fix"></div>
            </div>
        </a>
        <a href="<?php echo site_url('brewing/start/'.$tanks_item['id']); ?>">
            <div class="start-brewing-button">
                <i class="material-icons">add_circle</i>
                <div class="text">Začať varenie</div>
                <div class="float-fix"></div>
            </div>
        </a>
        <a href="<?php echo site_url('brewing/add_step/'.$brew_list['id']); ?>">
            <div class="add-step-button">
                <i class="material-icons">add_circle</i>
                <div class="text">Pridať krok</div>
                <div class="float-fix"></div>
            </div>
        </a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Akcia</th>
                  <th scope="col">Položka</th>
                  <th scope="col">Množstvo</th>
                  <th scope="col">Popis</th>
                  <th scope="col">Dátum</th>
                </tr>
            </thead>
            <tbody>

                <?php if(!empty($brew_log)) { foreach ($brew_log as $brew_step): ?>

                    <tr>
                        <th scope="col"><?php echo $brew_step['id']; ?></th>
                        <td scope="col"><?php echo $brew_step['action']; ?></td>
                        <td scope="col"><?php echo $brew_step['storage_item']['name']; ?></td>
                        <td scope="col"><?php echo $brew_step['amount'].' '.$brew_step['units']; ?></td>
                        <td scope="col"><?php echo $brew_step['description']; ?></td>
                        <td scope="col"><?php echo $brew_step['created']; ?></td>
                    </tr>

                <?php endforeach; } ?>

            </tbody>
        </table>
    </div>
</div>
