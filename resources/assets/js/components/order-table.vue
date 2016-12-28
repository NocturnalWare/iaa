<template>
    <div>
        <div class="col-xs-12 col-md-11" style="padding-top: 15px;">
            <button class="btn" @click="addingManual = !addingManual" :class="['', addingManual ? 'btn-primary' : 'btn-info']">ADD{{addingManual ? 'ING' : ''}} MANUAL PRODUCT</button>
            <a target="_blank">
                <button class="btn btn-info">
                    ADD S&S PRODUCT 
                    <span style="font-size: .7em">(new tab)</span>
                </button>
            </a>
        <div class="row">
            <div v-if="addingManual" class="col-xs-12 col-md-11" style="border-radius:5px;border:1px solid #ddd;margin:10px;padding:20px 0px 40px 0px;">
                <legend style="padding-left:15px;"><h3>New Line</h3></legend>
                <div class="col-xs-12 col-md-11">
                    <div class="col-md-3">
                        <span class="input-group">
                            <label>Blank Name</label>
                            <input class="form-control" v-model="manualProduct.blank_name">
                        </span>
                    </div>
                    <div class="col-md-3">
                        <span class="input-group">
                            <label>Blank Color(s)</label>
                            <input class="form-control" v-model="manualProduct.blank_colors">
                        </span>
                    </div>
                    <div class="col-md-3">
                        <span class="input-group">
                            <label>Design Name</label>
                            <input class="form-control" v-model="manualProduct.design_name">
                        </span>
                    </div>
                    <div class="col-md-3" v-if="manualProduct.blank_name !== '' && manualProduct.blank_colors !== '' && manualProduct.design_name !== ''">
                        <label></label>
                        <span class="input-group">
                            <button class="btn btn-success pull-right" @click="saveManualProduct"><i class="fa fa-check-o"></i>ADD TO ORDER</button>
                        </span>
                    </div>
                </div>                
                <div class="col-xs-12" style="padding-left:0px;padding-right:25px;padding-top:10px;">
                </div>
            </div>
            <div v-for="line in order.lines">
                <div class="col-xs-12 order-line-block">
                    <div class="col-xs-12">
                        <h3>{{line.blank_name}}</h3>
                        <span style="font-size:.6em">{{line.blank_colors}}</span>
                    </div>
                    <div class="col-xs-12 form-inline">
                        <div class="input-group col-xs-3">
                            <label>Blank Name</label>
                            <input class="form-control" v-model="line.blank_name">
                        </div>
                        <div class="input-group col-xs-3">
                            <label>Blank Colors</label>
                            <input class="form-control" v-model="line.blank_colors">
                        </div>
                        <div class="input-group col-xs-3">
                            <label>Design Name</label>
                            <input class="form-control" v-model="line.design_name">
                        </div>
                    </div>
                    <div class="col-xs-12" style="padding:15px;">
                        <button class="btn btn-primary col-xs-4" :class="['', line.showPanel == 'product' ? 'btn-primary' : 'btn-default']" @click="showProduct(line)">Product</button>
                        <button class="btn btn-default col-xs-4" :class="['', line.showPanel == 'deco' ? 'btn-primary' : 'btn-default']" @click="showDeco(line)">Deco</button>
                        <button class="btn btn-default col-xs-4" :class="['', line.showPanel == 'breakdown' ? 'btn-primary' : 'btn-default']" @click="showBreakdown(line)">Breakdown</button>
                    </div>
                    <div v-show="line.showPanel == 'product'">
                        <div class="col-xs-12 col-md-3">
                            <img style="height:300px;" class="img-responsive" src="http://i3.kym-cdn.com/entries/icons/original/000/019/422/IMG_4983.PNG">
                        </div>
                        <div class="col-xs-12 col-md-8">
                            <div class="row" style="border-bottom:1px solid #ddd;margin-bottom:6px">
                                <div class="col-xs-3">
                                    <label>Size</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Price</label>
                                </div>
                                <div class="col-xs-2">
                                    <label>Qty</label>
                                </div>
                                <div class="col-xs-2">
                                    <label>Total</label>
                                </div>
                                <div class="col-xs-2">
                                    <button class="btn btn-xs btn-success" @click="addSize(line)">ADD SIZE</button>
                                </div>
                            </div>
                            <div v-for="size in line.sizes">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <input class="form-control" v-model="size.size_name">
                                    </div>
                                    <div class="col-xs-3">
                                        <input class="form-control" v-model="size.price">
                                    </div>
                                    <div class="col-xs-2">
                                        <input class="form-control" v-model="size.quantity">    
                                    </div>
                                    <div class="col-xs-2">
                                        <b>${{size}}</b>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-md-offset-6">
                                    <span style="font-size:2.3em" class="pull-right">${{size}}</span>
                                    <span style="font-size:1.6em;padding-right:12px;padding-top:5px;" class="pull-right">Product Total</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-show="line.showPanel == 'deco'">
                        <div class="col-xs-12 well" style="background-color:#fff">
                            <button class="btn btn-xs pull-right" @click="addDeco(line)">ADD LOCATION</button>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Artwork</th>
                                        <th>Location</th>
                                        <th>Colors</th>
                                        <th>Size</th>
                                        <th>Screens</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="line in line.decos">
                                        <td class="col-xs-2">
                                            <select class="form-control" v-model="deco.art_id">
                                                <option value="1">A.psd</option>
                                                <option value="2">AR.psd</option>
                                                <option value="3">ART</option>
                                                <option value="4">ARTW.psd</option>
                                                <option value="5">ARTWO</option>
                                                <option value="6">ARTWOR</option>
                                                <option value="7">ARTWORK</option>
                                            </select>
                                        </td>
                                        <td class="col-xs-3">
                                            <input class="form-control" v-model="deco.location_name">
                                        </td>
                                        <td class="col-xs-3">
                                            <input class="form-control" v-model="deco.colors">
                                        </td>
                                        <td class="col-xs-1">
                                            <span class="input-group">
                                                <input class="form-control" v-model="deco.size">
                                                <span class="input-group-addon">
                                                    "
                                                </span>
                                            </span>
                                        </td>
                                        <td class="col-xs-1">
                                            <input class="form-control" v-model="deco.screens">
                                        </td>
                                        <td class="col-xs-1">
                                            <label style="padding:10px;">$10.99</label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" v-if="order.lines.length > 0">
            <button class="btn btn-success pull-right">
                <i class="fa fa-check"></i>
                SAVE
            </button>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    import Vue from '../vue.min.js';
    Vue.use(require('../vue-resource.min.js'));

    export default {
        computed:{ 
            pastDue: function(){
                if(moment(this.order.hard_due) > moment()){
                    return true;
                }

                return false;
            },
            isCurrentOrder: function(){
                return this.order.id === inkaddict.currentOrder.id;
            },
        },
        data(){
            return {
                order: {},
                addingManual: false,
                manualProduct: { blank_name : '', design_name : '', blank_colors : '', is_manual : true, sizes : [], decos : [], showPanel : 'product'},
            };
        },
        methods: {
            addSize: function(line){
                console.log(line);
                line.sizes.push({order_line_id : line.id, size_name : '', quantity : 24 });
            },
            addDeco: function(base){
                base.decos.push({art_id : 1});
            },
            showProduct: function(line){
                line.showPanel = 'product';
            },
            showDeco: function(line){
                console.log(line);
                line.showPanel = 'deco';
            },
            showBreakdown: function(line){
                line.showPanel = 'breakdown';
            },
            indexTotal: function(base){
                let total = 0;
                let component = this;
                base.base.index.forEach(function(dex){
                    total = parseFloat(total) + parseFloat(component.totalPrice(dex));
                });
                return parseFloat(total).toFixed(2);
            },
            totalPrice: function(index){
                let price = this.unitPrice(index);
                price = price * index.qty;
                return price.toFixed(2);
            },
            unitPrice: function(index){
                let price = (index.margin/100) * index.product.customer_price;
                price = price + index.product.customer_price;
                return price.toFixed(2);
            },
            sizeTotal: function(manualProduct){
                let total = 0;
                let component = this;
                manualProduct.sizes.forEach(function(size){
                    total = parseFloat(total) + parseFloat(component.sizePriceTotal(size));
                });
                return parseFloat(total).toFixed(2);
            },
            sizePriceTotal: function(size){
                let price = this.sizePrice(size);
                price = price * size.qty;
                return price.toFixed(2);
            },
            sizePrice: function(size){
                let price = (size.margin/100) * size.price;
                price = parseFloat(price) + parseFloat(size.price);
                return price.toFixed(2);
            },
            save: function(){

            },
            lineTotal: function(line){
                let price = (line.product.customer_price * line.qty) * (line.margin/100 + 1);
                return price.toFixed(2);
            },
            adjustedPrice: function(line){
                let price = line.product.customer_price * (line.margin/100 + 1);
                return price.toFixed(2);
            },
            fixDate: function(date){
                console.log(moment(date).format('Y-M-d'));
                return moment(date).format('Y-MM-DD');
            },
            imgUrl: function(style){
                return 'https://www.ssactivewear.com/'+style.style_image;
            },
            saveManualProduct: function(){
                let component = this;
                this.addingManual = false;
                let call = Vue.http.post('addLine', {order : this.order.id, line : this.manualProduct, _token : window.Laravel.csrfToken});
                call.then(function(response){
                    console.log(response.data);
                    component.order.lines.push(response.data);
                });
                this.manualProduct = { blank_name : '', blank_colors : '', is_manual : true, sizes : [], decos : [], showPanel : 'product' };
            },
            removeBase: function(base){
                let component = this;
                let call = Vue.http.post('removeBase', {base : base.id, _token : window.Laravel.csrfToken});
                call.then(function(response){
                    if(response.data == 200){
                        component.order.bases.$remove(base);
                    }
                });
            }
        },
        created: function(){
            this.order = inkaddict.order;
        },
        ready(){}
    }
</script>

<style>
    .no-padding{
        padding:0px;
    }
    .order-line-block{
        box-shadow: 3px 3px 3px #ddd;
        border:1px solid #aaa;
        border-radius:10px;padding:20px;
    }
    .order-line-block:hover{
        background-color:#f0f0f0;
    }
</style>