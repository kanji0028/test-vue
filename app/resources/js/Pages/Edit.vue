<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
  user: String,
})
let form = useForm({
  name: props.user.name,
  email: props.user.email,
});
let submit = () => {
  form.patch(`/user/${props.user.id}`);
};

</script>

<template>

  <Head>
    <title>ユーザー詳細ページ</title>
    <meta name="description" content="これはユーザー詳細ページです。">
  </Head>

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">ユーザー詳細</h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            <h2 class="text-lg font-bold mb-3">ユーザー詳細</h2>
            <div class="flex items-center justify-center p-12">
              <div class="mx-auto w-full max-w-[800px]">
                <form @submit.prevent="submit">
                  <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                      <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-bold text-[#07074D]">
                          名前
                        </label>
                        <input v-model="form.name" type="text" name="name" id="name" placeholder="名前"
                          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium outline-none focus:border-[#6A64F1] focus:shadow-md" v-bind:class="{'border-red-300': form.errors.name}"/>
                        <div v-show="form.errors.name" class="p-1 m-1 text-sm text-red-400">{{ form.errors.name }}</div>
                      </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                      <div class="mb-5">
                        <label for="email" class="mb-3 block text-base font-bold text-[#07074D]">
                          メールアドレス
                        </label>
                        <input v-model="form.email" type="text" name="email" id="email" placeholder="アドレス"
                          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 outline-none focus:border-[#6A64F1] focus:shadow-md" v-bind:class="{'border-red-300': form.errors.email}"/>
                        <div v-show="form.errors.email" class="p-1 m-1 text-sm text-red-400">{{ form.errors.email }}</div>
                      </div>
                    </div>
                  </div>

                  <button
                    :disabled="form.processing"
                    type="submit" 
                    class="hover:shadow-form hover:bg-gray-700 rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none ease-in-out duration-150">
                    更新する
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
