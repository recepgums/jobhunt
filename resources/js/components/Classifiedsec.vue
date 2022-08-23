<template>
    <div class="tw-grid lg:tw-grid-cols-5 tw-gap-x-10 tw-grid-cols-1">
        <div class="tw-grid tw-grid-rows-8 tw-w-full tw-col-span-3">
            <div class="tw-bg-white tw-h-40 tw-rounded-lg">
                <div
                    class="tw-grid lg:tw-grid-cols-6 tw-mt-7 tw-ml-4 tw-grid-cols-3 md:tw-grid-cols-5 tw-w-full"
                >
                    <img
                        src="https://cdn.dribbble.com/userupload/3158902/file/original-7c71bfa677e61dea61bc2acd59158d32.jpg?resize=400x0"
                        class="tw-rounded-xl tw-col-span-1 tw-h-20 tw-w-20"
                    />
                    <div
                        class="tw-col-span-2 lg:tw-col-span-5 md:tw-col-span-4"
                    >
                        <div class="tw-grid tw-grid-cols-8 tw-w-full">
                            <div class="md:tw-col-span-7 tw-col-span-6">
                                <h1 class="tw-font-bold">
                                    Reklam Pazarlama Uzmanı
                                </h1>
                                <h1 class="tw-font-semibold">Adonis Network</h1>
                            </div>
                            <i class="fa-regular fa-bookmark tw-col-span-1"></i>
                        </div>
                        <!--                            <i class="fa-regular fa-bookmark tw-mt-3"></i>-->

                        <div>
                            <h1>Esenyurt, Istanbul</h1>
                            <h1>14 gün</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="tw-col-span-2 tw-bg-white tw-h-[calc(100%+2rem)] tw-hidden lg:tw-block tw-rounded-lg"
        >
            <div class="tw-mt-7 tw-ml-7 tw-grid tw-grid-rows-2 tw-gap-y-8">
                <div class="tw-grid tw-grid-cols-6 tw-row-span-2">
                    <div class="tw-grid tw-grid-rows-3 tw-col-span-4">
                        <h1 class="tw-font-bold">Reklam Pazarlama Uzmanı</h1>
                        <h1 class="tw-mt-3">Esenyurt, Istanbul</h1>
                        <p class="tw-underline tw-underline-offset-2">
                            Haritada Gör
                        </p>
                    </div>

                    <img
                        src="https://cdn.dribbble.com/userupload/3158902/file/original-7c71bfa677e61dea61bc2acd59158d32.jpg?resize=400x0"
                        class="tw-rounded-xl tw-w-20 tw-h-20 tw-col-span-1"
                    />
                </div>

                <div class="tw-grid tw-rows-5 tw-gap-y-8">
                    <div>
                        <h1 class="tw-font-bold">İş Tanımı</h1>
                        <h1 class="tw-mt-4">
                            Iş ilanı verilen web sitemiz için reklam
                            kampanyalarını yönetecek junior ya da mid level
                            pazarlamacı arıyoruz
                        </h1>
                    </div>

                    <div class="tw-grid tw-grid-cols-2">
                        <div class="tw-flex tw-flex-col">
                            <h1 class="tw-font-bold">Çalışma Türü</h1>
                            <h1 class="tw-mt-2">Tam Zamanlı</h1>
                        </div>

                        <div class="tw-flex tw-flex-col">
                            <h1 class="tw-font-bold">Başvuru Sayısı</h1>
                            <h1 class="tw-mt-2">10</h1>
                        </div>
                    </div>

                    <div class="tw-flex tw-flex-col">
                        <h1 class="tw-font-bold">Maaş Bilgisi</h1>
                        <h1 class="tw-mt-2">30.000TL</h1>
                    </div>
                    <h1 class="tw-text-red-500">İlani Şikayet Et</h1>

                    <div class="tw-flex tw-flex-col">
                        <h1 class="tw-font-bold">İşveren Hakkında</h1>
                        <h1 class="tw-mt-2">Eyüpsultan, Istanbul</h1>
                        <h1 class="tw-mt-2 tw-w-60">
                            Iş ilanı verilecek sitemiz için reklam
                            kampanyalarını yönetecek eleman arıyorum
                        </h1>
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
    props: ["currentLocation"],
    data() {
        return {
            jobs: [],
        };
    },
    mounted() {
        this.getJobList();
    },
    methods: {
        getJobList(page = 1) {
            axios.get(apiUrl + `job?page=${page}`).then((resp) => {
                let data = resp.data.data;
                this.jobs = resp;
            });
        },
    },
};
</script>

<style></style>
