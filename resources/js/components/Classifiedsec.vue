<template>
    <div class="row mx-auto" style="max-width:1800px">
       <div class="col-6">
           <div class="row">
               <div class="col-6">
                   <h2 v-if="currentLocation">
                       {{currentLocation}}
                   </h2>
               </div>
               <div class="col-6">
                   <h1 class="tw-font-bold tw-mt-3">
                       592 İlan
                   </h1>
               </div>
           </div>
       </div>
        <div class="col-6"></div>
        <div class="col-6">
            <div class="tw-bg-white tw-p-[10px] tw-rounded-lg tw-drop-shadow-sm tw-mt-2">
                <div class="tw-flex">
                    <img src="https://cdn.dribbble.com/userupload/3158902/file/original-7c71bfa677e61dea61bc2acd59158d32.jpg?resize=400x0"
                         class="tw-rounded-xl tw-w-[30%] tw-h-[30%] tw-drop-shadow-sm"/>
                    <div class="tw-h-[150px] tw-text-[18px] lg:tw-text-[18px] row">
                        <div class=" col align-items-start">
                            <div>
                                <h1 class="tw-font-bold">
                                    Reklam Pazarlama Uzmanı
                                </h1>
                                <h1 class="tw-font-semibold">
                                    Adonis Network
                                </h1>
                            </div>
<!--                            <i class="fa-regular fa-bookmark tw-mt-3"></i>-->
                        </div>

                        <div class="col align-items-end">
                            <h1>Esenyurt, Istanbul</h1>
                            <h1>14 gün</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 d-none d-md-block">
            <div class="tw-bg-white tw-h-full tw-drop-shadow-sm lg:tw-block tw-hidden tw-rounded-lg md:tw-block">
                <div>
                    <div class="tw-h-[8rem] tw-text-[14px] lg:tw-text-[2vh] tw-mr-[4vw] tw-flex tw-py-[8vh] tw-px-[6vw]">
                        <div>
                            <h1 class="tw-font-bold">
                                Reklam Pazarlama Uzmanı
                            </h1>
                            <h1 class="tw-font-semibold">Adonis Network</h1>
                            <div class="tw-flex-cols">
                                <h1 class="tw-mt-3">Esenyurt, Istanbul</h1>
                                <p
                                    class="tw-underline tw-underline-offset-2"
                                >
                                    Haritada Gör
                                </p>
                            </div>
                        </div>

                        <div>
                            <img
                                src="https://cdn.dribbble.com/userupload/3158902/file/original-7c71bfa677e61dea61bc2acd59158d32.jpg?resize=400x0"
                                class="tw-rounded-xl tw-w-[8vw] tw-h-[8vw] tw-drop-shadow-sm tw-ml-[3vw]"
                            />
                        </div>
                    </div>

                    <hr class="tw-mt-[15vh] tw-w-full" />

                    <div>
                        <div class="tw-py-[4vh] tw-px-[6vw]">
                            <h1 class="tw-font-bold tw-text-[2vh]">
                                İş Tanımı
                            </h1>
                            <h1 class="tw-mt-4">
                                Iş ilanı verilen web sitemiz için reklam
                                kampanyalarını yönetecek junior ya da mid
                                level pazarlamacı arıyoruz
                            </h1>
                        </div>

                        <div class="tw-flex tw-py-[0.5vh] tw-px-[6vw] tw-space-x-8">
                            <div>
                                <h1 class="tw-font-bold tw-text-[2vh]">
                                    Çalışma Türü
                                </h1>
                                <h1 class="tw-mt-4">Tam Zamanlı</h1>
                            </div>

                            <div>
                                <h1 class="tw-font-bold tw-text-[2vh]">
                                    Başvuru Sayısı
                                </h1>
                                <h1 class="tw-mt-4">0</h1>
                            </div>
                        </div>

                        <div class="tw-py-[2vh] tw-px-[6vw]">
                            <h1 class="tw-font-bold tw-text-[2vh]">
                                Maaş Bilgisi
                            </h1>
                            <h1 class="tw-mt-4">6.000 TL 7.000 TL/Aylık</h1>
                        </div>

                        <h1 class="tw-py-[2vh] tw-px-[6vw] tw-text-red-600">
                            İlani Şikayet Et
                        </h1>

                        <hr class="tw-mt-[1vh] tw-w-full" />

                        <div class="tw-py-[4vh] tw-px-[6vw]">
                            <h1 class="tw-font-bold tw-text-[2vh]">
                                İşveren Hakkında
                            </h1>
                            <h1 class="tw-mt-4">Eyüpsultan, Istanbul</h1>
                            <h1 class="tw-mt-4">
                                Iş ilanı verilecek sitemiz için reklam
                                kampanyalarını yönetecek eleman arıyorum
                            </h1>
                        </div>
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
    props:['currentLocation'],
    data(){
        return {
            jobs:[],
        }
    },
    mounted() {
        this.getJobList()
    },
    methods: {
        getJobList(page=1) {
            axios.get(apiUrl+`job?page=${page}`)
            .then(resp=>{
                let data = resp.data.data
                this.jobs = resp
            })
        },
    }
};
</script>

<style></style>
