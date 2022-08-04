


<template>

<div>
    {{ testText }}
</div>

<div v-if="error != null">
    Outside Api Value is : {{ outsideApiData.value }}
</div>

<div v-if="error != null">
    Inside Api Value is : {{  insideApiData.Hello }}
</div>
</template>



<script>
import axios from 'axios'
import { onMounted, ref } from 'vue'

export default{
    setup(){
        const testText = ref('API Test')
        let outsideApiData = ref(null)
        let error = ref(null)
        let insideApiData = ref(null)

        onMounted(async () => {
            try{
                const outsideApi = await axios.get('https://api.chucknorris.io/jokes/random')
                outsideApiData.value = outsideApi.data
                
                const insideApi = await axios.get('http://localhost/api/sample')
                insideApiData.value = insideApi.data

                if (!outsideApiData.ok){
                    throw Error('outsideApiData is empty')
                }
                if (!insideApiData.ok){
                    throw Error('insideApiData is empty')
                } 
            }catch (err){
                error.value = err.message
                console.log('erro: ' + error.value)
            }
        })

        return{
            testText, outsideApiData, error, insideApiData,
        }
    }
}
</script>