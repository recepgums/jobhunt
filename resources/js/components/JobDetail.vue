<template>
    <div v-if="job" style="border-radius:20px;overflow-x: hidden;height:100%">
        <div :style="{'background-color':job?.theme?.color ?? 'white'}" style="border-radius:20px;overflow-x: hidden;height:100%">
            <div class="bant ">
                <div></div>
            </div>
            <span class="el-image-viewer__btn el-image-viewer__close d-none" @click="closeDrawer">
            <i class="la la-close"></i>
        </span>
            <div class="tw-flex tw-flex-col tw-row-span-2 w-full">
                <div class="tw-grid tw-col-span-5 text-center mx-auto">
                    <svg
                        v-if="job?.theme?.selectUrgent" class="urgent-tag"
                        width="74" height="72" viewBox="0 0 74 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_4_13)">
                            <rect width="74" height="72" fill="transparent"/>
                            <path d="M-0.0880811 42.2041L42.2041 -0.0880874L74.028 -0.08809L-0.0880748 74.028L-0.0880811 42.2041Z" fill="#AA2B36"/>
                            <path d="M29.0295 35.6982L27.173 34.7086L24.9935 36.8882L25.9831 38.7447L24.6173 40.1105L20.7243 31.9975L22.2741 30.4477L30.3953 34.3324L29.0295 35.6982ZM25.8072 33.9481L23.9834 32.9912C23.8635 32.9258 23.7081 32.844 23.5173 32.7458C23.3264 32.6422 23.1329 32.5386 22.9366 32.435C22.7403 32.326 22.5727 32.2292 22.4336 32.1447C22.5181 32.2837 22.619 32.4609 22.7362 32.6763C22.8534 32.8862 22.9639 33.0866 23.0675 33.2774C23.171 33.4683 23.2446 33.6046 23.2883 33.6863L24.2492 35.506L25.8072 33.9481Z" fill="white"/>
                            <path d="M32.992 31.8994C32.5394 32.3519 32.0719 32.6559 31.5894 32.8113C31.1041 32.9639 30.6052 32.9503 30.0927 32.7704C29.5802 32.5904 29.054 32.2306 28.5143 31.6908C27.9554 31.132 27.5942 30.5826 27.4306 30.0429C27.2671 29.4976 27.2698 28.9742 27.4388 28.4726C27.6106 27.9683 27.9186 27.4939 28.363 27.0496C28.6792 26.7333 28.9832 26.4921 29.2749 26.3258C29.5666 26.154 29.8405 26.0245 30.0968 25.9373L30.6938 27.2704C30.4185 27.3876 30.1718 27.5062 29.9537 27.6261C29.7329 27.7434 29.5379 27.8865 29.3689 28.0555C29.1508 28.2736 29.0213 28.5067 28.9804 28.7548C28.9368 29.0001 28.9818 29.2605 29.1154 29.5358C29.249 29.8111 29.4698 30.1028 29.7778 30.4109C30.0804 30.7135 30.3694 30.9261 30.6447 31.0488C30.9201 31.1715 31.1791 31.2096 31.4217 31.1633C31.6616 31.1142 31.8851 30.9861 32.0923 30.7789C32.3513 30.5199 32.5476 30.2555 32.6812 29.9856C32.812 29.713 32.9102 29.4186 32.9756 29.1023L34.0429 30.1696C33.972 30.4804 33.8575 30.7666 33.6994 31.0284C33.5467 31.2901 33.3109 31.5804 32.992 31.8994Z" fill="white"/>
                            <path d="M32.0392 23.5451L36.6109 28.1168L35.3637 29.3641L30.792 24.7923L32.0392 23.5451ZM29.6265 22.3756C29.8119 22.1902 30.015 22.0744 30.2358 22.028C30.4539 21.9789 30.6802 22.0716 30.9146 22.3061C31.1464 22.5378 31.2404 22.7654 31.1968 22.989C31.1504 23.2098 31.0346 23.4129 30.8492 23.5983C30.6611 23.7864 30.4566 23.9036 30.2358 23.9499C30.015 23.9908 29.7887 23.8954 29.557 23.6637C29.3226 23.4293 29.2285 23.2043 29.2749 22.989C29.3212 22.7682 29.4384 22.5637 29.6265 22.3756Z" fill="white"/>
                            <path d="M39.1707 25.557L37.9235 26.8042L31.5607 20.4414L32.8079 19.1942L39.1707 25.557Z" fill="white"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_4_13">
                                <rect width="74" height="72" fill="transparent"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <el-image
                        :src="job?.media[0]"
                        class="tw-rounded-xl tw-w-200 tw-h-200 tw-col-span-1"
                        :fit="'fill'"
                    ></el-image>
                </div>
                <div class="d-flex justify-content-around">
                    <div class="job-property">
                        <i class="la la-clock-o"></i>
                        {{ job?.work_type?.name }}
                    </div>
                    <div class="job-property">
                        <i class="la la-mars-double"></i>
                        {{
                            job?.gender?.name ?? "Farketmez"
                        }}
                    </div>
                    <div class="job-property">
                        <i class="la la-money"></i>
                        {{
                            job?.fee
                                ? job?.fee + " TL"
                                : "Belirtilmemiş"
                        }}
                    </div>
                    <div class="job-property">
                        <i class="el-icon-user"></i>
                        {{ job?.category?.name ?? '' }}
                    </div>
                </div>
            </div>

            <div class="p-3">
                <div >
                    <h1 style="font-size: 18px;font-weight: bolder; text-transform: capitalize;">
                        {{ job?.title }}
                    </h1>
                    <h1 style="color:rgb(251, 35, 106);font-weight: bold;padding-top:0.5rem;">
                        <i class="la la-map-marker"></i>
                        {{ job?.district?.name }},
                        {{ job?.city?.name }}
                    </h1>
                </div>
                <div >
                    <h2 class="mt-4 job-des">
                        {{ job?.description }}
                    </h2>
                </div>
                <div class="mt-2" style="position:absolute;bottom:20px;width: 90%">
                    <div class="row">
                        <div class="col-6">
                            <el-button style="width:100%;padding:15px;font-size:16px" @click="seeDetailsClicked" type="primary">
                                Detayları gör
                                <i class="el-icon-right"></i>
                            </el-button>
                        </div>
                        <div class="col-6">
                            <!--                        Mobile-->
                            <el-button class="d-block d-md-none" style="width:100%;font-size:20px" @click="getContactClicked(true)" type="success">
                                Ara
                                <i class="el-icon-phone"></i>
                            </el-button>
                            <el-button class="d-none d-md-block" style="width:100%;font-size:20px" @click="getContactClicked(false)" type="danger">
                                İletişime geç
                                <i class="el-icon-phone"></i>
                            </el-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <el-empty description="İlan Bulunamadı">
            <el-link>
                <a :href="process.env.MIX_API_URL + '/ilan' ">Tüm İlanları Gör</a>
            </el-link>
        </el-empty>
    </div>
