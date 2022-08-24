<template>
  <div>
    <apexchart type="bar" width="500" :options="chartOptions" :series="graph"></apexchart>
  </div>
</template >

<script>
import VueApexCharts from "vue3-apexcharts";

export default {
  components:{
    apexchart: VueApexCharts
  },
  props:["graph"],
  data(){
    return{
      series: [],
      chartOptions: {
        tooltip: {
          theme: 'dark',
          y: {
            title: {
              formatter: function (val) {
                return val
                .includes("series-1")? "Com" : "Sem"
              }
            }
          },
          
        },
        colors: ['#33b2df', '#c40233'],
        labels: ['Sobrenome', 'Genero', 'Email'],
        legend: {
          show: true,
          showForSingleSeries: true,
          customLegendItems: ['Com', 'Sem'],
          markers: {
            fillColors: ['#00E396', '#775DD0']
          }
        }
      }
    }
  },
}
</script>