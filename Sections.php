<?php namespace components\hourreg; if(!defined('TX')) die('No direct access.');

class Sections extends \dependencies\BaseViews
{
  
  /**
   * Entries
   */
  
  protected function entry_edit($data)
  {
    return array(
      'entry' => $this
      ->table('Entries')
      ->join('Categories', $cat)
      ->select("$cat.title", 'category')
      ->pk(tx('Data')->get->entry_id)
      ->execute_single()
    );
  }
  
  protected function entry_list($data)
  {
    return array(
      'entries' => $this
      ->table('Entries')
      ->join('Categories', $cat)
      ->select("$cat.title", 'category')
      ->order('dt_start', 'DESC')
      ->execute()
    );
  }
  
  protected function overview($data)
  {
    return array(
      'top_categories' => $this
      ->table('Entries')
      ->join('Categories', $cat)
      ->select("$cat.title", 'category')
      ->select("COUNT(*)", 'num_of_entries')
      ->group("$cat.title")
      ->order('num_of_entries', 'DESC')
      ->execute()
    );
  }
  
}
