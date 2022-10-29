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
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-courseCategoryCourses">
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
                <tbody>
                @foreach($courses as $key => $course)
                    <tr data-entry-id="{{ $course->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $course->id ?? '' }}
                        </td>
                        <td>
                            {{ $course->course_category->title ?? '' }}
                        </td>
                        <td>
                            {{ $course->title ?? '' }}
                        </td>
                        <td>
                            {{ $course->slug ?? '' }}
                        </td>
                        <td>
                            {{ $course->duration ?? '' }}
                        </td>
                        <td>
                            {{ $course->class_start_date ?? '' }}
                        </td>
                        <td>
                            {{ $course->class_end_date ?? '' }}
                        </td>
                        <td>
                            @foreach($course->course_content_types as $key => $item)
                                <span class="badge badge-info">{{ $item->title }}</span>
                            @endforeach
                        </td>
                        <td>
                            @foreach($course->skill_covereds as $key => $item)
                                <span class="badge badge-info">{{ $item->title }}</span>
                            @endforeach
                        </td>
                        <td>
                            @foreach($course->required_skills as $key => $item)
                                <span class="badge badge-info">{{ $item->title }}</span>
                            @endforeach
                        </td>
                        <td>
                            {{ App\Models\Course::IS_ACTIVE_SELECT[$course->is_active] ?? '' }}
                        </td>
                        <td>
                            @if($course->picture)
                                <a href="{{ $course->picture->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $course->picture->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                        <td>
                            @can('course_show')
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.courses.show', $course->id) }}">
                                    {{ trans('global.view') }}
                                </a>
                            @endcan

                            @can('course_edit')
                                <a class="btn btn-xs btn-info" href="{{ route('admin.courses.edit', $course->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                            @endcan

                            @can('course_delete')
                                <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>
                            @endcan

                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('course_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.courses.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
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

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            });
            let table = $('.datatable-courseCategoryCourses:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
