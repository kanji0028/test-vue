<script setup> 
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'


defineProps({
  errors: Object
})

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
    <!-- 双方向バインディング -->
    <input type="text" name="title" v-model="form.title"><br>
    <div v-if="errors.title" class="text-red-400">{{ errors.title }}</div>
    <input type="text" name="content" v-model="form.content"><br>
    <div v-if="errors.content" class="text-red-400">{{ errors.content }}</div>
    <button class="hover:shadow-form hover:bg-gray-700 rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none ease-in-out duration-150">送信</button>
  </form>
</template>