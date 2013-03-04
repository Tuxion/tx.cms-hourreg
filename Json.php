<?php namespace components\hourreg; if(!defined('TX')) die('No direct access.');

class Json extends \dependencies\BaseViews
{
  
  /**
   * Entries
   */

  protected function create_entry($data, $params)
  {
    
    $data->category_id = tx('Component')->helpers('hourreg')->get_category_id($data->category);

    //Make a model with the given data.
    return tx('Sql')->model('hourreg', 'Entries')
      ->set($data)
      
      //Validate everything.
      ->validate_model(array(
        'force_create' => true
      ))
     
      //Save.
      ->save();
    
  }

  protected function update_entry($data, $params)
  {
    
    $data->category_id = tx('Component')->helpers('hourreg')->get_category_id($data->category);

    return tx('Sql')
    ->table('hourreg', 'Entries')
    ->where('id', $data->id)
    ->execute_single()
    ->not('empty', function($row)use($data){

      $row
      ->merge($data)
      ->validate_model()
      ->save();

    });

  }
  
}
