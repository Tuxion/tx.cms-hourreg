<?php namespace components\hourreg; if(!defined('TX')) die('No direct access.'); ?>

<form id="edit-entry-form" action="<?php echo url('rest=hourreg/entry'); ?>" method="<?php echo ($data->entry->id->get('int') > 0 ? 'PUT' : 'POST'); ?>">

  <input type="hidden" name="id" value="<?php echo $data->entry->id; ?>" />

  <div class="ctrlHolder">
    <label>Category</label>
    <input type="text" name="category" value="<?php echo $data->entry->category; ?>" />
  </div>

  <div class="ctrlHolder">
    <label>Description</label>
    <input type="text" name="description" value="<?php echo $data->entry->description; ?>" />
  </div>

  <div class="ctrlHolder">
    <label>Date/time start</label>
    <input type="text" name="dt_start" value="<?php echo $data->entry->dt_start->otherwise(date("Y-m-d H:i")); ?>" />
  </div>

  <div class="ctrlHolder">
    <label>Date/time end</label>
    <input type="text" name="dt_end" value="<?php echo $data->entry->dt_end->otherwise(date("Y-m-d H:i")); ?>" />
  </div>

  <div class="ctrlHolder">
    <label>Extra info</label>
    <textarea name="extra_info"><?php echo $data->entry->extra_info; ?></textarea>
  </div>

  <div class="buttonHolder">
    <input type="submit" value="Save" />
  </div>

</form>

<script type="text/javascript">

$(function(){

  $('#edit-entry-form').restForm({
    success: function(){
      document.location = 'index.php?do=edit';
    }
  });

});

</script>