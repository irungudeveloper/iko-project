$(document).ready(function(){
  $.ajax({
    url: "chart.php",
    method: "GET",
    success: function(data) {
      console.table(data);

      var js_data = JSON.parse(data);

      console.table(js_data);

      var title = [];
      var sale = [];
      var p_sale;
      for(var i in js_data){

          if (js_data[i].sales == null) 
          {

            p_sale = 0;

          } else
          {

            p_sale = js_data[i].sales; 

          }

        title.push(js_data[i].title);
        sale.push(p_sale);

      }

      var chartdata = {
        labels: title,
        datasets : [
          {
            label: 'Products',
             backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data:sale
          }
        ]
      };

      var ctx = $("#myChart");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata
      });
    },
    error: function(data) {
      // console.log(data);
    }
  });
});