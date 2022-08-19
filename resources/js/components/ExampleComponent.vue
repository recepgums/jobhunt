<template>
    <div class="container">
        <div class="row no-gape">
            <div class="col-lg-10 column mx-auto">
                <div class="padding-left">
                    <form-wizard color="#8b91dd" subtitle="" title="İş ilanı ver"
                         backButtonText="Geri"
                         nextButtonText="İleri"
                         finishButtonText="Yayınla"
                         stepSize="sm"
                         ref="wizard"
                                 @on-complete="toPaymentPage"
                         class="'mb-5'"
                    >
                        <wizard-step
                            slot-scope="props"
                            slot="step">
                        </wizard-step>
                        <div slot="finish" class="col-lg-12">
                            <div class="browse-all-cat">
                                <a href="#" title="">Yayınla!</a>
                            </div>
                        </div>
                        <div slot="next" class="col-lg-12">
                            <div class="browse-all-cat">
                                <a href="#" title="">İleri</a>
                            </div>
                        </div>
                        <div slot="prev" class="col-lg-12">
                            <div class="browse-all-cat">
                                <a href="#" title="">Geri</a>
                            </div>
                        </div>
                        <tab-content title="Kategori secimi" icon="la la-info">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cat-sec">
                                        <div class="row no-gape">

                                            <div @click="categoryClicked(category)"  v-for="category in categories" class="col-lg-4 col-md-4 col-sm-5 text-center">
                                                <div class="p-category mx-auto">
                                                    <a href="#" title="">
                                                        <img style="
                                                        width: 200px;
                                                         height: 200px;
                                                         object-fit: cover;"
                                                             :src="category.default_cover_image"
                                                             :alt="category.name"
                                                             class="mx-auto"
                                                        >
                                                        <span>{{category.name}}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tab-content>
                        <tab-content title="İş Detayı" icon="la la-info">
                            <div class="col-lg-12 text-center">
                                <span class="pf-title">Resim ve videolar yükleyiniz</span>
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
                                    accept="image/*,video/*"
                                >
                                    <i class="el-icon-plus"></i>
                                </el-upload>
                                <el-dialog :visible.sync="dialogVisible">
                                    <img width="100%" :src="dialogImageUrl" alt="">
                                </el-dialog>
                            </div>

                            <div class="col-lg-12">
                                <span class="pf-title">İlan Başlığı </span>
                                <div class="pf-field">
                                    <input v-model="formInline.title" name="title" type="text" placeholder="Başlık"/>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <span class="pf-title">İş tanımı</span>
                                <div class="pf-field">
                                    <textarea v-model="formInline.description" placeholder="Sizinle çalışırken ne iş yapacağı, kaç saat çalışacağı gibi bilgileri yazınız...Aylık ya da haftalık ücret, yol yemek parası, sigorta gibi çalışana sağlayacağınız şartları yazınız..."></textarea>
                                </div>
                            </div>
                        </tab-content>
                        <tab-content :before-change="onSubmit" title="Paket Seçimi ve Ödeme" icon="la la-cc-mastercard">
                            <div class="row">
                                <div class="col-lg-6">
                                    <span class="pf-title">Ücret</span>
                                    <div class="pf-field">
                                        <el-button @click="fee_disabled=!fee_disabled">Ücret belirtmek istemiyorum
                                        </el-button>
                                        <el-input-number :disabled="fee_disabled" v-model="formInline.fee" :min="5500"
                                                         :step="500"></el-input-number>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                 <div class="row">
                                     <div class="col-6">
                                         <span class="pf-title">Şehir</span>
                                         <div class="pf-field">
                                             <v-select :options="cities" v-model="formInline.city"></v-select>
                                         </div>
                                     </div>
                                     <div class="col-6">
                                         <div class="pf-field">
                                             <span class="pf-title">İlçe</span>
                                             <div class="pf-field" id="districtSelect">
                                                 <v-select :options="districts" v-model="formInline.district"></v-select>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                </div>
                                <div class="col-lg-6">
                                    <span class="pf-title">Cinsiyet</span>
                                    <div class="pf-field">
                                        <v-select :options="genders" v-model="formInline.gender"></v-select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <span class="pf-title">Çalışma Türü</span>
                                    <div class="pf-field">
                                        <v-select :options="work_types"
                                                  v-model="formInline.work_type"></v-select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <span class="pf-title">Telefo - {{formInline.phone}}n</span>
                                    <div class="pf-field">
                                        <VuePhoneNumberInput
                                            default-country-code="TR"
                                            v-model="formInline.phone" />
                                    </div>
                                </div>
                            </div>
                        </tab-content>
                        <tab-content title="Paket Seçimi ve Ödeme2" icon="la la-cc-mastercard">
                            <div class="plans-sec">
                                <div class="row">
                                    <div @click="formInline.package_id = c.id" class="col-lg-4" v-for="c in packages">
                                        <div :class="['pricetable', formInline.package_id === c.id ? 'active':'']">
                                            <div class="pricetable-head">
                                                <h3>{{c.name}}</h3>
                                                <h2><i>₺ </i>{{c.price}}</h2>
                                                <span>{{ c.expire_day }} Gün</span>
                                            </div><!-- Price Table -->
                                            <ul>
                                                <li>1 job posting</li>
                                                <li>İş ilanınız 2 gün boyunca yayında</li>
                                                <li>7/24 Premium Destek</li>
                                            </ul>
                                            <a href="#" title="">SEÇ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tab-content>
                    </form-wizard>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import 'vue-select/dist/vue-select.css';
