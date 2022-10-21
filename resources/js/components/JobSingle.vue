<template>
    <div class="row job-list-element" style="width: 100%" role="button">
        <div class="col-4 px-0">
            <el-image
                :src="job?.media[0]"
                class="rounded-xl image-single"
                :fit="'fill'"
            ></el-image>
        </div>
        <div class="col-8 px-0">
              <span class="text-muted">
                {{ job?.category?.name }}
            </span>
            <h1 class="tw-font-bold" style="
                white-space: nowrap;
                    overflow: hidden !important;
                    text-overflow: ellipsis;
                    height:2em;
                    ">
                {{ job?.title }}
            </h1>

            <div class="d-flex justify-content-between align-items-end">
                <div style="color: #fb236a">
                    <i class="la la-map-marker"></i>
                    {{ job?.district?.name }}<small style="color:black;font-size:12px">, {{job?.city?.name}}
                    </small>
                </div>
                <div>
                    <small>
                        {{ job?.created_at }}
                    </small>
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
