<?php echo validation_errors(); ?>

<?php
$attributes = array('class' => 'add-tank-form', 'id' => 'add-tank-form');
echo form_open('tanks/add_tank', $attributes);
?>

<h5>Typ tanku</h5>
<input type="text" name="type" value="" size="50" />

<h5>Kapacita tanku (L)</h5>
<input type="text" name="capacity" value="" size="50" />

<input type="hidden" name="status" value="0" size="50" />

<a href="<?php echo site_url('tanks/index'); ?>"
<div><input type="submit" value="Vytvoriť" /></div>

</form>
