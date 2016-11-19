<template>
    <div>
        <legend>
            <h2>
                {{order.company.name}}
                <div class="col-md-6 col-xs-11 pull-right">
                    <span v-if="isCurrentOrder" class="bg-info">Current Order</span>
                    <a v-if="!isCurrentOrder" href="current/setAsCurrentOrder">
                        <button class="btn btn-primary">MAKE CURRENT ORDER</button>
                    </a>
                </div>
            </h2>
            <div class="col-xs-12 col-md-6">
                <span class="input-group">
                    <label>Order Name</label>
                    <input value="{{order.company.name}}" class="form-control" name="order_name" placeholder="Order Name">
                </span>
                <span class="input-group">
                    <label>Due</label>
                    <span v-if="pastDue" class="bg-warning text-danger pull-right" style="padding:6px;">Past Due</span>
                    <input type="date" :value="fixDate(order.hard_due)" class="form-control" name="hard_due">
                </span>
            </div>
            <div class="col-xs-12 col-md-6">
                <label>Address</label>
                <p>
                    {{order.company.profile.street_1}}
                    {{order.company.profile.street_2}}
                    <br>
                    {{order.company.profile.city}}
                    {{order.company.profile.state}},
                    {{order.company.profile.zip}}
                    <br>
                    {{order.company.profile.country}}
                </p>
            </div>
        </legend>
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
                <div class="col-xs-12 col-md-11">
                    <div class="col-md-6">
                        <span class="input-group col-xs-12 no-padding">
                            <label>Product Name</label>
                            <input class="form-control" v-model="manualProduct.product_name">
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span class="input-group col-xs-12 no-padding">
                            <label>Color(s)</label>
                            <input class="form-control" v-model="manualProduct.color_name">
                        </span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3" style="padding-right:0px;">
                    <div class="col-xs-12" style="padding-right:0px;">
                        <div style="border:1px solid #ddd;border-radius:5px;color:#ddd;padding-right:0px;padding-bottom:15px;">
                            <center>
                                <h3>Add Artwork After Save</h3>
                                <br>
                                <i style="font-size:7em" class="fa fa-file-picture-o"></i>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-8" style="padding-left:0px;padding-right:25px;">
                    <div style="border-radius:5px;border:1px solid #ddd;padding:20px;"> 
                        <div class="row">
                            <button class="btn btn-info pull-right" @click="addSize">ADD SIZE</button>
                        </div>
                        <div class="row">
                            <div class="col-xs-2">
                                <label>Size</label>
                            </div>
                            <div class="col-xs-2">
                                <label>Price</label>
                            </div>
                            <div class="col-xs-2">
                                <label>Margin</label>
                            </div>
                            <div class="col-xs-2">
                                <label>Sale Price</label>
                            </div>
                            <div class="col-xs-2">
                                <label>Qty</label>
                            </div>
                            <div class="col-xs-1">
                                <label>Total</label>
                            </div>
                        </div>
                        <div v-if="manualProduct.sizes.length > 0">
                            <hr />
                            <div  v-for="size in manualProduct.sizes" class="row">
                                <div class="col-xs-2">
                                    <span class="input-group">
                                        <input class="form-control" v-model="size.size_name">
                                    </span>
                                </div>
                                <div class="col-xs-2">
                                    <span class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input class="form-control" v-model="size.price">
                                    </span>
                                </div>
                                <div class="col-xs-2">
                                    <span class="input-group">
                                        <input type="range" min="20" max="100" v-model='size.margin'>
                                        <span class="input-group-addon">{{size.margin}}%</span>
                                    </span>
                                </div>
                                <div class="col-xs-2">
                                    <span class="input-group">
                                        <label>${{sizePrice(size)}}</label>
                                    </span>
                                </div>
                                <div class="col-xs-2">
                                    <span class="input-group">
                                        <input class="form-control" v-model="size.qty">
                                    </span>
                                </div>
                                <div class="col-xs-1">
                                    <span class="input-group">
                                        <label>${{sizePriceTotal(size)}}</label>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-if="manualProduct.sizes.length > 0">
                        <div class="col-xs-12 col-md-6 col-md-offset-6">
                            <span style="font-size:2.3em" class="pull-right">${{sizeTotal(manualProduct)}}</span>
                            <span style="font-size:1.6em;padding-right:12px;padding-top:5px;" class="pull-right">Total</span>
                        </div>
                    </div>
                    <div class="row" v-if="manualProduct.sizes.length > 0 && manualProduct.product_name !== '' && manualProduct.color_name !== '' && sizeTotal(manualProduct) > 0">
                        <button class="btn btn-success pull-right" @click="saveManualProduct"><i class="fa fa-check-o"></i>SAVE TO ORDER</button>
                    </div>
                </div>
            </div>
            <div v-for="base in order.lines">
                <div class="col-xs-12">
                    <h3>
                        {{base.base.style.brand.name}} {{base.base.style.style_name}} {{base.base.style.title}}
                        <span style="font-size:.6em">{{base.base.color_name}}</span>
                        <div class="btn-group pull-right">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-trash" <span class="caret"></i>
                          </button>
                          <ul class="dropdown-menu">
                            <li @click="removeBase(base)" class="btn">
                                <i class="fa fa-lg fa-times-circle-o"></i>
                                Remove From Order
                            </li>
                          </ul>
                        </div>
                    </h3>
                </div>
                <div class="col-xs-12 well" style="background-color:#fff">
                    <div class="row">
                        <div class="col-xs-6">
                            <span class="input-group col-xs-12">
                                <label>Design Name</label>
                                <input class="form-control">
                            </span>
                        </div>
                        <div class="col-xs-6">
                            <span class="input-group">
                                <label>Ink Colors</label><br>
                                Red Blue Grey Pink
                            </span>
                        </div>
                    </div>
                    <div class="col-xs-12" style="padding:15px;">
                        <button class="btn btn-primary col-xs-4" :class="['', base.showPanel == 'product' ? 'btn-primary' : 'btn-default']" @click="showProduct(base)">Product</button>
                        <button class="btn btn-default col-xs-4" :class="['', base.showPanel == 'deco' ? 'btn-primary' : 'btn-default']" @click="showDeco(base)">Deco</button>
                        <button class="btn btn-default col-xs-4" :class="['', base.showPanel == 'breakdown' ? 'btn-primary' : 'btn-default']" @click="showBreakdown(base)">Breakdown</button>
                    </div>
                    <div v-show="base.showPanel == 'deco'">
                        <div class="col-xs-12 well" style="background-color:#fff">
                            <button class="btn btn-xs pull-right" @click="addDeco(base)">ADD LOCATION</button>
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
                                    <tr v-for="deco in base.decos">
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
                    <div v-show="base.showPanel == 'product'">
                        <div class="col-xs-12 col-md-3">
                            <img style="height:300px;" class="img-responsive" :src="imgUrl(base.base.style)">
                        </div>
                        <div class="col-xs-12 col-md-8">
                            <div class="row" style="border-bottom:1px solid #ddd;margin-bottom:6px">
                                <div class="col-xs-2">
                                    <label>Size</label>
                                </div>
                                <div class="col-xs-2">
                                    <label>Price</label>
                                </div>
                                <div class="col-xs-2">
                                    <label>Margin</label>
                                </div>
                                <div class="col-xs-2">
                                    <label>Sale Price</label>
                                </div>
                                <div class="col-xs-2">
                                    <label>Qty</label>
                                </div>
                                <div class="col-xs-1">
                                    <label>Total</label>
                                </div>
                            </div>
                            <div v-for="index in base.base.index">
                                <div class="row">
                                    <div class="col-xs-2">
                                        {{index.size_name}}
                                    </div>
                                    <div class="col-xs-2">
                                        {{index.product.customer_price}}
                                    </div>
                                    <div class="col-xs-2">
                                        <span class="input-group">
                                            <input type="range" min="20" max="100" v-model='index.margin'>
                                            <span class="input-group-addon">{{index.margin}}%</span>
                                        </span>
                                    </div>
                                    <div class="col-xs-2">
                                        ${{unitPrice(index)}}
                                    </div>
                                    <div class="col-xs-2">
                                        <input class="form-control" v-model="index.qty">    
                                    </div>
                                    <div class="col-xs-1">
                                        <b>${{totalPrice(index)}}</b>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-md-offset-6">
                                    <span style="font-size:2.3em" class="pull-right">${{indexTotal(base)}}</span>
                                    <span style="font-size:1.6em;padding-right:12px;padding-top:5px;" class="pull-right">Product Total</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
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
            }
        },
        data(){
            return {
                order: {},
                addingManual: false,
                manualProduct: { product_name : '', color_name : '', sizes : []},
            };
        },
        methods: {
            addDeco: function(base){
                base.decos.push({art_id : 1});
            },
            showProduct: function(base){
                base.showPanel = 'product';
            },
            showDeco: function(base){
                base.showPanel = 'deco';
            },
            showBreakdown: function(base){
                base.showPanel = 'breakdown';
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
            addSize: function(){
                this.manualProduct.sizes.push({ size_name : '', price : 0.00, margin : 40, qty : 0 });
            },
            saveManualProduct: function(){
                this.manualProduct = { product_name : '', color_name : '', sizes : [] };
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
</style>