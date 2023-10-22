<template>
    <Head>
        <meta
            type="description"
            content="Saving Sorcerer helps you to track your money"
            head-key="description"
        />
    </Head>

    <section>
        <Nav />
    </section>

    <section class="lg:max-w-7xl max-w-3xl mx-auto min-h-screen">
        <FlashMessage />
        <!-- Main content here -->
        <slot />
    </section>

    <section>
        <Footer />
    </section>
</template>

<script setup>
import Nav from "../Components/Nav.vue";
import Footer from "../Components/Footer.vue";
import FlashMessage from "../Components/FlashMessage.vue";
</script>