import 'vue-phone-number-input/dist/vue-phone-number-input.css';

import VuePhoneNumberInput from 'vue-phone-number-input';
const apiUrl = process.env.MIX_API_URL;
const appUrl = process.env.APP_URL;
export default {
        props: ['csrf'],
    components:{
      VuePhoneNumberInput
    },
        data() {
            return {
                dialogImageUrl: '',
                dialogVisible: false,
                formInline: {
                    title: null,
                    category_id:null,
                    description:null,
                    work_type:null,
                    city:null,
                    district:null,
                    fee:null,
                    gender:null,
                    package_id:null,
                    phone:null,
                    sleep_after_at:null
                },
                percentage: 0,
                slug:null,
                isJobCreated:false,
                fileList: [],
                url: '',
                id: '',
                actualFiles: [],
                fee_disabled:false,
                categories:[],
                actionUrl:appUrl+'/job',
                cities:[],
                work_types:[],
                genders:[],
                districts:[],
                packages:[],
            }
        },
        mounted() {
            this.getDatas()
        },
        methods: {
            onSubmit() {
                if (this.isJobCreated){
                    return true
                }
                let { uploadFiles } = this.$refs.upload
                let form = new FormData()
                uploadFiles.forEach(item => {
                    form.append('files[]', item.raw)
                })

                form.append('gender_id',this.formInline.gender?.value ?? null)
                form.append('work_type_id',this.formInline.work_type?.value ?? null)
                form.append('city_id',this.formInline.city?.value ?? null)
                form.append('district_id',this.formInline.district?.value ?? null)
                form.append('title',this.formInline.title)
                form.append('description',this.formInline.description)
                form.append('fee',this.formInline.fee ?? null)
                form.append('category_id',this.formInline.category_id)
                form.append('phone',this.formInline.phone)
                form.append('sleep_after_at',this.formInline.sleep_after_at)


                axios.post(
                    '/job',
                    form,
                    {
                        headers: {
                            'X-CSRF-TOKEN': this.csrf,
                            'content-type': 'multipart/form-data'
                        },
                        onUploadProgress: this.handleProgress
                    })
                    .then(resp => {
                        this.slug = resp.data.slug
                        this.isJobCreated = true;
                        this.$refs.wizard.nextTab()
                    })
                .catch(err=>{
                    //todo
                    this.$notify({
                        title: 'Eksik alanları doldurunuz.',
                        type: 'error',
                        message: err.response.data.message
                    });
                })
            },

            toPaymentPage(){
                if (!this.slug){
                    this.$notify({
                        title: 'Is ilani olustururken hata olustu!',
                        type: 'error',
                        message: 'Sayfayi yenileyip tekrar deneyiniz 🙏'
                    });

                    return false
                }

                axios.get(
                    '/job/'+this.slug + '/package/' + this.formInline.package_id+'/api',
                    {
                        headers: {
                            'X-CSRF-TOKEN': this.csrf,
                            'content-type': 'multipart/form-data'
                        },
                    })
                    .then(resp => {
                        setTimeout(()=>{
                            window.location.href = window.location.origin + '/job/'+this.slug+'/payment';

                        },500)

                    })
                    .catch(err=>{
                        //todo
                        this.$notify({
                            title: 'Eksik alanları doldurunuz.',
                            type: 'error',
                            message: err.response.data.message
                        });
                    })
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
            getDatas() {
                axios.get(apiUrl+'job-create-data').then(resp=>{
                    this.categories = resp.data.categories
                    this.cities = resp.data.cities.map(q=>{return {label:q.name,value:q.id}})
                    this.work_types = resp.data.work_types.map(q=>{return {label:q.name,value:q.id}})
                    this.genders = resp.data.genders.map(q=>{return {label:q.name,value:q.id}})
                    this.districts = resp.data.districts.map(q=>{return {label:q.name,value:q.id}})

                    this.formInline.gender = this.genders.filter(q=>q.label == 'Erkek')[0]
                    this.formInline.work_type = this.work_types.filter(q=>q.value == 1)[0]
                    this.formInline.city = this.cities.filter(q=>q.value === resp.data.selected_city.id)[0]

                    this.packages = resp.data.packages
                    this.formInline.phone = resp.data.phone
                    this.formInline.package_id = this.packages.filter(q=>q.is_highlighted == true)[0].id
                })
            },

            categoryClicked(category){
                axios.get(apiUrl+'category/'+category.id+'/sub-category')
                .then(resp=>resp.data)
                .then(resp=>{
                    if (resp.length > 1){
                        this.categories = resp
                    }else{
                        this.formInline.category_id = category.id
                        this.$refs.wizard.nextTab()
                    }
                })
            }
        }
    }
</script>
<style>
.vue-form-wizard .wizard-icon-circle .wizard-icon-container{
    border-radius: 60%;
}
.vue-form-wizard .wizard-tab-content {
    padding: 65px 20px 10px;
}
.el-input__inner{
    background-color: #3cb0e6!important;
    color: white;
    font-weight: 600;
    font-size: 20px;
}
.pf-title{
    font-weight: 600;
    font-size: 18px;
    color: #ccc;

}
</style>
