<x-navbar>
    Edit Order
</x-navbar>

<x-header>
    Edit Order
</x-header>

<x-main>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="{{route('order.update',$order->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div>
        <label for="invoice" class="block text-sm font-medium leading-6 text-gray-900">Invoice</label>
        <div class="mt-2">
          <input id="invoice" name="invoice" type="text" autocomplete="invoice" value = {{$order->invoice}} class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <label for="quantity" class="block text-sm font-medium leading-6 text-gray-900">Quantity</label>
        <div class="mt-2">
          <input id="quantity" name="quantity" type="number" autocomplete="quantity" value = {{$order->quantity}} class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <label for="product_id" class="block text-sm font-medium leading-6 text-gray-900">Product</label>
        <div class="mt-2">
          <select id="product_id" name="product_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            @foreach($products as $product)
            <option value="{{$product->id}}"
            @if($product->id == $order->product_id)
            selected
            @endif
            >{{$product->name}}</option>
            @endforeach
          </select>
        </div>
      <div class="mt-2">
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
      </div>
    </form>
  </div>
</div>
</x-main>

<x-footer>

</x-footer>