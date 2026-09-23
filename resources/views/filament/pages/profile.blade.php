<x-filament-panels::page>

    <div class="max-w-3xl">

        <form wire:submit="save">

            <div class="rounded-xl bg-white dark:bg-gray-900 shadow-sm ring-1 ring-gray-950/5 dark:ring-white/10">

                <div class="p-6">

                    <div class="flex items-center gap-4 mb-8">

                        @if ($avatar)
                            <img
                                src="{{ $avatar->temporaryUrl() }}"
                                class="w-24 h-24 rounded-full object-cover ring-4 ring-gray-100 dark:ring-gray-800"
                            >
                        @elseif ($currentAvatar)
                            <img
                                src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($currentAvatar) }}"
                                class="w-24 h-24 rounded-full object-cover ring-4 ring-gray-100 dark:ring-gray-800"
                            >
                        @else
                            <div class="w-24 h-24 rounded-full bg-primary-600 text-white flex items-center justify-center text-3xl font-bold">
                                {{ strtoupper(substr($name ?: 'A', 0, 1)) }}
                            </div>
                        @endif

                        <div>
                            <h2 class="text-xl font-bold text-gray-950 dark:text-white">
                                Profile
                            </h2>

                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Kelola informasi profile kamu
                            </p>
                        </div>

                    </div>


                    <div class="space-y-6">

                        <div>
                            <label class="block text-sm font-medium text-gray-950 dark:text-white mb-2">
                                Profile Photo
                            </label>

                            <input
                                type="file"
                                wire:model="avatar"
                                accept="image/*"
                                class="block w-full text-sm text-gray-700 dark:text-gray-300
                                       file:mr-4 file:rounded-lg file:border-0
                                       file:bg-primary-600 file:px-4 file:py-2
                                       file:text-sm file:font-semibold
                                       file:text-white hover:file:bg-primary-500"
                            >

                            @error('avatar')
                                <p class="mt-2 text-sm text-danger-600">
                                    {{ $message }}
                                </p>
                            @enderror

                            <p class="mt-2 text-xs text-gray-500">
                                Maksimal 2 MB. Format JPG, JPEG, PNG, atau WEBP.
                            </p>
                        </div>


                        <div>
                            <label class="block text-sm font-medium text-gray-950 dark:text-white mb-2">
                                Name
                            </label>

                            <input
                                type="text"
                                wire:model="name"
                                class="w-full rounded-lg border-gray-300 dark:border-gray-700
                                       bg-white dark:bg-gray-800
                                       text-gray-950 dark:text-white
                                       focus:border-primary-500 focus:ring-primary-500"
                            >

                            @error('name')
                                <p class="mt-2 text-sm text-danger-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        <div>
                            <label class="block text-sm font-medium text-gray-950 dark:text-white mb-2">
                                Email
                            </label>

                            <input
                                type="email"
                                wire:model="email"
                                class="w-full rounded-lg border-gray-300 dark:border-gray-700
                                       bg-white dark:bg-gray-800
                                       text-gray-950 dark:text-white
                                       focus:border-primary-500 focus:ring-primary-500"
                            >

                            @error('email')
                                <p class="mt-2 text-sm text-danger-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        <div>
                            <label class="block text-sm font-medium text-gray-950 dark:text-white mb-2">
                                Phone Number
                            </label>

                            <input
                                type="text"
                                wire:model="phone_number"
                                placeholder="08xxxxxxxxxx"
                                class="w-full rounded-lg border-gray-300 dark:border-gray-700
                                       bg-white dark:bg-gray-800
                                       text-gray-950 dark:text-white
                                       focus:border-primary-500 focus:ring-primary-500"
                            >

                            @error('phone_number')
                                <p class="mt-2 text-sm text-danger-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>

                </div>


                <div class="flex items-center justify-end gap-3 border-t border-gray-200 dark:border-gray-800 px-6 py-4">

                    <a
                        href="{{ filament()->getUrl() }}"
                        class="inline-flex items-center justify-center rounded-lg px-4 py-2
                               text-sm font-semibold text-gray-700
                               hover:bg-gray-100
                               dark:text-gray-200 dark:hover:bg-gray-800"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        wire:loading.attr="disabled"
                        class="inline-flex items-center justify-center rounded-lg
                               bg-primary-600 px-4 py-2
                               text-sm font-semibold text-white
                               hover:bg-primary-500"
                    >
                        Save Changes
                    </button>

                </div>

            </div>

        </form>

    </div>

</x-filament-panels::page>