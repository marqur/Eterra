<?php 

namespace App\Http\Controllers;

use App\ProductPurchaseItem;
use App\PurchaseItem;
use App\User;
use App\Product;
use App\Mail\OrderShipped;
use App\Mail\OrderShippedNoUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller{

	     public function getOrders($user_id) 
     {
    	
    	$orders = PurchaseItem::with('product')->where('user_id', $user_id)->get();
    	
    	$response = [
    		'orders' => $orders

    	];
    	return response()->json($response);
    }

    	public function addOrder(Request $request)
    {

        if ($request->input('user_id') !== null) {

    	$purchase_item = new PurchaseItem();


    	$purchase_item->product[] = $request->input('product.product_id');
        $purchase_item->quantity = $request->input('product.quantity');
    	$purchase_item->user_id = $request->input('user_id');
        
    	$purchase_item->save();
        $purchase_item->product()->attach( $request->input('product'), ['purchase_item_id' => $purchase_item->id], $request->input('product.quantity'));
        
        
        $last_id = $purchase_item->id;


        $order = PurchaseItem::where('id', $last_id)->with('product', 'userId')->firstOrFail();
        $order_array = json_decode($order); 


        // Ship order...

        Mail::to($purchase_item->userId['email'])->send(new OrderShipped($order));


    	return response()->json([

    		'purchase_item' => $order
    		], 201);
        }
        else {
           
        $purchase_item = new PurchaseItem();


        $purchase_item->product[] = $request->input('product.product_id');
        $purchase_item->quantity = $request->input('product.quantity');
        $purchase_item->user_id = null;
        $name = $request->input('ime');
        $last_name = $request->input('prezime');
        $email = $request->input('email');
        $telefon = $request->input('telefon');
        $adresa = $request->input('adresa');
        $grad = $request->input('grad');
        $drzava = $request->input('drzava');
        $napomena = $request->input('napomena');
        
        $purchase_item->save();
        $purchase_item->product()->attach( $request->input('product'), ['purchase_item_id' => $purchase_item->id], $request->input('product.quantity'));
        
        
        $last_id = $purchase_item->id;


        $order = PurchaseItem::where('id', $last_id)->with('product')->firstOrFail();
        $order_array = json_decode($order); 


        // Ship order...

         Mail::to([$email, 'eterraulja@gmail.com'])->send(new OrderShippedNoUser($order, $name, $last_name, $email, $telefon, $adresa, $grad, $napomena));



        return response()->json([

            'order' => $order,
            'ime' => $name,
            'last_name' => $last_name,
            'email' => $email,
            'telefon' => $telefon,
            'adresa' => $adresa,
            'grad' => $grad,
            'drzava' => $drzava,
            'napomena' => $napomena,
            ], 201);
        }
        
    }


    public function deleteOrder($id) 
    {
        $product = PurchaseItem::find($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted.'], 200);
    }
}