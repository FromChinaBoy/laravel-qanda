<template>
  <div class="block">
    <el-date-picker
            v-model="value"
            type="datetime"
            value-format="yyyy-MM-dd HH:mm:ss"
            placeholder="选择日期时间">
    </el-date-picker>
  </div>
</template>

<script>
    export default {
        name: 'calendar-input',
        props: ['effective_time'],
        data() {
            return {
                value: this.effective_time
            };
        },
        methods: {

        },
        computed: {
            selectValue: function () {
                return `${this.value}`;
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