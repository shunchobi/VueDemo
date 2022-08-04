

<template>

    <div class="block" v-if="isShowing" @click="stopTimer">
        click me
    </div>
</template>



<script>
import { ref } from 'vue'

export default {
    props: [
        'delay',
    ],
    mounted() {
        console.log('block mounted')
        setTimeout(() => {
            this.isShowing = true
            this.startTimer()
        }, this.delay)
    },
    updated(){
        console.log('block updated')
    },
    unmounted(){
        console.log('block unmounted')
    },
    // setup 関数を使う時、propsとcontextの2つの引数を取ります:
    // くわしくはこちら https://v3.ja.vuejs.org/guide/composition-api-setup.html#引数
    setup(props, context) {
        const isShowing = ref(false)
        let timer = null
        let reactionTime = 0

        const startTimer = () => {
            timer = setInterval(() => {
                reactionTime += 10
            }, 10)
        }
        const stopTimer = () => {
            clearInterval(timer)
            // context.emit('eventName', value); 
            // ＠eventNameで親vueがイベントを受け取り、
            // valueを親vueがそのまま変数として扱うまたは関数のパラメーターに渡します
            context.emit('end', reactionTime); 
        }

        return {
            isShowing, stopTimer, startTimer
        }
    },
}

</script>



<style>
.block {
    width: 400px;
    border-radius: 20px;
    padding: 100px 0px;
    margin: 40px auto;
    text-align: center;
    background-color: aqua;
    color: black;
    font-size: 30px;
}
</style>