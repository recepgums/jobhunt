<template>

    <section >
        <div class="block no-padding">
            <div class="container">
                <div class="row no-gape">
                    <div class="col-lg-9 column">
                        <div class="padding-left">
                            <div class="profile-title">
                                <h3>Yeni İş İlanı Ver</h3>
                                <div class="steps-sec d-none d-md-block">
                                    <div class="step active" id="step_1" next="step_2">
                                        <p><i class="la la-info"></i></p>
                                        <span>İş Detayı</span>
                                    </div>
                                    <div class="step" id="step_2" next="step_3" prev="step_1">
                                        <p><i class="la la-cc-mastercard"></i></p>
                                        <span>Paket Seçimi ve Ödeme</span>
                                    </div>
                                    <div class="step" id="step_3" prev="step_2">
                                        <p><i class="la  la-check-circle"></i></p>
                                        <span>İlanınız Yayında!</span>
                                    </div>
                                </div>
                            </div>

                            <div class="profile-form-edit mb-5 " id="step_1_div" >
                                <form >

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <span class="pf-title">Başlık</span>
                                            <div class="pf-field">
                                                <input name="title" type="text" placeholder="Başlık"/>
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

                                        <div class="col-lg-12 text-center">
                                            <span class="pf-title">Resim ve videolar yükleyiniz</span>

                                            <div class="upload__box " >
                                                <div class="upload__btn-box">
                                                    <label class="upload__btn" style="height: auto">
                                                        <p>Resim ve Video</p>
                                                        <input type="file" name="files[]" multiple="true" data-max_length="20" class="upload__inputfiledsds"
                                                               accept="image/*, video/*">
                                                    </label>
                                                </div>
                                                <div class="upload__img-wrap"></div>
                                            </div>
                                        </div>
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
                                                        class="chosen" onchange="cityChangedMethod(this)">
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
                                        <div class="col-lg-12">
                                            <button type="submit">Next</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</template>

<script>
export default {
        data() {
            return {

            }
        },
        mounted() {
            console.log('Component mounted.')
        },
    }
</script>
