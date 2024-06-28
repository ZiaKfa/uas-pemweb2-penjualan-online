<x-navbar>
    Product List
</x-navbar>

<x-header>
<div class="grid grid-cols-3">
    <div class="flex justify-between">
        <span class="ml-2">Product</span>
        <div class="flex justify-end">
            <a href="{{route('product.create')}}"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add new product</button></a>
        </div>
    </div>
</div>
</x-header>

<x-main>
<ul role="list" class="divide-y divide-gray-100">
    @foreach ($products as $product)
  <li class="flex justify-between gap-x-6 py-5">
    <div class="flex min-w-0 gap-x-4">
      <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{asset('images')}}/{{$product->image}}" alt="">
      <div class="min-w-0 flex-auto">
        <p class="text-sm font-semibold leading-6 text-gray-900">{{$product->name}}</p>
        <p class="mt-1 truncate text-xs leading-5 text-gray-500">Rp.{{$product->price}}</p>
      </div>
    </div>
    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
    <a href="{{route('product.show',$product->id)}}" class="text-sm leading-6 text-gray-900 hover:text-blue-500 transition-colors duration-300">More...</a>
      <p class="mt-1 text-xs leading-5 text-gray-500">Last updated {{$product->updated_at->diffForHumans()}}</p>
    </div>
  </li>
  @endforeach
</ul>
{{$products->links()}}
</x-main>

<x-footer>

</x-footer>