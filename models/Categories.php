<?php namespace components\hourreg\models; if(!defined('TX')) die('No direct access.');

class Categories extends \dependencies\BaseModel
{
  
  protected static
    $table_name = 'hourreg__categories',
    
    $relations = array(
      'Entries' => array('id' => 'Entries.category_id')
    ),

    $validate = array(
      'id' => array('required', 'number'=>'int', 'gt'=>0),
      'title' => array('required', 'string', 'not_empty', 'no_html', 'between'=>array(0, 255))
    );

}
