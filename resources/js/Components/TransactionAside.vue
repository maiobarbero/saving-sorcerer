<template>
    <aside class="basis-1/4">
        <div class="stats stats-vertical shadow sticky top-4">
            <div class="stat">
                <div class="stat-title">Total Balance</div>
                <div
                    class="stat-value total-balance cursor-pointer md:tooltip md:tooltip-bottom tooltip-primary"
                    @click="formatTotalBalance(totalBalance)"
                    data-formatted
                    data-tip="Click to format"
                >
                    €{{ totalBalance }}
                </div>
            </div>

            <div class="stat">
                <div class="stat-title">Last Month Trend</div>
                <div v-if="monthTrend > 0">
                    <div class="stat-value text-base mb-1">Upward</div>
                    <div class="stat-desc text-success">
                        ↗︎ +{{ monthTrend }}
                    </div>
                </div>
                <div v-if="monthTrend < 0">
                    <div class="stat-value text-base mb-1">Downward</div>
                    <div class="stat-desc text-error">↘︎ {{ monthTrend }}</div>
                </div>
                <div v-if="monthTrend == 0">
                    <div class="stat-value text-base mb-1">stable</div>
                </div>
            </div>
            <div class="stat">
                <Link
                    class="btn btn-primary btn-outline text-lg font-bold"
                    :href="route('transactions.create')"
                    >+</Link
                >
            </div>
        </div>
    </aside>
</template>

<script setup>
import { defineProps } from "vue";
import { watch } from "vue";

const props = defineProps({
    totalBalance: Number,
    incomes: Number,
    outcomes: Number,
    monthTrend: Number,
});

watch(
    () => [props.incomes, props.outcomes],
    (first, second) => {
        isGrown();
    }
);
const isGrown = () => {
    if (parseFloat(props.incomes) + parseFloat(props.outcomes) >= 0) {
        return true;
    }
    return false;
};
isGrown();

const formatTotalBalance = () => {
    const totalElement = document.querySelector(".total-balance");
    if (props.totalBalance < 1000) return;

    if (totalElement.dataset.formatted != "true") {
        totalElement.innerHTML = `${Math.round(props.totalBalance / 1000)}K`;
        totalElement.dataset.formatted = true;
    } else {
        totalElement.innerHTML = `€${props.totalBalance}`;
        totalElement.dataset.formatted = "";
    }
};

</script>
