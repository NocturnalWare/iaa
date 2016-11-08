<template>
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
                        <i class="fa fa-square" style="color: {{line.color_1}}"></i>
                        <i class="fa fa-square" style="color: {{line.color_2}}"></i>
                        {{line.color_name}}
                    </td>   
                    <td>
                        {{line.size}}
                    </td>
                    <td class="col-md-2">
                        <input name="quantity" v-model="line.qty" class="form-control">
                    </td>
                    <td>
                        <form action="{{route('order.products.destroy', $line.id)}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
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
</template>

<script>
    export default {
        props: ['order'],
        computed: { },
        data(){
            return {
            };
        },
        methods: {},
        ready(){}
    }
</script>