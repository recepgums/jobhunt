<template>
    <div class="row job-list-element" style="width: 100%" role="button">
        <div class="col-4 px-0">
            <el-image
                :src="job?.media[0]"
                class="rounded-xl image-single"
                :fit="'fill'"
                :preview-src-list="job?.media"
            ></el-image>
        </div>
        <div class="col-8 px-0 py-2">
              <span class="text-muted">
                {{ job?.category?.name }}
            </span>
            <h1 class="tw-font-bold">
                {{ job?.title }}
            </h1>


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
    font-size:15px;
    position: absolute;
    bottom: 10px;
}
.image-single{
    width: 100%;
    height: auto;
    margin: auto;
    padding: 10px;
    max-height:150px
}
.job-list-element{
    max-height: 600px;
}
@media only screen and (max-width: 768px) {
    .location-date{
        font-size:14px;
        padding-right:0;
        padding-left:0;
    }
    .image-single   {
        max-height:100px
    }
}
</style>
