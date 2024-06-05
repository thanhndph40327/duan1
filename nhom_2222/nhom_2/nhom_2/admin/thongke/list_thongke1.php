<div class="row">
    <div class="row frmtitle">

    <?php
// Mô phỏng dữ liệu doanh thu
$doanhThu = array(
    array('Tháng 10', 0),
    array('Tháng 11', 0),
    array('Tháng 12', $tongtien),
    array('Tháng 1', 0),
    array('Tháng 2', 0),
    // ... Thêm dữ liệu khác nếu cần
);

// Tính tổng doanh thu
$tongDoanhThu = array_reduce($doanhThu, function($carry, $item) {
    return $carry + $item[1];
}, 0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Tổng Doanh Thu</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1>Bảng Tổng Doanh Thu</h1>

    <table>
        <tr>
            <th>Ngày</th>
            <th>Doanh Thu</th>
        </tr>
        <?php foreach ($doanhThu as $item) : ?>
            <tr>
                <td><?php echo $item[0]; ?></td>
                <td><?php echo $item[1]; ?> VND</td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td><strong>Tổng Cộng</strong></td>
            <td><strong><?php echo $tongDoanhThu; ?> VND</strong></td>
        </tr>
    </table>

</body>

      <h1>Thống kê doanh thu </h1>
    </div>
    <div class="row fromconten ">
      <div
              id="myChart" style="width:100%; width:800px; height:500px; align-items: center">
      </div>


<script src="https://www.gstatic.com/charts/loader.js"></script>
<body>
<div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>

<script>
google.charts.load('current',{packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data

const data = google.visualization.arrayToDataTable([
  ['Tháng', 'Doanh Thu'],
  ['Tháng 10', 0],
  ['Tháng 11',0],
  ['Tháng 12',<?php echo $tongtien; ?>],
  ['Tháng 1', 0],
  ['Tháng 2', 0],
]);

// Set Options
const options = {
            title:'Biểu Đồ Thống Kê Doanh Thu Theo Tháng : ',
            is3D:true
          };


// Draw
const chart = new google.visualization.LineChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script>
</div>
  </div>