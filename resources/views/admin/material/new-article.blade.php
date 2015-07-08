@extends('admin.layout')

@section('content')
<div class="console-content">
    <div class="page-header">
        <h2 id="nav">素材管理 - 新建图文 <a href="{{ admin_url('material') }}" class="btn btn-success btn-sm">返回素材列表</a></h2>
    </div>
    <div class="well row">
        <div class="col-md-4">
            <div class="articles-preview-container">
                <div class="article-preview-item first">
                    <div class="article-preview-item-cover-placeholder">封面图片</div>
                    <div class="article-preview-item-title">标题</div>
                    <a href="javascript:;" class="article-preview-item-edit-link"><i class="ion-edit"></i></a>
                </div>

                <div class="article-preview-item">
                    <a href="javascript:;" class="add-new-item"><i class="ion-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <form action="" method="POST" role="form" class="article-form">
                <div class="form-group">
                    <label>标题</label>
                    <input type="text" name="title" id="input" class="form-control" value="" required="required"  title="">
                </div>
                <div class="form-group">
                    <label>作者<small>（选填）</small></label>
                    <input type="text" name="title" id="input" class="form-control" value="" required="required"  title="">
                </div>

                <div class="form-group">
                    <label>摘要<small>（选填，该摘要只在发送图文消息为单条时显示）</small></label>
                    <textarea name="" id="inputContent" class="form-control" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label>封面<small>（小图片建议尺寸：200像素 * 200像素）</small></label>
                    <div>
                        <button type="button" class="btn btn-light">上传</button>
                        <button type="button" class="btn btn-light">从图片库选择</button>
                        <label>
                            <input type="checkbox" value="" class="js-switch" data-size="small">
                            封面图片显示在正文中
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>正文<small></small></label>
                    <script id="container" name="content" style="width:100%;height:200px;" type="text/template"></script>
                </div>

                <div class="form-group">
                    <label>原文链接<small></small></label>
                    <input type="text" name="title" id="input" class="form-control" value="" required="required"  title="">
                </div>
            </form>
        </div>
        <div class="col-md-12 text-center">
            <hr>
            <button type="submit" class="btn btn-primary">保 存</button>
            <button type="submit" class="btn btn-default">预 览</button>
        </div>
    </div>
</div>

<script type="text/template" id="preview-item-template">
    <div class="article-preview-item deleteable">
        <div class="article-preview-item-thumb-title">标题</div>
        <div class="article-preview-item-thumb-placeholder"><div class="inner">缩略图</div></div>
        <div class="article-preview-item-edit-links"><a href="javascript:;" class="edit"><i class="ion-edit"></i></a><a href="javascript:;" class="delete"><i class="ion-trash-a"></i></a></div>
    </div>
</script>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('js/plugins/ueditor/themes/viease/css/ueditor-viease.css') }}">
@stop

@section('js')
<script src="{{ asset('js/admin/repos/material.js') }}"></script>
<script src="{{ asset('js/plugins/plupload/js/plupload.full.min.js') }}"></script>
<script>window.UEDITOR_HOME_URL = "{{ asset('js/plugins/ueditor/') }}/";</script>
<script type="text/javascript" src="{{ asset('js/plugins/ueditor/ueditor.config.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins/ueditor/ueditor.all.min.js') }}"></script>
<script src="{{ asset('js/uploader.js') }}"></script>
<script>
    $(function(){
        var $ue = UE.getEditor('container');

        function checkAddBtn () {
            var $addBtnBox = $('.add-new-item').closest('.article-preview-item');
            if($('.articles-preview-container .article-preview-item').length -1 >= 8){
                $addBtnBox.slideUp(100);
            } else {
                $addBtnBox.slideDown(100);
            }
        }

        // 添加项目
        $('.articles-preview-container').on('click', '.add-new-item', function(){
            var $parentItem = $(this).closest('.article-preview-item');
            $parentItem.before($('#preview-item-template').html());
            checkAddBtn();
        });

        // 删除项目
        $('.articles-preview-container').on('click', '.delete', function(){
            $(this).closest('.article-preview-item').slideUp(200, function(){
                $(this).remove();
                checkAddBtn();
            });
        });
    })
</script>
@stop