<?php namespace components\hourreg; if(!defined('TX')) die('No direct access.'); ?>

<h1>Entries</h1>

<?php

echo $data->entries->as_table(array(
  'Category' => 'category',
  'Description' => 'description',
  'Date' => function($row){
    return substr($row->dt_start->get(), 0, 10);
  },
  'Start' => function($row){
    return substr($row->dt_start->get(), 11, 5);
  },
  'End' => function($row){
    return substr($row->dt_end->get(), 11, 5);
  },
  'edit' => function($row){
    return '<a href="'.url('do=edit&entry_id='.$row->id).'">edit</a>';
  }
));

?>

<a href="<?php echo url('?do=edit', 1); ?>">New entry</a>

<style>
table{
  width:100%;
}
</style>