<template>

    <div>
        <p>{{ testText }}</p>
        <input type="text" v-model="search">
        <p>{{ search }}</p>
    </div>

    <li v-for="name in namesList" :key="name">{{ name }}</li>
    <button @click="stopWatchHandler">Stop Watch Effect too</button>
</template>



<script>
import { computed } from '@vue/reactivity'
import { ref, watch, watchEffect } from 'vue'

export default {
    setup() {
        const tests = ref(null)
        const search = ref("")
        const testText = "this is from Test.vue"

        const namesList = ref(['shunichi', 'sakura', 'yusaku', 'yuri'])
        const machingName = computed(() => {
            return namesList.value.filter((name) => name.includes(search.value))
        })

        const stopWatch = watch(search, () => {
            console.log('watch ran')
        })

        const stopEffect = watchEffect(() => {
            console.log('watchEffect ran', search.value)
        })

        const stopWatchHandler = () => {
            stopWatch()
            stopEffect()
        }

        return {
            tests,
            search,
            testText,
            namesList,
            machingName,
            stopWatchHandler,
        }
    }
}

</script>