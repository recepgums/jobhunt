<template>
    <div class="row py-2"   style="width: 100%" role="button">
        <div class="col-4 px-0">
            <img :src="job?.media[0]" class="rounded-xl image-single"/>
        </div>
        <div class="col-8 px-0 py-2">
            <h1 class="tw-font-bold">
                {{ job?.title }}
            </h1>
            <span class="text-muted">
                {{ job?.category?.name }}
            </span>

            <div class="row align-items-end justify-content-between location-date" >
                <div class="col-7">
                    {{ job?.district?.name }},
                    {{ job?.city?.name }}
                </div>
                <div class="col-5 pr-2">
                    {{ job?.created_at }}
                </div>
            </div>
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
<style>
.location-date{
    font-size:16px
}
.image-single{
    width: 60vw;
    margin: auto;
    padding: 10px;
}
@media only screen and (max-width: 768px) {
    .location-date{
        font-size:14px;
        padding-right:0;
        padding-left:0;
    }
}
</style>
