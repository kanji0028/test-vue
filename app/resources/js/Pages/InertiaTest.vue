<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue'; //リアクティブなデータとして扱う

const newTitle = ref('') //v-modelの変数と同期する
const newContent = ref('') //v-modelの変数と同期する

</script>
<template>
  <p>テストです。</p>
  
  <input type="text" name="newTitle" v-model="newTitle">{{ newTitle }}<br>
  <input type="text" name="newContent" v-model="newContent"><br>
  <Link as="button" method="post" :href="route('inertia.store')" 
  :data="{ //コントローラーに渡したいデータ
    title:newTitle,
    content:newContent
   }">
   DB保存テスト</Link>　
</template>
