<?php namespace components\hourreg; if(!defined('TX')) die('No direct access.');

class EntryPoint extends \dependencies\BaseEntryPoint
{
  
  public function entrance()
  {
    
    //Backend:
    if(tx('Config')->system()->check('backend'))
    {
     
      //Display a login page?
      if(!tx('Account')->user->check('login'))
      {
        
        //Redirect to custom login page is available.
        if(url('')->segments->path == '/admin/' && tx('Config')->user()->login_page->not('empty')->get('bool')){
          header("Location: ".url(URL_BASE.tx('Config')->user()->login_page));
        }

        //Otherwise: show awesome login screen.
        return $this->template('tx_login', 'tx_login', array(), array(
          'content' => tx('Component')->sections('account')->get_html('login_form')
        ));

      }
      else
      {
        //Redirect to homepage.
        header("Location: ".url(URL_BASE));
      }


    }

    //Frontend:
    else
    {

      $inc = URL_COMPONENTS.'hourreg/includes/';
      
      $site_name = tx('Config')->user('site_name')->otherwise('hourreg');
      $site_twitter = tx('Config')->user('site_twitter');
      $site_googleplus = tx('Config')->user('site_googleplus');
      $site_author = tx('Config')->user('site_author');
      $site_description = tx('Config')->user('site_description')->otherwise('hourreg');
      $site_keywords = tx('Config')->user('site_keywords')->otherwise('Tuxion, CMS');
      $title = $site_name;
      $description = $site_description;
      $keywords = $site_keywords;
      $pretty_url = '';

      tx('Ob')->meta('Page Headers');?>
        
        <!-- Standard HTML SEO -->
        <meta http-equiv="content-language" content="<?php echo tx('Language')->get_language_code(); ?>" />
        <meta name="description" content="<?php echo $description; ?>" />
        <meta name="keywords" content="<?php echo $keywords; ?>" />
        <meta name="author" content="<?php echo $site_author; ?>" />
        
        <!-- Open Graph (Facebook) -->
        <meta property="og:url" content="<?php echo $pretty_url; ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:article:tag" content="<?php echo $keywords; ?>" />
        <meta property="og:locale" content="<?php echo tx('Language')->get_language_code(); ?>" />
        <meta property="og:title" content="<?php echo $title; ?>" />
        <meta property="og:description" content="<?php echo $description; ?>" />
        <meta property="og:site_name" content="<?php echo $site_name; ?>" />
        
        <!-- Twitter Cards -->
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="<?php echo $title; ?>" />
        <meta name="twitter:description" content="<?php echo $description; ?>" />
        <meta name="twitter:url" content="<?php echo $pretty_url; ?>" />
        <meta name="twitter:site" content="<?php echo $site_twitter; ?>" />
        <meta name="twitter:creator" content="<?php echo $site_twitter; ?>" />
        
        <!-- Google+ Authorship -->
        <link rel="author" href="<?php echo $site_googleplus; ?>" />

        <title><?php echo $title; ?></title>
        
      <?php tx('Ob')->end();

      return $this->template('minimal', 'minimal', array(
        'plugins' =>  array(
          load_plugin('jquery'),
          load_plugin('jquery_rest'),
          load_plugin('idtabs3'),
          load_plugin('jquery_postpone'),
          load_plugin('jquery_tmpl')
        ),
        'links' =>  array(
          'bootstrap' => '<link href="'.$inc.'css/bootstrap.min.css" rel="stylesheet" style="text/css" />',
          'style' => '<link href="'.$inc.'css/style.css" rel="stylesheet" style="text/css" />'
        ),
        'scripts' => array(
          'bootstrap' => '<script src="'.$inc.'js/bootstrap.min.js" type="text/javascript"></script>',
          'main' => '<script src="'.$inc.'js/main.js" type="text/javascript"></script>'
        )
      ),
      array(
        'content' => $this->view(tx('Data')->get->v->otherwise('app'))
      ));
      
    }// end: frontend

  }
  
}
