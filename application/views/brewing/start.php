<?php echo validation_errors(); ?>

<?php
$attributes = array('class' => 'start-brewing-form', 'id' => 'start-brewing-form');
echo form_open('brewing/start/'.$tank['id'], $attributes);
?>

<input type="hidden" name="user_id" value="<?php echo $user['id']; ?>" size="50" />

<input type="hidden" name="tank_id" value="<?php echo $tank['id']; ?>" size="50" />

<h6>Názov piva</h6>
<input type="text" name="name" value="" size="50" />

<h6>Naplniť nádrž vodou (L)</h6>
<input type="text" name="status" value="" size="50" />

<h6>Poznámka</h6>
<input type="text" name="description" value="" size="50" />

<div class="margin-top-10"><input type="submit" value="Začať varenie" /></div>

</form>
