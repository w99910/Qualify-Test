<template>
        <div class="w-full h-full flex flex-col items-center justify-evenly">
            <label for="select"><select id="select" @change="change($event)" class="focus:outline-none p-1">
                <option value="CrudeRate">Crude Suicide Rates</option>
                <option value="ExpectBirth">Expect Birth</option>
                <option value="Doctor">Medical Doctors</option>
                <option value="Nurse">Nurse and Mid-Wife</option>
                <option value="Pharmacists">Pharmacists</option>
            </select></label>
          <div class="w-full h-full flex">
            <div class="flex flex-col w-1/2 h-full justify-around">
                <div id="container" class="w-full h-1/2 p-4"></div>
                <div id="container-1" class="w-full h-1/2 p-4"></div>
                </div>
              <div class="w-1/2 h-full p-1 flex flex-col">
               <div class="w-full flex justify-evenly my-1">
                   <button v-for="i in currentPeriod" class="focus:outline-none" @click="ChangeMap(i);">{{i}}</button>
               </div>
                   <div class="w-full h-full p-1" id="map-container"></div>
              </div>
          </div>

        </div>
</template>

<script>
let barchart,column_chart,mapChart;
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
          currentPeriod:[],
          CrudeRate:{
              name:'',
              title:'',
              categories:[],
              data:[],
              mapData:[],
              years:[],
          },
          Doctor:{
              name:'',
              title:'',
              categories:[],
              data:[],
              mapData:[],
              years:[],
          },
          Nurse:{
              name:'',
              title:'',
              categories:[],
              data:[],
              mapData:[],
              years:[],
          },

          ExpectBirth:{
              name:'',
              title:'',
              categories:[],
              data:[],
              mapData:[],
              years:[],
          },
          Pharmacists:{
              name:'',
              title:'',
              categories:[],
              data:[],
              mapData:[],
              years:[],
          },
      }
    },
    methods:{
        ChangeMap(year){
          console.log(this.current.mapData)
                mapChart.series[0].setData(this.current.mapData[year],false);
                mapChart.series[0].update({name:year},false);
            mapChart.redraw(false);
        },
        change(event){
            switch(event.target.value) {
                case 'ExpectBirth': this.ChangeExpectBirthChart();break;
                case 'CrudeRate'  : this.ChangeCrudeBirthChart();break;
                case 'Doctor'     : this.ChangeDoctorChart();break;
                case 'Nurse'      : this.ChangeNurseChart();break;
                case 'Pharmacists': this.ChangePharmacistsChart();break;
            }
           },
        ChangeExpectBirthChart(){
            this.current=this.ExpectBirth;
            this.currentPeriod=this.ExpectBirth.years;
            this.ChangeMap(this.currentPeriod[0]);
            for (let i = barchart.series.length-1; i>=0; i--) {
                barchart.series[i].remove();
            }
            for (let y = this.ExpectBirth.data.length-1; y >= 0; y--) {
                barchart.addSeries(this.ExpectBirth.data[y],false,false);
            }
            barchart.title.update({text: this.ExpectBirth.title}, false);
            barchart.xAxis[0].update({
                categories:this.ExpectBirth.categories,
            })
            barchart.redraw(false);
            for (let i = column_chart.series.length-1; i>=0; i--) {
                column_chart.series[i].remove();
            }
            for (let y = this.ExpectBirth.data.length-1; y >= 0; y--) {
                column_chart.addSeries(this.ExpectBirth.data[y],false,false);
            }
            column_chart.title.update({text: this.ExpectBirth.title}, false);
            column_chart.xAxis[0].update({
                categories:this.ExpectBirth.categories,
            })
            column_chart.redraw(false);
        },
        ChangeCrudeBirthChart(){
            this.current=this.CrudeRate;
            this.currentPeriod=this.CrudeRate.years;
            this.ChangeMap(this.currentPeriod[0]);
            for (let i = barchart.series.length-1; i>=0; i--) {
                barchart.series[i].remove();
            }
            for (let y = this.CrudeRate.data.length-1; y >= 0; y--) {
                barchart.addSeries(this.CrudeRate.data[y],false,false);
            }
            barchart.title.update({text: this.CrudeRate.title}, false);
            barchart.xAxis[0].update({
                categories:this.CrudeRate.categories,
            })
            barchart.redraw(false);
            for (let i = column_chart.series.length-1; i>=0; i--) {
                column_chart.series[i].remove();
            }
            for (let y = this.CrudeRate.data.length-1; y >= 0; y--) {
                column_chart.addSeries(this.CrudeRate.data[y],false,false);
            }

            column_chart.title.update({text: this.CrudeRate.title}, false);
            column_chart.xAxis[0].update({
                categories:this.CrudeRate.categories,
            })
            column_chart.redraw(false);
        },
        ChangeDoctorChart(){
            this.current=this.Doctor;
            this.currentPeriod=this.Doctor.years;
            this.ChangeMap(this.currentPeriod[0]);
            for (let i = barchart.series.length-1; i>=0; i--) {
                barchart.series[i].remove();
            }
            for (let y = this.Doctor.data.length-1; y >= 0; y--) {
                barchart.addSeries(this.Doctor.data[y],false,false);
            }
            barchart.title.update({text: this.Doctor.title}, false);
            barchart.xAxis[0].update({
                categories:this.Doctor.categories,
            })
            barchart.redraw(false);
            for (let i = column_chart.series.length-1; i>=0; i--) {
                column_chart.series[i].remove();
            }
            for (let y = this.Doctor.data.length-1; y >= 0; y--) {
                column_chart.addSeries(this.Doctor.data[y],false,false);
            }

            column_chart.title.update({text: this.Doctor.title}, false);
            column_chart.xAxis[0].update({
                categories:this.Doctor.categories,
            })
            column_chart.redraw(false);
        },
        ChangeNurseChart(){
            this.current=this.Nurse;
            this.currentPeriod=this.Nurse.years;
            this.ChangeMap(this.currentPeriod[0]);
            for (let i = barchart.series.length-1; i>=0; i--) {
                barchart.series[i].remove();
            }
            for (let y = this.Nurse.data.length-1; y >= 0; y--) {
                barchart.addSeries(this.Nurse.data[y],false,false);
            }
            barchart.title.update({text: this.Nurse.title}, false);
            barchart.xAxis[0].update({
                categories:this.Nurse.categories,
            })
            barchart.redraw(false);
            for (let i = column_chart.series.length-1; i>=0; i--) {
                column_chart.series[i].remove();
            }
            for (let y = this.Nurse.data.length-1; y >= 0; y--) {
                column_chart.addSeries(this.Nurse.data[y],false,false);
            }

            column_chart.title.update({text: this.Nurse.title}, false);
            column_chart.xAxis[0].update({
                categories:this.Nurse.categories,
            })
            column_chart.redraw(false);
        },
        ChangePharmacistsChart(){
            this.current=this.Pharmacists;
            this.currentPeriod=this.Pharmacists.years;
            this.ChangeMap(this.currentPeriod[0]);
            for (let i = barchart.series.length-1; i>=0; i--) {
                barchart.series[i].remove();
            }
            for (let y = this.Pharmacists.data.length-1; y >= 0; y--) {
                barchart.addSeries(this.Pharmacists.data[y],false,false);
            }
            barchart.title.update({text: this.Pharmacists.title}, false);
            barchart.xAxis[0].update({
                categories:this.Pharmacists.categories,
            })
            barchart.redraw(false);
            for (let i = column_chart.series.length-1; i>=0; i--) {
                column_chart.series[i].remove();
            }
            for (let y = this.Pharmacists.data.length-1; y >= 0; y--) {
                column_chart.addSeries(this.Pharmacists.data[y],false,false);
            }

            column_chart.title.update({text: this.Pharmacists.title}, false);
            column_chart.xAxis[0].update({
                categories:this.Pharmacists.categories,
            })
            column_chart.redraw(false);
        },
        async ProcessMapChart(data){
            let array=[];
            let country_code=['bn','kh','id','la','my','mm','ph','sg','th','vn'];
            for(let index of data){
                  let temp=[];

                 for(let [i,value] of index.data.entries()){
                     temp.push([country_code[i],value]);
                 }
                  array[index.name]=temp;
              }
            return array;
        },
      async ProcessCrudeRate(){
          let data = await axios.post('crude_rates').then(async(res)=> {
              this.CrudeRate.name=res.data.name;
              this.CrudeRate.data=res.data.data;
              this.CrudeRate.title=res.data.title;
              this.CrudeRate.categories=res.data.categories;
              this.CrudeRate.years=res.data.years;
              this.CrudeRate.mapData=await this.ProcessMapChart(this.CrudeRate.data);
              this.currentPeriod=this.CrudeRate.years;
              return 'finish';
          });
          return 'finish';
         },
        ProcessExpectBirth(){
           axios.post('expect_births').then(async(res)=> {
               this.ExpectBirth.name=res.data.name;
               this.ExpectBirth.data=res.data.data;
               this.ExpectBirth.title=res.data.title;
               this.ExpectBirth.categories=res.data.categories;
               this.ExpectBirth.years=res.data.years;
               this.ExpectBirth.mapData=await this.ProcessMapChart(this.ExpectBirth.data);

               return 'finish';
           });
        },
        ProcessDoctor() {
            axios.post('/doctors').then(async (res) => {
                this.Doctor.name = res.data.name;
                this.Doctor.data = res.data.data;
                this.Doctor.title = res.data.title;
                this.Doctor.categories = res.data.categories;
                this.Doctor.years=res.data.years;
                this.Doctor.mapData=await this.ProcessMapChart(this.Doctor.data);

                return 'finish';
            });
        },
        ProcessNurse(){
            axios.post('nurses').then(async(res)=>{
             this.Nurse.name=res.data.name;
             this.Nurse.data=res.data.data;
             this.Nurse.title=res.data.title;
             this.Nurse.categories=res.data.categories;
             this.Nurse.years=res.data.years;
             this.Nurse.mapData=await this.ProcessMapChart(this.Nurse.data);
             return 'finish';
         });
        },
        ProcessPharmacists(){
            axios.post('pharmacists').then(async(res)=>{
                this.Pharmacists.name=res.data.name;
                this.Pharmacists.data=res.data.data;
                this.Pharmacists.title=res.data.title;
                this.Pharmacists.categories=res.data.categories;
                this.Pharmacists.years=res.data.years;
                this.Pharmacists.mapData=await this.ProcessMapChart(this.Pharmacists.data);
                return 'finish';
            });
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
        async MapChart(){
            let data1 = await axios.post('asia').then(async(res)=>{
                return res.data;
            });
            var data = [
                ['ph', 1],   //Philippines - ph
                ['th', 5],  // Thailand -th
                ['mm', 13],  //myanmar - mm
                ['id', 14],  //indonesia - id
                ['sg', 15],   //singapore -sg
                ['my', 18],  //Malaysia - my
                ['vn', 21],   //Vietnam - vn
                ['kh', 25],      //Cambodia - kh
                ['la', 38],     //Laos - la
                ['bn', 43],    //Brunei - bn
            ];
// Create the chart
           if(await data1) {
               console.log(this.currentPeriod);
              mapChart =  HighMaps.mapChart('map-container', {
                   chart: {
                       map: asia_map,//asia_map
                   },

                   title: {
                       text: 'Highmaps basic demo'
                   },
                   mapNavigation: {
                       enabled: true,
                       buttonOptions: {
                           verticalAlign: 'bottom'
                       }
                   },

                   colorAxis: {
                       min: 0
                   },

                   series: [{
                       data: this.current.mapData[this.currentPeriod[0]],
                       name: this.currentPeriod[0],
                       states: {
                           hover: {
                               color: '#BADA55'
                           }
                       },
                   }]
               });
           }
        },
       async Render(){
           await this.ProcessExpectBirth();
          await this.ProcessDoctor();
          await this.ProcessNurse();
          await this.ProcessPharmacists();
          await this.MapChart();
            console.log('CrudeRate:',this.CrudeRate.mapData );
            console.log('ExpectBirth:',this.ExpectBirth.mapData );
            console.log('Doctor:',this.Doctor.mapData   );
            console.log('Nurse:',this.Nurse.mapData );
            console.log('Pharmacists:',this.Pharmacists.mapData );

        }

    },
   mounted(){
       this.MakeHighChart();
         this.Render();
   },
}
</script>

<style scoped>

</style>
