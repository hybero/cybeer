<?php echo validation_errors(); ?>

<?php
$attributes = array('class' => 'finish-brewing-form', 'id' => 'finish-brewing-form');
echo form_open('brewing/finish/'.$tank['id'].'/confirmed', $attributes);
?>

<input type="hidden" name="user_id" value="<?php echo $user['id']; ?>" size="50" />

<input type="hidden" name="tank_id" value="<?php echo $tank['id']; ?>" size="50" />

<h6>Ukončiť varenie '<?php echo $tank['name']; ?>' v tanku typu '<?php echo $tank['type']; ?>'?</h6>
<div><input type="submit" value="Ukončiť varenie" /></div>

</form>
