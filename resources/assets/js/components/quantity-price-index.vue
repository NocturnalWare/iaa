<template>
    <div class="row">
        <div class="col-xs-12 col-md-10">
            <table class="table table-striped table-hover">
                <tr>
                    <thead>
                        <th>Color</th>
                        <th>24-48</th>
                        <th>49-71</th>
                        <th>72-143</th>
                        <th>144-287</th>
                        <th>288-503</th>
                        <th>504-1007</th>
                        <th>1008-2016</th>
                        <th>2017+</th>
                    </thead>
                </tr>
                <tr v-for="price in prices">
                    <td class="col-xs-1">
                        <label>{{price.color}}</label>
                    </td>
                    <td>
                        <span class="input-group">
                            <span class="input-group-addon">$</span>
                            <input class="form-control" v-model="price.tier_1">
                        </span>
                    </td>
                    <td>
                        <span class="input-group">
                            <span class="input-group-addon">$</span>
                            <input class="form-control" v-model="price.tier_2">
                        </span>
                    </td>
                    <td>
                        <span class="input-group">
                            <span class="input-group-addon">$</span>
                            <input class="form-control" v-model="price.tier_3">
                        </span>
                    </td>
                    <td>
                        <span class="input-group">
                            <span class="input-group-addon">$</span>
                            <input class="form-control" v-model="price.tier_4">
                        </span>
                    </td>
                    <td>
                        <span class="input-group">
                            <span class="input-group-addon">$</span>
                            <input class="form-control" v-model="price.tier_5">
                        </span>
                    </td>
                    <td>
                        <span class="input-group">
                            <span class="input-group-addon">$</span>
                            <input class="form-control" v-model="price.tier_6">
                        </span>
                    </td>
                    <td>
                        <span class="input-group">
                            <span class="input-group-addon">$</span>
                            <input class="form-control" v-model="price.tier_7">
                        </span>
                    </td>
                    <td>QUOTE</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-9">
            <button @click="save" class="pull-right btn" :class="['', saved ? 'btn-success' : 'btn-info']"><i class="fa fa-lg" :class="['', saved ? 'fa-check-circle-o' : 'fa-circle-o']"></i> {{saved ? 'UPDATED' : 'UPDATE'}}</button>
        </div>
    </div>

</template>
<script>
    import Vue from '../vue.min.js';
    Vue.use(require('../vue-resource.min.js'));

    export default {
        data(){
            return {
                prices: inkaddict.prices,
                saved: false,
            };
        },
        methods:{
            save: function(){
                let component = this;
                let call = Vue.http.put('settings/update', {prices : component.prices, _token : window.Laravel.csrfToken});
                call.then(function(response){
                    component.saved = true;
                });
            },
        }
    }
</script>