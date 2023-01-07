<script setup> 
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

const form = reactive({
  title: null,
  content: null,
})

const submitFunction = () => {
  Inertia.post('/inertia' , form) //5行目のformオブジェクトを指定
}

</script>

<!-- HTMLを記述する vueのディレクティブが使える -->
<template> 
  <form @submit.prevent="submitFunction">
    <input type="text" name="title" v-model="form.title"><br>
    <input type="text" name="content" v-model="form.content">
    <button>送信</button>
  </form>
</template>
