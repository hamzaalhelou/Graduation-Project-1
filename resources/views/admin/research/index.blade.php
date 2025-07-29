@extends('admin.app')

@section('title',__('admin.Dashboards'))
@section('titlegage',__('admin.Researchs') )
@section('content')
<div class="card mb-3 m-3" >
    <div class="card-body">
<div class="d-flex justify-content-between align-items-center">
    <h1 class="h3 text-gray-800 mb-0">{{ __('admin.Researchs') }}</h1>
    <a class="btn btn-primary me-17" href="{{ route('admin.research.create') }}">{{ __('admin.Add New Research') }}</a>
</div>
</div>
<div class="card-body pt-0">
<table class="table align-middle table-row-dashed fs-6 gy-5">
    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
        <th class="min-w-100px">{{  __('admin.Title')  }} </th>
        <th class="min-w-100px">{{ __('admin.Content') }}</th>
        <th class="min-w-100px">{{ __('admin.Image') }}</th>
        <th class="min-w-100px">{{ __('admin.Actions') }}</th>
    </tr>
    @foreach ($researchs as $research)
    <tbody class="fw-semibold text-gray-600">
        <tr>
            <td>
                <span class="fw-bold">{{ $research->title }}</span>
            </td>
            <td>
                <span class="fw-bold">{{ Str::limit($research->content, 30) }}</span>
            </td>
            <td><img width="100" src="{{ asset('uploads/images/'.$research->image) }}" alt=""></td>
            <td class="fw-bold">
                <a class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">{{ __('admin.Actions') }}
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="{{ route('admin.research.show', $research->id) }}" class="menu-link px-3">{{ __('admin.View') }}</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="{{ route('admin.research.edit', $research->id) }}" class="menu-link px-3">{{ __('admin.Edit') }}</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->

                    <form method="POST" action="{{ route('admin.research.destroy', $research->id) }}">
                        @csrf
                        @method('delete')
                        <div class="menu-item px-3">
                        <a class="menu-link px-3"  href="{{ route('admin.research.destroy', $research->id) }}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                           {{ __('admin.Delete') }}
                        </a>
                    </form>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu-->
            </td>
            {{-- <td>
                <a class="btn btn-primary btn-sm m-2" href="{{ route('admin.research.edit', $research->id) }}"><i class="fas fa-edit"></i></a>
                <form class="d-inline" method="POST" action="{{ route('admin.research.destroy', $research->id) }}">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('{{ __('admin.Are you sure?!') }}')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td> --}}
        </tr>
    </tbody>
    @endforeach
</table>
</div>
</div>
{{ $researchs->links() }}
@section('scripts')
<script>
  @if (session('msg'))
  Swal.fire({
    icon: "{{ session('type') }}",
    title: "{{ session('msg') }}"
  })
  @endif
</script>
@endsection
@stop


