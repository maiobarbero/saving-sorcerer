<template>
<form
                    class="flex justify-between space-x-4"
                    @submit.prevent="filter"
                >
                    <input
                        v-model="filterForm.search"
                        type="text"
                        placeholder="Search"
                        class="input input-bordered w-full max-w-xs input-sm"
                    />
                    <div class="form-control w-full max-w-xs">
                        <select
                            class="select select-bordered w-full max-w-xs select-sm"
                            v-model="filterForm.bank"
                        >
                            <option disabled selected></option>
                            <option
                                v-for="account in bankAccounts"
                                :key="account.id"
                                :value="account.id"
                            >
                                {{ account.name }}
                            </option>
                        </select>
                        <label class="label">
                            <span class="label-text-alt"
                                >Filter by bank account</span
                            >
                        </label>
                    </div>
                    <div class="form-control w-full max-w-xs">
                        <select
                            class="select select-bordered w-full max-w-xs select-sm"
                            v-model="filterForm.category"
                        >
                            <option disabled selected></option>
                            <option
                                v-for="category in categories"
                                :key="category.id"
                                :value="category.id"
                            >
                                {{ category.name }}
                            </option>
                        </select>
                        <label class="label">
                            <span class="label-text-alt"
                                >Filter by category</span
                            >
                        </label>
                    </div>
                    <div class="form-control w-full max-w-xs">
                        <input
                            type="date"
                            class="input input-bordered w-full max-w-xs input-sm"
                            v-model="filterForm.dateFrom"
                        />
                        <label class="label">
                            <span class="label-text-alt">From</span>
                        </label>
                    </div>
                    <div class="form-control w-full max-w-xs">
                        <input
                            type="date"
                            class="input input-bordered w-full max-w-xs input-sm"
                            v-model="filterForm.dateTo"
                        />
                        <label class="label">
                            <span class="label-text-alt">To</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Filter
                    </button>
                    <button
                        type="reset"
                        class="btn btn-secondary btn-outline hover:!text-white btn-sm"
                        @click="reset"
                    >
                        Reset
                    </button>
                </form>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
  filters: Object,
  categories: Object,
  bankAccounts:Object
})
const filterForm = useForm({
    search: props.filters.search ?? null,
    category: props.filters.category ?? null,
    dateTo: props.filters.to ?? null,
    dateFrom: props.filters.from ?? null,
    bank: props.filters.bank ?? null,
});
const filter = () => {
    filterForm.get(route('transactions.index'), {
        preserveState: true,
        preserveScroll: true,
    });
};
const reset = () => {
    filterForm.search = null;
    filterForm.category = null;
    filterForm.dateFrom = null;
    filterForm.dateTo = null;
    filterForm.bank = null;
    filter();
};
</script>

