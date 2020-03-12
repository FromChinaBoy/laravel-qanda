<template>
  <div class="fill-container">
    <div class="fill" v-if="!isError">
      <h2>{{qsItem.name}}</h2>

      <div class="content">
        <div class="content-item" v-for="item in qsItem.questions">
          <p class="qs-title">
            {{item.num}}&nbsp;{{item.name}}&nbsp;{{getMsg(item)}}
          </p>
          <p v-for="option in item.options" class="option">
            <label>
              <input
                    type="radio"
                    :name="`${item.num}-${item.name}`"
                    v-model="requiredItem[item.id]"
                    v-if="item.type === 'radio'"
                    :value="option.name">
              <input
                      type="checkbox"
                      :name="`${item.num}-${item.name}`"
                      v-model="requiredItem[item.id]"
                      v-if="item.type === 'checkbox'"
                      :value="option.name">{{option.name}}
            </label>
          </p>
          <textarea
                  v-if="item.type === 'textarea'"
                  v-model="requiredItem[item.id]"></textarea>
        </div>
      </div>
      <transition name="fade">
        <div class="dialog" v-if="showDialog">
          <div class="submit-dialog" v-if="submitError">
            <header>
              <span>提示</span>
              <span class="close-btn" @click="showDialog = false">X</span>
            </header>
            <p>{{info}}</p>
            <div class="btn-box">
              <button class="yes" @click="showDialog = false">确定</button>
              <button @click="showDialog = false">取消</button>
            </div>
          </div>
          <div class="submit-dialog" v-else>
            <header>
              <span>提示</span>
              <span class="close-btn" @click="showDialog = false">X</span>
            </header>
            <p>{{info}}</p>
          </div>
        </div>
      </transition>  
      <footer>
        <el-button @click="submit" class="submit">提交</el-button>
      </footer>
    </div>
    <div class="error" v-else>
      404 Not Found
    </div>
  </div>
</template>

<script>
// import storage from '../store.js'
/**
 * A module that define qs-fill router view
 * @exports qs-fill
 * @author oyh(Reusjs)
 */
  export default {
    name: 'qsFill',
    data() {
      return {
        qsItem: [],
        qsList: [],
        isError: false,
        showDialog: false,
        info: '',
        submitError: false,
        requiredItem: {}
      }
    },
    created() {
        if (my_investigation.length != 0) {
            this.qsItem = my_investigation
            this.id = this.qsItem.id
        }
        this.fetchData();
    },
    mounted() {
      this.getRequiredItem()
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
      getMsg(item) {
        let msg = ''
        if (item.type === 'radio') {
          msg = '(单选题)'
        } else if (item.type === 'checkbox') {
          msg = '(多选题)'
        } else {
          msg = '(文本题)'
        }

        return item.is_must ? `${msg} *` : msg
      },
      submit() {
        if (this.qsItem.status === 1) {
            console.log('requiredItem',this.requiredItem)
          let result = this.validate()
          if (result) {
            // 可选地，上面的请求可以这样做
            axios.post('/investigation/fillSubmit', {
                answer: this.requiredItem,
                id: this.qsItem.id
            })
            .then(function (response) {
                console.log('response',response)
                if(response.data.code == 200){
                    console.log('response',response)
                    alert('提交成功！！')
                    //1000毫秒调用一次
                    window.setInterval(function(){
                      window.location.href = '/'
                    },1000);
                    return
                }else{
                    alert(response.data.message)
                }
            })
            .catch(function (error) {
                if (error.response) {
                    // The request was made and the server responded with a status code
                    // that falls out of the range of 2xx
                    console.log(error.response.data);
                    console.log(error.response.status);
                    console.log(error.response.headers);
                    if (error.response.status == 400) {
                        alert(error.response.data.message)
                    }
                } else if (error.request) {
                    // The request was made but no response was received
                    // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                    // http.ClientRequest in node.js
                    console.log(error.request);
                } else {
                    // Something happened in setting up the request that triggered an Error
                    console.log('Error', error.message);
                }
                console.log(error.config);
            });
          } else {
              alert('提交失败！ 存在必填项未填');return ;
          }
        } else {
            alert('提交失败！调查表未发布'); return;

        }
      },
      getRequiredItem()
        {
        this.qsItem.questions.forEach( item => {
          if (item.is_must) {
            if (item.is_must) {
              if (item.type === 'checkbox') {
                this.requiredItem[item.id] = []
              } else {
                this.requiredItem[item.id] = ''
              }
            }
          }
        })
      },
      validate()
      {
        for (let i in this.requiredItem) {
          if (this.requiredItem[i].length === 0) return false
        }
        return true
      }
    },
    watch: {
      '$route': 'fetchData'
    }
  }
</script>

<style lang="scss" scoped>
@import '../../sass/QS-fill';
</style>