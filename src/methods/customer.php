<?php
$this->addMethod("customer",function(){
  global $MEDOO;
  global $ROUTER;
  echo <<<HTML
  <div class="row pt-5">

    <h2 class="col-12 text-center text-wrap font-weight-bolder">
      Kampanyalar
    </h2>
HTML;
    $data = $MEDOO->select("kampanyalar","*",["ORDER" => ["id" => "DESC"],"LIMIT" => 20]);

    foreach($data as $row){
      $market_id = $row["market_id"];
      $remaining_time = $row["remaining_time"];

      $remaining_day = $MEDOO->query("SELECT FLOOR(HOUR(TIMEDIFF('$remaining_time', NOW())) / 24) ")->fetch()[0];
      $remaining_hours = $MEDOO->query("SELECT MOD(HOUR(TIMEDIFF('$remaining_time', NOW())), 24)")->fetch()[0];
      $remaining_time = ( ( $remaining_day > 0 ) ? $remaining_day . ' gün sonra bitecek' :  $remaining_hours . ' saat sonra bitecek' );
      $market_data = $MEDOO->select("markets","*",array("id" => $market_id))[0];
      echo '
      <div class="col-6 col-md-4 col-xl-3 pt-3 pb-3 pl-3 pr-3 ">
        <div class="col-12 border card-border">
            <div class="col-12 d-flex pt-3 pb-3 flex-wrap align-items-center">
              <div class="col-12 col-md-4 p-0">
                <img class="img-fluid rounded-lg" src="'.$market_data["img"].'" alt="">
              </div>
              <div class="col-12 col-md-8 text-center text-dark">
                <h6>'.$row["title"].'</h1>
                <span style="font-size:.75rem;" class="text-danger font-weight-bold">'.$remaining_time.'</span>
              </div>
            </div>
            <div class="col-12 text-justify text-muted pb-3">
              '.$row["description"].'
            </div>
        </div>
        <div class="col-12 p-3 text-center border border-top-0 card-border">
          <div class="col-12 rounded-lg p-2 card-link-out">
            <a class="text-decoration-none card-link" href="'.$ROUTER->r->generate('route-market',array("market_id"=>$market_data["name"],"kampanya_id"=>$row["id"])).'">'.getSVG("link").'Kampanyaya Git</a>
          </div>
        </div>
      </div>';
    }

})



 ?>
