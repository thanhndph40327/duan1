<div class="row">
    <div id="columnchart"  ></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        //load gg charts
        google.charts.load('current',{'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        //draw the charts and set the chart values
        function drawChart(){
            var data = google.visualization.arrayToDataTable([
                ['Danh mục', 'Doanh thu'],
                <?php
                   $tongdt=count($doanhthu);
                   $i=1;
                   foreach ($doanhthu as $doanhthu){
                    extract($doanhthu);
                    if($i==$tongdt) $dauphay=""; else $dauphay=",";
                    echo "['".$doanhthu['tensp']."',".$doanhthu['total_revenue']."]".$dauphay;
                    $i+=1;
                   }
                ?>
            ]);

            var option = {'title': 'Thống kê doanh thu theo loại sản phẩm', 'width':800, 'height':640};

            var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
            chart.draw(data, option);    
        }
    </script>
</div>





