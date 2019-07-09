<?php
$this->addMethod("css_lib",function(){
  global $MEDOO;
  global $lib;
  $css_list = $MEDOO->select("settings","*",["name"=>"active-lib"])[0];
  $css_list = explode("|",$css_list["value"]);
  foreach ($css_list as $row) {
    if( isset($lib[ $row ]) && isset( $lib[ $row ]["css"] ) ):
      echo '<link rel="stylesheet" href="'.DOMAIN.$lib[$row]["css"]["path"].'">';
    endif;
  }
});
$this->addMethod("css_local",function($params = null){
  $where = setParams($params,0);
  $css_file_list_dir = DIR."/asset/css";
  $css_file_list = scandir($css_file_list_dir);
  $css_file_list = array_diff($css_file_list,[".",".."]);
  $css_file_list = array_diff($css_file_list,$where);
  foreach ($css_file_list as $row) {
    echo '<link rel="stylesheet" href="'.DOMAIN.'/asset/css/'.$row.'">';
  }
});
?>
