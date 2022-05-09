@include('includes.header1')
<section class="text-gray-400 bg-gray-900 body-font overflow-hidden">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
                src="{{ asset('uploads/products/' . $product->image) }}">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h2 class="text-sm title-font text-gray-500 tracking-widest">BRAND NAME</h2>
                <h1 class="text-white text-3xl title-font font-medium mb-1">{{ $product->name }}</h1>
                <div class="flex mb-4">
                </div>
                <p class="leading-relaxed">{{ $product->description }}</p>
                <div class="flex">
                    <span class="title-font font-medium text-2xl text-white">${{ $product->price }}</span>
                    <a href="{{ url('addcart/' . $product->id) }}"
                        class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Add
                        To Cart</a>
                    <a href="{{ url()->previous() }}"
                        class="flex ml-2 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Go
                        Back</a>
                </div>
            </div>
        </div>
    </div>
</section>
@include('includes.footer')
