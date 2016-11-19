        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Unit Cost</th>
                    <th>Quantity</th>
                    <th>Margin</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="addingManual">
                    <td><input class="form-control"></td>
                    <td><input class="form-control"></td>
                    <td><input class="form-control"></td>
                    <td><input class="form-control"></td>
                </tr>
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
                    <td>
                        {{line.product.customer_price}}
                    </td>
                    <td class="col-xs-2 col-md-1">
                        <input name="quantity" v-model="line.qty" class="form-control">
                    </td>
                    <td class="col-xs-2 col-md-2">
                        <span class="input-group">
                            <input type="range" min="20" max="500" class="form-control" v-model="line.margin">
                            <span class="input-group-addon">{{line.margin}}%</span>
                        </span>
                    </td>
                    <td class="col-xs-2 col-md-1">
                        ${{adjustedPrice(line)}}
                    </td>
                    <td class="col-xs-2 col-md-1">
                        <label>${{lineTotal(line)}}</label>
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