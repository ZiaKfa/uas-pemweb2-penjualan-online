<x-navbar>
    Create Payment
</x-navbar>

<x-header>
    Create New Payment
</x-header>

<x-main>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="{{route('payment.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
      <div>
        <label for="payment_number" class="block text-sm font-medium leading-6 text-gray-900">Payment Number</label>
        <div class="mt-2">
          <input id="payment_number" name="payment_number" type="text" autocomplete="payment_number" required class="block w-full rounded-md bpayment-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <label for="amount" class="block text-sm font-medium leading-6 text-gray-900">Amount</label>
        <div class="mt-2">
          <input id="amount" name="amount" type="number" autocomplete="amount" required class="block w-full rounded-md bpayment-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <label for="order_id" class="block text-sm font-medium leading-6 text-gray-900">Order</label>
        <div class="mt-2">
          <select id="order_id" name="order_id" class="block w-full rounded-md bpayment-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            @foreach($orders as $order)
            <option value="{{$order->id}}">{{$order->invoice}}</option>
            @endforeach
          </select>
        </div>
      <div class="mt-2">
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
      </div>
    </form>
  </div>
</div>
</x-main>

<x-footer>

</x-footer>