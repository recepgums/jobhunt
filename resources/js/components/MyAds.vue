<template>
    <div class="container-fluid">
        Hello {{variable}}
        <button class="test" @click="testMethod">Tikla</button>
    </div>
</template>

<script>

export default {
    data() {
        return {
            variable:'degiskenler burada tanimlaniyor'
        };
    },
    mounted(){
    },
    beforeMount() {
        //script tagi icinde bir seyler cagiracaksan (method ya da degisken) oncesinde this demelisin
    },
    methods:{
        //yazacagin custom fonksiyonlar burada tanimlanmali
        testMethod(){
            alert('butona tiklandin')
        },
        firstMethod(){
            alert('sayfa acilmadan calisirim')
        }
    }
};
</script>
<style>
.test{
    /*buraya css kodu yazabilrisin*/
    padding: 20px;
    background-color: red;
}
</style>
