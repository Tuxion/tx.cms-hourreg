<?php namespace components\hourreg; if(!defined('TX')) die('No direct access.');

class Helpers extends \dependencies\BaseComponent
{
  
  public function get_category_id($category_title)
  {

    $this
    ->table('Categories')
    ->where('title', "'".$category_title."'")
    ->execute_single()
    ->not('empty', function($row)use(&$category_id){
      $category_id = $row->id;
    })->failure(function()use($category_title, &$category_id){
      
      //If category doesn't exist yet: create category.
      tx('Sql')->model('hourreg', 'Categories')
        ->set(array('title' => $category_title))
        
        //Validate everything.
        ->validate_model(array(
          'force_create' => true
        ))

        //Save!
        ->save();

      $category_id = mysql_insert_id();

    });

    return $category_id;

  }
  
}
