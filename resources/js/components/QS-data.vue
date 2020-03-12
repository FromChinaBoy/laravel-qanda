<template>
  <div class="data-container">
    <template v-if="!isError">
      <span class="back" @click="goBack()">&lt; 返回</span>
      <h2>{{qsItem.title}}</h2>
      <p>此统计分析只包含完整回收的数据(数据皆为自制数据模拟来mock数据)</p>
    </template>

    <div class="content" v-if="!isError">
      <template v-for="(item, index) in qsItem.questions">
        <div class="content-item">
          <div class="item-left">
            <p>{{item.num}} &nbsp; {{item.title}}</p>
              <p class="option" v-for="option in item.options">{{option.name}}</p>
          </div>
          <div class="item-right" v-if="item.type === 'radio'">
            <p>数据占比</p>
            <template v-for="(option, index) in item.options">
              <div class="progress-bar">
                <div class="bar-inner" :style="{width: renderProgressMath(item.options.length, index)}" v-if="renderProgressMath(item.options.length, index) !== '0%'"></div>
              </div>
              <span class="percent">{{renderProgressMath(item.options.length, index)}}</span>
            </template>
          </div>
          <div class="item-right" v-else-if="item.type === 'textarea'">
            <p>有效回答占比</p>
              <div class="progress-bar">
                <div class="bar-inner" :style="{width: '85%'}"></div>
              </div>
              <span class="percent">85%</span>
          </div>
          <div class="item-right" v-else>
            <p>数据占比</p>
            <div :id="`chart-${item.num}`">
            </div>
          </div>
        </div>
      </template>
    </div>
    <div class="error" v-if="isError">
      404 Not Found
    </div>
  </div>
</template>

<script>
import storage from '../store.js'
import echarts from 'echarts/lib/echarts'
import 'echarts/lib/chart/pie'
import 'echarts/lib/component/tooltip'
import 'echarts/lib/component/toolbox'
/**
 * A module that define qs-data router view
 * @exports qs-data
 * @author oyh(Reusjs)
 */
  export default {
    name: 'qsData',
    data() {
      return {
        qsItem: {},
        qsList: storage.get(),
        isError: false,
        chartData: [],
        chartNum: []
      }
    },
    created() {
      if (my_investigation.length != 0) {
          this.qsItem = my_investigation
          this.id = this.qsItem.id
      }
      this.fetchData()
    },
    mounted() {
      this.renderChartData()
      this.chartNum.forEach( (chartNum, index) => {
        this.renderEChart(chartNum, this.chartData[index])
      } )
    },
    methods: {
      addNum(questions) {
          questions.forEach((item, index) => {
              item.num = `Q${index + 1}`
              item.sort = index
          })
      },
      fetchData() {
          if (this.qsItem.questions) {
              this.addNum(this.qsItem.questions);
          }
          if(this.qsItem.length){
              this.isError = true
          }
      },
      renderProgressMath(length, index) {
        if (length < 2) return '100%'
        if (length >= 2) {
          if (index === 0) {
            return '85%'
          } else if (index === 1) {
            return '15%'
          } else {
            return '0%'
          }
        }
      },
      renderChartData() {  
        this.qsItem.questions.forEach( item => {
          if (item.type === 'checkbox') {
            let value  = 0
            let sum    = 0
            let data   = []
            let length = item.options.length

            this.chartNum.push(item.num);

            item.options.forEach( (optionName, index) => {
                console.log('optionName',optionName)
              if (index == length - 1) {
                value = 1000 - sum
              } else {
                value = Math.floor(Math.random() * (1001 - sum))
                sum += value
              }
              data.push({value: value, name: optionName})
            } )
            this.chartData.push(data)
          }
        } )
      },
      renderEChart(chartNum, chartData) {
        let myChart = echarts.init(document.getElementById(`chart-${chartNum}`))
        let option = {
          tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b}选择人次 : {c} ({d}%)"
          },
          series: [
            {
              name: '数据占比',
              type: 'pie',
              radius: '55%',
              center: ['50%', '60%'],
              data: chartData
            }
          ],
          itemStyle: {
            emphasis: {
              shadowBlur: 10,
              shadowOffsetX: 0,
              shadowColor: 'rgba(0, 0, 0, 0.5)'
            }
          }
        }
  
        let currentIndex = -1;
  
        setInterval(function () {
          var dataLen = option.series[0].data.length;
  
          myChart.dispatchAction({
            type: 'downplay',
            seriesIndex: 0,
            dataIndex: currentIndex
          });
          currentIndex = (currentIndex + 1) % dataLen;
  
          myChart.dispatchAction({
            type: 'highlight',
            seriesIndex: 0,
            dataIndex: currentIndex
          });
  
          myChart.dispatchAction({
            type: 'showTip',
            seriesIndex: 0,
            dataIndex: currentIndex
          });
        }, 1000);
  
        myChart.setOption(option)
      },
      goBack() {
        this.$router.push({path:'/'})
      }
    },
    watch: {
      '$route': 'fetchData'
    }
  }
</script>

<style lang="scss" scoped>
@import '../../sass/QS-data';
</style>