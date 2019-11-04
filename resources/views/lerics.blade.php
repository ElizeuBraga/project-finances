@extends('layouts.app')
@section('content')
<div id="lerics">
    {{-- @foreach ($leric_processed as $item)
        {{$item}}
    @endforeach --}}
    <div class="form-group">
        <textarea v-model="textarea" class="form-control" id="textarea" cols="30" rows="5">
                
        </textarea>
        <button class="btn btn-primary" v-on:click="myFunction(textarea);">Enviar</button>
    </div>
    
    <div class="">
    <p class="text-info">Tipos de palavras @{{words.count}}</p>
    <p class="text-success">Conhecidas @{{knowWords.count}}</p>
    <p class="text-danger">Desconhecidas @{{donKnowWords.count}}</p>
    <b><p v-if="init && words.count == 0">Parabéns vc concluiu, vc tem <span class="text-success">@{{donKnowWords.count}}</span> palavras para estudar
        <button v-if="init && words.count == 0 && donKnowWords.count != 0" class="btn btn-secondary" v-on:click="sendWordsToMail()">Enviar</button>
    </p></b>
        <div class="row" v-for = "word in words.words">
            <div class="col-4">
                <button class="btn btn-primary" v-on:click="knowMethod(word)">Sim</button>
            </div>
            <div class="col-4">
                <p>@{{word}}</p>
            </div>
            <div class="col-4">
                <button class="btn btn-danger" v-on:click="donKnowMethod(word)">Não</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div  class="col-6">
            <h3>Sei</h3>
            <div v-for = "knowWord in knowWords.knowWords">
                <p class="text-success" >@{{knowWord}}</p>
            </div>
        </div>
        
        <div class="col-6">
            <h3>Não sei</h3>
            <div v-for = "donKnowWord in donKnowWords.donKnowWords">
                <p class="text-danger">@{{donKnowWord}}</p>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>    
    // console.log(data);
    var leric = new Vue({
        el: "#lerics",
        data:{
            init:false,
            words: {
                count:0,
                words: []
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
        },

        methods:{
            sendWordsToMail: function(){
                var unknowWords = this.donKnowWords.donKnowWords
                return axios.post('/lerics/sendWordsToMail', {unknowWords})
                .then((response) => {
                    console.log(response.data)
                })
                .catch((e) => {
                    console.error(e)
                })
            },

            knowMethod: function(w){
                axios.post('/lerics/storeWord', {word: w, status:1})
                .then((response) => {
                    // console.log(response.data)
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
</script>
@endsection