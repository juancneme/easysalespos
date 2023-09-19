(function ($) {

    $.sir = function (options) {

        var default_options = {
            type: "dual",
            data: [],
            series: [],
            footData: [],
            position: 0,
            nextQuery: false,
            title: "",
            subtitle: "",
            table: {
                type: "datatables",
                classes: "",
                footer: true,
                filters: true,
                totals: true,
                columns: true,
                exports: true,
                element: "",
                select: function (id) {
                },
                draw: function(){
                }
            },
            graph: {
                element: "",
                type: "highcharts", //"googlecharts",
                style: "column",
                option3d :false,
                inverted: false,
                grouped: false,
                percent: false,
                stacking: false,
                totalspie: false,
                drawvars: false
            }
        };

        if (options) {
            $.extend(true, default_options, options);
        }
        
        default_options.debug = true;
        
        default_options.data2 = JSON.parse(JSON.stringify(default_options.data));
//        debug("default_options.data2 ", default_options.data2);
//        if(isNaN(default_options.data2[0])){
//            default_options.data2 = default_options.data2.splice(0, 1);
//        }
//        
        //default_options.series2 = default_options.series.slice();
        default_options.series2 = Object.assign([], default_options.series);
//        default_options.series2.splice(0, 1);

        default_options.footData2 = JSON.parse(JSON.stringify(default_options.footData));
        
        function debug(arguments){
            if(default_options.debug){
                console.log(arguments);
            }
        }
        
        function init() {
            switch (default_options.type) {
                case "dual":
                    _table = table();
                    default_options.data = getTableData(_table);
                    graph();
                    setTableEvents(_table);
                    break;
                case "table":
                    table();
                    break;
                case "graph":
                    graph();
                    break;
                default:
                    return "Error: type not supported";
            }
        }

        function table_addFooter(table) {
//            rowArray = [];
//            table.rows({search: "applied"}).every(function (rowIdx, tableLoop, rowLoop) {
//                const data = this.data();
//                $.each(data, function(idx, col){
//                    if(table.column(idx).visible()){
//                        try {
//                            rowArray.push(default_options.series2[idx]);
//                        }
//                        catch(e){
//                        }
//                    }
//                });
//            });
            
            // funcional
//            if($(default_options.table.element).find("table > tfoot > tr.foot").size() == 0){
//                tr = $("<tr />").addClass("foot");
//                $($(default_options.table.element).find("table > tfoot")).append(tr);
//            }
//            else {
//                tr = $($(default_options.table.element).find("table > tfoot > tr.foot")[0]);
//            }
//            
//            tr.empty();
//            $.each(default_options.series2, function(i, row) {
//                tr.append($("<th />").html(row));
//            });
            
        }

        function table_formatTitles() {
            titles = [];
            if (default_options.table.type === 'datatables') {
                $.each(default_options.series, function (i, value) {
                    titles.push({"title": value});
                });
            }
            return titles;
        }

        function table_validateData() {
            returnData = [];

            if (default_options.table.type === 'datatables') {

                $.each(default_options.data, function (i, row) {
                    _row = [];
                    $.each(row, function (ind, cell) {
                        
                        if(ind != 0){   
                            val = table_validateFormat(cell);
                            if (val !== false && !isNaN(val)) {
                                _row[ind] = val.formatMoney(2, '', ',', '.');
                            }
                            else {
                                _row[ind] = cell;
                            }
                        }
                        else {
                            _row[ind] = cell;
                        }
                    });
                    returnData.push(_row);
                });
            }
            
            return returnData;
        }

        function table_validateFormat(str) {
            try {
                tmp = str.toString().replace('$', '');
//                tmp = tmp.replace(',', '.');
//                tmp = tmp.replace('.', '');

                return parseFloat(tmp);
            } catch (e) {
                return false;
            }
        }

        function table_addTotals(table) {
//            rowArray = [];
//            vars = [];
//            table.rows({search: "applied"}).every(function (rowIdx, tableLoop, rowLoop) {
//                const data = this.data();
//                $.each(data, function(idx, col){
//                    if(table.column(idx).visible()){
//                        try {
//                            $.each(default_options.footData2, function (i, row) {
//                                //if (row.var == 'Total') {
//                                    if(vars.indexOf(row.var.toLowerCase()) === -1){
//                                        vars.push(row.var.toLowerCase());
//                                    }
//                                    
//                                    if(rowArray[row.var.toLowerCase()] == undefined){
//                                        rowArray[row.var.toLowerCase()] = [];
//                                    }
//                                    
//                                    if (isNaN(row.row[idx])) {
//                                        rowArray[row.var.toLowerCase()].push( row.row[idx] );
//                                    } else {
//                                        rowArray[row.var.toLowerCase()].push(parseFloat(row.row[idx]));
//                                    }
//                                //}
//                            });
//                        }
//                        catch(e){
//                        }
//                    }
//                });
//            });
//            
//            $.each(vars, function(vidx, vval){
//                if($(default_options.table.element).find("table > tfoot > tr."+vval).size() == 0){
//                    tr = $("<tr />").addClass(vval);
//                    $($(default_options.table.element).find("table > tfoot")).append(tr);
//                }
//                else {
//                    tr = $($(default_options.table.element).find("table > tfoot > tr."+vval)[0]);
//                }
//
//                tr.empty();
//                $.each(rowArray[vval], function(i, row) {
//                    tr.append($("<th />").html(row));
//                });
//            });

            $.each(default_options.footData2, function(vidx, vval) {
                if ($(default_options.table.element).find("table > tfoot > tr." + vval.var).size() == 0) {
                    tr = $("<tr />").addClass(vval.var);
                    $($(default_options.table.element).find("table > tfoot")).append(tr);
                } else {
                    tr = $($(default_options.table.element).find("table > tfoot > tr." + vval.var)[0]);
                }

                tr.empty();
                $.each(vval.row, function (i, row) {
                    tr.append($("<th />").html(row));
                });
            });
        }

        function table_addFilters(table, tableObject, _tempcolumns) {
            rowArray = [];
            tableObject.rows({search: "applied"}).every(function (rowIdx, tableLoop, rowLoop) {
                const data = this.data();
                $.each(data, function(idx, col){
                    if(tableObject.column(idx).visible()){
                        try {
                            rowArray.push($(tableObject.column(idx).header()).text());
                        }
                        catch(e){
                        }
                    }
                });
            });
            
            if($(default_options.table.element).find("table > thead > tr.filters").size() == 0){
                tr = $("<tr />").addClass("filters");
                $($(default_options.table.element).find("table > thead")).append(tr);
            }
            else {
                tr = $($(default_options.table.element).find("table > thead > tr.filters")[0]);
            }

            tr.empty();
            $.each(rowArray, function(i, row) {
                input = $("<input />").attr("type", "text")
                            .attr("placeholder", "Buscar " + row);
                    input.on('keyup change', function () {
                        if (tableObject.column(i).search() !== this.value) {
                            tableObject
                                    .column(i)
                                    .search(this.value)
                                    .draw();
                            default_options.data = getTableData(tableObject);
                            graph();
                        }
                    });
                tr.append($("<th />").append(input));
            });
        }

        function table() {

            _tempdata = table_validateData();
            _tempcolumns = table_formatTitles();

            if (_tempdata.length > 0 && _tempcolumns.length > 0) {
                if ($(default_options.table.element).prop("tagName") !== "TABLE") {
                    div = $("<div />");

                    $(default_options.table.element).append(div);
                    default_options.table.element = div;
                }

                default_options.table.element.empty();

                table = $("<table />", {
                    "class": "table dataTable " + default_options.table.classes,
                }).css("width", "100%");

                table.append("<thead />").append("<tbody />").append("<tfoot />");

                default_options.table.element.append(table);

                if (default_options.table.type === 'datatables') {
                    
                    tableConfig = {
                        "paging": true,
                        "searching": true,
                        "lengthMenu": [50, 100, 200, 500],
                        "pageLength": 50,
                        // Extensions
                        "select": true,
                        keys: true,
                        responsive: true,                        
                        "data": _tempdata,
                        "columns": _tempcolumns,
                        "serverSide": false,
                        "deferLoading": 60,
                        "dom": 'BRSlfrtip',
                        "orderCellsTop": true,
                        "fixedHeader": true,
                        "buttons": [],
//                        "footerCallback": function (row, data, start, end, display) {
//                            if (default_options.table.totals) {
//                                table_addTotals(this, row, data, start, end, display);
//                            }
//                        }
                        "columnDefs": [
                            { "className": 'dt-body-left', "targets": [0] }
                        ]
                    };
                    
                    if(default_options.table.columns){
                        tableConfig.buttons.push({
                                extend: 'colvis',
                                text: 'Columnas'
                            });
                    }
                    if(default_options.table.exports){
                        tableConfig.buttons.push({
                                extend: 'collection',
                                text: 'Exportar',
                                buttons: ['csv', 'excel', 'pdf', 'print']
                            });
                    }
                                        
                    tableObject = $(table).DataTable(tableConfig);
                    
                    tableObject.on('select', function (e, dt, type, indexes) {
                        if (type === 'row') {
                            var data = tableObject.rows(indexes).data();
                            default_options.table.select(data[0][0]);
                            // do something with the ID of the selected items
                        }
                    });
                    
                    if (default_options.table.totals) {
                        debug("add Totals");
                        table_addTotals(tableObject);
                    }
                    
                    if (default_options.table.footer) {
                        debug("add Footer");
                        table_addFooter(tableObject);
                    }

                    if (default_options.table.filters) {
                        debug("add Filters");
                        table_addFilters(table, tableObject, _tempcolumns);
                    }
                    
                    return tableObject;
                }
            }
        }
        
        let draw = false;

        function setTableEvents(table) {
            // listen for page clicks
            table.on("page", () => {
                draw = true;
            });

            // listen for updates and adjust the chart accordingly
            table.on("draw, column-visibility.dt", () => {
//                if (draw) {
//                    draw = false;
//                } else {
                    default_options.data = getTableData(table);
                    default_options.footData2 = getFootData(table);
                    graph();
//                }
                
                if (default_options.table.totals) {
                    debug("draw Totals");
                    table_addTotals(table);
                }

                if (default_options.table.footer) {
                    debug("draw Footer");
                    table_addFooter(table);
                }

                if (default_options.table.filters) {
                    debug("draw Filters");
                    table_addFilters(table, tableObject, _tempcolumns);
                }
            });
        }
        
        function getFootData(table) {
            rowtemp = [];
            a = 0;
            
            // loop table rows
            table.rows({search: "applied"}).every(function (rowIdx, tableLoop, rowLoop) {
                const data = this.data();
                rowArray = [];
                $.each(data, function(idx, col){
                    if(table.column(idx).visible()){
                        try {
                            $.each(default_options.footData, function (i, row) {
                                //if (row.var == 'Total') {
                                                                        
                                    if(rowArray[row.var] == undefined){
                                        rowArray[row.var] = [];
                                    }
                                    
                                    if (isNaN(row.row[idx])) {
                                        rowArray[row.var].push( row.row[idx] );
                                    } else {
                                        rowArray[row.var].push(parseFloat(row.row[idx]));
                                    }
                                    
                                //}
                            });
                        }
                        catch(e){
                        }
                    }
                });
                
                for(prop in rowArray){
                    obj = {};
                    obj.var = prop;
                    obj.rownum = a++;
                    obj.row = rowArray[prop];
                    rowtemp.push(obj);
                }
                
            });
            
            return rowtemp;
        }
        
        function getTableData(table) {
            const dataArray = [];
            default_options.series = [];
            
            // loop table rows
            table.rows({search: "applied"}).every(function (rowIdx, tableLoop, rowLoop) {
                const data = this.data();
                rowArray = [];
                $.each(data, function(idx, col){
                    if(table.column(idx).visible()){
                        try {
                            default_options.series.push($(table.columns().header()[idx]).text());
                            if(idx == 0){
                                rowArray.push(data[idx]);
                            }
                            else{
                                rowArray.push(parseFloat(data[idx].replace(/\,/g, "")));
                            }
                        }
                        catch(e){
                        }
                    }
                });
                
                // store all data in dataArray
                dataArray.push(rowArray);
            });
                        
            return dataArray;
        }

        function graph() {
            datosGrafica = [];
            datosGrafica.push(default_options.series);
            _temp = table_validateData();
            $.each(_temp, function (i, e) {
                datosGrafica.push(e);
            });

            if (default_options.graph.type === 'highcharts') {
                highcharts();
            } else if (default_options.graph.type === 'googlecharts') {
                googlecharts();
            }
        }

        function formatHighchartsData() {
            val = [];
            
//            series = formatHighchartsSeries();
            if (default_options.graph.style === 'pie') {
//                values = [];
                _values = [];
                $.each(default_options.data2, function (i, d) {
                    _name2 = "";
                    $.each(d, function (ii, dd) {
                        if (isNaN(parseFloat(dd))) {
                            _name2 = dd;
                        } else {
                            _values.push({
                                name: default_options.series[ii],
                                y: parseFloat(dd) // .formatMoney(2, '', ',', '.')
                            });
                        }
                        
                    });
                });
                
                val.push({
                    name: default_options.series[0],
                    data: _values
                });
            } 
            else if (default_options.graph.style === 'semi-circle'){
                _values = [];
                $.each(default_options.data2, function (i, d) {
                    _name2 = "";
                    $.each(d, function (ii, dd) {
                        if (isNaN(parseFloat(dd))) {
                            _name2 = dd;
                        } else {
                            _values.push({
                                name: default_options.series[ii],
                                y: parseFloat(dd) // .formatMoney(2, '', ',', '.')
                            });
                        }
                        
                    });
                });
                
                val.push({
                    type: 'pie',
                    name: default_options.series[1],
                    data: _values,
                    innerSize: '50%'
                });
            }
            else if (default_options.graph.style === 'variablepie'){
                _values = [];
                $.each(default_options.data, function (i, d) {
                    _name2 = "";
                    $.each(d, function (ii, dd) {
                        if (isNaN(parseFloat(dd))) {
                            _name2 = dd;
                        } else {
                            _values.push({
                                name: default_options.series[ii],
                                y: parseFloat(dd), // .formatMoney(2, '', ',', '.')
                                z: getRandomInt(90, 250)
                            });
                        }
                        
                    });
                });
                
                val.push({
                    name: default_options.series[1],
                    data: _values
//                    minPointSize: 10,
//                    innerSize: '20%',
//                    zMin: 0
                });
            }
            else if(default_options.graph.style === 'columnline') {
                $.each(default_options.data, function (i, d) {
                    _name = "";
                    _tmpvalues = [];
                    
                    $.each(d, function (ii, dd) {
                        if (isNaN(parseFloat(dd))) {
                            _name = dd;
                        } else {
                            _tmpvalues.push(parseFloat(dd));
                        }
                    });
                                        
                    val.push({
                        name: default_options.data[i][0],
                        data: _tmpvalues,
                        type: 'column'
                    });
                });
            }
            else {
                
                $.each(default_options.data, function (i, d) {
                    _name = "";
                    _tmpvalues = [];
//                    if(i > 1){
                        $.each(d, function (ii, dd) {
                            if(dd != undefined && !isNaN(dd)){
                                //dd = dd.replaceAll(",", ".");
                                if (isNaN(parseFloat(dd))) {
                                    _name = dd;
                                } else {
                                    _tmpvalues.push(parseFloat(dd));
                                }
                            }
                        });
                        
                        if(default_options.graph.grouped){
                            val.push({
                                name: default_options.data[i][0],
                                data: _tmpvalues,
                                pointPadding: i % 2 != 0 ? 0.3 : 0.4,
                                pointPlacement: -0.2
                            });
                        }
                        else {
                            val.push({
                                name: default_options.data[i][0],
                                data: _tmpvalues
                            });
                        }
//                    }
                    
                });
            }
                        
            if(default_options.graph.totalspie){
                _values = [];
                
                $.each(default_options.footData2, function (i, d) {
                    if(d.var == 'Total'){
                        $.each(d.row, function (ii, dd) {
                            if (ii > 0) {
                                _values.push({
                                    name: default_options.series[ii -1],
                                    y: parseFloat(dd) // .formatMoney(2, '', ',', '.')
                                });
                            }
                        });
                    }
                });
                
                val.push({
                    type: 'pie',
                    name: 'Total',
                    data: _values,
                    center: [50, 0],
                    size: 100,
                    showInLegend: false,
                    dataLabels: {
                        enabled: false
                    }
                });
            }
                        
            if(default_options.graph.drawvars){
                _tmpvalues = [];
                $.each(default_options.footData2, function (i, d) {
                    if(d.var != 'Total'){
                        _name = "";
                        $.each(d.row, function (i, dd) {
                            if(isNaN(parseFloat(dd))){
                                _name = dd;
                            }
                            else {
                                _tmpvalues.push(parseFloat(dd));
                            }
                        });
                        val.push({
                            name: _name,
                            data: _tmpvalues,
                            type: 'spline'
                        });
                    }
                });
            }
                        
            return val;
        }

        function formatHighchartsSeries() {            
            valSeries = [];
            $.each(default_options.series, function (i, d) {
                if (i > 0) {
                    valSeries.push(d);
                }
            });
            return valSeries;
            
//            return default_options.series2;
        }

        function highcharts() {
            id = "";
            if (typeof default_options.graph.element === "object") {
                id = $(default_options.graph.element).attr("id");
            } else if (typeof default_options.graph.element === 'string') {
                id = default_options.graph.element.replace("#", "");
            }

            highChartConfig = {
                chart: {
                    width: '800',
                    height: '300'
                },
                credits: {
                    enabled: false
                },
                title: {
                    text: default_options.title
                },
                subtitle: {
                    text: default_options.subtitle
                },
                tooltip: {
                    headerFormat: '<span>{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                series: formatHighchartsData()
            };
                        
            if(default_options.graph.style == 'semi-circle') {
                highChartConfig.plotOptions = {
                    pie: {
                        dataLabels: {
                            enabled: true,
                            style: {
                                fontWeight: 'bold',
                                color: 'white'
                            }
                        },
                        startAngle: -90,
                        endAngle: 90,
                        center: ['50%', '75%'],
                        size: '110%'
                    }
                };
                highChartConfig.xAxis = {
                    categories: formatHighchartsSeries(),
                    crosshair: true
                };
                highChartConfig.yAxis = {
                    min: 0,
                    allowDecimals: false
                };
            }
            else if(default_options.graph.style == 'polar-line' || default_options.graph.style == 'polar-column' || default_options.graph.style == 'polar-area'){
                highChartConfig.chart = {
                    type: default_options.graph.style.replace("polar-", ""),
                    polar: true
                };
                
                highChartConfig.plotOptions = {
                    series: {
                        pointStart: 0,
                        pointInterval: 45
                    },
                    column: {
                        pointPadding: 0,
                        groupPadding: 0
                    }
                };
            }
            else if(default_options.graph.style != 'columnline'){
                highChartConfig.chart = {
                    type: default_options.graph.style
                };
                highChartConfig.plotOptions = {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                };
                highChartConfig.xAxis = {
                    categories: formatHighchartsSeries(),
                    crosshair: true
                };
                highChartConfig.yAxis = {
                    min: 0,
                    allowDecimals: false
                };
            } 
            else {
                highChartConfig.xAxis = {
                    categories: formatHighchartsSeries(),
                    crosshair: true
                };
                highChartConfig.yAxis = {
                    min: 0,
                    allowDecimals: false
                };
                highChartConfig.plotOptions = {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                };
            }
            
            if(default_options.graph.option3d){
                highChartConfig.chart.options3d = {
                    enabled: true,
                    alpha: 45,
                    beta: 0,
                    depth: 100,
                    viewDistance: 25
                }
            }
            
            if(default_options.graph.inverted){
                highChartConfig.chart.inverted = true;
            }
            
            if(default_options.graph.grouped){
                highChartConfig.plotOptions = {
                    column: {
                        grouping: true,
                        shadow: false,
                        borderWidth: 0
                    }
                }
            }
            
            if(default_options.graph.stacking){
                highChartConfig.plotOptions = {
                    column: {
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true
                        }
                    }
                }
            }
            
            if(default_options.graph.percent){
                highChartConfig.plotOptions = {
                    column: {
                        stacking: 'percent',
                        dataLabels: {
                            enabled: true
                        }
                    }
                }
            }
            
//            console.log("highChartConfig", id, highChartConfig, JSON.stringify(highChartConfig));
            Highcharts.chart(id, highChartConfig);
        }

        function googlecharts() {
            google.charts.load('current', {'packages': ['corechart', 'controls'], 'language': 'sp'});
            switch (default_options.graph.style) {

                case "Multiple":

                    google.charts.setOnLoadCallback(function () {

                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        var options = {
                            'width': 400,
                            'height': 300
                        };
                        // Instantiate and draw our chart, passing in some options.
                        var chart = new google.visualization.BarChart(document.getElementById('graph'));
                        function selectHandler() {
                            var selectedItem = chart.getSelection()[0];
                            if (selectedItem) {
                                var itemSeleccionado = data.getValue(selectedItem.row, 0);
                            }
                        }
                        google.visualization.events.addListener(chart, 'select', selectHandler);
                        chart.draw(data, options);
                    });
                    break;
                case "PieChart":
                    // Pie = 1

                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);

                        var options = {
                            title: default_options.title,
                            is3D: true,
                            width: '650%', 'height': '450',
                            backgroundColor: 'transparent',
                            legendTextStyle: {color: '#000000'},
                            titleTextStyle: {color: '#000000'},
                            hAxis: {
                                color: '#000000'
                            }

                        };
                        // IdGrafica
                        var chart = new google.visualization.PieChart(document.getElementById("graph"));
                        chart.draw(data, options);
                    });
                    break;
                case "BarChart":

                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        var options = {
                            'title': default_options.title,
                            'legend': {
                                position: 'top', maxLines: 3,
                                'width': '700px', 'height': '6000',
                                backgroundColor: {fill: 'transparent'}
                            }
                        };
                        // Display the chart inside the <div> element with id="piechart"

                        var chart = new google.visualization.BarChart(document.getElementById("graph"));
                        chart.draw(data, options);
                    });
                    break;
                case "TreeMap":
                    // Barras = 2

                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        var options = {
                            'title': default_options.title,
                            'legend': {
                                position: 'top', maxLines: 3,
                                'width': '650px', 'height': '400',
                                backgroundColor: {fill: 'transparent'}
                            }
                        };
                        // Display the chart inside the <div> element with id="piechart"

                        var chart = new google.visualization.TreeMap(document.getElementById("graph"));
                        chart.draw(data, options);
                    });
                    break;
                case "ColumnChart":
                    // columnas = 3
                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        var options = {
                            'title': default_options.title,
                            width: '650%', 'height': '400',
                            backgroundColor: 'transparent',
                            legendTextStyle: {color: '#ffffff'},
                            titleTextStyle: {color: '#ffffff'},
                            hAxis: {
                                textStyle: {color: '#ffffff'}
                            }
                        };
                        // Display the chart inside the <div> element with id="piechart"

                        var chart = new google.visualization.ColumnChart(document.getElementById("graph"));
                        chart.draw(data, options);
                    });
                    break;
                case "LineChart":
                    // lineas = 4
                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        //        var data = google.visualization.arrayToDataTable([datosGrafica)

                        var options = {
                            'title': default_options.title,
                            'width': '600px', 'height': '400',
                            backgroundColor: {fill: 'transparent'}
                        };
                        var chart = new google.visualization.LineChart(document.getElementById("graph"));
                        chart.draw(data, options);
                    });
                    break;
                case "AreaChart":
                    // Areas = 5
                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        //        var data = google.visualization.arrayToDataTable([datosGrafica)

                        var options = {
                            'title': default_options.title,
                            'width': '400px', 'height': 'auto',
                        };
                        var chart = new google.visualization.AreaChart(document.getElementById("graph"));
                        chart.draw(data, options);
                    });
                    break;
                case "BubbleChart":
                    // Areas = 5
                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        //        var data = google.visualization.arrayToDataTable([datosGrafica)

                        var options = {
                            'title': default_options.title,
                            'width': '400px', 'height': 'auto',
                        };
                        var chart = new google.visualization.BubbleChart(document.getElementById("graph"));
                        chart.draw(data, options);
                    });
                    break;
                case "CandlestickChart":
                    // Velas = 7
                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        //        var data = google.visualization.arrayToDataTable([datosGrafica)

                        var options = {
                            'title': default_options.title,
                            'width': '400px', 'height': 'auto',
                        };
                        var chart = new google.visualization.CandlestickChart(document.getElementById("graph"));
                        chart.draw(data, options);
                    });
                    break;
                case "PieChart_dona":
                    // Donas = 6 es igual a PieChart solo que tiene pieHole
                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        //        var data = google.visualization.arrayToDataTable([datosGrafica)

                        var options = {
                            'title': default_options.title,
                            'pieHole': 0.4,
                            'width': '400px', 'height': 'auto',
                        };
                        var chart = new google.visualization.PieChart(document.getElementById("graph"));
                        chart.draw(data, options);
                    });
                    break;
                case "SteppedAreaChart":
                    // area escalonada = 9
                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        //        var data = google.visualization.arrayToDataTable([datosGrafica)

                        var options = {
                            'title': default_options.title,
                            'width': '400px', 'height': 'auto',
                        };
                        var chart = new google.visualization.SteppedAreaChart(document.getElementById("graph"));
                        chart.draw(data, options);
                    });
                    break;
                case "ScatterChart":
                    // Tendencia = 10
                    google.charts.setOnLoadCallback(function () {
                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        //        var data = google.visualization.arrayToDataTable([datosGrafica)

                        var options = {
                            'title': default_options.title,
                            'width': '400px', 'height': 'auto',
                        };
                        var chart = new google.visualization.ScatterChart(document.getElementById("graph"));
                        chart.draw(data, options);
                    });
                    break;
                case "Table":


                    // Regilla de datos
                    google.charts.load('current', {'packages': ['table']});
                    google.charts.setOnLoadCallback(function () {

                        var data = google.visualization.arrayToDataTable(datosGrafica);
                        var contenedor = document.getElementById("graph");
                        var chart = new google.visualization.Table(document.getElementById("graph"));
                        //datospantalla[idSeccion] = data;
                        //  chart.draw(datospantalla[idSeccion], { showRowNumber: false, backgroundColor: 'transparent' });
                        chart.draw(data, {showRowNumber: false, backgroundColor: 'transparent'});
                    });
                    break;
                case "TableInt":

                        google.charts.load('current', {'packages':
                                ['corechart', 'controls']});
                    var contenedor = document.getElementById("graph");
                    var tipografico = 'Table';
                    var data = google.visualization.arrayToDataTable(datosGrafica);
                    google.charts.setOnLoadCallback(dibujargrafico);
                    function dibujargrafico() {


                        var dashboard = new google.visualization.Dashboard(document.getElementById("graph"));
                        //    var data = google.visualization.arrayToDataTable(datosGrafica);


                        // Omito "var" para que programmaticSlider esté visible para cambio de rango.

                        visualizacion = new google.visualization.ChartWrapper({
                            'chartType': 'Table',
                            'containerId': 'programatico',
                            'options': {
                                'legend': 'boton',
                                'width': 1100,
                                'height': 500,
                                'legend': 'label',
                                'chartArea': {'left': 15, 'top': 15, 'right': 0, 'bottom': 0},
                                'pieSliceText': 'value',
                                page: 'enable',
                                pageSize: 20,
                                pagingSymbols: {
                                    prev: 'Anterior',
                                    next: 'Siguiente'
                                },
                            }
                        });
                        programmaticSlider = new google.visualization.ControlWrapper({
                            'controlType': 'CategoryFilter',
                            'containerId': 'catfilter0',
                            'options': {
                                'filterColumnIndex': '0',
                                'ui': {
                                    'labelStacking': 'vertical',
                                    'allowTyping': false,
                                    'allowMultiple': false
                                }
                            }
                        });
                        programmaticSlider1 = new google.visualization.ControlWrapper({
                            'controlType': 'CategoryFilter',
                            'containerId': 'catfilter1',
                            'options': {
                                'filterColumnIndex': '1',
                                'ui': {
                                    'labelStacking': 'vertical',
                                    'allowTyping': false,
                                    'allowMultiple': false
                                }
                                //	, 				'caption' : 'Seleccione lugar'}
                            }
                        });
                        programmaticSlider2 = new google.visualization.ControlWrapper({
                            'controlType': 'CategoryFilter',
                            'containerId': 'catfilter2',
                            'options': {
                                'filterColumnIndex': '2',
                                'ui': {
                                    'labelStacking': 'vertical',
                                    'allowTyping': false,
                                    'allowMultiple': false
                                }
                                //	, 				'caption' : 'Seleccione lugar'}
                            }
                        });
                        var slider = new google.visualization.ControlWrapper({
                            'controlType': 'NumberRangeFilter',
                            'containerId': 'NumRanFilter0',
                            'options': {
                                'filterColumnIndex': '3',
                                'ui': {'labelStacking': 'vertical'}
                            }
                        });
                        var stringFilter = new google.visualization.ControlWrapper({
                            'controlType': 'StringFilter',
                            'containerId': 'StrFilter0',
                            'options': {
                                // 'filterColumnLabel': 'Name',
                                'filterColumnIndex': '0',
                                'ui': {'labelStacking': 'vertical'}

                            }
                        });
                        var stringFilter1 = new google.visualization.ControlWrapper({
                            'controlType': 'StringFilter',
                            'containerId': 'StrFilter1',
                            'options': {
                                'filterColumnIndex': '1',
                                'ui': {'labelStacking': 'vertical'}

                            }
                        });
                        new google.visualization.Dashboard(document.getElementById('graph'))
                                .bind(programmaticSlider, programmaticSlider1)
                                .bind(programmaticSlider1, programmaticSlider2)
                                .bind(programmaticSlider2, stringFilter)
                                .bind(stringFilter, stringFilter1)
                                .bind(stringFilter1, slider)
                                .bind(slider, visualizacion)
                                .draw(data);
                    }
                    ;
                    break;
                default:
                    alert("No existe el tipo de grafica seleccionada");
            }
        }

        init();
    };

})(jQuery);