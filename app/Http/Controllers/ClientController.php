<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ShippingInfo;
use Illuminate\Support\Facades\Auth;
use App\Models\Card;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ClientController extends Controller
{
    public function Categoty($id)
    {
        $category = Category:: findOrFail($id);
        $products = Product:: where('product_category_id', $id)->latest()->get();
        return view('user_template.category', compact('category', 'products'));
    }
    public function SingleProduct($id)
    {
        $product = Product::findOrFail($id);
        $subcat_id = Product:: where('id', $id)->value('product_subcategory_id');
        $related_Products = Product:: where('product_subcategory_id',  $subcat_id)->latest()->get();
        return view('user_template.singleproduct', compact('product', 'related_Products'));
    }
    public function AddToCard()
    {
        $user_id = Auth::id();
        $card_item = Card::where('user_id', $user_id)->get();
        return view('user_template.addtocard', compact('card_item'));
    }
    public function CheckOut()
    {
        $user_id = Auth::id();
        $card_items = Card::where('user_id', $user_id)->get();
        $shipping_add = ShippingInfo::where('user_id', $user_id)->first();
        return view('user_template.checkout', compact('user_id','card_items','shipping_add'));
    }
    public function UserProfile()
    {
        return view('user_template.userprofile');
    }
    public function PendingOrders()
    {
        $pending_order = Order:: where('status', 'pending')->latest()->get();
        return view('user_template.pendingorders', compact('pending_order'));
    }
    // public function index(){

    //     // Example usage:
    //     $array = [2, 4, 6, 4, 8, 4, 10];
    //     $value = 20;
    //     $indices = $this->findIndices($array, $value);
    
    //    dd($indices);
    
    // }
    // public function findIndices($array, $value) {
    //         $indices = array();
    //         foreach ($array as $index => $element) {
    //             if ($element == $value) {
    //                 $indices[] = $index;
    //             }
    //         }
    //         return count($indices) > 0 ? $indices : [-1,-1];
    //     }
    public function History()
    {

        return view('user_template.history');
    }
    public function NewRelease()
    {
        return view('user_template.newrelease');
    }
    public function TodayDeals()
    {
        return view('user_template.todaydeals');
    }
    public function CustomarService()
    {
        return view('user_template.customarservice');
    }
    public function AddProductCard(Request $request)
    {
        $product_price = $request->price;
        $product_quantity = $request->quantity;
        $price = $product_price * $product_quantity;
        Card:: insert([
            'product_id'=> $request->product_id,
            'user_id'=>Auth::id(),
            'quantity'=> $request->quantity,
            'price'=> $price,
        ]);
        return redirect()->route('addtocard')->with('message', 'Your item added to cart successfully!');
    }
    public function DeleteCard($id)
    {
        Card::where('id',$id)->delete();
        // Card::findOrFail($id)->delete();
        return redirect()->route('addtocard')->with('message', 'Product Cart Delete Successfully!');
    }
    public function ShippingAddress()
    {
        return view('user_template.shippingaddress');
    }
    public function AddShippingAddress(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'city_name' => 'required',
            'postal_code' => 'required'
        ]);
        ShippingInfo:: insert([
            'name'=> $request->name,
            'user_id'=>Auth::id(),
            'phone_number'=> $request->phone_number,
            'city_name'=> $request->city_name,
            'postal_code'=> $request->postal_code,
            'add_details'=> $request->add_details,
        ]);
        return redirect()->route('checkout');
    }
    public function PlaceOrder()
    {
        $user_id = Auth::id();
        $card_items = Card::where('user_id', $user_id)->get();
        $shipping_add = ShippingInfo::where('user_id', $user_id)->first();
        foreach($card_items as $card){
        Order:: insert([
            'shipping_name'=> $shipping_add->name,
            'user_id'=>$user_id,
            'shipping_phone'=> $shipping_add->phone_number,
            'shipping_city'=> $shipping_add->city_name,
            'shipping_postalcod'=> $shipping_add->postal_code,
            'shipping_address'=> $shipping_add->add_details,
            'product_id'=>$card->product_id,
            'quantity'=>$card->quantity,
            'total_price'=>$card->price,
        ]);
        $id = $card->id;
        Card::where('id',$id)->delete();
    }
    ShippingInfo::where('user_id', $user_id)->first()->delete();
    return redirect()->route('pendingorders')->with('message',  'Yor order has been Place Successfully!!');
    }
    
}
