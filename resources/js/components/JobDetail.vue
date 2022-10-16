<template>
    <div class="bg-white" style="border-radius:20px">
        <div class="tw-py-3 tw-px-3 tw-grid tw-grid-rows-2 tw-gap-y-8">
            <div class="tw-flex tw-flex-col tw-row-span-2 w-full">
                <div
                    class="tw-grid mb-3 tw-col-span-5 text-center mx-auto"
                >
                    <el-image
                        :src="job?.media[0]"
                        class="tw-rounded-xl tw-w-200 tw-h-200 tw-col-span-1"
                        :fit="'fill'"
                        :preview-src-list="job?.media"
                    ></el-image>
                </div>
                <div>
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
                <div class="row">
                    <div class="col-6">
                        <el-button style="width:100%" @click="seeDetailsClicked" type="primary">
                            Detayları gör
                        </el-button>
                    </div>
                    <div class="col-6">
                        <el-button style="width:100%" @click="getContactClicked" type="danger">
                            Ara
                        </el-button>
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
        };
    },
    methods:{
        getContactClicked(){
            if (this.isloggedin){
                axios.post( `/firinci/ilan/${this.job.slug}/get_contact_info`)
                    .then(resp => {
                        this.showContactInformation = true
                        window.location.href = 'tel://0' + resp.data.phone;
                    })
            }else{
                window.location.href = '/firinci/giris'
            }
        },
        seeDetailsClicked(){
            window.location.href = '/firinci/ilan/' + this.job.slug
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
