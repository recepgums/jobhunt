<template>
    <div class="container-fluid p-0">
        <div style="width: 100%;background-color: #0b1b46" class="py-3" @back="goBack" >
            <div class="d-flex justify-content-around">
                <div class="text-left">

                </div>
                <div>
                    <a href="#" @click="goBack" style="color:#F56C6C;font-size:22px;font-weight:bolder">
                        <small>
                            isbull.com
                        </small>
                        /{{appSub}}
                    </a>
                </div>
            </div>
        </div>
        <div class="row no-gape" v-loading="fullscreenLoading"  element-loading-text="Yükleniyor...">
            <div class="col-sm-11 col-lg-8 column mx-auto" style="max-width:1000px">
                <div class="padding-left">
                    <el-card class="box-card mt-4" shadow="hover">
                        <h2 class="text-muted text-center" style="font-size:22px">{{formWizardTitle}}</h2>

                        <form-wizard color="#8b91dd" subtitle="" title=""
                                 :start-index="0"
                                 backButtonText="Geri"
                                 nextButtonText="İleri"
                                 finishButtonText="Yayınla"
                                 stepSize="sm"
                                 ref="wizard"
                                 @on-complete="toPaymentPage"
                    >
                        <wizard-step
                            slot-scope="props"
                            slot="step">
                        </wizard-step>
                        <div slot="finish" class="col-lg-12 py-3">
                            <el-button size="medium" style="margin-top: 12px;font-size: 18px;" type="danger">Yayınla!</el-button>
                        </div>
                        <div slot="next" class="col-lg-12 py-3">
                            <el-button size="medium" style="margin-top: 12px;font-size: 18px;" type="danger">İleri</el-button>
                        </div>
                        <div slot="prev" class="col-lg-12 py-3">
                            <el-button v-if="!$refs?.wizard?.isLastStep" size="medium" style="margin-top: 12px;font-size: 18px;" type="danger" plain>Geri</el-button>
                        </div>
                        <tab-content title="Kategori secimi(*)" icon="la la-info" :before-change="categoryValidation">
                            <div class="row">

                                <div @click="categoryClicked(category)" v-for="category in categories" :key="category.id"
                                     class="col-5 col-md-4 mx-auto">
                                    <a href="#" class="text-center card row my-2">
                                        <div v-if="category.id == formInline.parent_id">
                                            <el-card :body-style="{ textAlign:'center', backgroundColor:'rgba(184, 24, 40, 0.88)' }" shadow="hover">

                                                <img style="object-fit: cover;height: 150px;width:200px;margin: auto"
                                                     class="text-right "
                                                     :src="category.default_cover_image"
                                                     :alt="category.name">

                                                <div style="padding: 14px 0">
                                                    <div class="bottom clearfix">
                                                        <h1 class="time font-weight-bold" style="font-size:18px"> {{ category.name }}</h1>
                                                    </div>
                                                </div>
                                            </el-card>
                                        </div>
                                        <div v-else-if="category.id == formInline.category_id">
                                            <el-card :body-style="{ textAlign:'center', backgroundColor:'rgba(184, 24, 40, 0.88)' }" shadow="hover">

                                                <img style="object-fit: cover;height: 150px;width:200px;margin: auto"
                                                     class="text-right "
                                                     :src="category.default_cover_image"
                                                     :alt="category.name">

                                                <div style="padding: 14px 0">
                                                    <div class="bottom clearfix">
                                                        <h1 class="time font-weight-bold" style="font-size:18px"> {{ category.name }}</h1>
                                                    </div>
                                                </div>
                                            </el-card>
                                        </div>
                                        <div v-else>
                                            <el-card :body-style="{ textAlign:'center' }" shadow="hover">

                                                <img style="object-fit: cover;height: 150px;width:200px;margin: auto"
                                                     class="text-right "
                                                     :src="category.default_cover_image"
                                                     :alt="category.name">

                                                <div style="padding: 14px 0">
                                                    <div class="bottom clearfix">
                                                        <h1 class="time font-weight-bold" style="font-size:18px"> {{ category.name }}</h1>
                                                    </div>
                                                </div>
                                            </el-card>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </tab-content>
                        <tab-content title="İş Detayı" icon="la la-info" :before-change="titleDescriptionValidation">
                            <div class="col-lg-12 px-0">
                                <span class="rg-title mb-4">Video veya fotoğraf yükleyebilirsiniz(Zorunlu değil)</span>
                                <el-upload
                                    ref="upload"
                                    :action="actionUrl"
                                    list-type="picture-card"
                                    :headers="{ 'X-CSRF-TOKEN': csrf }"
                                    :on-remove="handleRemove"
                                    :on-change="handleUploadChange"
                                    :file-list="fileList"
                                    :data="formInline"
                                    :on-progress="handleProgress"
                                    :auto-upload="false"
                                    multiple
                                    class="text-left px-0"
                                    accept="image/*,video/*"
                                >
                                    <i class="el-icon-plus"></i>
                                </el-upload>
                                <el-dialog :visible.sync="dialogVisible">
                                    <img width="100%" :src="dialogImageUrl" alt="">
                                </el-dialog>
                            </div>

                            <div class="col-lg-12 py-3 px-0">
                                <span class="rg-title">İlan Başlığı(*) </span>
                                <div class="pf-field">
                                    <el-input placeholder="Başlık" v-model="formInline.title" minlength="10"
                                              size="medium"
                                              clearable
                                              maxlength="90"
                                              show-word-limit
                                    />
                                </div>
                            </div>

                            <div class="col-lg-12 py-3 px-0">
                                <span class="rg-title">İş tanımı(*)</span>
                                <div class="pf-field">
                                    <el-input
                                        type="textarea"
                                        :autosize=" { minRows: 6, maxRows: 10 }"
                                        placeholder="İşin ne olduğu, kaç saat çalışacağı, maaşların haftalık mı aylık mı ödeneceği, yol yemek parası, sigorta gibi bilgileri yazınız..."
                                        v-model="formInline.description"
                                        maxlength="300"
                                        show-word-limit
                                    >
                                    </el-input>
                                </div>
                            </div>
                        </tab-content>
                        <tab-content :before-change="onSubmit" title="Paket Seçimi ve Ödeme" icon="la la-cc-mastercard">
                            <div class="row">
                                <div class="col-6 py-3">
                                    <span class="rg-title">Şehir(*)</span>
                                    <div class="pf-field">
                                        <el-select
                                            filterable
                                            v-model="formInline.city"
                                            placeholder="Select"
                                            @change="cityChangedMethod"
                                        >
                                            <el-option
                                                v-for="item in cities"
                                                :key="item.value"
                                                :label="item.label"
                                                :value="item.value">
                                            </el-option>
                                        </el-select>
                                    </div>
                                </div>
                                <div class="col-6 py-3">
                                    <div class="pf-field">
                                        <span class="rg-title">İlçe(*)</span>
                                        <el-select v-model="formInline.district" placeholder="Select">
                                            <el-option
                                                v-for="item in districts"
                                                :key="item.value"
                                                :label="item.label"
                                                :value="item.value">
                                            </el-option>
                                        </el-select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 py-3">
                                    <span class="rg-title">Telefon numaranız(*)</span>
                                    <div class="pf-field">
                                        <VuePhoneNumberInput
                                            ref="vuePhoneTel"
                                            default-country-code="TR"
                                            v-model="formInline.phone"/>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 py-3">
                                    <div class="row">
                                        <div class="col-6 pr-0">
                                            <span class="rg-title">Aylık ücret</span>
                                            <div class="pf-field">
                                                <el-input-number class="mx-auto"  style="width: 100%" :disabled="fee_disabled" v-model="formInline.fee"
                                                                 :min="5500"
                                                                 :step="500" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <span class="rg-title"> &nbsp;</span>
                                            <div class="pf-field">
                                                <el-checkbox v-model="fee_disabled" label="1" border>
                                                    Ücret belirtmeyeceğim
                                                </el-checkbox>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 py-3">
                                    <span class="rg-title">Aradığınız personelin cinsiyeti(*)</span>
                                    <div class="pf-field radio-buttons">
                                        <el-radio  v-for="item in genders" :key="item.value" v-model="formInline.gender" :label="item.value" border>{{item.label}}</el-radio>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 py-3">
                                    <span class="rg-title">Çalışma türü(*)</span>
                                    <div class="pf-field radio-buttons">
                                        <el-radio v-for="item in work_types" :key="item.value" v-model="formInline.work_type" :label="item.value" border>{{item.label}}</el-radio>
                                    </div>
                                </div>
                            </div>
                        </tab-content>
                        <tab-content title="Paket Seçimi ve Ödeme" icon="la la-cc-mastercard">
                            <div class="plans-sec">
                                <div v-if="job">
                                   <div class="card-body shadow-lg  mb-4 bg-white rounded" style="padding:0">
                                       <JobSingle :theme="theme" :job="job"></JobSingle>
                                   </div>
                                    <div style="background-color:wheat;border-radius:7px" class="text-center p-2">
                                        <h1>İlan ön izleme</h1>
                                        <small class="text-muted text-left">
                                            İlanınız, diğer kullanıcılara bu şekilde gözükecektir.
                                            <br>
                                            Dilerseniz, aşağıdaki seçenekleri deneyerek ilanınızın görünümünü değiştirebilirsiniz
                                        </small>
                                    </div>
                                    <el-divider></el-divider>
                                    <div class="row text-center mb-3">
                                        <div class="col-md-6 col-sm-12 my-2">
                                            <span> Arka plan rengi <del>(20₺)</del> (Ücretsiz)</span>
                                            <br>
                                            <el-tag v-for="item in predefineColors"
                                                    :key="item.value"
                                                    @click="changeColor(item.value)"
                                                    style="width:33%;cursor:pointer;color:black"
                                                    :style="{'background-color':item.value}">
                                                {{ item.label }}
                                            </el-tag>
