<template>
    <div class="edit-container">
        <el-input v-model="qsItem.name" placeholder="请输入标题" clearable></el-input>

        <el-input v-model="qsItem.desc" placeholder="请输入描述" clearable></el-input>

        <div class="content">
            <div class="questions" v-for="(qs, index) in qsItem.questions">
                <div class="qs-left">
                    <p class="qs-title" @click="titleClick">
                        {{qs.num}}&nbsp;{{qs.name}}&nbsp;{{turnQuestionType(qs.type)}}
                    </p>
                    <p v-for="option in qs.options" class="option">
                        <label>
                            <input
                                    type="radio"
                                    :name="`${qs.num}-${qs.name}`"
                                    v-if="qs.type === 'radio'">
                            <input
                                    type="checkbox"
                                    :name="`${qs.num}-${qs.name}`"
                                    v-if="qs.type === 'checkbox'">{{option.name}}
                        </label>
                    </p>
                    <textarea
                            v-if="qs.type === 'textarea'"></textarea>
                </div>
                <div class="qs-right">
                    <label><input type="checkbox" :value="qs.is_must" v-model="qs.is_must">
                        此题是否必填</label>
                    <p>
                        <span v-if="index !== 0" @click="goUp(index)">上移</span>
                        <span v-if="index !== qsItem.length - 1" @click="goDown(index)">下移</span>
                        <span @click="copy(index, qs)">复用</span>
                        <span @click="del(index)">删除</span>
                    </p>
                </div>
            </div>
            <div class="add">
                <transition name="slide">
                    <div class="add-option" v-if="showBtn">
                        <el-button @click="addRadio">单选</el-button>
                        <el-button @click="addCheckbox">多选</el-button>
                        <el-button @click="addTextarea">文本框</el-button>
                    </div>
                </transition>
                <div class="add-item" @click="addItemClick">
                    <span class="add-icon">+</span><span>添加问题</span>
                </div>
            </div>
        </div>
        <div class="shadow" v-if="showAddQsDialog">
            <div class="add-qs-dialog">
                <header>
                    <span>提示</span>
                    <span class="close-btn" @click="showAddQsDialog = false">X</span>
                </header>
                <p>{{info}}</p>
                <label>输入题目标题<input type="text" v-model="qsInputTitle"></label>
                <label v-if="showAddOptionInput">输入选项<input type="text" v-model="qsInputOptions"></label>
                <div class="btn-box">
                    <el-button class="yes" @click="validateAddQs">确定</el-button>
                    <el-button @click="showAddQsDialog = false">取消</el-button>
                </div>
            </div>
        </div>
        <div class="shadow" v-if="showDialog">
            <div class="dialog">
                <header>
                    <span>提示</span>
                    <span class="close-btn" @click="cancel">X</span>
                </header>
                <p>{{info}}</p>
                <div class="btn-box">
                    <el-button class="yes" @click="iterator.next()">确定</el-button>
                    <el-button @click="cancel">取消</el-button>
                </div>
            </div>
        </div>
        <footer>
            <span>问卷截止日期</span>
            <calendar-input
                @getValue="getValue"
                :effective_time="this.qsItem.effective_time"
            >
            </calendar-input>
            <div class="btn-box">
                <el-button class="save" @click="iterator = save(); iterator.next()">保存问卷</el-button>
                <el-button class="issue" @click="iterator = issueQs(); iterator.next()">发布问卷</el-button>
            </div>
        </footer>
    </div>
</template>

