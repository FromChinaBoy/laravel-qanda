<template>
  <div class="block">
    <el-date-picker
            v-model="value1"
            type="datetime"
            placeholder="选择日期时间">
    </el-date-picker>
  </div>
</template>

<script>
    export default {
        name: 'calendar-input',
        data() {
            return {
                value1: '',
                value2: '',
                value3: ''
            };
        },
        methods: {

        },
        computed: {
            selectValue: function () {
                return `${this.value1}-${this.value2}-${this.value3}`;
            },
        },
        watch: {
            selectValue: function (newVal) {
                this.$emit('getValue', newVal);
            }
        },
        mounted() {
            this.$emit('getValue', this.selectValue);
        }
    };
</script>