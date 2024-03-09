<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <h4>Roles</h4>
                <div class="flex justify-end">
                    <a href="{{ route('admin.roles.create') }}" class="px-4 py-2 bg-blue-700 hover:bg-blue-500 rounded-md text-white " >Create Role</a>
                </div>
                <!--Card-->
                <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white ">
                    <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1" class="text-left px-6 py-3 ">Name</th>
                                <th data-priority="3" scope="col" class="text-left relative px6 py3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($roles as $role)
                                    <td class="px-6 py-4 whitespace-nowrap" style="display: block;">
                                        <div class="flex items-center" style="justify-content: space-between;">
                                          <span>{{$role->name}}</span> <span class="flex items-center">
                                          <div class="flex justify-end">
                                            <div class=" flex gap-2 spaxe-x-2">
                                                <span class="flex items-center"><a href="{{ route('admin.roles.edit', $role->id) }}" class="px-4 py-2 bg-blue-500 bg-blue-700 text-white rounded-md">Edit</a></span>
                                                <form  method="POST" action="{{ route('admin.roles.destroy' , $role->id) }}" onsubmit="return confirm('are you sure you want to delete this?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="px-4 py-2 bg-red-500 bg-red-700 text-white rounded-md" type="submit">delete</button>
                                                </form>
                                            </div>
                                          </div>
                                        </div>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>

                    </table>


                </div>
                <!--/Card-->
            </div>
        </div>
    </div>
</x-admin-layout>