@include('includes.header1')
<section class="text-gray-400 bg-gray-900 body-font">
    <div class="container px-5 py-24 mx-auto">
        @if (Session::has('cart'))
            <div class="grid grid-rows-12 grid-flow-col">
                <div class="col-span-12">
                    <div class="w-full mx-auto overflow-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                            <thead>
                                <tr>
                                    <th
                                        class="px-4 py-5 title-font tracking-wider font-medium text-white text-sm bg-gray-800 rounded-tl rounded-bl">
                                        Product</th>
                                    <th
                                        class="px-4 py-5 title-font tracking-wider font-medium text-white text-sm bg-gray-800 rounded-tl rounded-bl">
                                        Name</th>
                                    <th
                                        class="px-4 py-5 title-font tracking-wider font-medium text-white text-sm bg-gray-800">
                                        Quantity
                                    </th>
                                    <th
                                        class="px-4 py-5 title-font tracking-wider font-medium text-white text-sm bg-gray-800">
                                        Price</th>
                                    <th
                                        class="px-4 py-5 title-font tracking-wider font-medium text-white text-sm bg-gray-800">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="px-4 py-3">
                                            <img class="object-cover w-32 h-32 w-full rounded-xl aspect-square"
                                                src="{{ asset('uploads/products/' . $product['item']['image']) }}"
                                                alt="">
                                        </td>
                                        <td class="px-4 py-3">{{ $product['item']['name'] }}</td>
                                        <td class="px-4 py-3">
                                            <div class="flex justify-center w-1/5">
                                                <a href="{{ url('reduce/' . $product['item']['id']) }}"
                                                    class="w-full px-4 py-2 tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 hover:bg-blue-500 focus:outline-none focus:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                                    -
                                                </a>
                                                <input class="w-full border text-center w-12" type="text"
                                                    value="{{ $product['qty'] }}">
                                                <a href="{{ url('addcart/' . $product['item']['id']) }}"
                                                    class="w-full px-4 py-2 tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 hover:bg-blue-500 focus:outline-none focus:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                                    +
                                                </a>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">${{ $product['item']['price'] }}</td>
                                        <td class="px-4 py-3">
                                            <form action="{{ url('removeall/' . $product['item']['id']) }}" method="GET">
                                                <button
                                                class="h-10 px-5 m-2 text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800">Remove</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-span-2 ...">
                    <div class="max-w-sm mx-auto border rounded-lg md:mx-4 dark:border-gray-700">
                        <div class="p-6">
                            <h2 class="text-xl">Sub Total: ${{ $totalPrice }}</h2>
                            <h2 class="text-xl">Tax: ${{ $tax = $totalPrice * 0.05 }}</h2>
                            <h2 class="mt-4 text-2xl font-medium text-gray-700 sm:text-2xl dark:text-gray-300">Grand
                                Total: ${{ $totalPriceSum = $totalPrice + $tax }}</h2>
                        </div>

                        <hr class="border-gray-200 dark:border-gray-700">

                        <div class="p-6">
                            <form action="{{ url('checkout') }}" method="GET">
                                <button
                                    class="w-full px-4 py-2 mt-6 tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                    Checkout
                                </button>
                            </form>

                            <form action="{{ url()->previous() }}" method="GET">
                                <button type="submit"
                                    class="w-full mt-6 h-10 px-5 text-indigo-700 transition-colors duration-150 border border-indigo-500 rounded-lg focus:shadow-outline hover:bg-indigo-500 hover:text-indigo-100">Continue
                                    Shopping</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <h2 class="mt-4 text-2xl font-medium text-gray-700 sm:text-2xl dark:text-gray-300"></h2>
            <form action="{{ url()->previous() }}" method="GET">
                <button type="submit"
                    class="w-full px-4 py-2 mt-6 tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-80">Continue
                    Shopping</button>
            </form>
        @endif
    </div>
</section>
@include('includes.footer')
