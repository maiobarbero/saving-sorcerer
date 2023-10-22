<template>
    <div v-if="page.props.success.message" class="bg-success absolute z-50 bottom-4 right-4 p-2 rounded-md font-medium text-white min-w-[200px] text-center">
        {{ page.props.success.message }}
    </div>
    <div v-if="page.props.error.message" class="bg-error absolute z-50 bottom-4 right-4 p-2 rounded-md font-medium text-white min-w-[200px] text-center">
        {{ page.props.error.message }}
    </div>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3'

const page = usePage()

</script>
