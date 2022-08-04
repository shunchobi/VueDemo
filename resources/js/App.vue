<template>
    <div>
        Hello from App.vue
    </div>
    <div class="home">
        My name is {{ name }}, age is {{ age }}
        <button @click="buttonHandler">click me</button>
    </div>

    <p ref="familyInfo">{{ lastName.Name }} Family lives in {{ address }}</p>

    <input type="text" v-model="lastName">

    <p ref="testA">{{ testA }}</p>
    <p>{{ testB }}</p>
</template>




<script>
import { reactive, ref } from 'vue'
import Section2 from './Section2.vue'

export default {
    setup() {
        let name = "satoshi";
        let age = "23";
        // これだとlastName.value、address.valueが
        // 変更できないから、以下のlet変数をrefにする
        // const familyInfo = ref(null) 
        const familyInfo = ref(null);
        const lastName = ref({ Who: "Who", Name: "name" });
        const address = ref("Where");
        let testA = ref("me");
        let testB = reactive("you");
        let toggle = false;
        const buttonHandler = () => {
            console.log("button clicked");
            if (!toggle) {
                familyInfo.value.classList.add("kato");
                // familyInfo.value.textContent = "kato famiy"
                lastName.value = "Kato";
                address.value = "Tokyo";
            }
            else {
                familyInfo.value.classList.add("kondo");
                lastName.value = "Kondo";
                address.value = "Minamikagiya";
            }
            testA.value = "ME";
            // testB.value = "YOU"
            toggle = !toggle;
        };
        return {
            name,
            age,
            buttonHandler,
            familyInfo,
            lastName,
            address,
            testA,
            testB,
        };
    },
    components: { Section2 }
}
</script>

<style>
.kato {
    color: aqua;
}

.kondo {
    color: blue;
}
</style>


<!-- <div>
    <input type="text" v-model="inputValue" id="">
    {{ inputValue + "hellp"}}
    <input type="number" v-model="inputNumber">
    <div>
      {{ inputNumber }}
    </div>
    <div>
      {{ hoge }}
    </div>
  </div> -->

  <!-- // import { computed } from '@vue/reactivity';
// import { ref } from 'vue';

// const inputValue = ref('');
// const inputNumber = ref();
// const hoge = computed(() => {
//  return inputNumber.value * inputNumber.value;
// }) -->