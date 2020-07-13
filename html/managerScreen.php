<?php
    include "headerNav.php";
    $mysqli_connect = connect_Mysqli();

    $query = "select * from browserStatistics";
    $result = mysqli_query($mysqli_connect, $query);
    $row = mysqli_fetch_array($result);

    $browserArray = array($row['IE'],$row['Chrome'],$row['Safari'],$row['Firefox'],$row['Opera'],$row['Edge'],$row['Whale'],$row['other']);
    //전달받은 값을 JSON 형식의 문자열로 변환하여 반환
    $browserJsonArray = json_encode($browserArray);

    $query = "select * from languageStatistics";
    $result = mysqli_query($mysqli_connect, $query);
    $row = mysqli_fetch_array($result);

    $languageArray = array($row['korean'],$row['english'],$row['japanese'],$row['simplifiedChinese'],
                            $row['traditionalChinese'],$row['indonesian'],$row['thai'],$row['other']);
    $languageJsonArray = json_encode($languageArray);

    //일일 방문자 수
    $query = "select * from visitsStatistics where idx = 1";
    $result = mysqli_query($mysqli_connect, $query);
    $mon = mysqli_fetch_array($result);

    $query = "select * from visitsStatistics where idx = 2";
    $result = mysqli_query($mysqli_connect, $query);
    $two = mysqli_fetch_array($result);

    $query = "select * from visitsStatistics where idx = 3";
    $result = mysqli_query($mysqli_connect, $query);
    $wed = mysqli_fetch_array($result);

    $query = "select * from visitsStatistics where idx = 4";
    $result = mysqli_query($mysqli_connect, $query);
    $thu = mysqli_fetch_array($result);

    $query = "select * from visitsStatistics where idx = 5";
    $result = mysqli_query($mysqli_connect, $query);
    $fri = mysqli_fetch_array($result);

    $query = "select * from visitsStatistics where idx = 6";
    $result = mysqli_query($mysqli_connect, $query);
    $sat = mysqli_fetch_array($result);

    $query = "select * from visitsStatistics where idx = 7";
    $result = mysqli_query($mysqli_connect, $query);
    $sun = mysqli_fetch_array($result);

    $visitsArray = array($mon['visitNum'],$two['visitNum'],$wed['visitNum'],$thu['visitNum'],
        $fri['visitNum'],$sat['visitNum'],$sun['visitNum']);
    $visitsJsonArray = json_encode($visitsArray);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EasyHomeCafe-관리자페이지</title>
    <link rel="stylesheet" href="managerScreen.css">
</head>
<body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.min.js"></script>
</body>
</html>
<button class="logoutBtn btn btn-secondary" onClick="logout_button();"">로그아웃</button>
<script>
    //todo 로그아웃을 하면 저장된 세션을 삭제
    function logout_button() {
        <?php
        unset( $_SESSION['session_user_id'] );
        ?>
        location.href="login.php";
    }
</script>
<h1>일일 방문자 수</h1>
<canvas id="visitChart" width="500px" height="500px"></canvas>
<h1>브라우저</h1>
<canvas id="browserChart" width="500px" height="500px"></canvas>
<h1>사용자 사용 언어</h1>
<canvas id="languageChart" width="500px" height="500px"></canvas>
<script>

    var barOptions = {
        responsive: false,
        events: false,
        animation: {
            duration: 500,
            easing: "easeOutQuart",
            onComplete: function () {
                var ctx = this.chart.ctx;
                ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

                this.data.datasets.forEach(function (dataset) {
                    for (var i = 0; i < dataset.data.length; i++) {
                        var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model;

                        ctx.fillStyle = '#000000';
                        ctx.fillText(dataset.data[i], model.x, model.y);
                    }
                });
            }
        }
    };

    visitChartData = {
        datasets: [{
            label: '방문자 수',
            data: <?php echo $visitsJsonArray; ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(50, 50, 50, 0.2)'
            ]
        }],

        labels: [
            '07/06',
            '07/07',
            '07/08',
            '07/09',
            '07/10',
            '07/11',
            '07/12'
        ]
    };

    var visitChartctx = document.getElementById('visitChart').getContext('2d');
    var visitBarChart = new Chart(visitChartctx, {
        type: 'bar',
        data: visitChartData,
        options: barOptions
    });

    var pieOptions = {
        responsive: false,
        events: false,
        animation: {
            duration: 500,
            easing: "easeOutQuart",
            onComplete: function () {
                var ctx = this.chart.ctx;
                ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

                this.data.datasets.forEach(function (dataset) {

                    for (var i = 0; i < dataset.data.length; i++) {
                        var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                            total = dataset._meta[Object.keys(dataset._meta)[0]].total,
                            mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius)/2,
                            start_angle = model.startAngle,
                            end_angle = model.endAngle,
                            mid_angle = start_angle + (end_angle - start_angle)/2;

                        var x = mid_radius * Math.cos(mid_angle);
                        var y = mid_radius * Math.sin(mid_angle);

                        ctx.fillStyle = '#000000';
                        var percent = String(Math.round(dataset.data[i]/total*100)) + "%";
                        ctx.fillText(dataset.data[i], model.x + x, model.y + y);
                        // Display percent in another line, line break doesn't work for fillText
                        ctx.fillText(percent, model.x + x, model.y + y + 15);
                    }
                });
            }
        }
    };

    browserChartData = {
        datasets: [{
            data: <?php echo $browserJsonArray; ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(50, 50, 50, 0.2)',
                'rgba(10, 200, 40, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(50, 50, 50, 1)',
                'rgba(10, 200, 40, 1)'
            ],
            borderWidth: 1
        }],

        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
            'Internet Explorer',
            'Chrome',
            'Safari',
            'Firefox',
            'Opera',
            'Edge',
            'Whale',
            '그외'
        ]
    };

    var browserChartctx = document.getElementById('browserChart').getContext('2d');
    var browserPieChart = new Chart(browserChartctx, {
        type: 'pie',
        data: browserChartData,
        options: pieOptions
    });

    languageChartData = {
        datasets: [{
            data: <?php echo $languageJsonArray; ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(50, 50, 50, 0.2)',
                'rgba(10, 200, 40, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(50, 50, 50, 1)',
                'rgba(10, 200, 40, 1)'
            ],
            borderWidth: 1
        }],

        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
            '한국어',
            '영어',
            '일본어',
            '중국어(간체)',
            '중국어(번체)',
            '인도네시아어',
            '태국어',
            '그외'
        ]
    };

    var ctx = document.getElementById('languageChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: languageChartData,
        options: pieOptions
    });

</script>


