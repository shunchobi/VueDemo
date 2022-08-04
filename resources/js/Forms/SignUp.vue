


<template>

    <!-- @submit.preventをつけると、ButtonでSubmitしても、フォーム内の入力した値は消えない -->
    <!-- <form class="container list-group" id="form" @submit.prevent="submitHandler"> -->
        <label for="mail">mail</label>
        <input id="mail" type="mail" v-model="mail" required>

        <label for="password">password</label>
        <input id="password" type="password" v-model="password" required>
        <!-- validateはLaravel側の機能でやればいいが、一応　Vueでもできる -->
        <!-- <label v-if="passwordIsError">{{ passwordIsError }}</label> -->

        <label for="jobs">role</label>
        <select id="jobs" v-model="role">
            <option value="designeter">Web Designer</option>
            <option value="developer">Web Developer</option>
        </select>

        <div>
            <input type="checkbox" id="check" v-model="term" required>
            <label for="check">Accept term and condition</label>
        </div>

        <div>
            <label for="skills">skill</label>
            <!-- @keyupで一文字ずつタイプの終了時に実行 -->
            <input type="text" v-model="tempSkill" @keyup.enter="addSkill">
            <div v-for="skill in skills" :key="skill">
                <span @click="deleteSkill(skill)">{{ skill }}</span>
            </div>
        </div>



</template>


<script>
import { ref } from 'vue'

export default {
    setup() {
        const mail = ref('')
        const password = ref('')
        const role = ref('')
        const term = ref(false)
        const tempSkill = ref('')
        let skills = ref([])
        const passwordIsError = ref('')

        const addSkill = (e) => {
            console.log('typed')
            if (tempSkill) {
                if (!skills.value.includes(tempSkill.value)) {
                    skills.value.push(tempSkill.value)
                }
                tempSkill.value = ''
            }
        }

        const deleteSkill = (skill) => {
            skills.value = skills.value.filter((item) => {
                return skill !== item
            })
        }

        const submitHandler = () => {
            const values = [
                { 'mail': mail.value },
                { 'password': password.value },
                { 'role': role.value },
                { 'skils': skills.value },
            ]

            console.log(values) // valuesこれをコントローラーに渡せばいい
            // validateはLaravel側の機能でやればいいが、一応　Vueでもできる
            // passwordIsError.value = password.value.length > 5 ? '' : 'password must be more than 6 characters'
        }

        return {
            mail, password, role, term, passwordIsError,
            tempSkill, skills, addSkill, deleteSkill, submitHandler
        }
    }
}
</script>