<!--                                            <el-color-picker
                                                             @active-change="changeColor"
                                                             :show-alpha="false"
                                                             v-model="theme.color"
                                                             :predefine="predefineColors"
                                            ></el-color-picker>-->
                                        </div>
<!--                                        <div class="col-md-6 col-sm-12 color-picker-mobile">
                                            <span>Yayında kalacağı süre</span>
                                            <el-radio-group style="width: 100%;" v-model="theme.selectedDate" >
                                                <el-radio-button  v-for="item in dateOptions"
                                                                  :key="item.value"
                                                                 :label="item.label"></el-radio-button>
                                            </el-radio-group>

&lt;!&ndash;                                            <el-select v-model="theme.selectedDate" placeholder="Select">
                                                <el-option
                                                    v-for="item in dateOptions"
                                                    :key="item.value"
                                                    :label="item.label"
                                                    :value="item.value">
                                                    <span style="float: left">{{ item.label.split('(')[0] }}</span>
                                                    <del style="float: left">{{ item.label }}</del>
                                                    <span style="float: right;">Ücretsiz</span>
                                                </el-option>
                                            </el-select>&ndash;&gt;
                                        </div>-->
                                        <div class="col-md-6 col-sm-12">
                                            <span>Benim işim acil <del>(500₺)</del> (Ücretsiz)</span>
                                            <br>
                                            <el-switch
                                                v-model="theme.selectUrgent"
                                                active-color="#AA2B36"
                                            >
                                            </el-switch>
                                        </div>
                                    </div>
                                    <el-alert
                                        class="mt-1"
                                        :closable="false"
                                        type="success">
                                        <div slot="title" class="col-lg-12 text-black">
                                            isbull.com'un açılış kampanyası boyunca  01 Şubat 2023 tarihine kadar yapacağınız her türlü ilan ve ilan özelliği tamamen ücretsiz!.
                                            <br><br>
                                            Merak etmeyin, isbull.com 'da her zaman ücretsiz ilan verme seçeneklerimiz olacak. :)

                                        </div>
                                    </el-alert>

                                </div>
                            </div>
                        </tab-content>
                    </form-wizard>
                    </el-card>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import 'vue-select/dist/vue-select.css';
