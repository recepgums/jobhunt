<template>

    <section >
        <div class="block no-padding">
            <div class="container">
                <div class="row no-gape">
                    <div class="col-lg-9 column">
                        <div class="padding-left">
                            <form-wizard color="#8b91dd" subtitle=""
                                 backButtonText="Geri"
                                 nextButtonText="İleri"
                                 finishButtonText="Yayınla"
                                 stepSize="xs"
                            >
                                <tab-content title="İş Detayı" icon="la la-info">
                                    <div class="col-lg-12 text-center">
                                        <span class="pf-title">Resim ve videolar yükleyiniz</span>
                                        <el-upload
                                            ref="upload"
                                            action="https://jsonplaceholder.typicode.com/posts/"
                                            list-type="picture-card"
                                            :headers="{ 'X-CSRF-TOKEN': csrf }"
                                            :action="'api/job'"
                                            :on-preview="handlePictureCardPreview"
                                            :on-remove="handleRemove"
                                            :file-list="fileList"
                                            :data="formInline"
                                            :on-progress="handleProgress"
                                            :auto-upload="false"
                                            multiple

                                        >
                                            <i class="el-icon-plus"></i>
                                        </el-upload>
                                        <el-dialog :visible.sync="dialogVisible">
                                            <img width="100%" :src="dialogImageUrl" alt="">
                                        </el-dialog>
                                    </div>


                                    <div class="col-lg-12">
                                        <span class="pf-title">Başlık</span>
                                        <div class="pf-field">
                                            <input v-model="formInline.title" name="title" type="text" placeholder="Başlık"/>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <span class="pf-title">İşçiden beklediğiniz göevler</span>
                                        <div class="pf-field">
                                            <textarea name="tasks" class="mytextarea" placeholder="Sizinle çalışırken ne iş yapacağı, kaç saat çalışacağı gibi bilgileri yazınız..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <span class="pf-title">İşçiye sağlayacağınız koşullar</span>
                                        <div class="pf-field">
                                            <textarea name="benefits" class="mytextarea" placeholder="Aylık ya da haftalık ücret, yol yemek parası, sigorta gibi çalışana sağlayacağınız şartları yazınız..."></textarea>
                                        </div>
                                    </div>



                                    <el-button @click="onSubmit">AAAAA</el-button>
                                </tab-content>

                                <tab-content title="Paket Seçimi ve Ödeme" icon="la la-cc-mastercard">
                                    <div class="col-lg-6">
                                        <span class="pf-title">Çalışma Türü</span>
                                        <div class="pf-field">
                                            <select name="work_type_id" data-placeholder="Please Select Specialism"
                                                    class="chosen">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Kategori</span>
                                        <div class="pf-field">
                                            <select name="category_id" data-placeholder="Kategori Seçiniz"
                                                    class="chosen">
                                                <option value></option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Şehir</span>
                                        <div class="pf-field">
                                            <select name="city_id" data-placeholder="Please Select Specialism"
                                                    class="chosen" >
                                                <option value></option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">İlçe</span>
                                        <div class="pf-field" id="districtSelect">
                                            <select name="district_id" data-placeholder="İlçe Seçin"
                                                    class="chosen-city">
                                                <option value></option>
                                            </select>
                                        </div>
                                    </div>
                                </tab-content>
                                <tab-content title="İlanınız Yayında!" icon="la  la-check-circle">
                                    <div class="col-lg-6">
                                        <span class="pf-title">Ücret</span>
                                        <div class="pf-field">
                                            <input name="fee" type="number" placeholder="Ucret" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Cinsiyet</span>
                                        <div class="pf-field">
                                            <select name="gender_id" data-placeholder="Please Select Specialism" class="chosen">

                                            </select>
                                        </div>
                                    </div>
                                </tab-content>
                            </form-wizard>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</template>

<script>
const appUrl = process.env.MIX_API_URL;
export default {
    props: ['csrf'],
        data() {
            return {
                dialogImageUrl: '',
                dialogVisible: false,
                formInline: {
                    title: null,
                    password: ''
                },
                percentage: 0,
                fileList: [],
                url: '',
                id: '',
                actualFiles: [],
            }
        },
        mounted() {
            this.getDatas()
        },
    methods: {
        onSubmit() {
            if (this.actualFiles.length <= 0) {

                axios.post(
                    appUrl+'job',
                    {title: this.formInline.title,
                    files:this.actualFiles
                    },
                    {
                        headers: {'X-CSRF-TOKEN': this.csrf},
                        onUploadProgress: this.handleProgress
                    })
                    .then(resp => {
                        this.getDatas();
                        this.$refs.upload.clearFiles()

                    })
            } else {
                if (this.formInline.password) {
                    this.$refs.upload.submit();
                } else {
                    this.$notify({
                        title: 'File Uploaded Without Password',
                        type: 'warning',
                        message: 'Sharing your files without password is blocked for security reasons. Please set a password.'
                    });
                }
            }
        },
        handleProgress(progressEvent) {
            let pers = Math.floor((progressEvent.loaded * 100) / progressEvent.total);
            this.percentage = pers
        },
        handleUploadChange(file) {
            this.actualFiles.push(file);
        },
        handleSuccess(file, fileList) {
            this.getDatas()
            this.$refs.upload.clearFiles()
            this.$notify({
                title: 'File Uploaded',
                type: 'success',
                message: 'Check the files below'
            });
        },
        handleRemove(file, fileList) {
            this.actualFiles.pop();
        },
        fileAdded(files) {
            console.log(files)
        },
        getDatas() {

        },
    }
    }
</script>
<style>
.vue-form-wizard .wizard-icon-circle .wizard-icon-container{
    border-radius: 60%;
}
</style>
