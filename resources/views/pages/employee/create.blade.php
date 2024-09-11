@extends('layouts.app')

@section('title', 'Create')

@push('style')
@endpush

@section('main')
    <div class="grid place-items-center m-4">
        <div class="md:w-4/6 w-full">
            <h1 class="my-2 text-xl font-extrabold text-indigo-950">Create Employee</h1>
        </div>
        <div class="md:w-4/6 w-full p-4 text-sm md:text-base bg-white rounded">
            <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="form__employee__name" class="font-semibold text-indigo-800">Name</label>
                    <input id="form__employee__name" type="text" name="name" class="bg-gray-100 w-full p-2 rounded focus:outline-none" />
                    @error('name')
                        <div class="text-red-800 text-sm font-semibold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="form__employee__email" class="font-semibold text-indigo-800">Email</label>
                    <input id="form__employee__email" type="email" name="email" class="bg-gray-100 w-full p-2 rounded focus:outline-none" />
                    @error('email')
                        <div class="text-red-800 text-sm font-semibold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4 flex flex-col">
                    <label for="form__employee__departement_id" class="font-semibold text-indigo-800">Departement</label>
                    <select id="form__employee__departement_id" name="departement_id" class="w-auto">
                        <option value="" selected disabled>Select departement</option>
                        @foreach ($departements as $dep)
                            <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                        @endforeach
                    </select>
                    @error('departement_id')
                        <div class="text-red-800 text-sm font-semibold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="form__employee__hired_at" class="font-semibold text-indigo-800">Hired at</label>
                    <input id="form__employee__hired_at" type="text" name="hired_at" class="bg-gray-100 w-full p-2 rounded focus:outline-none" />
                    @error('hired_at')
                        <div class="text-red-800 text-sm font-semibold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-8">
                    <button type="submit" class="w-full bg-indigo-800 hover:bg-indigo-500 text-white p-1 rounded">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#form__employee__departement_id').select2();
        $("#form__employee__hired_at").datepicker({ dateFormat: 'yy-mm-dd' });
    });
</script>
@endpush
