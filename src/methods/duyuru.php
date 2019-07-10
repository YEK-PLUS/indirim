<?php
$this->addMethod("duyuru",function(){
  global $ROUTER;
  global $MEDOO;
  $match = $ROUTER->match;
  if($match["name"]=="home"){
    $data = $MEDOO->select("duyuru","*",["type"=>"manset"]);
    foreach ($data as $row) {
      $title = $row["title"];
      $link = $row["link"];
      $button_text = $row["button_text"];
      $image = $row["image"];
      $id = $row["id"];
      $text = '
        <div class="col-12">
          <div class="row">
            '.
            ((isset($image) && $image != "")?
            '
            <div class="col-2 col-md-4">
              <img class="img-fluid img-thumbnail" src="'.$image.'"/>
            </div>
            ':'').
            '

            <div class="text-white col-sm text-center font-weight-bold">
              <h1>'.$title.'</h1>
            </div>

          </div>
        </div>
      ';
      echo $text;
    }

  }
});

?>
