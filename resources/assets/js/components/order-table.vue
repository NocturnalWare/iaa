<template>
    <div>
        <legend>
            <h2>
                {{order.company.name}}
                <div class="col-md-6 col-xs-11 pull-right">
                    <span v-if="isCurrentOrder" class="bg-info">Current Order</span>
                    <a v-if="!isCurrentOrder" href="route('orders.current.set', order.id)">
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
            <button class="btn btn-info">ADD MANUAL PRODUCT</button>
            <a target="_blank" href="{{route('ssactivewear.index')}}">
                <button class="btn btn-info">
                    ADD S&S PRODUCT 
                    <span style="font-size: .7em">(new tab)</span>
                </button>
            </a>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Line Text</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="line in order.lines">
                    <td>
                        {{line.line_text}}
                    </td>   
                    <td>
                        <i class="fa fa-square" :style="{color: line.color_1}"></i>
                        <i class="fa fa-square" :style="{color: line.color_2}"></i>
                        {{line.color_name}}
                    </td>   
                    <td>
                        {{line.size}}
                    </td>
                    <td class="col-md-2">
                        <input name="quantity" v-model="line.qty" class="form-control">
                    </td>
                    <td>
                        <form action="route('order.products.destroy', $line.id)" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="col-xs-12">
            <button class="btn btn-success pull-right">
                <i class="fa fa-check"></i>
                SAVE
            </button>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';

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
            };
        },
        methods: {
            save: function(){

            },
            fixDate: function(date){
                console.log(moment(date).format('Y-M-d'));
                return moment(date).format('Y-MM-DD');
            }
        },
        created: function(){
            this.order = inkaddict.order;
        },
        ready(){}
    }
</script>