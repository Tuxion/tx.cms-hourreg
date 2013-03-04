<?php namespace components\hourreg; if(!defined('TX')) die('No direct access.');

class Views extends \dependencies\BaseViews
{
  
  protected function app($data)
  {

    return array(
      'entry_edit' => (tx('Data')->get->do == 'edit' ? $this->section('entry_edit') : null),
      'entry_list' => $this->section('entry_list'),
      'overview' => $this->section('overview')
    );

  }
  
}
