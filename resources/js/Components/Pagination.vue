<template>
    <div class="w-full mt-6 flex justify-center">
        <div class="join">
            <Component
                :is="link.url ? 'Link' : 'span'"
                v-for="link in links"
                :href="link.url"
                v-html="link.label"
                class="join-item btn"
                :class="{
                    'btn-active': link.active,
                    'btn-disabled': !link.url,
                }"
            />
        </div>
    </div>
</template>

<script setup>
let props = defineProps({
    links: Array,
});
</script>
