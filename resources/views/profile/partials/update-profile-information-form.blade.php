<div class="w-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-lg">
    <!-- Header -->
    <header class="p-4 text-center text-white bg-[#051923]">
        <h2 class="text-xl font-bold">Update Profile Information
        </h2>
    </header>

    <!-- Profile Form -->
    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="p-4 space-y-8">
        @csrf
        @method('patch')

        <!-- Profile Picture Section -->
        <div class="flex justify-center">
            <div class="relative group">
                @if ($user->profile_picture)
                    <img src="{{ asset('images/profile_pictures/' . $user->profile_picture) }}" alt="Profile Picture"
                        class="object-cover border-4 border-white rounded-full shadow-lg w-36 h-36">
                @else
                    <img src="{{ asset('images/profile_pictures/default.png') }}" alt="Profile Picture"
                        class="object-cover border-4 border-white rounded-full shadow-lg w-36 h-36">
                @endif
                <div
                    class="absolute inset-0 flex items-center justify-center transition-opacity duration-300 bg-black bg-opacity-50 rounded-full opacity-0 group-hover:opacity-100">
                    <label for="profile_picture"
                        class="px-4 py-2 text-sm text-white bg-[#051923] rounded-full cursor-pointer hover:bg-gray-700">Upload
                        New</label>
                    <input id="profile_picture" name="profile_picture" type="file" class="hidden">
                </div>
            </div>
        </div>

        <!-- Form Fields -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <!-- Name Field -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input id="name" name="name" type="text"
                    class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    value="{{ old('name', $user->name) }}" required>
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email"
                    class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    value="{{ old('email', $user->email) }}" required>
            </div>

            <!-- Phone Field -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input id="phone" name="phone" type="text"
                    class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    value="{{ old('phone', $user->phone) }}">
            </div>

            <!-- Gender Field -->
            <div>
                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                <select id="gender" name="gender"
                    class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female
                    </option>
                    <option value="other" {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>Other
                    </option>
                </select>
            </div>

            {{-- address --}}
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input id="address" name="address" type="text"
                    class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    value="{{ old('address', $user->address) }}">
            </div>
        </div>

        <!-- Save Button -->
        <div class="mt-10 text-center">
            <button type="submit"
                class="px-8 py-3 text-lg font-semibold text-white bg-[#051923] transition duration-300  border-2 border-[#051923] rounded-full hover:bg-white hover:text-[#051923]">
                Save Changes
            </button>
            @if (session('status') === 'profile-updated')
                <p class="mt-4 text-sm text-green-500">Profile updated successfully.</p>
            @endif
        </div>
    </form>
</div>
