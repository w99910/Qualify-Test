<template>
        <div class="w-full h-full flex flex-col items-center justify-evenly">
            <label for="select"><select id="select" @change="change($event)">
                <option value="CrudeRate">Crude Suicide Rates</option>
                <option value="ExpectBirth">Expect Birth</option>
            </select></label>
          <div class="w-full h-full">
            <div class="flex w-full h-full justify-around">
                <div id="container" class="w-5/12 h-full"></div>
                <div id="container-1" class="w-5/12 h-full"></div></div>
          </div>
        </div>
</template>

<script>
let barchart,column_chart;
import vClickOutside from 'v-click-outside'
export default {
    directives: {
        clickOutside: vClickOutside.directive
    },
name: "Home",
    data(){
      return {
          a:'Blah blah',
          barChart:'',
          current:{
              Type:Object,
          },
          CrudeRate:{
              name:'',
              title:'',
              categories:[],
              data:[
                  {
                      name:'Brunei Darussalam',
                      data:[]
                  },
                  {
                      name:'Cambodia',
                      data:[]
                  },
                  {
                      name:'Indonesia',
                      data:[]
                  },
                  {
                      name:'Lao People\'s Democratic Republic',
                      data:[]
                  },
                  {
                      name:'Malaysia',
                      data:[]
                  },{
                      name:'Myanmar',
                      data:[]
                  },{
                      name:'Philippines',
                      data:[]
                  },
                  {
                      name:'Singapore',
                      data:[]
                  },
                  {
                      name:'Thailand',
                      data:[]
                  },
                  {
                      name:'Viet Nam',
                      data:[]
                  },
              ],
          },
          ExpectBirth:{
              name:'',
              title:'',
              categories:[],
              data:[
                  {
                      name:'Brunei Darussalam',
                      data:[]
                  },
                  {
                      name:'Cambodia',
                      data:[]
                  },
                  {
                      name:'Indonesia',
                      data:[]
                  },
                  {
                      name:'Lao People\'s Democratic Republic',
                      data:[]
                  },
                  {
                      name:'Malaysia',
                      data:[]
                  },{
                      name:'Myanmar',
                      data:[]
                  },{
                      name:'Philippines',
                      data:[]
                  },
                  {
                      name:'Singapore',
                      data:[]
                  },
                  {
                      name:'Thailand',
                      data:[]
                  },
                  {
                      name:'Viet Nam',
                      data:[]
                  },
              ],
          },
      }
    },
    methods:{
       async change(event){
            switch(event.target.value) {
                case 'ExpectBirth':
                    for (let i = barchart.series.length-1; i>=0; i--) {
                        barchart.series[i].remove();
                    }
                    for (let y = this.ExpectBirth.data.length-1; y >= 0; y--) {
                        barchart.addSeries(this.ExpectBirth.data[y],false,false);
                    }
                    barchart.title.update({text: this.ExpectBirth.title}, false);
                 let finish = await barchart.redraw(false);
                    for (let i = column_chart.series.length-1; i>=0; i--) {
                        column_chart.series[i].remove();
                    }
                    for (let y = this.ExpectBirth.data.length-1; y >= 0; y--) {
                        column_chart.addSeries(this.ExpectBirth.data[y],false,false);
                    }
                    column_chart.title.update({text: this.ExpectBirth.title}, false);
                    column_chart.redraw(false);break;
            case 'CrudeRate':
                for (let i = barchart.series.length-1; i>=0; i--) {
                    barchart.series[i].remove();
                }
                for (let y = this.CrudeRate.data.length-1; y >= 0; y--) {
                    barchart.addSeries(this.CrudeRate.data[y],false,false);
                }
                barchart.title.update({text: this.CrudeRate.title}, false);
                barchart.redraw(false);
                for (let i = column_chart.series.length-1; i>=0; i--) {
                    column_chart.series[i].remove();
                }
                for (let y = this.CrudeRate.data.length-1; y >= 0; y--) {
                    column_chart.addSeries(this.CrudeRate.data[y],false,false);
                }

                column_chart.title.update({text: this.ExpectBirth.title}, false);
                column_chart.redraw(false);break;
            }
           },
      async ProcessCrudeRate(){
           let data=await axios.post('/crude_rates').then(async(res)=>{
               this.CrudeRate.categories=res.data.categories;
               let data=res.data;
                let result=await Object.keys(data.data).map((key)=>{
                    this.CrudeRate.name=data.columns[data.columns.length-1];
                    for (let k of data.data[key]) {
                        this.CrudeRate.title=k.indicator;
                        switch (k.location) {
                            case 'Brunei Darussalam':
                                this.CrudeRate.data[0].data.push(parseFloat(k.Tooltip));
                                break;
                            case 'Cambodia':
                                this.CrudeRate.data[1].data.push(parseFloat(k.Tooltip));
                                break;
                            case 'Indonesia':
                                this.CrudeRate.data[2].data.push(parseFloat(k.Tooltip));
                                break;
                            case "Lao People's Democratic Republic":
                                this.CrudeRate.data[3].data.push(parseFloat(k.Tooltip));
                                break;
                            case "Malaysia":
                                this.CrudeRate.data[4].data.push(parseFloat(k.Tooltip));
                                break;
                            case "Myanmar":
                                this.CrudeRate.data[5].data.push(parseFloat(k.Tooltip));
                                break;
                            case "Philippines":
                                this.CrudeRate.data[6].data.push(parseFloat(k.Tooltip));
                                break;
                            case "Singapore":
                                this.CrudeRate.data[7].data.push(parseFloat(k.Tooltip));
                                break;
                            case "Thailand":
                                this.CrudeRate.data[8].data.push(parseFloat(k.Tooltip));
                                break;
                            case "Viet Nam":
                                this.CrudeRate.data[9].data.push(parseFloat(k.Tooltip));

                                break;
                        }
                    }
                });
                return result;
            })
           return data;
         },
       async ProcessExpectBirth(){
          let data=await axios.post('/expect_births').then(async(res)=>{
              this.ExpectBirth.categories=res.data.categories;
              let data=res.data;
                let result=await Object.keys(data.data).map((key)=>{
                    this.ExpectBirth.name=data.columns[data.columns.length-1];
                    for (let k of data.data[key]) {
                        this.ExpectBirth.title=k.indicator;
                        switch (k.location) {
                            case 'Brunei Darussalam':
                                this.ExpectBirth.data[0].data.push(parseFloat(k.Tooltip));
                                break;
                            case 'Cambodia':
                                this.ExpectBirth.data[1].data.push(parseFloat(k.Tooltip));
                                break;
                            case 'Indonesia':
                                this.ExpectBirth.data[2].data.push(parseFloat(k.Tooltip));
                                break;
                            case "Lao People's Democratic Republic":
                                this.ExpectBirth.data[3].data.push(parseFloat(k.Tooltip));
                                break;
                            case "Malaysia":
                                this.ExpectBirth.data[4].data.push(parseFloat(k.Tooltip));
                                break;
                            case "Myanmar":
                                this.ExpectBirth.data[5].data.push(parseFloat(k.Tooltip));
                                break;
                            case "Philippines":
                                this.ExpectBirth.data[6].data.push(parseFloat(k.Tooltip));
                                break;
                            case "Singapore":
                                this.ExpectBirth.data[7].data.push(parseFloat(k.Tooltip));
                                break;
                            case "Thailand":
                                this.ExpectBirth.data[8].data.push(parseFloat(k.Tooltip));
                                break;
                            case "Viet Nam":
                                this.ExpectBirth.data[9].data.push(parseFloat(k.Tooltip));
                                break;
                        }
                    }
                });
                return result;
            })
             return data;
        },
       async MakeHighChart(){
            let result=await this.ProcessCrudeRate();
           if(await result){
                this.current=this.CrudeRate;
               barchart = Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: this.current.title,
                    },
                    xAxis: {
                        categories:this.current.categories,
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: this.current.name,
                        },
                    },
                    tooltip: {
                        headerFormat: '<b>{point.x}</b><br/>',
                        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
                    },
                    plotOptions: {
                        column: {
                            stacking: 'normal',
                        }
                    },
                    series: this.current.data
                });
               column_chart= Highcharts.chart('container-1', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: this.current.title
                    },
                    xAxis: {
                        categories: this.current.categories,
                        crosshair: true,
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: this.current.name,
                        },
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: this.current.data
                });
            }
        },
        UpdateChart(){

        }
    },
   mounted(){
       this.MakeHighChart();
       this.ProcessExpectBirth();

   },
}
</script>

<style scoped>

</style>
