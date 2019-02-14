<?php echo validation_errors(); ?>

<?php
$attributes = array('class' => 'add-item-form', 'id' => 'add-item-form');
echo form_open('storage/add_item', $attributes);
?>

<h5>Názov položky</h5>
<input type="text" name="name" value="" size="50" />

<h5>Množstvo</h5>
<input type="text" name="amount" value="" size="50" />

<?php
$options = array(
        'kg'    => 'Kg',
        'l'     => 'L'
);
echo form_dropdown('units', $options, 'kg');
?>

<div><input type="submit" value="Vytvoriť" /></div>

</form>
