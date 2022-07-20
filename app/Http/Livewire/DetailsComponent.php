<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;

    }
    public function store($product_id, $product_name, $product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');

        session()->flash('success_message','Item added in cart');

        return redirect()->route('product.cart');
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $popular_product = Product::inRandomOrder()->limit(4)->get();
        $related_products = Product::where('catagory_id', $product->catagory_id)->inRandomOrder()->limit(5)->get();
        return view('livewire.details-component',['product' => $product, 'popular_product' => $popular_product, 'related_products' => $related_products ])->layout('layouts.base');
    }
}
