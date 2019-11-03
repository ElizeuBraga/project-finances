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
        <div class="row" v-for = "word in words">
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
            <div v-for = "knowWord in knowWords">
                <p class="text-success" >@{{knowWord}}</p>
            </div>
        </div>
        
        <div class="col-6">
            <h3>Não sei</h3>
            <div v-for = "donKnowWord in donKnowWords">
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
            words: [],
            knowWords: [],
            donKnowWords: [],
            textarea:null
        },

        mounted: function(){
        },

        methods:{   
            knowMethod: function(w){
                this.knowWords.push(w);
                var index = this.words.indexOf(w);
                if (index > -1) {
                    this.words.splice(index, 1);
                }
            },

            donKnowMethod: function(w){
                this.donKnowWords.push(w);
                var index = this.words.indexOf(w);
                if (index > -1) {
                    this.words.splice(index, 1);
                }
            },

            myFunction: function(str){
                return axios.post('/lerics', {leric:str})
                .then((response) => {
                    this.words = response.data
                })
                .catch((e) => {
                    console.error(e)
                })

            }
        }
    });
</script>
@endsection