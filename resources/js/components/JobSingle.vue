<template>
    <div class="row p-3">
        <div class="col-3">
            <img
                :src="job?.media[0]"
                class="tw-rounded-xl tw-h-20 tw-w-20"
            />
        </div>
        <div class="col-6">
            <h1 class="tw-font-bold">
                {{ job?.category?.name }}
            </h1>
            <h1
                class="tw-font-semibold tw-w-20 md:tw-w-full"
            >
                {{ job?.user?.company_name }}
            </h1>
            <h1>
                {{ job?.district?.name }},
                {{ job?.city?.name }}
            </h1>
        </div>
        <div class="col-3">
            <h1>{{ job?.created_at }}</h1>
        </div>
    </div>
</template>

<script>

export default {
    props:['job'],
    data() {
        return {

        };
    },
};
</script>
