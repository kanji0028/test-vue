<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Button from '@/Components/Button.vue';
</script>

<template>

  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">ログイン成功！</div>
        </div>
      </div>
    </div>

    <div class="pb-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            <Link :href="route('user.index')" class="bg-red-400 p-3">ユーザー一覧</Link>
            <Link :href="route('logout')" method="post" class="bg-red-400 p-3 ml-2">ログアウト</Link>
            <Button class="ml-4">
              これがボタン
            </Button>
          </div>
        </div>
      </div>
    </div>


  </AuthenticatedLayout>
</template>
