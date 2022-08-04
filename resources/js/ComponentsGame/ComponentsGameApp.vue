

<template>
    <div class="main-block mt-5">
        <h1>Reaction Timer</h1>
        <button @click="play" :disabled="isPlaying" class="btn btn-secondary">play</button>
        <!-- @end="endGame"のendは任意の変数名で、Block.vueのemitのパラメーターで指定 -->
        <!-- @end="endGame"のendGameは下記のメソッドで、子vueからemitによってイベントが発生したら実行される -->
        <!-- "endGame"の値をそのまま変数として使用する場合は、@end="targetValue = " -->
        <Block v-if="isPlaying" :delay="delay" @end="endGame" />
        <Result v-if="isShowResult" :result="reactionTime"/>
    </div>
</template>



<script>
import { ref } from 'vue'
import Block from './Block.vue'
import Result from './Result.vue'

// Componentの使い方
// まず対象の子Component.vueをインポート（import Block from '../Components/Block.vue'）
// componentsを指定（ components: { Block },）
// <template />内に使用したい場所で指定したcomponentsをmountする
// (<Block v-if="isPlaying" :delay="delay" @end="endGame" />)
// 子component.vueに自身（親）から値を渡す場合は、子component内の<script />内でpropsを指定し、
// ( props: ['delay'] )
// mount時にpropsの値に対して自身の値を渡す
// ( <Block ...  :delay="delay"  ... /> )

export default {
    components: { Block, Result },
    setup() {

        // ユーザーからのイベントによって値が変わるだけならconstでもよかったが、
        // Block.vueのemitによって発生したイベントで値が変わるからletでなければいけない
        let isPlaying = ref(false) 
        const delay = ref(null)
        let reactionTime = ref(0)
        let isShowResult = ref(false)

        const play = () => {
            isPlaying.value = !isPlaying.value
            isShowResult.value = false
            delay.value = 2000 + Math.random() * 5000
        }

        // resultは任意の名前で、Blockl.vueのemitから渡される値がパラメーターに渡される
        const endGame = (result) => {
            reactionTime.value = result
            isPlaying.value = false
            isShowResult.value = true
        }

        return {
            isPlaying, delay, play, reactionTime, endGame, isShowResult
        }
    }
}
</script>



<style>
.main-block {
    text-align: center;
}
</style>