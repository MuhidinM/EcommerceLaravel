<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Client Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="flex flex-col text-center w-full mb-20">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">
                                Sample Dashboard
                            </h1>
                        </div>
                        <div class="flex flex-wrap -m-4 text-center">
                            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                                <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                                    <img src="https://img.icons8.com/ios-filled/100/4a90e2/product.png"
                                        class="text-indigo-500 w-12 h-12 mb-3 inline-block" alt="products" />
                                    <h2 class="title-font font-medium text-3xl text-gray-900">{{ $products }}</h2>
                                    <p class="leading-relaxed">Products</p>
                                </div>
                            </div>
                            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                                <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                                    <img src="https://img.icons8.com/wired/64/4a90e2/order-history.png"
                                        class="text-indigo-500 w-12 h-12 mb-3 inline-block" alt="orders" />
                                    <h2 class="title-font font-medium text-3xl text-gray-900">{{ $orders }}</h2>
                                    <p class="leading-relaxed">Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
