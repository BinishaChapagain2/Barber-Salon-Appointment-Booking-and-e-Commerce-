<div class="container px-4 py-12 mx-auto">

    <!-- Account Deletion Form -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-lg">
        <div class="p-10">
            <h2 class="mb-6 text-xl font-semibold text-center text-gray-800">Delete Your Account</h2>

            <!-- Success Message -->
            @if (session('status'))
                <div class="p-3 mb-6 text-green-800 bg-green-100 rounded-md">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Account Deletion Form -->
            <form action="{{ route('profile.destroy') }}" method="POST">
                @csrf
                @method('DELETE')

                <!-- Password Confirmation -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Confirm Your Password</label>
                    <input type="password" name="password" id="password"
                        class="block w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your password" required>

                    @error('password')
                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Delete Button -->
                <div class="mb-6">
                    <button type="submit"
                        class="w-full py-3 text-lg font-semibold text-white rounded-lg bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 focus:ring-4 focus:ring-red-500">
                        Delete Account
                    </button>
                </div>
            </form>

            <!-- Warning Text -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-500">This action is permanent and cannot be undone.</p>
            </div>
        </div>
    </div>

</div>
