<?php
function getSVG($name){
  if(file_exists(DIR."/asset/svg/".$name.".svg")){
    return file_get_contents(DIR."/asset/svg/".$name.".svg");
  }
}

 ?>
