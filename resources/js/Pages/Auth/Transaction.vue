<template>
    <Head>
        <title>Transaction id: {{transaction.id}}</title>
    </Head>
    <div class="mt-8 max-w-screen-xl mx-auto">
        <div
            class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700"
        >
        <div class="border-b-2 border-neutral-100 px-6 py-3 flex items-center justify-between">
            <h5
                class="text-xl font-medium leading-tight dark:border-neutral-600 dark:text-neutral-50"
            >
                Transaction of €{{ transaction.amount }} on {{ transaction.date }}
            </h5>
            <Link class="font-bold text-gray-400 hover:text-gray-900" :href="route('transactions.index')">X</Link>
        </div>
            <div class="p-6">
                <h5
                    class="mb-4 text-xl leading-tight text-neutral-800 dark:text-neutral-50"
                >
                    Bank Account: <strong>{{ transaction.bank_account.name }}</strong>
                </h5>
                <h5
                    class="mb-4 text-xl leading-tight text-neutral-800 dark:text-neutral-50"
                >
                    Category: <strong>{{ transaction.category.name }}</strong>
                </h5>
                <h5
                    class="mb-4 text-xl leading-tight text-neutral-800 dark:text-neutral-50"
                >
                   Description:
                </h5>
                <p
                    class="mb-4 text-base text-neutral-600 dark:text-neutral-200"
                >
                    {{ transaction.description }}
                </p>
                <div class="space-x-4">
                    <Link
                        :href="route('transactions.edit',{'id':transaction.id})"
                        class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                    >
                        Edit
                    </Link>
                    <Link
                        :href="route('transactions.destroy',{'id':transaction.id})" method="delete" as="button"
                        class="inline-block rounded bg-error px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                    >
                        Delete
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
let props = defineProps({
    transaction: Object,
});
</script>
