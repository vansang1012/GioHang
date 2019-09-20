<?php


namespace App\Providers;


use http\Env\Request;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;

    }

    public function remove($id)
    {
        if ($this->items) {
            $productIntoCart = $this->items;
            if (array_key_exists($id, $productIntoCart)) {
                $priceProductDelete = $productIntoCart[$id]['price'];
                $this->totalPrice -= $priceProductDelete;
                $this->totalQty--;
                unset($productIntoCart[$id]);
                $this->items = $productIntoCart;
            }
        }
    }

    public function update(Request $request, $id)
    {
        if ($this->items) {
            $itemIntoCart = $this->items;
            if (array_key_exists($id, $itemIntoCart)) {
                $itemUpdate = $itemIntoCart[$id];
                //update tong so luong san pham trong gio hang
                $qtyUpdate = $request->qty - $itemUpdate['qty'];
                $this->totalQty += $qtyUpdate;
                //update tong gia cua gio hang
                $priceUpdate = $itemUpdate['item']->price * $request->qty - $itemUpdate['price'];
                $this->totalPrice += $priceUpdate;
                //update so luong san pham do
                $itemUpdate['qty'] = $request->qty;

                //update tong gia cua san pham do
                $itemUpdate['price'] = $itemUpdate['item']->price * $request->qty;
                $this->items[$id] = $itemUpdate;

            }
        }
    }

}
