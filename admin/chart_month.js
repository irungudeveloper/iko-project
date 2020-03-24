$(document).ready(function(){
  $.ajax({
    url: "monthsales.php",
    method: "GET",
    success: function(data) {
      console.table(data);

      var js_data = JSON.parse(data);

      console.table(js_data);

      var sale_month = [];
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

        sale_month.push(js_data[i].month);
        sale.push(p_sale);

      }

      var chartdata = {
        labels: sale_month,
        datasets : [
          {
            label: 'Monthly Sales',
             borderColor: "#3e95cd",
             // backgroundColor:"#3e95fd"
            data:sale
          }
        ]
      };

      var ctx = $("#myChart2");

      var barGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata
      });
    },
    error: function(data) {
      // console.log(data);
    }
  });
});