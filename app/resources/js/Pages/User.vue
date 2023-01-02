<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import FlashMessage from '@/Components/FlashMessage.vue';

defineProps({
  users: String,
})

</script>

<template>

  <Head title="Dashboard" />

  <AuthenticatedLayout>
  <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </template>

  <FlashMessage class="bg-red-200" />

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <h2 class="text-lg font-bold mb-3">ユーザー一覧</h2>
          
          <tr v-for="user in users">
            <td class="border px-4 py-2">{{ user.name }}</td>
            <td class="border px-4 py-2">{{ user.email }}</td>
            <td class="border px-4 py-2">
              <Link :href="route('user.edit', user.id)" as="button">詳細</Link>
            </td>  
          </tr>
        </div>
      </div>
    </div>
  </div>



  </AuthenticatedLayout>
</template>
