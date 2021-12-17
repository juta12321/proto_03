<body>


    </script>

  
</body>
</html>



<?php
// DB接続
$dbn ='mysql:dbname=gsacy_d01_10;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}


// SQL作成&実行1(悪いゴミステーション)------------------------------------
//----------------------------------------------------------------------
$sql = "SELECT * FROM proto_3_table WHERE score = 2";

$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// SQL実行の処理
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
  $output .= "
    { lat: {$record["lat"]},lng: {$record["lng"]}},
  ";
}


// SQL作成&実行2(良いゴミステーション)------------------------------------
//----------------------------------------------------------------------
$sql_good="SELECT * FROM proto_3_table WHERE score = 1";

$stmt_good = $pdo->prepare($sql_good);

try {
  $status_good = $stmt_good->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// SQL実行の処理
$result_good = $stmt_good->fetchAll(PDO::FETCH_ASSOC);
$output_good = "";
foreach ($result_good as $record_good) {
  $output_good .= "
    { lat: {$record_good["lat"]},lng: {$record_good["lng"]}},
  ";
}



// //緯度(lat)の出力
// $result_lat = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $output_lat = "";
// foreach ($result_lat as $record_lat) {
//   $output_lat .= "
//     <tr>
//       <td>{$record_lat["lat"]}</td>     
//     </tr>
//   ";
// }

// //緯度(lng)の出力
// $result_lng = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $output_lng = "";
// foreach ($result_lng as $record_lng) {
//   $output_lng .= "
//     <tr>
//       <td>{$record_lng["lng"]}</td>     
//     </tr>
//   ";
// }




?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>一覧画面</title>
</head>

<body>

  <h1>ゴミステーションの状態で治安を確認！(閲覧)</h1>

    <div id="map" style="width:100%;height:700px;margin-top:30px"></div>


    <script
        src="https://maps.googleapis.com/maps/api/js?key=【key】&callback=initMap&v=weekly"
        async>
    </script>



    <!-- <legend>一覧画面</legend> -->
    <div style="text-align:center;margin-top:10px">
      <a href="proto_3_input.php">-管理画面-</a>
    </div>
    
    <table>

      <!--<thead>
        <tr>
          <th>date</th>
          <th>lat</th>
          <th>lng</th>
          <th>score</th>
        </tr>
      </thead>

      <tbody>
         ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る 
          <?= $output_good ?>
      </tbody>
    </table>
    -->
 



    <script>

      //表示位置の定義(悪いゴミステーション)
      const data = [
        <?= $output ?>
      ];

      //表示位置の定義(良いゴミステーション)
      const data2 = [
        <?= $output_good ?>
      ];





      function initMap() {

        //指定した位置情報を中心にマップを表示
        let map;
        map = new google.maps.Map(document.getElementById("map"), {
        
        center: {
            lat: 34.052400, lng: 131.829000,
          },

          zoom: 8,
          radius: 5,

        });


          data.map(d => {
          // マーカーをつける
            const marker = new google.maps.Marker({
            position: { lat: d.lat, lng: d.lng },
              map: map,
              icon: {
                url: "img/circle_red.png",
                scaledSize: new google.maps.Size(45, 45)
              }
            });
          });

         data2.map(d2 => {
           // マーカーをつける
           const marker2 = new google.maps.Marker({
           position: { lat: d2.lat, lng: d2.lng },
              map: map,
              icon: {
                url: "img/circle_green.png",
                scaledSize: new google.maps.Size(45, 45)
              }
            });
          });






      };
    </script>

</body>

</html>