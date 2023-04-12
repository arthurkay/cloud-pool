<div>
    <div wire:loading class="border-blue-300 shadow rounded-md p-4 max-w-xl w-full mx-auto">
        <div class="animate-pulse flex space-x-4">
          <div class="flex-1 space-y-6 py-1">
            <div class="h-2 bg-slate-700 rounded"></div>
            <div class="space-y-3">
              <div class="grid grid-cols-3 gap-4">
                <div class="h-2 bg-slate-700 rounded col-span-2"></div>
                <div class="h-2 bg-slate-700 rounded col-span-1"></div>
              </div>
              <div class="h-2 bg-slate-700 rounded"></div>
            </div>
          </div>
        </div>
    </div>
    <div wire:init="loadRecords">
    @if (isset($records) && $records->count() > 0)
        @foreach ($records as $record => $details)
            <div wire:loading.remove class="flex flex-row justify-evenly">
                <div class="relative z-0 mb-6 group">
                    <input disabled value="{{$record}}" type="text" name="host" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                    <label for="host" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Host</label>
                </div>
                @foreach(json_decode($details, true) as $type => $options)
                    <div class="relative z-0 mb-6 group">
                        <input disabled value="{{$options[0]['ttl']}}" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                        <label for="ttl" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">TTL</label>
                    </div>
                    <div class="relative z-0 mb-6 group">
                        <select disabled name="type" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:bg-transparent dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                            <option {{$type == "a" ? "selected" : ""}} value="A">A</option>
                            <option {{$type == "aaaa" ? "selected" : "" }} value="AAAA">AAAA</option>
                            <option {{$type == "txt" ? "selected" : ""}} value="TXT">TXT</option>
                            <option {{$type == "cname" ? "selected" : ""}} value="CNAME">CNAME</option>
                            <option {{$type == "mx" ? "selected" : ""}} value="MX">MX</option>
                        </select>
                        <label for="type" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Type</label>
                    </div>
                    @if ($type == "mx")
                        <div class="relative z-0 mb-6 group">
                            <input disabled type="number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$options[0]['preference']}}"/>
                            <label for="priority" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Priority</label>
                        </div>
                    @endif
                    @if ($type == "a" || $type == "aaaa")
                    <div class="relative z-0 mb-6 group">
                        <input disabled value="{{$options[0]['ip']}}" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                        <label for="value" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Value</label>
                    </div>
                    @endif
                    @if ($type == "txt")
                    <div class="relative z-0 mb-6 group">
                        <input disabled value="{{$options[0]['text']}}" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                        <label for="value" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Value</label>
                    </div>
                    @endif
                    @if ($type == "cname" || $type == "mx")
                    <div class="relative z-0 mb-6 group">
                        <input disabled value="{{$options[0]['host']}}" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                        <label for="value" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Value</label>
                    </div>
                    @endif
                    @if ($type != "mx")
                        <div class="relative z-0 mb-6 group">
                            <input disabled type="number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer invisible"/>
                        </div>
                    @endif
                    <div class="relative z-0 mb-6 justify-between group">
                        @if ($type == "a" || $type == "aaaa")
                        <x-secondary-button wire:click="$emit('edit', '{{$record}}', '{{$type}}', '{{$options[0]['ttl']}}', '{{$options[0]['ip']}}', '')" x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-record-edit')">
                            Edit
                        </x-secondary-button>
                        @endif
                        @if ($type == "mx" || $type == "cname")
                        <x-secondary-button wire:click="$emit('edit', '{{$record}}', '{{$type}}', '{{$options[0]['ttl']}}', '{{$options[0]['host']}}', '{{$options[0]['preference']}}')" x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-record-edit')">
                            Edit
                        </x-secondary-button>
                        @endif
                        @if ($type == "txt")
                        <x-secondary-button wire:click="$emit('edit', '{{$record}}', '{{$type}}', '{{$options[0]['ttl']}}', '{{$options[0]['text']}}', '')" x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-record-edit')">
                            Edit
                        </x-secondary-button>
                        @endif
                        <x-danger-button wire:click="$emit('delete', '{{$record}}', '{{$type}}')" x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-record-delete')">
                            Delete
                        </x-danger-button>
                    </div>
                @endforeach
            </div>
        @endforeach
        {{$records->links()}}
    @else
        <div wire:loading.remove id="alert-border-5" class="flex p-4 border-t-4 border-gray-300 bg-gray-50 dark:bg-gray-800 dark:border-gray-600" role="alert">
            <svg class="flex-shrink-0 w-5 h-5 text-gray-800 dark:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-sm font-medium text-gray-800 dark:text-gray-300">
              No DNS records found
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-gray-50 text-gray-500 rounded-lg focus:ring-2 focus:ring-gray-400 p-1.5 hover:bg-gray-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white" data-dismiss-target="#alert-border-5" aria-label="Close">
              <span class="sr-only">Dismiss</span>
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    @endif
    </div>

    <!-- drawer component -->
    <div id="drawer-right" class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-right-label">
        <h5 id="drawer-right-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400"><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>Add A DNS Record</h5>
        <livewire:widgets.create-record :zone="$zone"/>
    </div>

    <x-modal name="confirm-record-edit" focusable class="w-full">
        <form action="{{route('dash.update')}}" method="POST">
            @method('put')
            @csrf
        <div class="p-6">
            <h2 id="editTitle"> Edit</h2>
        </div>
        <div class="p-6 flex flex-row justify-evenly">
            <input type="hidden" id="editID" name="id" />
            <div class="relative z-0 w-1/5 mb-6 group">
                <input id="editHost" type="text" name="host" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                <label for="host" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Host</label>
            </div>
        
            <div class="relative z-0 w-1/5 mb-6 group">
                <input id="editTTL" type="text" name="ttl" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                <label for="ttl" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">TTL</label>
            </div>
        
            <div class="relative z-0 w-1/5 mb-6 group">
                <select id="editType" name="type" x-on:input="handleChange($event.target.value)" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:bg-transparent dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="">
                    <option value="A">A</option>
                    <option value="AAAA">AAAA</option>
                    <option value="TXT">TXT</option>
                    <option value="CNAME">CNAME</option>
                    <option value="MX">MX</option>
                </select>
                <label for="type" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Type</label>
            </div>

            <div id="priority" class="relative z-0 w-1/5 mb-6 group hidden">
                <input id="editPriority" type="number" name="priority" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="0"/>
                <label for="priority" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Priority</label>
            </div>
        
            <div class="relative z-0 w-1/5 mb-6 group">
                <input id="editValue" type="text" name="value" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                <label for="value" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Value</label>
            </div>
        </div>
        <div class="p-6">
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ml-3">
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </div>
        </form>
    </x-modal>

    <x-modal name="confirm-record-delete" focusable id="modalDelete">
        <div class="p-6">
            <h2 id="deleteTitle"> Delete</h2>
        </div>
        <form method="POST" action="{{route('dash.destroy')}}">
            @method('delete')
            @csrf
        <input type="hidden" id="deleteID" name="id"/>
        <input type="hidden" name="zone" value="{{$zone}}"/>
        <div class="p-6 flex flex-row justify-evenly">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete this record?') }}
            </h2>
        </div>
        <div class="p-6">
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete') }}
                </x-danger-button>
            </div>
        </div>
        </form>
    </x-modal>

    <script>
        function handleChange(type) {
            if (type == "MX") {
                document.querySelector("#priority").classList.remove('hidden');
            } else {
                document.querySelector("#priority").classList.add('hidden');
            }
        }

        document.addEventListener('livewire:load', function () {
            @this.on('edit', (record, type, ttl, content, preference) => {
                document.querySelector("#editTitle").innerHTML = "Edit " + record;
                document.querySelector("#editHost").value = record;
                document.querySelector("#editTTL").value = ttl;
                var recordIndex = 0;
                switch (type) {
                    case "a":
                        recordIndex = 0;
                        break;
                    case "aaaa":
                        recordIndex = 1;
                        break;
                    case "txt":
                        recordIndex = 2;
                        break;
                    case "cname":
                        recordIndex = 3;
                        break;
                    case "mx":
                        recordIndex = 4;
                        break;
                    default:
                        recordIndex = 0;
                }
                console.debug(recordIndex);
                console.debug(type);
                document.querySelector("#editType").selectedIndex = recordIndex;
                if (type == "mx") {
                    document.querySelector("#priority").classList.toggle('hidden');
                    document.querySelector("#editPriority").value = preference;
                }
                document.querySelector("#editValue").value = content;
                document.querySelector("#editID").value = record;
            })

            @this.on('delete', (record, type) => {
                console.debug(record);
                document.querySelector("#deleteTitle").innerHTML = "Delete " + type.toUpperCase() + " record for " + record + " ?";
                document.querySelector("#deleteID").value = record;
            })
        })
    </script>

</div>
