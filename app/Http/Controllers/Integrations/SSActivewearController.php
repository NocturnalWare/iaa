<?php

namespace App\Http\Controllers\Integrations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\SSActivewear\SSActivewearStyle;
use App\SSActivewear\SSActivewearProduct;
use App\SSActivewear\SSActivewearBrand;

class SSActivewearController extends Controller
{

	/**
	 * Build style table from SS Activewear API
	 *
	 * @return void
	 */
	public function buildStylesTable()
	{
		\DB::table('s_s_activewear_styles')->truncate();
	    $client = new Client(); //GuzzleHttp\Client
		$results = $client->get('http://api.ssactivewear.com/v2/styles/', ['auth' => config('app.ss_activewear')]);
		$results = json_decode($results->getBody());
		$injection = [];

		foreach($results as $result){
			SSActivewearStyle::create([
	           'external_style_id' => $result->styleID,
	           'base_category' => $result->baseCategory,
	           'part_number' => $result->partNumber,
	           'brand_name' => $result->brandName,
	           'style_name' => $result->styleName,
	           'title' => $result->title,
	           'description' => $result->description,
	           'style_image' => $result->styleImage,
      		]);
		};

		return view('products.ssactivewear.index', compact('results'));
	}
	
	/**
	 * Description
	 * @param array $ids
	 * @return void
	 */
	public function updateStyles($ids)
	{
		$styles = SSActivewearStyle::whereIn('id', $id)->get();
		$count = 0;
		foreach($styles as $style){
			$results = $client->get('http://api.ssactivewear.com/v2/products/?style='.$style->external_style_id, ['auth' => [43346, '4d93b818-4369-4906-ade7-03c3b296fc5f']]);
			$results = json_decode($results->getBody());

			foreach($results as $result){
				$count += 1;
				SSActivewearProduct::create([
					'style_id' => $result->styleID,
			        'external_sku' => $result->sku,
			        'external_skuID_Master' => $result->skuID_Master,
			        'your_sku' => $result->yourSku,
			        'brand_name' => $result->brandName,
			        'style_name' => $result->styleName,
			        'color_name' => $result->colorName,
			        'color_code' => $result->colorCode,
			        'color_price_code_name' => $result->colorPriceCodeName,
			        'color_group' => $result->colorGroup,
			        'color_group_name' => $result->colorGroupName,
			        'color_family_id' => $result->colorFamilyID,
			        'color_family' => $result->colorFamily,
			        'color_swatch_image' => $result->colorSwatchImage,
			        'color_front_image' => $result->colorFrontImage,
			        'color_side_image' => $result->colorSideImage,
			        'color_back_image' => $result->colorBackImage,
			        'color_1' => $result->color1,
			        'color_2' => $result->color2,
			        'size_name' => $result->sizeName,
			        'size_code' => $result->sizeCode,
			        'size_order' => $result->sizeOrder,
			        'size_price_code_name' => $result->sizePriceCodeName,
			        'case_qty' => $result->caseQty,
			        'unit_weight' => $result->unitWeight,
			        'piece_price' => $result->piecePrice,
			        'dozen_price' => $result->dozenPrice,
			        'case_price' => $result->casePrice,
			        'sale_price' => $result->salePrice,
			        'customer_price' => $result->customerPrice,
			        'qty' => $result->qty,
	      		]);
			};
			sleep(2);
		};
		return $count;
	}

	/**
	 * Description
	 *
	 * @return void
	 */
	public function buildBrandsTable()
	{
		$brands = SSActivewearBrand::all();

		return view('products.ssactivewear.index', compact('brands'));
	}

	/**
	 * Description
	 *
	 * @return void
	 */
	public function getProductsByBrand(SSActivewearBrand $ss_brand)
	{
		$styles = $ss_brand->styles()->with('products')->get();
		return view('products.ssactivewear.show-brand', compact('styles', 'ss_brand'));
	}

	/**
	 * Description
	 *
	 * @return void
	 */
	public function showProduct(SSActivewearProduct $ss_product)
	{
		return view('products.ssactivewear.show-product', compact('ss_product'));
	}
	
	
	
}
