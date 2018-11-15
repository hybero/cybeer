<?php echo validation_errors(); ?>

<?php
$attributes = array('class' => 'cast-tank-form', 'id' => 'cast-tank-form');
echo form_open('clients/create', $attributes);
?>

<input type="hidden" name="user_id" value="<?php echo $user['id']; ?>" size="50" />

<h6>Meno</h6>
<input type="text" name="name" value="" size="50" />

<h6>Priezvisko</h6>
<input type="text" name="surname" value="" size="50" />

<h6>Spoločnosť</h6>
<input type="text" name="company" value="" size="50" />

<h6>Telefónne číslo</h6>
<input type="text" name="phone" value="" size="50" />

<h6>Mesto</h6>
<input type="text" name="town" value="" size="50" />

<h6>Adresa</h6>
<input type="text" name="address" value="" size="50" />

<h6>PSČ</h6>
<input type="text" name="postcode" value="" size="50" />

<div><input type="submit" value="Uložiť" /></div>

</form>
