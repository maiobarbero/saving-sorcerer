<template>
    <Head>
        <title>Login</title>
    </Head>
    <section class="min-h-screen grid items-center">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <!-- @todo update image -->
                <img
                    class="mx-auto h-10 w-auto"
                    src="https://tailwindui.com/img/logos/mark.svg?color=purple&shade=600"
                    alt="Your Company"
                />
                <h2
                    class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900"
                >
                    Log in to your account
                </h2>
            </div>

            <div
                class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm border rounded-lg p-8"
            >
                <form class="space-y-6" @submit.prevent="submit">
                    <div>
                        <label
                            for="email"
                            class="block text-sm font-medium leading-6 text-gray-900"
                            >Email address</label
                        >
                        <div class="mt-2">
                            <input
                                v-model="form.email"
                                id="email"
                                name="email"
                                type="email"
                                required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-purple-600 sm:text-sm sm:leading-6"
                            />
                            <div
                                v-if="form.errors.email"
                                v-text="form.errors.email"
                                class="text-red-500 text-xs mt-1"
                            ></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label
                                for="password"
                                class="block text-sm font-medium leading-6 text-gray-900"
                                >Password</label
                            >

                            <div class="text-sm">
                                <a
                                    href="#"
                                    class="font-semibold text-purple-600 hover:text-purple-500"
                                    >Forgot password?</a
                                >
                            </div>
                        </div>
                        <div class="mt-2">
                            <input
                                v-model="form.password"
                                id="password"
                                name="password"
                                type="password"
                                required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-purple-600 sm:text-sm sm:leading-6"
                            />
                            <div
                                v-if="form.errors.password"
                                v-text="form.errors.password"
                                class="text-red-500 text-xs mt-1"
                            ></div>
                        </div>
                    </div>

                    <div>
                        <button
                            type="submit"
                            class="flex w-full justify-center rounded-md bg-purple-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-purple-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600"
                            :disabled="form.processing"
                        >
                            Log in
                        </button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-gray-500">
                    Not a member?
                    <a
                        href="#"
                        class="font-semibold leading-6 text-purple-600 hover:text-purple-500"
                        >Require a demo</a
                    >
                </p>
            </div>
        </div>
    </section>
</template>
<script>
import Layout from "../../Layouts/Layout.vue";

export default {
    layout: Layout,
};
</script>
<script setup>
import { useForm } from "@inertiajs/vue3";

let form = useForm({
    email: "",
    password: "",
});

let submit = () => {
    form.post("/");
};
</script>
