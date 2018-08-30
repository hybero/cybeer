<?php echo validation_errors(); ?>
<?php echo form_open('form'); ?>

<input type="hidden" name="id" value="<?php echo $tank['id']; ?>" size="50" />

<h5>Do ktoreho tanku precerpat pivo?</h5>
<input type="text" name="password" value="" size="50" />

<h5>Mnozstvo</h5>
<input type="text" name="amount" value="" size="50" />

<a href="<?php echo site_url('tanks/index'); ?>"
<div><input type="submit" value="Preliat" /></div>

</form>
