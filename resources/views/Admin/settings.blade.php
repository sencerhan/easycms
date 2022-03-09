@extends('layouts.admin')
@section('content')
    <h3>Settings</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.settings') }}">Settings</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.settings.save') }}">
        @csrf
        <div class="form-group">
            <script>
                function open_popup(url) {
                    var w = 880;
                    var h = 570;
                    var l = Math.floor((screen.width - w) / 1);
                    var t = Math.floor((screen.height - h) / 1);
                    var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t +
                        ",left=" + l);
                }
            </script>
            <label for="site_logo">Site Logo</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td style="width: 40px;"><a
                                href="javascript:open_popup('@filemanager_get_resource(dialog.php)?type=1&popup=1&field_id=sitelogo{{ $item->id }}&akey=@filemanager_get_key() ')"><img
                                    style="height: 40px;" src="photo.png"></a></td>
                        <td><input id="sitelogo{{ $item->id }}" type="text" name="site_logo[{{ $item->id }}]"
                                class="form-control" value="{{ $settings[$item->id]->site_logo }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <script>
                function open_popup(url) {
                    var w = 880;
                    var h = 570;
                    var l = Math.floor((screen.width - w) / 1);
                    var t = Math.floor((screen.height - h) / 1);
                    var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t +
                        ",left=" + l);
                }
            </script>
            <label for="site_logo">Favicon</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td style="width: 40px;"><a
                                href="javascript:open_popup('@filemanager_get_resource(dialog.php)?type=1&popup=1&field_id=favicon{{ $item->id }}&akey=@filemanager_get_key() ')"><img
                                    style="height: 40px;" src="photo.png"></a></td>
                        <td><input id="favicon{{ $item->id }}" type="text" name="favicon[{{ $item->id }}]"
                                class="form-control" value="{{ $settings[$item->id]->favicon }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="meta_title">Meta Title</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="meta_title" type="text" name="meta_title[{{ $item->id }}]" class="form-control"
                                value="{{ $settings[$item->id]->meta_title }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="meta_description">Meta Description</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="meta_description" type="text" name="meta_description[{{ $item->id }}]"
                                class="form-control" value="{{ $settings[$item->id]->meta_description }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="meta_keywords">Keywords</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="meta_keywords" type="text" name="meta_keywords[{{ $item->id }}]"
                                class="form-control" value="{{ $settings[$item->id]->meta_keywords }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="facebook">Facebook</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="facebook" type="text" name="facebook[{{ $item->id }}]" class="form-control"
                                value="{{ $settings[$item->id]->facebook }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="twitter">Twitter</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="twitter" type="text" name="twitter[{{ $item->id }}]" class="form-control"
                                value="{{ $settings[$item->id]->twitter }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="instagram">Instagram</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="instagram" type="text" name="instagram[{{ $item->id }}]" class="form-control"
                                value="{{ $settings[$item->id]->instagram }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="google">Google</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="google" type="text" name="google[{{ $item->id }}]" class="form-control"
                                value="{{ $settings[$item->id]->google }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="whatsapp">Whatsapp</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="whatsapp" type="text" name="whatsapp[{{ $item->id }}]" class="form-control"
                                value="{{ $settings[$item->id]->whatsapp }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="address" type="text" name="address[{{ $item->id }}]" class="form-control"
                                value="{{ $settings[$item->id]->address }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="phone" type="text" name="phone[{{ $item->id }}]" class="form-control"
                                value="{{ $settings[$item->id]->phone }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="gsm">Gsm</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="gsm" type="text" name="gsm[{{ $item->id }}]" class="form-control"
                                value="{{ $settings[$item->id]->gsm }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="fax">Fax</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="fax" type="text" name="fax[{{ $item->id }}]" class="form-control"
                                value="{{ $settings[$item->id]->fax }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="email" type="text" name="email[{{ $item->id }}]" class="form-control"
                                value="{{ $settings[$item->id]->email }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="footer_left_title">Footer Left Title</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="footer_left_title" type="text" name="footer_left_title[{{ $item->id }}]"
                                class="form-control" value="{{ $settings[$item->id]->footer_left_title }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="footer_center_title">Footer Center Title</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="footer_center_title" type="text" name="footer_center_title[{{ $item->id }}]"
                                class="form-control" value="{{ $settings[$item->id]->footer_center_title }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="footer_menu_title">Footer Menu Title</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td><input id="footer_menu_title" type="text" name="footer_menu_title[{{ $item->id }}]"
                                class="form-control" value="{{ $settings[$item->id]->footer_menu_title }}"></td>
                    </tr>
                </table>
            @endforeach
        </div>
        <script src="js/ckeditor/ckeditor.js" referrerpolicy="origin"></script>

        <script>
            @foreach (App\Models\Admin\Language::all() as $item)
                $("document").ready(function(){
                CKEDITOR.replace(document.getElementById('footer_left_content{{ $item->id }}'), {
                filebrowserBrowseUrl :
                '@filemanager_get_resource(dialog.php)?akey=@filemanager_get_key()&type=2&editor=ckeditor&fldr=',
                filebrowserUploadUrl :
                '@filemanager_get_resource(dialog.php)?akey=@filemanager_get_key()&type=2&editor=ckeditor&fldr=',
                filebrowserImageBrowseUrl :
                '@filemanager_get_resource(dialog.php)?akey=@filemanager_get_key()&type=1&editor=ckeditor&fldr=',
                language : '<?php App::getLocale(); ?>'
                });
                CKEDITOR.replace(document.getElementById('footer_center_content{{ $item->id }}'), {
                filebrowserBrowseUrl :
                '@filemanager_get_resource(dialog.php)?akey=@filemanager_get_key()&type=2&editor=ckeditor&fldr=',
                filebrowserUploadUrl :
                '@filemanager_get_resource(dialog.php)?akey=@filemanager_get_key()&type=2&editor=ckeditor&fldr=',
                filebrowserImageBrowseUrl :
                '@filemanager_get_resource(dialog.php)?akey=@filemanager_get_key()&type=1&editor=ckeditor&fldr=',
                language : '<?php App::getLocale(); ?>'
                });
                });
            @endforeach
        </script>

        <div class="form-group">
            <label for="footer_left_content">Footer Left Content</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td>
                            <textarea id="footer_left_content{{ $item->id }}"
                                name="footer_left_content[{{ $item->id }}]">{{ $settings[$item->id]->footer_left_content }}</textarea>
                        </td>
                    </tr>
                </table>
            @endforeach
        </div>
        <div class="form-group">
            <label for="footer_center_content">Footer Center Content</label>
            @foreach (App\Models\Admin\Language::all() as $item)
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40px;"><img style="height: 40px;" src="{{ $item->flag }}"></td>
                        <td>
                            <textarea id="footer_center_content{{ $item->id }}"
                                name="footer_center_content[{{ $item->id }}]">{{ $settings[$item->id]->footer_center_content }}</textarea>

                        </td>
                    </tr>
                </table>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
