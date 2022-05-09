<?php

namespace App\Models;

class Cart
{
    public $items = null;
    public $totalquantity = 0;
    public $totalprice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalquantity = $oldCart->totalquantity;
            $this->totalprice = $oldCart->totalprice;
        }
    }

    public function add($item, $id)
    {
        $storedItem = ['id' => $item->id, 'qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalquantity++;
        $this->totalprice += $item->price;
    }

    public function reduce($id)
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'];
        $this->totalquantity--;
        $this->totalprice -= $this->items[$id]['item']['price'];

        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function removeall($id)
    {
        $this->totalquantity -= $this->items[$id]['qty'];
        $this->totalprice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
