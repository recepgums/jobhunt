<template>
    <div class="bg-white">
        <div class="tw-py-3 tw-px-3 tw-grid tw-grid-rows-2 tw-gap-y-8">
            <div class="tw-flex tw-flex-col tw-row-span-2 w-full">
                <div
                    class="tw-grid mb-3 tw-col-span-5 text-center mx-auto"
                >
                    <img
                        v-for="media in job?.media"
                        :src="media"
                        class="tw-rounded-xl tw-w-200 tw-h-200 tw-col-span-1"
                    />
                </div>
                <div
                    class="tw-flex tw-col-span-5 text-left mx-auto tw-flex-col"
                >
                    <h1 class="tw-font-bold tw-pr-4">
                        {{ job?.title }}
                    </h1>
                    <div>
                        <h1 class="tw-pt-3">
                            {{ job?.district?.name }},
                            {{ job?.city?.name }}
                        </h1>
                    </div>
                </div>
            </div>

            <div class="tw-grid tw-rows-5 tw-gap-y-8">
                <div class="tw-flex tw-flex-col">
                    <h1 class="tw-font-bold">İş Tanımı</h1>
                    <h1 class="tw-pt-4">
                        {{ job?.description }}
                    </h1>
                </div>

                <div class="tw-flex tw-flex-col">
                    <h1 class="tw-font-bold">Uzmanlık</h1>
                    <h1 class="tw-pt-2">{{ job?.category?.name }}</h1>
                </div>

                <div class="tw-grid tw-grid-cols-2">
                    <div class="tw-flex tw-flex-col">
                        <h1 class="tw-font-bold">Çalışma Türü</h1>
                        <h1 class="tw-pt-2">
                            {{ job?.work_type?.name }}
                        </h1>
                    </div>
                    <div class="tw-flex tw-flex-col">
                        <h1 class="tw-font-bold">Başvuru Sayısı</h1>
                        <h1 class="tw-pt-2">10</h1>
                    </div>
                </div>
                <div class="tw-grid tw-grid-cols-2">
                    <div class="tw-flex tw-flex-col">
                        <h1 class="tw-font-bold">Maaş Bilgisi</h1>
                        <h1 class="tw-pt-2">
                            {{
                                job?.fee
                                    ? job?.fee + " TL"
                                    : "Belirtilmemiş"
                            }}
                        </h1>
                    </div>
                    <div class="tw-flex tw-flex-col">
                        <h1 class="tw-font-bold">Cinsiyet</h1>
                        <h1 class="tw-pt-2">
                            {{
                                job?.gender?.name ?? "Farketmez"
                            }}
                        </h1>
                    </div>
                </div>

                <div class="row text-center mx-auto">
                    <div class="col-sm">
                        <el-button @click="seeDetailsClicked" size="medium" type="primary">
                            Detayları gör
                        </el-button>
                    </div>
                    <div class="col-sm" v-if="!showContactInformation">
                        <el-button @click="getContactClicked" size="medium"  type="danger">
                            İletişim bilgilerini gör
                        </el-button>
                    </div>
                    <div class="col-sm btn text-white" v-if="showContactInformation">

                        <a class="btn-success btn" :href="'to:'+phoneNumber">
                            <i class="la la-phone"></i>
                            Ara ({{phoneNumber}})
                        </a>


                        <a class="btn-warning btn" :href="'mailto:'+emailAddress">
                            <i class="la la-envelope-o"></i>
                            {{ emailAddress }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const apiUrl = process.env.MIX_API_URL;
const appUrl = process.env.APP_URL;
export default {
    props:['job','isloggedin'],
    data() {
        return {
            showContactInformation:false,
            phoneNumber:'#'
        };
    },
    methods:{
        getContactClicked(){
            if (this.isloggedin){
                axios.post( `/ilan/${this.job.slug}/get_contact_info`)
                    .then(resp => {
                        this.showContactInformation = true
                        this.phoneNumber =  + resp.data.phone
                        this.emailAddress = 'mailto:' + resp.data.email
                    })
            }else{
                window.location.href = '/kayit'
            }
        },
        seeDetailsClicked(){
            window.location.href = '/ilan/' + this.job.slug
        }
    }
};
</script>
<style>
.job-drawer-container{
    height: 35rem;
    overflow: scroll;
}
</style>
