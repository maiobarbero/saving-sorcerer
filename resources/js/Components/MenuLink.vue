<template>
    <Link
        class=" text-neutral-content rounded-md px-3 py-2 text-sm font-medium btn-ghost"
        :class="{ 'font-bold underline': active }"
        aria-current="page"
        ><slot />
    </Link>
</template>

<script setup>
let props = defineProps({
    active: Boolean,
});
</script>
