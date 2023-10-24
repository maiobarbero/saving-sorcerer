<template>
    <Head>
        <title>Transaction Form</title>
    </Head>
    <div class="shadow max-w-screen-xl mx-auto p-6 mt-8">
        <form @submit.prevent="transaction ? update() : create()">
            <div>
                <div class="flex justify-between items-center gap-3">
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Amount</span>
                        </label>
                        <input
                            v-model.number="form.amount"
                            type="text"
                            class="input input-bordered w-full max-w-xs"
                        />
                        <div v-if="form.errors.amount" class="input-error">
                            {{ form.errors.amount }}
                        </div>
                    </div>
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Date</span>
                        </label>
                        <input
                            v-model="form.date"
                            type="date"
                            class="input input-bordered w-full max-w-xs"
                        />
                        <div v-if="form.errors.date" class="input-error">
                            {{ form.errors.date }}
                        </div>
                    </div>
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Category</span>
                        </label>
                        <select
                            class="select select-bordered"
                            v-model="form.category_id"
                        >
                            <option disabled selected>Pick one</option>
                            <option
                                v-for="category in categories"
                                :key="category.id"
                                :value="category.id"
                            >
                                {{ category.name }}
                            </option>
                        </select>
                        <div v-if="form.errors.category_id" class="input-error">
                            {{ form.errors.category_id }}
                        </div>
                    </div>

                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Bank Account</span>
                        </label>
                        <select
                            class="select select-bordered"
                            v-model="form.bank_account_id"
                        >
                            <option disabled selected>Pick one</option>
                            <option
                                v-for="b in bankAccounts"
                                :key="b.id"
                                :value="b.id"
                            >
                                {{ b.name }}
                            </option>
                        </select>
                        <div
                            v-if="form.errors.bank_account_id"
                            class="input-error"
                        >
                            {{ form.errors.bank_account_id }}
                        </div>
                    </div>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Description</span>
                    </label>
                    <textarea
                        v-model="form.description"
                        class="textarea textarea-bordered h-24"
                        placeholder="Bio"
                    ></textarea>
                    <div v-if="form.errors.description" class="input-error">
                        {{ form.errors.description }}
                    </div>
                    <button
                        class="btn btn-primary mt-3 btn-outline"
                        type="submit"
                    >
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";

let props = defineProps({
    categories: Object,
    bankAccounts: Object,
    transaction: { type: Object, required: false },
});

const form = useForm({
    amount: props.transaction ? props.transaction.amount : 0,
    description: props.transaction ? props.transaction.description : null,
    category_id: props.transaction ? props.transaction.category_id : null,
    date: props.transaction ? props.transaction.date : null,
    bank_account_id: props.transaction
        ? props.transaction.bank_account_id
        : null,
});
const create = () => form.post(route("transactions.store"));
const update = () =>
    form.put(
        route("transactions.update", {
            id: props.transaction.id,
        })
    );
</script>
