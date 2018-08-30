<?php echo validation_errors(); ?>

<?php
$attributes = array('class' => 'fill-tank-form', 'id' => 'fill-tank-form');
echo form_open('tanks/fill_tank/' . $filling_tank['id'], $attributes);
?>

<input type="hidden" name="id" value="<?php echo $filling_tank['id']; ?>" size="50" />

<h5>Koľko L načerpať do tanku?</h5>
<input type="text" name="amount" value="" size="50" />

<a href="<?php echo site_url('tanks/index'); ?>"
<div><input type="submit" value="Dočerpať" /></div>

</form>