import 'vue-phone-number-input/dist/vue-phone-number-input.css';

import VuePhoneNumberInput from 'vue-phone-number-input';
import JobSingle from "./JobSingle";

const apiUrl = process.env.MIX_API_URL;
const appSub = process.env.MIX_SUB;
const appUrl = process.env.MIX_APP_URL;
export default {
    props: ['csrf','telefon'],
    components: {
        VuePhoneNumberInput,
        JobSingle
    },
    data() {
        return {
            dialogImageUrl: '',
            predefineColors: [
                {label:'Yok',value:'#FFFFFF'},
                {label:'Sarı',value:'#F8F9D7'},
                {label:'Mavi',value:'#BCCEF8'},
                {label:'Kahve',value:'#E4DCCF'},
                {label:'Yeşil',value:'#C4DFAA'},
                {label:'Kırmızı',value:'#FFD1D1'},
            ],
            formWizardTitle: 'Kategori seçiniz',
            fullscreenLoading: false,
            dialogVisible: false,
            appSub:appSub,
            formInline: {
                title: null,
                category_id: null,
                parent_id:null,
                description: null,
                work_type: null,
                city: null,
                district: null,
                fee: null,
                gender: null,
                package_id: 1,
                phone: null,
                sleep_after_at: null
            },
            theme:{
                selectUrgent:false,
                selectedDate:0,
                color: '',
            },
            dateOptions:[
                {label:'1 gün',value:0},
                {label:'3 gün',value:1},
                {label:'7 gün',value:2},
            ],
            percentage: 0,
            isJobCreated: false,
            fileList: [],
            url: '',
            id: '',
            actualFiles: [],
            fee_disabled: false,
            categories: [],
            actionUrl: appUrl + '/ilan',
            cities: [],
            work_types: [],
            genders: [],
            districts: [],
            packages: [],
            job:null,
            slug: null,

        }
    },
    mounted() {
        this.getDatas()
        const slugArray = (new URL(window.location.href)).pathname.split('/');
        let slug = slugArray.length > 4 ? slugArray[3]   : null
        if (slug){
            this.slug = slug
            axios.get(apiUrl+'job/'+slug)
                .then(resp=>{
                    this.formInline.title = resp.data.data.title
                    this.formInline.description = resp.data.data.description
                    this.formInline.work_type = resp.data.data.work_type.id
                    this.formInline.category_id = resp.data.data.category.id
                    this.formInline.parent_id = resp.data.data.category.parent_id
                    this.formInline.city = resp.data.data.city.id
                    this.formInline.district = resp.data.data.district.id
                    this.formInline.fee = resp.data.data.fee
                    this.formInline.gender = resp.data.data.gender.id
                    this.formInline.phone = resp.data.data.phone
                    this.theme = resp.data.data.theme
                    resp.data.data.media.map(q=>{
                        this.fileList.push({name: q, url: q})
                    })
                    this.formInline.sleep_after_at = resp.data.data.sleep_after_at
            })
        }
    },
    methods: {
        onSubmit() {
            if (this.isJobCreated) {
                return true
            }

            let {uploadFiles} = this.$refs.upload
            let form = new FormData()
            uploadFiles.forEach(item => {
                form.append('files[]', item.raw)
            })
            form.append('gender_id', this.formInline.gender ?? null)
            form.append('work_type_id', this.formInline.work_type ?? null)
            form.append('city_id', this.formInline.city ?? null)
            form.append('district_id', this.formInline.district ?? null)
            form.append('title', this.formInline.title)
            form.append('description', this.formInline.description)
            form.append('fee', this.formInline.fee ?? null)
            form.append('category_id', this.formInline.category_id)
            form.append('phone', this.formInline.phone)
            form.append('sleep_after_at', this.formInline.sleep_after_at)
            form.append('package_id', this.formInline.package_id ?? 1)

            this.fullscreenLoading = true

            if (this.slug){
                axios.post('/'+appSub+'/ilan' + '/' + this.slug,
                    form,
                    {
                        headers: {
                            'X-CSRF-TOKEN': this.csrf,
                            'content-type': 'multipart/form-data',
                            'Accept' : 'application/json'
                        },
                        onUploadProgress: this.handleProgress
                    }).then(resp => {
                        this.job = resp.data.job
                        this.isJobCreated = true;
                        this.$refs.wizard.nextTab();
                        this.fullscreenLoading = false
                        this.formWizardTitle = 'Paket seçimi - İlan özelleştirme'
                    }).catch(err => {
                        //todo
                        console.log(err)
                        this.fullscreenLoading = false
                        this.$notify({
                            title: 'Eksik alanları doldurunuz.',
                            type: 'error',
                            message: err.response.data.message
                        });
                    })
            }else{
                axios.post(
                    '/'+appSub+'/ilan',
                    form,
                    {
                        headers: {
                            'X-CSRF-TOKEN': this.csrf,
                            'content-type': 'multipart/form-data',
                            'Accept' : 'application/json'
                        },
                        onUploadProgress: this.handleProgress
                    })
                    .then(resp => {
                        this.job = resp.data.job
                        this.isJobCreated = true;
                        this.$refs.wizard.nextTab();
                        this.fullscreenLoading = false
                        this.formWizardTitle = 'Paket seçimi - İlan özelleştirme'
                    })
                    .catch(err => {
                        //todo
                        this.fullscreenLoading = false
                        this.$notify({
                            title: 'Eksik alanları doldurunuz.',
                            type: 'error',
                            message: err.response.data.message
                        });
                    })
            }
        },

        toPaymentPage() {
            if (!this.job.slug) {
                this.$notify({
                    title: 'Is ilani olustururken hata olustu!',
                    type: 'error',
                    message: 'Sayfayi yenileyip tekrar deneyiniz 🙏'
                });

                return false
            }
            this.fullscreenLoading = true

            axios.put('/'+appSub+'/ilan'+ '/' + this.job.slug,{
                theme:this.theme
            }).then(resp=>{
                this.fullscreenLoading = false
                setTimeout(() => {
                    window.location.href = window.location.origin + '/'+appSub+'/ilan/' + this.job.slug + '/odeme';
                }, 500)
            }).catch(err => {
                this.fullscreenLoading = false
                this.$notify({
                    title: 'Hata',
                    type: 'error',
                    message: err.response.data.message
                });
            });
        },
        handleProgress(progressEvent) {
            let pers = Math.floor((progressEvent.loaded * 100) / progressEvent.total);
            this.percentage = pers
        },
        handleUploadChange(file) {
            this.actualFiles.push(file);
        },
        handleRemove(file, fileList) {
            this.actualFiles.pop();
        },
        cityChangedMethod(){
            this.formInline.district = null;
            let selectedCity = this.formInline.city
            axios.get(apiUrl +`city/${selectedCity}/district` )
                .then(resp => {
                    this.districts = resp.data.map(q => {
                        return {label: q.name, value: q.id}
                    })
                })
        },
        getDatas() {
            this.fullscreenLoading = true
            axios.get(apiUrl + 'job-create-data').then(resp => {
                this.categories = resp.data.categories
                this.cities = resp.data.cities.map(q => {
                    return {label: q.name, value: q.id}
                })
                this.work_types = resp.data.work_types.map(q => {
                    return {label: q.name, value: q.id}
                })
                this.genders = resp.data.genders.map(q => {
                    return {label: q.name, value: q.id}
                })
                this.districts = resp.data.selected_city.districts.map(q => {
                    return {label: q.name, value: q.id}
                })

                this.formInline.gender = this.genders.filter(q => q.label == 'Erkek')[0]
                this.formInline.work_type = this.work_types.filter(q => q.value == 1)[0]
                this.formInline.city = resp.data.selected_city.id

                this.packages = resp.data.packages
                this.formInline.phone = this.telefon
                this.formInline.package_id = this.packages.filter(q => q.is_highlighted == true)[0]?.id ?? 1
                this.fullscreenLoading = false
            })

        },
        goBack(){
            window.location.href = appUrl;
        },
        changeColor(color){
          this.theme.color = color
        },
        categoryClicked(category) {
            axios.get(apiUrl + 'category/' + category.id + '/sub-category')
                .then(resp => resp.data)
                .then(resp => {
                    if (resp.length > 1) {
                        this.categories = resp
                    } else {
                        this.formInline.category_id = category.id;
                        // this.fileList.push({name: category.name, url: category.default_cover_image})
                        this.$refs.wizard.nextTab()
                    }
                })
        },
        categoryValidation(){
            if (this.formInline.category_id){
                this.formWizardTitle = 'Detayları giriniz'
                return true
            }
            this.$notify({
                title: 'Kategori seçiniz',
                type: 'error',
                message: 'İlan vermek istediğiniz kategoriye tıklayarak seçiniz'
            });
        },
        titleDescriptionValidation(){
            if (!this.formInline.title){
                this.$notify({
                    title: 'İlan Başlığını giriniz',
                    type: 'error',
                });
                return false
            }
            if (!this.formInline.description){
                this.$notify({
                    title: 'İş tanımı giriniz',
                    type: 'error',
                    message: 'İş tanımı kısmında, iş arayanların merak edebileceği bilgileri belirtiniz',
                });
                return false
            }

            this.formWizardTitle = 'İletişim ve haklar'
            return true
        },
    }
}
</script>
<style>
.vue-form-wizard .wizard-header{
    padding: 0;
}
.vue-form-wizard {
    margin-left: auto !important;
    margin-right: auto !important;
    max-width: 1800px;
}

