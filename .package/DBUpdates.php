<?php namespace components\hourreg; if(!defined('TX')) die('No direct access.');

//Make sure we have the things we need for this class.
tx('Component')->check('update');
tx('Component')->load('update', 'classes\\BaseDBUpdates', false);

class DBUpdates extends \components\update\classes\BaseDBUpdates
{
  
  protected
    $component = 'hourreg';
  
  public function install_1_0($dummydata, $forced)
  {

    if($forced === true){
      tx('Sql')->query('DROP TABLE IF EXISTS `#__hourreg__categories`');
      tx('Sql')->query('DROP TABLE IF EXISTS `#__hourreg__entries`');
    }
    
    tx('Sql')->query('
      CREATE TABLE IF NOT EXISTS `#__hourreg__categories` (
        `id` int(10) NOT NULL AUTO_INCREMENT,
        `title` varchar(255) NOT NULL,
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB  DEFAULT CHARSET=utf8
    ');
    
    tx('Sql')->query('
      CREATE TABLE IF NOT EXISTS `#__hourreg__entries` (
        `id` int(10) NOT NULL AUTO_INCREMENT,
        `dt_created` datetime NOT NULL,
        `dt_last_modified` datetime DEFAULT NULL,
        `category_id` int(10) DEFAULT NULL,
        `dt_start` datetime DEFAULT NULL,
        `dt_end` datetime DEFAULT NULL,
        `description` varchar(255) NOT NULL,
        `extra_info` text,
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB  DEFAULT CHARSET=utf8
    ');

  }
  
}

