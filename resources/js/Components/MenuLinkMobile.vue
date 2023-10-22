<template>
    <Link
        class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"
        :class="{'font-bold underline': active }"
        aria-current="page"
        ><slot
    /></Link>
</template>

<script setup>
let props = defineProps({
    active: Boolean,
});
</script>
