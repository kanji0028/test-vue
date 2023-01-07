<script setup> 
//setup：コンポジションAPIを使用するコンパイル時のシンタックスシュガー
//コンポーネントのインスタンスが作成されるたびに実行される 
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
  blogs: Array,
})

</script>

<!-- HTMLを記述する vueのディレクティブが使える -->
<template> 
  <div v-if="$page.props.flash.message" class="bg-blue-300 p-2 m-1">
    {{ $page.props.flash.message }}
  </div>


  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <h2 class="text-lg font-bold mb-3">一覧</h2>
          
          <tr v-for="blog in blogs" :key="blog.id">
            <td class="border px-4 py-2"><Link class="text-blue-300" :href="route('inertia.show', { id:blog.id })">{{ blog.title }}</Link></td>
            <td class="border px-4 py-2">{{ blog.content }}</td>
          </tr>
        </div>
      </div>
    </div>
  </div>

</template>
