<?php

$this->addMethod("marketler",function(){
  global $ROUTER;
  global $MEDOO;
  echo <<<HTML
  <div class="col-6 mt-4 mb-4 ml-auto  mr-auto  top-content">
  <hr class="divider">
    <div class="container-fluid">
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">
HTML;
                $first = true;
                $market = $MEDOO->select("markets","*",array("carousel" => 1));
                foreach($market as $row){
                  echo '
                  <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 '.($first?'active':'').'">
                      <a href="'.DOMAIN.$ROUTER->r->generate("market",array("market_id"=>$row["name"])).'">
                        <img src="'.$row["img"].'" class="img-fluid mx-auto d-block" alt="img1">
                      </a>
                  </div>
                  ';
                  $first = false;
                }
                unset($first);

    echo <<<HTML
            </div>
        </div>
    </div>
</div>
HTML;
});

?>
