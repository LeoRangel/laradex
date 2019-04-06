<template>
    <div>
        <h1 style=''> Pokemons </h1>
        <br><br>
        <div class="row">
            <spinner v-show="loading"></spinner>
            <div class="col-sm" v-for="pokemon in pokemons">
                <div class="card text-center" style="width: 18rem;">
                    <img style='height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;' class="card-img-top rounded-circle mx-auto d-block" 
                    v-bind:src=" pokemon.picture " alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ pokemon.name }}</h5>
                        <p class="card-text">Some quick description of the pokemon.</p>
                        <a href="/trainers/" class="btn btn-primary"> See more </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

    import EventBus from '../../event-bus';

    export default {

        data(){
            return{
                pokemons: [],
                loading: true
            }
        },

        created(){
            EventBus.$on('pokemon-added', data => {
                this.pokemons.push(data)
            })
        },

        mounted() {
            axios
                .get('http://127.0.0.1:8000/pokemons')
                .then( (res) => {
                    this.pokemons = res.data
                    this.loading = false
                })
            // console.log('Component mounted.')
        }

    }
</script>
