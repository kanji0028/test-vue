<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Button from '@/Components/Button.vue';
import { reactive, onMounted } from 'vue';
import { getToday } from "@/common";
import Chart from '@/Components/Chart.vue'


//ページ読み込み後、即座に実行
onMounted(() => {
  form.startDate = getToday(); //関数getTodayの実行結果をform.dateに入れる
  form.endDate = getToday(); //関数getTodayの実行結果をform.dateに入れる
})


const form = reactive({
  startDate: null,
  endDate: null,
  type: 'perDay'
})

const data = reactive({})

const getData = async () => {
  try {
    await axios.get('/api/analysis', {
      params: {
        startDate: form.startDate,
        endDate: form.endDate,
        type: form.type 
      }
    })
    .then( res => { //レスポンスが返ってきたら
      data.data = res.data.data
      data.labels = res.data.labels //リアクティブなオブジェクトの中に入っていく
      data.totals = res.data.totals //リアクティブなオブジェクトの中に入っていく
      console.log(res.data)
    })
  } catch(e) {
    console.log(e.message)
  }
}

</script>

<template>

  <Head title="データ分析" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">データ分析</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            分析方法<br>
            <form @submit.prevent="getData">
              <input type="radio" v-model="form.type" value="perDay" checked><span class="mr-2">日別</span>
              <input type="radio" v-model="form.type" value="perMonth"><span class="mr-2">月別</span>
              <input type="radio" v-model="form.type" value="perYear"><span class="mr-2">年別</span>
              <br>

              From: <input type="date" name="startDate" v-model="form.startDate">
              To: <input type="date" name="endDate" v-model="form.endDate"><br>
              <button class="mt-4 flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">分析する</button>
            </form>

            <!-- Chartコンポーネントに情報（props）を渡す -->
            <div v-show="data.data">
              <Chart :data="data" />
            </div>

            <div v-show="data.data" class="lg:w-2/3 w-full mx-auto overflow-auto">
                  <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                      <tr>
                        <th
                          class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                          年月日</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                          金額</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="item in data.data" :key="item.date">
                        <td class="px-4 py-3">{{ item.date }}</td>
                        <td class="px-4 py-3">{{ item.total }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

          </div>
        </div>
      </div>
    </div>

  </AuthenticatedLayout>
</template>