</template>

<script>
const apiUrl = process.env.MIX_API_URL;
const appSub = process.env.MIX_SUB;
const appUrl = process.env.APP_URL;
export default {
    props:['job','isloggedin'],
    data() {
        return {
            jobs_index_url:null,
            showContactInformation:false,
        };
    },
    methods:{
        getContactClicked(isMobile = true){
            if (this.isloggedin){
                axios.post( `/${appSub}/ilan/${this.job.slug}/get_contact_info`)
                    .then(resp => {
                        this.showContactInformation = true
                        if (!isMobile){
                            //Desktop
                            this.$confirm(`
                        <img src="${resp.data.profile_image}" alt="">
                            <a href="tel:${resp.data.phone}">
                                      Telefon numarası: ${resp.data.phone}, <br>
                                      Email adresi: ${resp.data.email}
                            </a>
                        `, resp.data.name,
                                {
                                    dangerouslyUseHTMLString: true,
                                    confirmButtonText: 'Tamam',
                                    showCancelButton: false,
                                    showClose: false,
                                });
                        }else {
                            //Mobile
                            this.showContactInformation = true
                            window.location.href = 'tel://0' + resp.data.phone;
                        }
                    })
                this.showContactInformation =true;
            }else{
                window.location.href = '/'+appSub+'/giris'
            }


        },
        seeDetailsClicked(){
            window.location.href = '/'+appSub+'/ilan/' + this.job.slug
        },
        closeDrawer (){
            this.$emit('drawerToggle')
        }
    },
    watch:{
        showContactInformation(){

        },
    }
};
</script>
<style>
.job-property {
    text-align: left;
    color: rgb(95, 101, 158)
}

@media only screen and (max-width: 600px) {
    .el-drawer.btt {
        border-top-left-radius: 25px;
        border-top-right-radius: 25px;
    }

    .el-drawer__body {
        overflow: hidden !important;
    }

    .bant {
        margin: 0 5px;
        background-color: black;
        opacity: 0.3;
        height: 7px;
        text-align: center
    }

    .bant div {
        background-color: white;
        width: 30%;
        height: 7px;
        margin-right: auto;
        margin-left: auto;
        border-radius: 10px
    }

    .close-drawer {
        color: white;
        font-size: 40px;
        background-color: red;
        border-radius: 50px;
        width: 20px;
        position: relative;
        right: 10px;
        z-index: 2
    }

    .el-image-viewer__close {
        top: 2px;
        right: 2px;
        display: flex !important;
    }
    .icon-details{
        text-align: center;
        padding: 2px;
    }
    .icon-details p{
        line-height: 1;
        font-size: 10px !important;
    }
    .icon-details i{
        font-size: 20px;
    }
    .job-des{
        padding-bottom: 10vh !important;
    }
    .action-btns{
        width: 100% !important;
    position: fixed !important;
    bottom: 0 !important;
    padding-top: 10px !important;
    padding-bottom: 10px !important;
    margin-left: -15px !important;
    margin-right: -13px !important;
    background: white !important;
    padding-left: 10px !important;
    padding-right: 10px !important;
    }
    .el-button{
        font-size: 12px !important;
    }
}

.urgent-tag{
    position:absolute;
    top:0;
    left:0;
    z-index:3;
}
</style>
