@extends('layouts.app')

@section('title', 'List')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="mx-4 my-8 md:m-8 text-sm md:text-base md:flex gap-4">
        <div class="flex rounded">
            <a
                href={{ route('employee.create') }}
                class="bg-green-800 hover:bg-green-400 mt-2 p-2 rounded text-white font-bold w-full md:w-auto">
                    <i class="fa-solid fa-user-plus"></i>
                    Create
            </a>
        </div>

        <div class="flex bg-white p-2 rounded mt-2">
            <span class="text-indigo-800"><i class="fa-solid fa-magnifying-glass"></i></span>
            <input type="text" id="employee__search" class="rounded focus:outline-none pl-2" placeholder="Search by name or departement">
        </div>

        <div class="flex bg-white p-2 rounded mt-2">
            <span class="text-indigo-800 font-bold">Hired from</span>
            <input type="text" id="employee__search_hired" name="employee__search_hired" class="rounded focus:outline-none pl-2" placeholder="Choose date">
        </div>

        <button
            id="employee__reset"
            class="bg-indigo-800 hover:bg-indigo-400 h-full mt-2 p-2 rounded text-white font-bold w-full md:w-auto">Reset</button>
    </div>

    @session('message')
        {{ session('message') }}
    @endsession

    <div class="mx-4 my-8 md:m-8 text-sm md:text-base bg-white p-2 md:p-4 rounded relative overflow-x-auto">
        <table id="employee__table" class="display">
            <thead class="bg-indigo-800 text-white">
                <tr>
                    <th>#</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Departement</th>
                    <th>Hired at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $e)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            <img src={{ $e->profile_pict_link != null ?
                                $e->profile_pict_link :
                                "https://static.vecteezy.com/system/resources/previews/009/292/244/non_2x/default-avatar-icon-of-social-media-user-vector.jpg"}}
                                alt={{ $e->name." profile picture" }}
                                class="max-w-16 rounded-full">
                        </td>
                        <td>
                            {{ $e->name }}
                        </td>
                        <td>
                            {{ $e->email }}
                        </td>
                        <td>
                            {{ $e->departement_name }}
                        </td>
                        <td>
                            {{ $e->hired_at }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script>
        let minDate, maxDate;

        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
            let min = minDate;
            let max = maxDate;
            let date = new Date(data[5]);

            if (
                (min === null && max === null) ||
                (min === null && date <= max) ||
                (min <= date && max === null) ||
                (min <= date && date <= max)
            ) {
                return true;
            }
            return false;
        });

        function emptyFilter() {
            $("#employee__search").val('');
            $("#employee__search_hired").val('');

            minDate = null;
            maxDate = null;
        }

        $(document).ready(function() {
            const table = new DataTable('#employee__table', {
                responsive: true
            });

            const emptyFilterFirst = (function() {
                var executed = false;
                return function() {
                    if (!executed) {
                        executed = true;

                        emptyFilter();

                        table.draw();
                    }
                };
            })();

            emptyFilterFirst();

            $(function() {
                $('input[name="employee__search_hired"]').daterangepicker({
                    opens: 'left',
                }, function(start, end, label) {
                    minDate = start._d;
                    maxDate = end._d;

                    table.draw();
                });
            });

            $('#employee__search').keyup(function(){
                table.search($(this).val()).draw();
            });

            $("#employee__reset").click(function() {
                emptyFilter();

                table.draw();
            });
        });
    </script>
    <!-- Page Specific JS File -->
@endpush
