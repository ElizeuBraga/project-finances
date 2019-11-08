/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// window.Linguee = require('vue');
// linguee = require('linguee');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// import ApexCharts from 'apexcharts'

var app = new Vue({
    el: "#app",
    data:{
        headers: {
            'Content-Type': 'application/octet-stream',
            'x-rapidapi-host':'wordsapiv1.p.rapidapi.com',
            'x-rapidapi-key':'b6b55ef453msh11a4bbdbe780fdcp1195d5jsnd41c26b0838b'
        },

        init:false,
        words: {
            count:0,
            words: [],
            wordCount: null
        },
        knowWords: {
            count: 0,
            knowWords: []
        },
        donKnowWords: {
            count:0,
            donKnowWords: []
        },
        textarea:null
    },

    mounted: function(){
        axios.get('lerics/wordCount')
                .then((response)=>{
                this.words.wordCount = response.data
                })
                .catch((error)=>{
                console.log(error)
                })
 
    },

    methods:{
        wordsApi: function(){
            axios.get('https://wordsapiv1.p.rapidapi.com/words/hatchback/typeOf',{'headers':{
                "content-type":"application/octet-stream",
                "x-rapidapi-host":"wordsapiv1.p.rapidapi.com",
                "x-rapidapi-key":"b6b55ef453msh11a4bbdbe780fdcp1195d5jsnd41c26b0838b"
            }})
                .then((response)=>{
                console.log(response)
                })
                .catch((error)=>{
                console.log(error)
                })
        },

        sendWordsToMail: function(){
            var unknowWords = this.donKnowWords.donKnowWords
            return axios.post('/lerics/sendWordsToMail', {unknowWords})
            .then((response) => {
                // console.log(response.data)
                this.words.wordCount = response.data
            })
            .catch((e) => {
                console.error(e)
            })
        },

        knowMethod: function(w){
            // this.wordsApi()
            axios.post('/lerics/storeWord', {word: w, status:1})
            .then((response) => {
                // console.log(response.data)
                this.words.wordCount = response.data
            })
            .catch((e) => {
                console.error(e)
            })

            this.init = true
            this.knowWords.knowWords.push(w);
            this.knowWords.count +=1
            this.words.count -= 1
            var index = this.words.words.indexOf(w);

            if (index > -1) {
                this.words.words.splice(index, 1);
            }
        },

        donKnowMethod: function(w){
            axios.post('/lerics/storeWord', {word: w, status:0})
            .then((response) => {
                this.words.wordCount = response.data
                // console.log(response.data)
            })
            .catch((e) => {
                console.error(e)
            })

            this.init = true
            this.donKnowWords.donKnowWords.push(w);
            this.donKnowWords.count += 1
            this.words.count -= 1
            var index = this.words.words.indexOf(w);

            if (index > -1) {
                this.words.words.splice(index, 1);
            }
        },

        myFunction: function(str){
            this.textarea = null
            return axios.post('/lerics', {leric:str})
            .then((response) => {
                this.words.words = response.data
                this.words.count = this.words.words.length
            })
            .catch((e) => {
                console.error(e)
            })
        }
    }
});