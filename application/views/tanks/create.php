<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('tanks/create'); ?>

    <label for="name">Názov</label>
    <input type="input" name="name" /><br />

    <label for="capacity">Kapacita</label>
    <input type="input" name="capacity" />L<br />

    <input type="submit" name="submit" value="Vytvorit tank" />

</form>
