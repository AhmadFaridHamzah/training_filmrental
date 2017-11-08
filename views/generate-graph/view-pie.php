<div id="container"></div>


<?php

	$this->registerJsFile(

		'@web/js/highchart/highcharts.js',

		['depends'=>[\yii\web\JqueryAsset::className()]]

	);


	$this->registerJsFile(

		'@web/js/highchart/exporting.js',

		['depends'=>[\yii\web\JqueryAsset::className()]]

	);


	$script = <<< JS

	$(document).ready(function(){

		Highcharts.chart('container', {
		    chart: {
		        plotBackgroundColor: null,
		        plotBorderWidth: null,
		        plotShadow: false,
		        type: 'pie'
		    },
		    title: {
		        text: 'Browser market shares January, 2015 to May, 2015'
		    },
		    tooltip: {
		        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		    },
		    plotOptions: {
		        pie: {
		            allowPointSelect: true,
		            cursor: 'pointer',
		            dataLabels: {
		                enabled: true,
		                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
		                style: {
		                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
		                }
		            }
		        }
		    },
		    series: [{
		        name: 'Brands',
		        colorByPoint: true,
		        data: $language_json
		    }]
		});


	});

JS;

$this->registerJs($script);
?>