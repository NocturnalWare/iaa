<template>
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <table class="table table-striped table-hover">
                <tr>
                    <thead>
                        <th class="col-xs-7">Name</th>
                        <th>Per Unit</th>
                        <th>Rate</th>
                    </thead>
                </tr>
                <tr v-for="upcharge in upcharges">
                    <td><label>{{upcharge.name}}</label></td>
                    <td><button class="btn btn-xs" @click="upcharge.per_unit = !upcharge.per_unit" :class="['', upcharge.per_unit ? 'btn-info' : 'btn-default']">{{upcharge.per_unit ? 'Yes' : 'No'}}</button></td>
                    <td>
                        <span class="input-group">
                            <span class="input-group-addon">$</span>
                            <input class="form-control" v-model="upcharge.markup_rate">
                        </span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-5">
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
                upcharges: inkaddict.upcharges.filter(function(upcharge){
                    return upcharge.markup_rate = upcharge.markup_rate.toFixed(2);
                }),
                saved: false,
            };
        },
        methods:{
            save: function(){
                let component = this;
                let call = Vue.http.put('settings/updateUpcharges', {upcharges : component.upcharges, _token : window.Laravel.csrfToken});
                call.then(function(response){
                    component.saved = true;
                });
            },
        }
    }
</script>