.vue-form-wizard .wizard-icon-circle .wizard-icon-container {
    border-radius: 60%;
}

.vue-form-wizard .wizard-tab-content {
    padding: 65px 20px 10px;
}

.el-button.el-button--danger.el-button--medium{
    padding:15px 40px;
}
.vue-form-wizard .wizard-card-footer{
    padding:0
}

@media only screen and (max-width: 600px) {
    .vue-form-wizard .wizard-tab-content {
        padding: 35px 0;
    }
    .el-card__body, .el-main{
        padding: 10px;
    }
    .el-button.el-button--danger.el-button--medium{
        padding:15px 40px;
    }
    .radio-buttons {
        text-align: center;
    }
    .radio-buttons .is-bordered{
        width: 45%;
        margin-right: 10px;
        margin-left: unset !important;
    }
    .color-picker-mobile{
        margin-top: 32px;
        margin-bottom: 32px;
        text-align: center;
    }
    .el-divider--horizontal{
        display: none !important;
    }
    .box-with-shadow{
        box-shadow: 5px 7px 12px 1px #dddddd;
        margin: 0px;
    }
}

.box-with-shadow .el-color-picker__trigger{
    position: relative;
    top: 2vh;
}

.img-wrap {
    position: relative;
}

.img-wrap .close {
    top: 2px;
    color: red;
    right: 2px;
    z-index: 100;
}

p {
    margin: 0;
}

.el-select{
    width:100%
}

.rg-title{
    font-size: 16px;
    font-weight: bold;
    margin:10px 0
}
.pf-field{
    padding-top: 5px;
}

.button {
    padding: 0;
    float: right;
}

.image {
    width: 100%;
    display: block;
}

.clearfix:before,
.clearfix:after {
    display: table;
    content: "";
}

.clearfix:after {
    clear: both
}
.el-loading-spinner .circular{
    margin-left:48%
}
body{
    overflow-x: hidden;
}
.el-color-dropdown__main-wrapper{
    display:none
}
.el-color-dropdown__value{
    display:none
}
.el-checkbox.is-bordered {
padding: 10px;
}
</style>
