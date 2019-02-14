<?php echo validation_errors(); ?>

<?php
$attributes = array('class' => 'add-step-form', 'id' => 'add-step-form');
echo form_open('brewing/add_step/'.$brew_list['id'], $attributes);
?>

<input type="hidden" name="brewing_list_id" value="<?php echo $brew_list['id']; ?>" size="50" />

<h5>Akcia</h5>
<?php
$options = array(
    ''          => '(Prázdne)',
    'add'       => 'Pridať',
    'deduct'    => 'Odobrať'
);
echo form_dropdown('action', $options, '');
?>

<h5>Skladová položka</h5>
<?php
echo form_dropdown('storage_id', $storage_items_options, '');
?>

<h5>Množstvo</h5>
<input type="text" name="amount" value="" size="50" />
<?php
$options = array(
    ''      => '(Jednotky)',
    'kg'    => 'Kg',
    'l'     => 'L'
);
echo form_dropdown('units', $options, '');
?>

<h5>Poznámka</h5>
<input type="text" name="description" value="" size="50" />

<div><input type="submit" value="Vytvoriť" /></div>

</form>
