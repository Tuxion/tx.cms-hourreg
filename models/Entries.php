<?php namespace components\hourreg\models; if(!defined('TX')) die('No direct access.');

class Entries extends \dependencies\BaseModel
{
  
  protected static
  
    $table_name = 'hourreg__entries',
  
    $relations = array(
      'Categories' => array('category_id' => 'Categories.id')
    ),

    $validate = array(
      'id' => array('required', 'number'=>'int', 'gt'=>0),
      'category_id' => array('number'=>'int', 'gt'=>0),
      'description' => array('required', 'string'),
      'dt_start' => array('datetime'),
      'dt_end' => array('datetime'),
      'extra' => array('string')
    );

}