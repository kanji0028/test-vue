<script setup>
</script>

<template>
<div v-if="$page.props.flash.message" class="p-2 m-1">
  {{ $page.props.flash.message }}
</div>
</template>