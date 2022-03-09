@extends('layouts.admin')
@section('content')
    @if ($pages)
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

        <script>
            var list;
            var deleteModule;
            $(document).ready(function() {
                deleteModule = function(id) {
                    $.post("{{ route('admin.deletemodule') }}", {
                        _token: "{{ csrf_token() }} ",
                        id: id
                    }, function(data) {
                        console.log(data);
                    }, "json");
                }
            });

            @foreach ($pages as $item)
                list="#sortable{{ $item->page_id }},"+list
            @endforeach
            $(function() {
                $(list + "sortable").sortable({
                    connectWith: ".connectedSortable",
                    cancel: ".disable-sort-item",
                    update: function(event, ui) {
                        var modules = [];
                        var module_id = ui.item.attr("module_id");
                        var page_id = ui.item.parent().attr("page_id");
                        ui.item.parent().find(".modules").each(function() {
                            modules.push($(this).attr("module_id"));
                        });
                        //console.log(modules);
                        $.post("{{ route('admin.moduletopage') }}", {
                            _token: "{{ csrf_token() }} ",
                            module_id: module_id,
                            page_id: page_id,
                            modulelist: modules
                        }, function(data) {
                            console.log(data);
                        }, "json");
                    }
                }).disableSelection();
            });
        </script>
        @foreach ($pages as $item)
            <table class="table table-bordered" style="max-width:320px; margin:4px; float: left;">
                <thead>
                    <tr>
                        <td>
                            {{ $item->title }}
                        </td>
                    </tr>
                </thead>
                <tbody id="sortable{{ $item->page_id }}" class="connectedSortable pages" page_id="{{ $item->page_id }}">
                    @if ($item->modules)
                        <tr class="disable-sort-item">
                            <td>
                                <b>Page Modules</b>
                            </td>
                        </tr>
                        @foreach ($item->modules as $module)
                            <tr module_id='{{ $module->id }}' class="modules">
                                <td>
                                    <b>{{ $module->type }} :</b> {{ $module->title }} <i style="cursor: pointer;" class="fa fa-trash"
                                        onclick="deleteModule({{ $module->id }}); $(this).parent().parent().remove();"></i>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        @endforeach
    @endif
@endsection
