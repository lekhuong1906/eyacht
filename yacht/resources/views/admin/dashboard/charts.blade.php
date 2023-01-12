<section>
    <!-- Styles -->
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>
    <!-- Chart code -->
    <script>
        am5.ready(function () {

            // Create root element
            var root = am5.Root.new("chartdiv");


            // Set themes
            root.setThemes([
                am5themes_Animated.new(root)
            ]);


            // Create chart
            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: true,
                panY: true,
                wheelX: "panX",
                wheelY: "zoomX",
                pinchZoomX: true
            }));

            // Add cursor (Con trỏ)
            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
            cursor.lineY.set("visible", false);


            // Create axes (Tạo trục)
            var xRenderer = am5xy.AxisRendererX.new(root, {minGridDistance: 30}); //set label column
            xRenderer.labels.template.setAll({
                rotation: 0,
                centerY: am5.p50,
                centerX: am5.p100,
                paddingRight: -7,
            });

            var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                maxDeviation: 0.3,
                categoryField: "month",
                renderer: xRenderer,
                tooltip: am5.Tooltip.new(root, {})
            }));

            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                maxDeviation: 0.3,
                renderer: am5xy.AxisRendererY.new(root, {})
            }));


            // Create series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: "Series 1",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "value",
                sequencedInterpolation: true,
                categoryXField: "month",
                tooltip: am5.Tooltip.new(root, {
                    labelText: "{valueY}"
                })
            }));

            series.columns.template.setAll({cornerRadiusTL: 5, cornerRadiusTR: 5});
            series.columns.template.adapters.add("fill", function (fill, target) {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });

            series.columns.template.adapters.add("stroke", function (stroke, target) {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });


            // Set data
            var data = @json($data);

            console.log(data);

            xAxis.data.setAll(data);
            series.data.setAll(data);


            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear(1000);
            chart.appear(1000, 100);

        }); // end am5.ready()
    </script>


    <!-- HTML -->
    <div class="row" style="margin-left: 25px">
        <form action="{{URL::to('/chart')}}" class="form-inline" method="POST">
            @csrf
            <div class=" form-group">
                <label for="from">From</label>
                <input type="month" id="from" name="from" class="input-sm form-control ">
            </div>
            <div class=" form-group">
                <label for="to">To</label>
                <input type="month" id="to" name="to" class="input-sm form-control">
            </div>
            <button type="submit" class="btn btn-sm btn-default">Submit</button>
        </form>
    </div>

    <div id="chartdiv"></div>
</section>
