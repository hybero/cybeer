<?php echo validation_errors(); ?>

<?php
$attributes = array('class' => 'cast-tank-form', 'id' => 'cast-tank-form');
echo form_open('tanks/cast_tank/' . $casting_tank['id'], $attributes);
?>

<input type="hidden" name="id" value="<?php echo $casting_tank['id']; ?>" size="50" />

<h5>Do ktoreho tanku precerpat pivo?</h5>
<?php echo form_dropdown('tank', $tanks, key($tanks)); ?>

<h5>Mnozstvo</h5>
<input type="text" name="amount" value="" size="50" />

<a href="<?php echo site_url('tanks/index'); ?>"
<div><input type="submit" value="Preliať" /></div>

</form>
