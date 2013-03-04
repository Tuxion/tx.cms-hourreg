<h2>
  Top categories:
</h2>

<?php $data->top_categories->each(function($row){ ?>

  <?php echo $row->num_of_entries; ?> <?php echo $row->category; ?><br />

<?php }); ?>