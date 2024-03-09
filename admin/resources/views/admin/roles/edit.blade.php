<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex ">
                    <a href="{{ route('admin.roles.index') }}" class="px-4 py-2 bg-blue-700 hover:bg-blue-500 rounded-md text-white ">Back Role index page</a>
                </div>
                <h4 class="mt-3">edit roles page</h4>
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form method="POST" action="{{ route('admin.roles.update' , $role->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700"> Role Name </label>
                            <div class="mt-1">
                                <input type="text" id="name" name="name" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" value="{{$role->name}}" />
                            </div>
                            @error('name') <span class="error">{{ $message }} </span> @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-blue-700 hover:bg-blue-500 rounded-md text-white ">
                                update
                            </button>
                        </div>
                    </form>
                </div>
                <div class="mt-6 p-2">
                    <h2 class="text-2xl">
                        role permissons
                    </h2>
                    <div class="mt-4 p-2">
                        @if ($role->premissions)
                        @foreach ($role->permissions as $role_permissoon)
                        <span>
                            <form method="POST" action="{{ route('admin.roles.destroy' , $role->id) }}" onsubmit="return confirm('are you sure you want to delete this?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-4 py-2 bg-red-500 bg-red-700 text-white rounded-md" type="submit">{{ $role_permissoon->name }}</button>
                            </form>
                        </span>
                        @endforeach
                        @endif
                    </div>
                    <div class="max-w-xl">
                        <form method="POST" action="{{ route('admin.roles.permissions' , $role->id) }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <div class="col-span-6">
                                    <label for="permissions" class="block text-sm font-medium text-gray-700">permissions</label>
                                    <select id="permission" name="permission" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach ( $permissions as $permission)
                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('name') <span class="error">{{ $message }} </span> @enderror
                            </div>
                            <div class="sm:col-span-6 pt-5">
                                <button type="submit" class="px-4 py-2 bg-blue-700 hover:bg-blue-500 rounded-md text-white ">
                                    Assing permission
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>