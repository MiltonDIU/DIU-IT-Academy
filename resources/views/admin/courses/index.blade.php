@extends('layouts.admin')
@section('content')
    @can('course_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.courses.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.course.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.course.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Course">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.course.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.course.fields.course_category') }}
                    </th>
                    <th>
                        {{ trans('cruds.course.fields.title') }}
                    </th>
                    <th>
                        {{ trans('cruds.course.fields.slug') }}
                    </th>
                    <th>
                        {{ trans('cruds.course.fields.duration') }}
                    </th>
                    <th>
                        {{ trans('cruds.course.fields.class_start_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.course.fields.class_end_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.course.fields.course_content_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.course.fields.skill_covered') }}
                    </th>
                    <th>
                        {{ trans('cruds.course.fields.required_skill') }}
                    </th>
                    <th>
                        {{ trans('cruds.course.fields.is_active') }}
                    </th>
                    <th>
                        {{ trans('cruds.course.fields.picture') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                </thead>
            </table>
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('course_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.courses.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
                        return entry.id
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.courses.index') }}",
                columns: [
                    { data: 'placeholder', name: 'placeholder' },
                    { data: 'id', name: 'id' },
                    { data: 'course_category_title', name: 'course_category.title' },
                    { data: 'title', name: 'title' },
                    { data: 'slug', name: 'slug' },
                    { data: 'duration', name: 'duration' },
                    { data: 'class_start_date', name: 'class_start_date' },
                    { data: 'class_end_date', name: 'class_end_date' },
                   { data: 'course_content_type', name: 'course_content_types.title' },

                    { data: 'skill_covered', name: 'skill_covereds.title' },
                    { data: 'required_skill', name: 'required_skills.title' },
                    { data: 'is_active', name: 'is_active' },
                    { data: 'picture', name: 'picture', sortable: false, searchable: false },
                    { data: 'actions', name: '{{ trans('global.actions') }}' }
                ],
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            };
            let table = $('.datatable-Course').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });

    </script>
@endsection
