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
                ['Danh mục', 'Số lượng sản phẩm'],
                <?php
                   $tongdm=count($listthongke);
                   $i=1;
                   foreach ($listthongke as $thongke){
                    extract($thongke);
                    if($i==$tongdm) $dauphay=""; else $dauphay=",";
                    echo "['".$thongke['tendm']."',".$thongke['countsp']."]".$dauphay;
                    $i+=1;
                   }
                ?>
            ]);

            var option = {'title': 'Thống kê sản phẩm theo danh mục', 'width':800, 'height':640};

            var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
            chart.draw(data, option);    
        }
    </script>
</div>
