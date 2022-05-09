@include('includes.header1')
<section class="text-gray-400 bg-gray-900 body-font">
    <div class="max-w-2xl mx-auto py-0 md:py-16">
        <article class="shadow-none md:shadow-md md:rounded-md overflow-hidden">
            <div class="md:rounded-b-md  bg-white">
                <div class="p-9 border-b border-gray-200">
                    <div class="space-y-6">
                        <div class="flex justify-between items-top">
                            <div class="space-y-4">
                                <div>
                                    <h2 class="font-bold text-black text-lg">MM Stores</h2>
                                    <p class="font-bold text-lg"> Invoice </p>
                                    <p> MM Stores</p>
                                </div>
                                <div>
                                    <p class="font-medium text-sm text-gray-400"> Billed To </p>
                                    <p> {{ $order['first_name'] }} {{ $order['last_name'] }} </p>
                                    <p> {{ $order['address'] }} </p>
                                    <p> {{ $order['email'] }} </p>
                                    <p> {{ $order['phone'] }} </p>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <div>
                                    <p class="font-medium text-sm text-gray-400"> Invoice Date </p>
                                    <p> {{ $date }} </p>
                                </div>
                                <div>
                                    <p class="font-medium text-sm text-gray-400"> Status </p>
                                    <p> Pending </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-9 border-b border-gray-200">
                    <p class="font-medium text-sm text-gray-400"> Note </p>
                    <p class="text-sm"> Thank you for your order. </p>
                </div>
                <table class="w-full divide-y divide-gray-200 text-sm">
                    <thead>
                        <tr>
                            <th scope="col" class="px-9 py-4 text-left font-semibold text-gray-400"> Item </th>
                            <th scope="col" class="py-3 text-left font-semibold text-gray-400"> </th>
                            <th scope="col" class="py-3 text-left font-semibold text-gray-400"> Quantity </th>
                            <th scope="col" class="py-3 text-left font-semibold text-gray-400"> Amount </th>
                            <th scope="col" class="py-3 text-left font-semibold text-gray-400"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            @foreach ($products as $product)
                                <td class="px-9 py-5 whitespace-nowrap space-x-1 flex items-center">
                                    {{ $product['item']['name'] }}</td>
                                <td class="whitespace-nowrap text-gray-600 truncate"></td>
                                <td class="whitespace-nowrap text-gray-600 truncate">{{ $product['qty'] }}</td>
                                <td class="whitespace-nowrap text-gray-600 truncate">${{ $product['item']['price'] }}
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
                <div class="p-9 border-b border-gray-200">
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm"> Subtotal </p>
                            </div>
                            <p class="text-gray-500 text-sm">${{ $totalPrice }}</p>
                        </div>
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500 text-sm"> Tax </p>
                            </div>
                            <p class="text-gray-500 text-sm">${{ $tax = $totalPrice * 0.05 }}</p>
                        </div>
                    </div>
                </div>
                <div class="p-9 border-b border-gray-200">
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <div>
                                <p class="font-bold text-black text-lg"> Grand Total </p>
                            </div>
                            <p class="font-bold text-black text-lg">${{ $totalPriceSum = $totalPrice + $tax }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
</section>
@include('includes.footer')
