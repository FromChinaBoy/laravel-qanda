<template>
  <div class="qs-list">
    <ul>
      <li></li>
      <li>标题</li>
      <li>发布时间</li>
      <li>状态</li>
      <li>操作<span @click="goUrl('/investigation/edit/0')">+新建问卷</span></li>
    </ul>
    <template v-for="item in qsList">
      <ul>
        <li><input type="checkbox" v-model="item.checked"></li>
        <li>{{item.name}}</li>
        <li>{{item.create_time}}</li>
        <li :class="item.status === 1 ? 'inissue' : ''">{{item.status_text}}</li>
        <li>
          <el-button @click="iterator = edit(item); iterator.next()">编辑</el-button>
          <el-button @click="iterator = delItem(item); iterator.next()">删除</el-button>
          <el-button @click="iterator = fillItem(item); iterator.next()">填写问卷</el-button>
          <el-button @click="iterator = watchData(item); iterator.next()">查看数据</el-button>
        </li>
      </ul>
    </template>
    <div class="list-bottom" v-if="qsList.length == 0 ? false : true">
      <label><input type="checkbox" id="all-check" v-model="selectAll">全选</label>
      <el-button @click="iterator = delItems(); iterator.next()">删除</el-button>
    </div>
    <div class="shadow" v-if="showDialog">
      <div class="del-dialog">
        <header>
          <span>提示</span>
          <span class="close-btn" @click="showDialog = false">X</span>
        </header>
        <p>{{info}}</p>
        <div class="btn-box">
          <el-button class="yes" @click="iterator.next();">确定</el-button>
          <el-button @click="showDialog = false">取消</el-button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import storage from '../store.js'

/**
 * A module that define qs-list router view
 * @exports qs-list
 * @author oyh(Reusjs)
 */
  export default {
    name: 'qsList',
    data() {
      return {
        qsList: [],
        showDialog: false,
        iterator: {},
        info: ''
      }
    },
    created(){
        console.log('investigations',investigations);
        this.qsList = investigations;
        this.qsList.forEach( item => {
            item.checked = false;
            if(item.status == 1){
                item.status_text = '发布中'
            }else if(item.status == 0){
                item.status_text = '未发布'
            }else{
                item.status_text = '未知'
            }
        });
    },
    methods: {
      showDialogMsg(info) {
        this.showDialog = true;
        this.info = info;
      },
      *delItem(item) {
        if(item.status !== 0 ){
            alert('已发布问卷不能删除！');
            return
        }

        yield this.showDialogMsg('确认要删除此问卷')

        yield (() => {
            axios.post('/investigation/del', {
                id: item.id,
            })
            .then(response => {
                if(response.status == 200){
                    let index = 0;
                    for (let length = this.qsList.length; index < length; index++) {
                        if (this.qsList[index].id === item.id) break;
                    }
                    this.qsList.splice(index, 1);
                    this.showDialog = false;
                    return;
                }else{
                    alert(response.message)
                }
            })
              .catch(function (error) {
              console.log('Error',error);
              if (error.response) {
                  // The request was made and the server responded with a status code
                  // that falls out of the range of 2xx
                  console.log(error.response.data);
                  console.log(error.response.status);
                  console.log(error.response.headers);
                  if(error.response.status == 400){
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
              // console.log(error.config);
            });
        })();
      },
      *delItems() {
        yield this.showDialogMsg('确认要删除选中的问卷？');

        yield (() => {
          this.showDialog = false;
          if (this.selectAll) {
            this.qsList = [];
            return;
          }
          if (this.selectGroup == []) return;

          this.selectGroup.forEach( item => {
            if (this.qsList.indexOf(item) > -1) this.qsList.splice(this.qsList.indexOf(item), 1);
          } )
        })();     
      },
      *fillItem(item) {
          if (item.status !== 1) {
              alert('该调查表未发布！！');
              return;
          } else {
              this.goUrl('/investigation/fill/' + item.id)
          }
      },
      *edit(item) {
          console.log('item',item)
          this.showDialog = false;
          this.goUrl('/investigation/edit/' + item.id)
      },
      goUrl(url) {
          window.location.href = url
      },
      *watchData(item) {
        yield (() => {
          if (item.status_text === 'noissue') {
            this.showDialogMsg('未发布的问卷无数据可查看');
          } else {
              this.goUrl('/investigation/export/' + item.id)
          }
        })();
        yield this.showDialog = false;
      }
    },
    computed: {
      selectAll: {
        get() {
          return this.selectCount === this.qsList.length && this.selectCount !== 0;
        },
        set(value) {
          this.qsList.forEach( item => {
            item.checked = value;
          } );
          return value;
        }
      },
      selectCount() {
        let i = 0;
        this.qsList.forEach( item => {
          if (item.checked) i++;
        } );
        return i;
      },
      selectGroup() {
        let group = [];
        this.qsList.forEach( item => {
          if (item.checked) group.push(item);
        } );
        return group;
      }
    },
    watch: {
      qsList: {
        handler(val) {
          val.forEach( (item, index) => {
            item.num = index + 1
          } );
          storage.save(val);
        },
        deep: true
      }
    }
  }
</script>

<style lang="scss" scoped>
@import '../../sass/QS-list';
</style>