<script>
    import storage from '../store.js'
    import calendarInput from './calendar-input'

    /**
     * A module that define qs-edit view
     * @exports qs-edit
     * @author oyh(Reusjs)
     */
    export default {
        name: 'qsEdit',
        components: {
            calendarInput
        },
        data() {
            return {
                id: 0,
                qsItem: {
                    id: 0,
                    name: '',
                    desc: '',
                    create_time: '',
                    status: 0,
                    questions: [],
                    statusTitle: '停用',
                    checked: false,
                    effective_time: ''
                },
                titleValue: '',
                descValue: '',
                qsList: [],
                isError: true,
                showBtn: false,
                titleChange: true,
                showAddQsDialog: false,
                showAddOptionInput: true,
                qsInputTitle: '',
                qsInputOptions: [],
                info: '',
                addOptionType: '',
                showDialog: false,
                iterator: {},
                isGoIndex: false

            }
        },
        // beforeRouteEnter(to, from, next) {
        //     let num = 0
        //     let theItem = {}
        //     if (num != 0) {
        //         let length = storage.get().length
        //         if (num < 0 || num > length) {
        //             alert('非法路由!')
        //             next('/')
        //         } else {
        //             for (let i = 0; i < length; i++) {
        //                 if (storage.get()[i].num == num) {
        //                     theItem = storage.get()[i]
        //                     break
        //                 }
        //             }
        //         }
        //         if (theItem.status === 'noissue') {
        //             next()
        //         } else {
        //             alert('非法路由')
        //             next('/')
        //         }
        //     } else {
        //         next()
        //     }
        // },
        created() {
            if (my_investigation.length != 0) {
                this.qsItem = my_investigation
                this.id = this.qsItem.id
            }

            this.fetchData();
        },
        methods: {
            fetchData() {
                if (this.qsItem.questions) {
                    this.addNum(this.qsItem.questions);
                }
            },
            turnQuestionType(option) {
                let msg = ''
                if (option.type === 'radio') {
                    msg = '(单选题)'
                } else if (option.type === 'checkbox') {
                    msg = '(多选题)'
                } else {
                    msg = '(文本题)'
                }
            },
            onblur() {
                this.titleValue = this.titleValue.trim()
                this.qsItem.title = this.titleValue === '' ? this.qsItem.title : this.titleValue
                this.titleChange = false
            },
            onsubmit() {
                this.titleValue = this.titleValue.trim()
                this.qsItem.title = this.titleValue === '' ? this.qsItem.title : this.titleValue
                this.titleChange = false
            },
            titleClick() {
                this.titleChange = !this.titleChange
                setTimeout(() => {
                    this.$refs.titleInput.focus()
                }, 150)
            },
            swapItems(oldIndex, newIndex) {
                let [newVal] = this.qsItem.questions.splice(newIndex, 1, this.qsItem.questions[oldIndex])
                this.qsItem.questions.splice(oldIndex, 1, newVal)
            },
            goUp(index) {
                this.swapItems(index, index - 1)
            },
            goDown(index) {
                this.swapItems(index, index + 1)
            },
            copy(index, qs) {
                if (this.questionLength === 10) return alert('问卷已满！')
                qs = Object.assign({}, qs);
                this.qsItem.questions.splice(index, 0, qs)
            },
            del(index) {
                this.qsItem.questions.splice(index, 1)
            },
            addItemClick() {
                if (this.showBtn === false) {
                    this.questionLength === 10 ? alert('问卷已满！') : this.showBtn = !this.showBtn
                } else {
                    this.showBtn = !this.showBtn
                }
            },
            showAddDialog(msg, showOption) {
                this.showAddQsDialog = true
                this.showAddOptionInput = showOption
                this.info = msg
                this.qsInputTitle = ''
                this.qsInputOptions = ''
            },
            addRadio() {
                if (this.questionLength === 10) return alert('问卷已满！')
                this.showAddDialog('分别在下面的输入框中输入问题的名称以及选项, 选项用半角逗号","分隔开', true)
                this.addOptionType = 'radio'
            },
            addCheckbox() {
                if (this.questionLength === 10) return alert('问卷已满！')
                this.showAddDialog('分别在下面的输入框中输入问题的名称以及选项, 选项用半角逗号","分隔开', true)
                this.addOptionType = 'checkbox'
            },
            addTextarea() {
                if (this.questionLength === 10) return alert('问卷已满！')
                this.showAddDialog('在输入框中输入问题名称', false)
                this.addOptionType = 'textarea'
            },
            validateAddQs() {
                let options = [];
                let qsTitle = this.qsInputTitle.trim()

                if (qsTitle === '') return alert('题目不能为空')
                if (this.showAddOptionInput) {
                    let qsOptions = this.qsInputOptions.trim()
                    if (qsOptions === '') return alert('选项不能为空！')
                    qsOptions = qsOptions.replace(/，/g,',').split(',')
                    for (let i = 0, length = qsOptions.length; i < length; i++) {
                        if (qsOptions[i].trim() === '') {
                            return alert('存在某个选项内容为空')
                        }

                        options.push({
                            'investigation_question_id': 0,
                            'name': qsOptions[i].trim(),
                            'score': 0,
                        });
                    }

                    this.qsItem.questions.push({
                        'num': this.qsItem.questions.length - 1,
                        'id': 0,
                        'name': qsTitle,
                        'type': this.addOptionType,
                        'is_must': true,
                        'options': options,
                        'sort': this.qsItem.questions.length,
                    });
                    this.showAddQsDialog = false
                } else {
                    //radsa
                    this.qsItem.questions.push({
                        'num': this.qsItem.questions.length - 1,
                        'id': 0,
                        'name': qsTitle,
                        'type': this.addOptionType,
                        'is_must': true,
                        'sort': this.qsItem.questions.length,
                    })
                    this.showAddQsDialog = false
                }
            },
            getValue(selectTime) {
                if(selectTime){
                    this.qsItem.effective_time = selectTime
                }
            },
            * save() {
                this.showDialog = true
                this.info = '确认保存?'
                yield
                if ((this.qsItem.name.trim()) === '') {
                    this.showDialog = false
                    alert('标题为空无法保存')
                    return ;
                }
                if ((this.qsItem.desc.trim()) === '') {
                    this.showDialog = false
                    alert('描述为空无法保存')
                    return ;
                }
                if (this.qsItem.questions.length === 0) {
                    this.showDialog = false
                    alert('问卷为空无法保存')
                    return ;
                }
                this.qsItem.statusTitle = '未发布'
                this.showDialog = false
                // 可选地，上面的请求可以这样做
                axios.post('/investigation/save', {
                    id: this.qsItem.id,
                    name: this.qsItem.name.trim(),
                    desc: this.qsItem.desc.trim(),
                    status: this.qsItem.status,
                    effective_time: this.qsItem.effective_time,
                    questions: this.qsItem.questions
                })
                .then(function (response) {
                    console.log('response',response)
                    if(response.data.code == 200){
                        console.log('response',response)
                        window.location.href = "/"
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
                    console.log(error.config);
                });
            },
            * issueQs() {
                this.showDialog = true
                this.info = '确认发布?'
                yield
                if (this.qsItem.questions.length === 0) {
                    this.showDialog = false
                    alert('问卷为空无法保存')
                    return ;
                }
                this.qsItem.status = 1
                this.qsItem.statusTitle = '发布中'
                this.showDialog = false
                // 可选地，上面的请求可以这样做
                axios.post('/investigation/save', {
                    id: this.qsItem.id,
                    name: this.qsItem.name,
                    desc: this.qsItem.desc,
                    status: this.qsItem.status,
                    effective_time: this.qsItem.effective_time,
                    questions: this.qsItem.questions
                })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            cancel() {
                this.showDialog = false
                if (this.isGoIndex === true) {
                    this.$router.push({path: '/'})
                }
            },
            addNum(questions) {
                questions.forEach((item, index) => {
                    item.num = `Q${index + 1}`
                    item.sort = index
                })
            }
        },
        computed: {
            questionLength() {
                if (this.qsItem.questions) {
                    return this.qsItem.questions.length
                }
                return 0;
            }
        },
        watch: {
            '$route': 'fetchData',
            qsItem: {
                handler(newVal) {
                    if (newVal.questions) {
                        this.addNum(newVal.questions);
                    }
                },
                deep: true
            }
        }
    }

</script>

<style lang="scss" scoped>
    @import '../../sass/QS-edit';
</style>