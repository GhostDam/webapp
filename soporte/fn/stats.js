//===================carga
$(document).ready(function(){
  $.ajax({
    url:'fn/stats.php',
    dataType:'json',
    type:'POST',
    data:{to:'primera_grafica'}
  })
  .done(function(graphics){
    if (graphics=='Sin Resultados') {
      console.log(graphics)
      $("#total").append(`<p>${graphics}</p>`)
      return false
    }
    //cuando carga los reportes, crea las areas en las que hay
    for (var i = 0; i < graphics.length; i++) {
      $("#areaList").append(`<option>${graphics[i]['name']}</option>`)
    }
    //cuando carga los reportes, crea las areas en las que hay

    var chart = new CanvasJS.Chart("total", {
    	exportEnabled: true,
    	animationEnabled: false,
    	title:{
    		text: "Total historico de reportes por area"
    	},
    	legend:{
    		cursor: "pointer",
    		itemclick: explodePie
    	},
    	data: [{
    		type: "pie",
    		showInLegend: true,
    		toolTipContent: "{name}: <strong>{y}</strong>",
    		indexLabel: "{name} - {y}",
    		dataPoints: graphics
    	}]
    });
    var sum = 0;
    for( var i = 0; i < chart.options.data[0].dataPoints.length; i++ ) {
        sum += chart.options.data[0].dataPoints[i].y;
    }
    console.log(sum)
    chart.render();
    function explodePie (e) {
    	if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
    		e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
    	} else {
    		e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
    	}
    	e.chart.render();
    }
  })
})
//===================carga
//===================rango
$(document).on('click', "#consulta_fecha", function(){
  let val1 = $("input[name='init']").val()
  let val2 = $("input[name='fin']").val()
console.log(val1, val2)
    $.ajax({
    url:'fn/stats.php',
    dataType:'json',
    type:'POST',
    data:{to:'rango_fechas', val1:val1, val2:val2}
  })
  .done(function(range){
    $("#rango").html(range)
    if (range!=='Sin resultados') {

    var chart = new CanvasJS.Chart("rango", {
      exportEnabled: true,
      animationEnabled: false,
      title:{
        text: `Reportes desde ${val1} hasta ${val2}`
      },
      legend:{
        cursor: "pointer",
        itemclick: explodePie
      },
      data: [{
        type: "pie",
        showInLegend: true,
        toolTipContent: "{name}: <strong>{y}</strong>",
        indexLabel: "{name} - {y}",
        dataPoints: range
      }]
    });
    let sum = 0;
    for( var i = 0; i < chart.options.data[0].dataPoints.length; i++ ) {
        sum += chart.options.data[0].dataPoints[i].y;
    }
    console.log(sum)
    chart.render();
    function explodePie (e) {
      if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
      } else {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
      }
      e.chart.render();
    }

  }

  })
  .fail(function(response){
    console.error(response.responseText);
  });
})
//===================rango
//===================area
$(document).on('change', "#areaList", function(){
  let val = $(this).val()
  console.log(val)
    $.ajax({
    url:'fn/stats.php',
    dataType:'json',
    type:'POST',
    data:{to:'area', val:val}
  })
  .done(function(area){

    $("#stats_area").html(area)
    if (area!=='Sin resultados') {

    var chart = new CanvasJS.Chart("stats_area", {
      exportEnabled: true,
      animationEnabled: false,
      title:{
        text: `Reportes de ${val} `
      },
      legend:{
        cursor: "pointer",
        itemclick: explodePie
      },
      data: [{
        type: "pie",
        showInLegend: true,
        toolTipContent: "{name}: <strong>{y}</strong>",
        indexLabel: "{name} - {y}",
        dataPoints: area
      }]
    });
    let sum = 0;
    for( var i = 0; i < chart.options.data[0].dataPoints.length; i++ ) {
        sum += chart.options.data[0].dataPoints[i].y;
    }
    console.log(sum)
    chart.render();
    function explodePie (e) {
      if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
      } else {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
      }
      e.chart.render();
    }

  }

  })
  .fail(function(response){
    console.error(response.responseText);
  });
})

//===================area
