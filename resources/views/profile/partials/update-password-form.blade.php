<div class="w-full mx-auto mt-2 overflow-hidden bg-white rounded-lg shadow-lg max-w-7xl">
    <!-- Header -->
    <header class="p-4 text-center text-white bg-[#051923]">
        <h2 class="text-xl font-bold">Update Password</h2>

    </header>

    <!-- Password Update Form -->
    <form method="post" action="{{ route('password.update') }}" class="p-10 space-y-8">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div>
            <label for="update_password_current_password" class="block text-sm font-medium text-gray-700">Current
                Password</label>
            <input id="update_password_current_password" name="current_password" type="password"
                class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                autocomplete="current-password">
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <!-- New Password -->
        <div>
            <label for="update_password_password" class="block text-sm font-medium text-gray-700">New Password</label>
            <input id="update_password_password" name="password" type="password"
                class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                autocomplete="new-password">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <!-- Confirm New Password -->
        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                New Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                autocomplete="new-password">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center gap-6">
            <button type="submit"
                class="px-8 py-3 text-lg font-semibold text-white  bg-[#051923] transition duration-300  border-2 border-[#051923] rounded-full hover:bg-white hover:text-[#051923]">
                Update Password
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-500">Password updated successfully.</p>
            @endif
        </div>
    </form>
</div>
