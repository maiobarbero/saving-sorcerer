<template>
    <Head>
        <meta
            type="description"
            content="Saving Sorcerer helps you to track your money"
            head-key="description"
        />
    </Head>

    <section>
        <!-- @todo add Navbar -->
    </section>

    <section class="lg:max-w-7xl max-w-3xl mx-auto">
        <!-- Main content here -->
        <slot />
    </section>

    <section>
        <Footer />
    </section>

</template>

<script setup>
import Footer from '../Components/Footer.vue';
</script>
