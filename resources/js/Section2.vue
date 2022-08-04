


<template>
<div class="section2"></div>
    <!-- <h1>{{ title }}</h1>
    <h2>{{ description }}</h2> -->

    <h2>{{ testData }}</h2>

    <!-- lesson 1 -->
    <div>
        <div class="box" @mouseover="handleEvent($event, 5)">mouse ver</div>
        <div class="box" @mouseleave="handleEvent">mounse leave</div>
        <div class="box" @dblclick="handleEvent">double click</div>
        <div class="box" @mousemove="handleMove">position - {{ x }} {{ y }}</div>
    </div>

    <!-- lesson 2 -->
    <button @click="showBooksToggle">show books</button>
    <div v-if="showBooks">
        <ul>
            <!-- attribute binding -->
            <!--   v-bind:src  =  :src   -->
            <!--HTML属性に対してv-bind:または、:を左に追記すれば、vueの値をそのままHTML属性の値として利用できる -->
            <li v-for="book in books" v-bind:class="{ fav: book.isFav }" @click="toggleFav(book)">
                <img :src="book.image" :alt="book.title">
                <h3>{{ book.title }}</h3>
                <p>{{ book.author }}</p>
            </li>
        </ul>
    </div>

    <button @click="showFavToggle">show favorite</button>
    <div v-if="showFav">
        <ul>
            <li v-for="book in favBooks" v-bind:class="{ fav: book.isFav }">
                <img :src="book.image" :alt="book.title">
                <h3>{{ book.title }}</h3>
                <p>{{ book.author }}</p>
            </li>
        </ul>
    </div>
</template>


<script>
import { computed } from '@vue/reactivity'
import { reactive, ref } from 'vue'

export default {
    // props: [
    //     'title',
    //     'description'
    // ],
    data() {
        return {
            testData: 'testData'
        }
    },
    setup() {
        /////////// lesson 1 ////////////////
        const x = ref(0)
        const y = ref(0)
        const handleEvent = ($event, data) => { // 第一引数は渡す時に指定しなくても自動で渡される
            console.log($event.type)
            if (data) {
                console.log(data)
            }
        }
        const handleMove = (e) => {
            x.value = e.offsetX
            y.value = e.offsetY
        }

        ///////////// lesson 2 ////////////////
        const showBooks = ref(false)
        const books = ref([
            { title: 'Summer', author: 'Yamashita', image: 'storage/images/book1.jpeg', isFav: true },
            { title: 'Winter', author: 'Kinoshita', image: 'storage/images/book2.jpeg', isFav: false },
            { title: 'Spring', author: 'Karaki', image: 'storage/images/book3.jpeg', isFav: true },
        ])
        const showBooksToggle = () => {
            showBooks.value = !showBooks.value

        }
        const toggleFav = (book) => {
            book.isFav = !book.isFav
        }

        //////////////// lesson 3 /////////////
        // Computed で返される値は readonly な ref でラッピングされた値です。
        // また、こちらの Computed な値は返される値が Object や Array の場合でも ref でラッピングされています。
        const showFav = ref(false)
        const favBooks = computed(() => {
            return books.value.filter((book) => book.isFav)
        })
        const showFavToggle = () => {
            showFav.value = !showFav.value
        }


        return {
            handleEvent, handleMove, sec2, x, y,
            books, showBooksToggle, showBooks, toggleFav, favBooks,
            showFavToggle, showFav,
        }
    }
}
</script>

<style>
.box {
    padding: 100px 0px;
    width: 100px;
    text-align: center;
    background: #ddd;
    margin: 20px;
    display: inline-block;
}

.fav {
    background-color: red;
}

.underline {
    text-decoration: underline;
}
</style>