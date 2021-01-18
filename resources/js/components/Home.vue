<template>
        <div class="w-full relative h-full py-5 px-2 flex flex-col sm:flex-row items-center justify-center bg-primary dark:bg-dark-primary">
            <div class="absolute z-20 top-0 left-0 w-full bg-primary h-full flex items-center justify-center" v-show="pageLoading">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="512px" height="512px" class="w-10 h-10 animate-spin text-dark-primary fill-current" viewBox="0 0 512 512" xml:space="preserve"><path d="M479.8 226.1c-1.4-8.7-3.1-17.3-5.3-25.8-2.8-10.8-6.4-21.5-10.8-31.8-8.9-21.2-21.1-41-35.9-58.6-16-18.9-35.3-35.2-56.7-47.7C350 49.8 327 41 303 36.1c-12.4-2.5-24.9-4-37.6-4.1-9.9-.1-19.8.3-29.6 1.2-25.5 2.5-50.7 9.6-73.9 20.5-19.9 9.4-38.4 21.6-54.8 36.2-16.4 14.6-30.7 31.6-42.2 50.3-12.7 20.8-22.2 43.5-27.4 67.3-4.2 19-6.2 38.6-5.2 58.1.9 18.9 3.8 37.8 9.5 55.9 3.6 11.5 7.9 22.7 13.3 33.6 5.3 10.7 11.5 21 18.4 30.7 13.8 19.3 30.6 36.4 49.8 50.5 19.6 14.5 41.7 25.7 64.9 33.1 24.2 7.7 49.9 11.3 75.3 10.4 24.8-.8 49.4-5.6 72.6-14.5 22.3-8.6 43.2-20.9 61.5-36.3 9.2-7.8 17.4-16.6 25.1-25.9 7.8-9.4 14.8-19.3 20.6-30 5-9.2 9.2-18.8 12.8-28.5 1.8-4.8 3.5-9.6 4.9-14.6 1.5-5.3 2.6-10.8 3.6-16.2 1.5-8.5 2.1-17.3 1.3-25.9-.7 3.8-1.3 7.5-2.2 11.2-1.1 4.3-2.5 8.5-4.1 12.6-3.2 8.7-7.2 17.1-11 25.5-4.9 10.7-10.6 20.9-16.8 30.8-3.2 5.1-6.5 10.1-10.1 14.9-3.6 4.8-7.7 9.4-11.8 13.9-8.2 9.1-17.1 17.2-27 24.4-10.1 7.4-20.8 13.9-32.1 19.3-22.6 11-47.3 17.6-72.3 19.8-25.6 2.2-51.7-.3-76.3-7.6-23.4-6.9-45.6-18.1-65.1-32.8-18.9-14.3-35.3-31.9-48.2-51.8C75.4 347.8 66.1 324.9 61 301c-1.3-6.2-2.3-12.6-3-18.9-.6-5.4-1.1-10.9-1.3-16.4-.3-11.3.4-23 2.1-34.2 3.7-24.6 11.7-48.3 24.1-69.9 11-19.3 25.3-36.7 42.1-51.4 16.8-14.8 36-26.7 56.8-35.1 12-4.9 24.6-8.5 37.4-10.9 6.5-1.2 13-2.2 19.5-2.7 3.2-.3 6.3-.3 9.5-.6 1.3 0 2.6.1 3.9.1 21.7-.4 43.5 2.4 64.2 8.9 22.3 7 43.3 18.3 61.5 33 19.1 15.4 35 34.4 47 55.8 10.2 18.2 17.5 37.8 21.9 58.2 1 4.7 1.8 9.4 2.6 14.1.7 4.3 3.1 8.3 6.8 10.7 7.8 5.2 18.7 1.7 22.5-6.7 1.3-2.9 1.7-6 1.2-8.9z"/></svg>

            </div>
            <div class="absolute top-0 border-b-2 border-gray-600 left-0 bg-white dark:bg-dark-secondary header w-full justify-between items-center flex sm:px-3 px-4 py-2 sm:py-4">
                <div class="w-full sm:w-1/2 flex flex-col sm:flex-row sm:pl-4">
                    <h1 class="font-bold text-2xl dark:text-dark-white">DashBoard</h1>
                    <div class="w-full sm:w-8/12 mt-1 sm:mt-0 flex justify-between sm:justify-evenly items-center">
                        <label for="select" v-show="!waitMapChart"><select id="select" @change="change($event)" class="focus:outline-none dark:p-0 sm:p-1 dark:bg-dark-secondary dark:text-dark-white">
                            <option value="CrudeRate">Crude Suicide Rates</option>
                            <option value="ExpectBirth">Expect Birth</option>
                            <option value="Doctor">Medical Doctors</option>
                            <option value="Nurse">Nurse and Mid-Wife</option>
                            <option value="Pharmacists">Pharmacists</option>
                        </select></label>
                        <div class="flex items-center">
                            <label for="checkbox" class="flex">
                                <input id="checkbox" type="checkbox" value="false" v-model="checkbox" />
                                <span class="check"></span>
                            </label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="w-full sm:w-1/2 h-full flex flex-col justify-between">
                <div class="h-20 sm:h-16 w-full"></div>
                <div class="flex flex-col w-full h-full justify-around">
                <div class="w-full h-full sm:h-1/2 flex px-4 py-2 items-center justify-center">
                   <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" v-show="waitBarChart" version="1.1" id="Layer_1" x="0px" y="0px" width="512px" height="512px" class="w-10 h-10 animate-spin text-blue-400 fill-current" viewBox="0 0 512 512" xml:space="preserve"><path d="M479.8 226.1c-1.4-8.7-3.1-17.3-5.3-25.8-2.8-10.8-6.4-21.5-10.8-31.8-8.9-21.2-21.1-41-35.9-58.6-16-18.9-35.3-35.2-56.7-47.7C350 49.8 327 41 303 36.1c-12.4-2.5-24.9-4-37.6-4.1-9.9-.1-19.8.3-29.6 1.2-25.5 2.5-50.7 9.6-73.9 20.5-19.9 9.4-38.4 21.6-54.8 36.2-16.4 14.6-30.7 31.6-42.2 50.3-12.7 20.8-22.2 43.5-27.4 67.3-4.2 19-6.2 38.6-5.2 58.1.9 18.9 3.8 37.8 9.5 55.9 3.6 11.5 7.9 22.7 13.3 33.6 5.3 10.7 11.5 21 18.4 30.7 13.8 19.3 30.6 36.4 49.8 50.5 19.6 14.5 41.7 25.7 64.9 33.1 24.2 7.7 49.9 11.3 75.3 10.4 24.8-.8 49.4-5.6 72.6-14.5 22.3-8.6 43.2-20.9 61.5-36.3 9.2-7.8 17.4-16.6 25.1-25.9 7.8-9.4 14.8-19.3 20.6-30 5-9.2 9.2-18.8 12.8-28.5 1.8-4.8 3.5-9.6 4.9-14.6 1.5-5.3 2.6-10.8 3.6-16.2 1.5-8.5 2.1-17.3 1.3-25.9-.7 3.8-1.3 7.5-2.2 11.2-1.1 4.3-2.5 8.5-4.1 12.6-3.2 8.7-7.2 17.1-11 25.5-4.9 10.7-10.6 20.9-16.8 30.8-3.2 5.1-6.5 10.1-10.1 14.9-3.6 4.8-7.7 9.4-11.8 13.9-8.2 9.1-17.1 17.2-27 24.4-10.1 7.4-20.8 13.9-32.1 19.3-22.6 11-47.3 17.6-72.3 19.8-25.6 2.2-51.7-.3-76.3-7.6-23.4-6.9-45.6-18.1-65.1-32.8-18.9-14.3-35.3-31.9-48.2-51.8C75.4 347.8 66.1 324.9 61 301c-1.3-6.2-2.3-12.6-3-18.9-.6-5.4-1.1-10.9-1.3-16.4-.3-11.3.4-23 2.1-34.2 3.7-24.6 11.7-48.3 24.1-69.9 11-19.3 25.3-36.7 42.1-51.4 16.8-14.8 36-26.7 56.8-35.1 12-4.9 24.6-8.5 37.4-10.9 6.5-1.2 13-2.2 19.5-2.7 3.2-.3 6.3-.3 9.5-.6 1.3 0 2.6.1 3.9.1 21.7-.4 43.5 2.4 64.2 8.9 22.3 7 43.3 18.3 61.5 33 19.1 15.4 35 34.4 47 55.8 10.2 18.2 17.5 37.8 21.9 58.2 1 4.7 1.8 9.4 2.6 14.1.7 4.3 3.1 8.3 6.8 10.7 7.8 5.2 18.7 1.7 22.5-6.7 1.3-2.9 1.7-6 1.2-8.9z"/></svg>
                   <div id="container" class="w-full h-full border-2 border-gray-600 dark:border-gray-300  bg-white dark:bg-dark-secondary flex items-center justify-center" v-show="!waitBarChart"></div>
               </div>
                <div class="w-full h-full sm:h-1/2 flex items-center p-4 justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" v-show="waitColumnChart" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="512px" height="512px" class="w-10 h-10 animate-spin text-red-400 fill-current" viewBox="0 0 512 512" xml:space="preserve"><path d="M479.8 226.1c-1.4-8.7-3.1-17.3-5.3-25.8-2.8-10.8-6.4-21.5-10.8-31.8-8.9-21.2-21.1-41-35.9-58.6-16-18.9-35.3-35.2-56.7-47.7C350 49.8 327 41 303 36.1c-12.4-2.5-24.9-4-37.6-4.1-9.9-.1-19.8.3-29.6 1.2-25.5 2.5-50.7 9.6-73.9 20.5-19.9 9.4-38.4 21.6-54.8 36.2-16.4 14.6-30.7 31.6-42.2 50.3-12.7 20.8-22.2 43.5-27.4 67.3-4.2 19-6.2 38.6-5.2 58.1.9 18.9 3.8 37.8 9.5 55.9 3.6 11.5 7.9 22.7 13.3 33.6 5.3 10.7 11.5 21 18.4 30.7 13.8 19.3 30.6 36.4 49.8 50.5 19.6 14.5 41.7 25.7 64.9 33.1 24.2 7.7 49.9 11.3 75.3 10.4 24.8-.8 49.4-5.6 72.6-14.5 22.3-8.6 43.2-20.9 61.5-36.3 9.2-7.8 17.4-16.6 25.1-25.9 7.8-9.4 14.8-19.3 20.6-30 5-9.2 9.2-18.8 12.8-28.5 1.8-4.8 3.5-9.6 4.9-14.6 1.5-5.3 2.6-10.8 3.6-16.2 1.5-8.5 2.1-17.3 1.3-25.9-.7 3.8-1.3 7.5-2.2 11.2-1.1 4.3-2.5 8.5-4.1 12.6-3.2 8.7-7.2 17.1-11 25.5-4.9 10.7-10.6 20.9-16.8 30.8-3.2 5.1-6.5 10.1-10.1 14.9-3.6 4.8-7.7 9.4-11.8 13.9-8.2 9.1-17.1 17.2-27 24.4-10.1 7.4-20.8 13.9-32.1 19.3-22.6 11-47.3 17.6-72.3 19.8-25.6 2.2-51.7-.3-76.3-7.6-23.4-6.9-45.6-18.1-65.1-32.8-18.9-14.3-35.3-31.9-48.2-51.8C75.4 347.8 66.1 324.9 61 301c-1.3-6.2-2.3-12.6-3-18.9-.6-5.4-1.1-10.9-1.3-16.4-.3-11.3.4-23 2.1-34.2 3.7-24.6 11.7-48.3 24.1-69.9 11-19.3 25.3-36.7 42.1-51.4 16.8-14.8 36-26.7 56.8-35.1 12-4.9 24.6-8.5 37.4-10.9 6.5-1.2 13-2.2 19.5-2.7 3.2-.3 6.3-.3 9.5-.6 1.3 0 2.6.1 3.9.1 21.7-.4 43.5 2.4 64.2 8.9 22.3 7 43.3 18.3 61.5 33 19.1 15.4 35 34.4 47 55.8 10.2 18.2 17.5 37.8 21.9 58.2 1 4.7 1.8 9.4 2.6 14.1.7 4.3 3.1 8.3 6.8 10.7 7.8 5.2 18.7 1.7 22.5-6.7 1.3-2.9 1.7-6 1.2-8.9z"/></svg>
                    <div id="container-1" class="w-full h-full border-2 border-gray-600 dark:border-gray-300  bg-white dark:bg-dark-secondary flex items-center justify-center" v-show="!waitColumnChart"></div>
                </div>
                </div>
            </div>
             <div class="w-full sm:w-1/2 h-full px-5 flex items-center justify-center">
              <div class="w-full py-2 z-10 h-full flex  flex-col bg-white dark:bg-dark-secondary dark:text-dark-white border-2 dark:border-gray-300 border-gray-600">
               <div class="w-full flex justify-evenly my-1">
                   <button v-for="i in currentPeriod" class="focus:outline-none" @click="ChangeMap(i);"><span :class="currentYear===i?'text-green-500':''">{{i}}</span></button>
               </div>
                  <div class="w-full h-full flex items-center justify-center border-none">
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" v-show="waitMapChart" id="Layer_1" x="0px" y="0px" width="512px" height="512px" class="w-10 h-10 animate-spin text-green-600 fill-current" viewBox="0 0 512 512" xml:space="preserve"><path d="M479.8 226.1c-1.4-8.7-3.1-17.3-5.3-25.8-2.8-10.8-6.4-21.5-10.8-31.8-8.9-21.2-21.1-41-35.9-58.6-16-18.9-35.3-35.2-56.7-47.7C350 49.8 327 41 303 36.1c-12.4-2.5-24.9-4-37.6-4.1-9.9-.1-19.8.3-29.6 1.2-25.5 2.5-50.7 9.6-73.9 20.5-19.9 9.4-38.4 21.6-54.8 36.2-16.4 14.6-30.7 31.6-42.2 50.3-12.7 20.8-22.2 43.5-27.4 67.3-4.2 19-6.2 38.6-5.2 58.1.9 18.9 3.8 37.8 9.5 55.9 3.6 11.5 7.9 22.7 13.3 33.6 5.3 10.7 11.5 21 18.4 30.7 13.8 19.3 30.6 36.4 49.8 50.5 19.6 14.5 41.7 25.7 64.9 33.1 24.2 7.7 49.9 11.3 75.3 10.4 24.8-.8 49.4-5.6 72.6-14.5 22.3-8.6 43.2-20.9 61.5-36.3 9.2-7.8 17.4-16.6 25.1-25.9 7.8-9.4 14.8-19.3 20.6-30 5-9.2 9.2-18.8 12.8-28.5 1.8-4.8 3.5-9.6 4.9-14.6 1.5-5.3 2.6-10.8 3.6-16.2 1.5-8.5 2.1-17.3 1.3-25.9-.7 3.8-1.3 7.5-2.2 11.2-1.1 4.3-2.5 8.5-4.1 12.6-3.2 8.7-7.2 17.1-11 25.5-4.9 10.7-10.6 20.9-16.8 30.8-3.2 5.1-6.5 10.1-10.1 14.9-3.6 4.8-7.7 9.4-11.8 13.9-8.2 9.1-17.1 17.2-27 24.4-10.1 7.4-20.8 13.9-32.1 19.3-22.6 11-47.3 17.6-72.3 19.8-25.6 2.2-51.7-.3-76.3-7.6-23.4-6.9-45.6-18.1-65.1-32.8-18.9-14.3-35.3-31.9-48.2-51.8C75.4 347.8 66.1 324.9 61 301c-1.3-6.2-2.3-12.6-3-18.9-.6-5.4-1.1-10.9-1.3-16.4-.3-11.3.4-23 2.1-34.2 3.7-24.6 11.7-48.3 24.1-69.9 11-19.3 25.3-36.7 42.1-51.4 16.8-14.8 36-26.7 56.8-35.1 12-4.9 24.6-8.5 37.4-10.9 6.5-1.2 13-2.2 19.5-2.7 3.2-.3 6.3-.3 9.5-.6 1.3 0 2.6.1 3.9.1 21.7-.4 43.5 2.4 64.2 8.9 22.3 7 43.3 18.3 61.5 33 19.1 15.4 35 34.4 47 55.8 10.2 18.2 17.5 37.8 21.9 58.2 1 4.7 1.8 9.4 2.6 14.1.7 4.3 3.1 8.3 6.8 10.7 7.8 5.2 18.7 1.7 22.5-6.7 1.3-2.9 1.7-6 1.2-8.9z"/></svg>
                      <div class="w-full h-full border-none bg-white dark:bg-dark-secondary" id="map-container" v-show="!waitMapChart"></div>
                  </div>
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
          pageLoading:true,
          checkbox:null,
          barChart:'',
          current:{
              Type:Object,
          },
          waitBarChart:true,
          waitColumnChart:true,
          waitMapChart:true,
          currentPeriod:[],
          currentYear:'',
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
            this.currentYear=year;
                mapChart.series[0].setData(this.current.mapData[year],false);
                mapChart.series[0].update({name:year},false);
                mapChart.title.update({
                    text:this.current.title
                },false);
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
          this.pageLoading=false;
          let data = await axios.post('crude_rates').then(async(res)=> {

              this.CrudeRate.name=res.data.name;
              this.CrudeRate.data=res.data.data;
              this.CrudeRate.title=res.data.title;
              this.CrudeRate.categories=res.data.categories;
              this.CrudeRate.years=res.data.years;
              this.CrudeRate.mapData=await this.ProcessMapChart(this.CrudeRate.data);
              this.currentPeriod=this.CrudeRate.years;
              this.currentYear=await this.currentPeriod[0];
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
                this.waitBarChart=false;
                this.waitColumnChart=false;
               this.current=this.CrudeRate;
               barchart = Highcharts.chart('container', {
                    chart: {
                        type: 'column',
                        backgroundColor:this.checkbox?'#383C40':'#ffffff',
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
                        type: 'column',
                        backgroundColor:this.checkbox?'#383C40':'#ffffff',
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
               this.waitMapChart=false;
              mapChart = HighMaps.mapChart('map-container', {
                   chart: {
                       map: asia_map,//asia_map
                       backgroundColor:this.checkbox?'#383C40':'#ffffff',
                   },

                   title: {
                       text: this.current.title
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
       }

    },
    created(){
        if (localStorage.theme === 'dark'||localStorage.theme !== undefined) {
            document.querySelector('html').classList.add('dark')
            this.checkbox=true;
            HighMaps.setOptions({
                title:{
                    style:{
                        color:'#F3F3F3',  //#666666
                    }
                },
            })
            Highcharts.setOptions({
                title:{
                    style:{
                        color:'#F3F3F3',   //#666666
                    }
                },
                legend:{
                    itemStyle:{
                        color:'#F3F3F3', //#333333
                    }
                },
                yAxis:{
                    title:{
                        style:{
                            color:'#F3F3F3' //#666666
                        }
                    }
                },
                xAxis:{
                    labels:{
                        style: {
                            color: '#F3F3F3', //#666666
                        }
                    },
                }
            })


        } else {
            document.querySelector('html').classList.remove('dark');
            this.checkbox=false;
        }

    },
    watch:{
        checkbox(value){
            if(!this.waitMapChart) {
                if (value) {
                    mapChart.update({
                        chart: {
                            backgroundColor: '#383C40',
                        },
                        title: {
                            style: {
                                color: '#F3F3F3',
                            }
                        }
                    }, false);
                    Highcharts.charts.forEach((chart) => {
                        chart.update({
                            chart: {
                                backgroundColor: '#383C40',
                            },
                            title: {
                                style: {
                                    color: '#F3F3F3',   //#666666
                                }
                            },
                            legend: {
                                itemStyle: {
                                    color: '#F3F3F3', //#333333
                                }
                            },
                            yAxis: {
                                title: {
                                    style: {
                                        color: '#F3F3F3' //#666666
                                    }
                                }
                            },
                            xAxis: {
                                labels: {
                                    style: {
                                        color: '#F3F3F3', //#666666
                                    }
                                },
                            }
                        })
                        chart.redraw(false);
                    }, false);
                    mapChart.redraw(false);
                    localStorage.theme = 'dark';
                    document.querySelector('html').classList.add('dark');
                } else {
                    localStorage.removeItem('theme');
                    Highcharts.charts.forEach((chart) => {
                        chart.update({
                            chart: {
                                backgroundColor: '#ffffff',
                            },
                            title: {
                                style: {
                                    color: '#666666',   //#666666
                                }
                            },
                            legend: {
                                itemStyle: {
                                    color: '#333333', //#333333
                                }
                            },
                            yAxis: {
                                title: {
                                    style: {
                                        color: '#666666' //#666666
                                    }
                                }
                            },
                            xAxis: {
                                labels: {
                                    style: {
                                        color: '#666666', //#666666
                                    }
                                },
                            }
                        }, false)
                        chart.redraw(false);
                    });
                    mapChart.update({
                        chart: {
                            backgroundColor: '#ffffff',
                        },
                        title: {
                            style: {
                                color: '#333333',
                            }
                        }
                    }, false);
                    mapChart.redraw(false);
                    document.querySelector('html').classList.remove('dark');
                }
            }
        }
    },
   mounted(){
       this.MakeHighChart();
       this.Render();
   },
}
</script>

<style scoped>
     >>>input[type="checkbox"]{
         -webkit-appearance: none;
         display: none;
         visibility: hidden;
     }
     .check{
      position: relative;
         display: block;
         width:40px;
         height:20px;
         background: #092c3e;
         cursor: pointer;
         border-radius: 20px;
         overflow:hidden;
         transition:ease-in 0.3s;
     }
     input[type='checkbox']:checked ~ .check{
         background:#F3F3F3;
     }
     .check:before{
         content:'';
         position:absolute;
         top:2px;
         left:2px;
         background:#fff;
         width:16px;
         height:16px;
         border-radius: 50%;
         transition:0.5s;
     }
     input[type='checkbox']:checked ~ .check:before{
         transform: translateX(20px);
         right:2px;
         background:#092c3e;
     }
</style>
