<template>
    <div class="row">
        <h2>Add Products</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Style</th>
                    <th>Sizes</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>                
                <tr>
                    <td>
                        <span class="input-group col-xs-11">
                            <input class="form-control" v-model="searchQuery">
                            <span class="input-group-addon">
                                <i class="fa fa-search"></i>
                            </span>
                        </span>
                    </td>
                </tr>
                <tr v-for="product in products">
                    <td>{{product.name}}</td>
                    <td>{{product.style}}</td>
                    <td>
                        <button :class="['', product.sizes.xsmall ? 'btn-success' : 'btn-default']" class="btn" style="border-radius:25" @click="product.sizes.xsmall = !product.sizes.xsmall">XS</button>
                        <button :class="['', product.sizes.small ? 'btn-success' : 'btn-default']" class="btn" style="border-radius:25" @click="product.sizes.small = !product.sizes.small">S</button>
                        <button :class="['', product.sizes.medium ? 'btn-success' : 'btn-default']" class="btn" style="border-radius:25" @click="product.sizes.medium = !product.sizes.medium">M</button>
                        <button :class="['', product.sizes.large ? 'btn-success' : 'btn-default']" class="btn" style="border-radius:25" @click="product.sizes.large = !product.sizes.large">L</button>
                        <button :class="['', product.sizes.xlarge ? 'btn-success' : 'btn-default']" class="btn" style="border-radius:25" @click="product.sizes.xlarge = !product.sizes.xlarge">XL</button>
                        <button :class="['', product.sizes.xxlarge ? 'btn-success' : 'btn-default']" class="btn" style="border-radius:25" @click="product.sizes.xxlarge = !product.sizes.xxlarge">XXL</button>
                        <button :class="['', product.sizes.xxxlarge ? 'btn-success' : 'btn-default']" class="btn" style="border-radius:25" @click="product.sizes.xxxlarge = !product.sizes.xxxlarge">XXXL</button>
                    </td>
                    <td>${{product.price.toFixed(2)}}
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        computed: { },
        data(){
            return {
                sortKey: '',
                products: [
                    {name : 'Activewear Black', style : 'Tee', sizes : {
                        xsmall : false,
                        small : false,
                        medium : false,
                        large : false,
                        xlarge : false,
                        xxlarge : false,
                        xxxlarge : false
                    }, price : 4.39},
                    {name : 'Activewear White', style : 'Tee', sizes : {
                        xsmall : false,
                        small : false,
                        medium : false,
                        large : false,
                        xlarge : false,
                        xxlarge : false,
                        xxxlarge : false
                    }, price : 1.39},
                    {name : 'Activewear Grey', style : 'Tank', sizes : {
                        xsmall : false,
                        small : false,
                        medium : false,
                        large : false,
                        xlarge : false,
                        xxlarge : false,
                        xxxlarge : false
                    }, price : 4.39},
                    {name : 'Activewear Red', style : 'Tank', sizes : {
                        xsmall : false,
                        small : false,
                        medium : false,
                        large : false,
                        xlarge : false,
                        xxlarge : false,
                        xxxlarge : false
                    }, price : 6.39},
                ],
            };
        },
        methods: {},
        ready(){}
    }
</script>