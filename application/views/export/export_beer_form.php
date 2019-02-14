<?php echo validation_errors(); ?>

<?php
$attributes = array('class' => 'export-beer-form', 'id' => 'export-beer-form');
echo form_open('export/create', $attributes);
?>

<h5>Klient</h5>
<?php
echo form_dropdown('client_id', $client_options, '');
?>

<h5>Pivo / Tank</h5>
<?php
echo form_dropdown('tank_id', $tanks_options, $tank['id']);
?>

<h5>Množstvo v litroch</h5>
<input type="text" name="amount" value="" size="50" />

<h5>Balenie (napr. 1x50L; 2x20L; 24xflaše)</h5>
<input type="text" name="packaging" value="" size="50" />

<div class="margin-top-10"><input type="submit" value="Exportovať" /></div>

</form>
