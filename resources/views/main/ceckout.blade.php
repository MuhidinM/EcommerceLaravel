@include('includes.header1')

<section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
    <div class="flex justify-end mt-6">
        <form action="{{ url()->previous() }}" method="GET">
            <button type="submit"
                class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Go
                back</button>
        </form>
    </div>
    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Account settings</h2>
    <form action="{{ route('order') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="first_name">First Name *</label>
                <input id="first_name" name="first_name" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                @error('first_name')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="last_name">Last Name *</label>
                <input id="last_name" name="last_name" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                @error('last_name')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="email">Email Address</label>
                <input id="email" name="email" type="email"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                @error('email')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="phone">Phone*</label>
                <input id="phone" name="phone" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                @error('phone')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="address">Address*</label>
                <input id="address" name="address" type="text"
                    class="w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                @error('address')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <input name="price" type="hidden" value="{{ $total }}">
            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="w-full px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Place
                    Order</button>
            </div>
        </div>
    </form>


</section>
@include('includes.footer')
