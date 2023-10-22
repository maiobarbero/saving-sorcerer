<template>
    <Head>
        <title>Transactions List</title>
    </Head>
    <!-- @todo add searc, category dropdown, calendar -->
    <div class="mt-8 max-w-screen-xl mx-auto">
        <div class="flex justify-between gap-6 max-w-full">
            <TransactionAside
                :totalBalance="totalBalance"
                :incomes="incomes"
                :outcomes="outcomes"
                :monthTrend="monthTrend"
            />

            <div class="w-full">
                <ListingFilter
                    :filters="filters"
                    :categories="categories"
                    :bankAccounts="bankAccounts"
                />
                <div class="mt-8 w-full">
                    <table class="table table-pin-rows table-xs table-auto">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-4"></th>
                                <th scope="col" class="px-6 py-4">Amount</th>
                                <th scope="col" class="px-6 py-4">
                                    Bank Account
                                </th>
                                <th scope="col" class="px-6 py-4">Category</th>
                                <th scope="col" class="px-6 py-4">Date</th>
                                <!-- <th scope="col" class="px-6 py-4">
                                    Description
                                </th> -->
                                <th scope="col" class="px-6 py-4"></th>
                                <th scope="col" class="px-6 py-4"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="t in transactions.data">
                                <td
                                    class="whitespace-nowrap px-6 py-4 font-medium"
                                >
                                    <Link
                                        :href="
                                            route('transactions.show', {
                                                id: t.id,
                                            })
                                        "
                                        class="badge badge-secondary badge-outline badge-sm"
                                        >View</Link
                                    >
                                </td>
                                <td
                                    class="whitespace-nowrap px-6 py-4 font-medium"
                                >
                                    {{ t.amount }}
                                </td>
                                <td
                                    class="whitespace-nowrap px-6 py-4 font-medium"
                                >
                                    {{ t.bank_account.name }}
                                </td>
                                <!-- @todo id linked to icon -->
                                <td class="whitespace-nowrap px-6 py-4">
                                    {{ t.category.name }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    {{ t.date }}
                                </td>
                                <!-- <td class="whitespace-nowrap px-6 py-4">
                                    <div class="max-w-xs sm:max-w-md md:max-w-lg lg:max-w-xl whitespace-normal">{{ t.description }}</div>
                                    
                                </td> -->

                                <td class="whitespace-nowrap px-6 py-4">
                                    <span
                                        class="badge badge-primary badge-outline badge-sm"
                                        ><Link
                                            :href="
                                                route('transactions.edit', {
                                                    id: t.id,
                                                })
                                            "
                                            >Edit</Link
                                        ></span
                                    >
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <span
                                        class="badge badge-error badge-outline badge-sm"
                                        ><Link
                                            as="button"
                                            :href="
                                                route('transactions.destroy', {
                                                    id: t.id,
                                                })
                                            "
                                            method="delete"
                                            >Delete</Link
                                        ></span
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <Pagination class="mt-6" :links="transactions.links" />
            </div>
        </div>
    </div>
</template>

<script setup>
import Pagination from "../../Components/Pagination.vue";
import ListingFilter from "../../Components/ListingFilter.vue";
import TransactionAside from "../../Components/TransactionAside.vue";

let props = defineProps({
    transactions: Object,
    categories: Object,
    bankAccounts: Object,
    filters: Object,
    totalBalance: Number,
    incomes: Number,
    outcomes: Number,
    monthTrend:Number
});

</script>
