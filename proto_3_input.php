<!DOCTYPE html>
<html lang="ja">

<head>
    <title>状態が悪いゴミステーションの場所</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <link rel="stylesheet" href="proto_3_input.css">
</head>

<body style="background-color:#EEEEEE">




    <H1>ゴミステーションの状態で治安を確認！(入力)</H1>


    
    <div style="margin-bottom:5px";>
       <button id="gio_btn">位置情報を取得</button>
    </div>

    <form  action="proto_3_create.php" method="POST">

        <div>
            緯度：<input type="text" name="lat" id="lat" ></input>　経度：<input type="text" name="lng" id="lng" ></input>
        </div>       


        <div class="score">
            状態：<select name="score" id="score" size="1" style="width:90px;height:22px" > 
            <option value="0"></option>
            <option value="1">良い</option>
            <option value="2">悪い</option>
            </select>
        </div>

        <div>
            <button id="submit">データの送信</button>
        </div>

    </form>

    <!-- 表示用の地図 -->
    <div id="map" style="width:100%;height:500px;margin-top:30px"></div>


    <div style="margin-top:20px;margin-bottom:20px;text-align:center" >
    <a href="proto_3_read.php" >一覧画面</a>
    </div>

    <!-- 地図用のAPI -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=【key】&callback=initMap&v=weekly"
        async>
    </script>


    <script>

        //地図表示
        function initMap() {

            //指定した位置情報を中心にマップを表示
            let map;
            map = new google.maps.Map(document.getElementById("map"), {
            
                center: {
                    lat: 34.052400, lng: 131.829000,
                },

                zoom: 17,
                radius: 5,

            });

        };

        //ボタンを押したら位置情報を取得してinputに入力
        $("#gio_btn").on("click", function () {

            //位置情報を取得してテキストボックスに反映
            function success(pos){
                    const lat = pos.coords.latitude;
                    const lng = pos.coords.longitude;
                    $('#lat').val(lat);
                    $('#lng').val(lng);


                    //取得した座標を中心に設定
                    let map2;
                    map2 = new google.maps.Map(document.getElementById("map"), {
                    
                        center: {
                            lat:pos.coords.latitude, lng: pos.coords.longitude,
                        },

                        zoom: 17,
                        radius: 5,

                    });
                        
                    //ピンを置く
                    var MyLatLng = new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude);
                    var marker = new google.maps.Marker({
                        position: MyLatLng,
                        map: map2,
                    });

                }



                function fail(pos){
                alert('位置情報の取得に失敗しました。エラーコード：');
                }

                navigator.geolocation.getCurrentPosition(success,fail);



            

                
        });




    </script>



  
</body>

</html>