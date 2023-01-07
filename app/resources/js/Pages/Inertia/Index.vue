<script setup> 
//setup：コンポジションAPIを使用するコンパイル時のシンタックスシュガー
//コンポーネントのインスタンスが作成されるたびに実行される 

// 変数
const msg = 'おはようございます！'

// 関数
function log() {
  console.log(msg)
} 
</script>

<!-- HTMLを記述する vueのディレクティブが使える -->
<template> 
  テストです。!
  <div @click="log">{{ msg }}</div>
</template>
