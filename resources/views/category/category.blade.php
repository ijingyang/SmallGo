@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="g-bd-list">
            <div class="row">
                <!--商品展示区域-->
                <div class="goodsArea" >
                    <div class="sortbar">
                        <div class="category" >
                            <span class="name">分类：</span>
                            <div class="categoryGroup" >
                                <a href="{{ url('category',['id'=>$category_info->id]) }}" class="categoryItem @if($sub_id ==0) active @endif">全部</a>
                                @if(!empty($children) )
                                    @foreach($children as $child)
                                        <a href="{{ url('category',['id'=>$category_info->id,'sub_id'=>$child->id]) }}" class="categoryItem @if($sub_id ==$child->id) active @endif">{{ $child->name }}</a>
                                    @endforeach
                                @endif


                            </div>
                        </div>
                        <div class="sorts">
                            <span class="name">排序：</span>
                            <a href="{{ url('category',['id'=>$id,'sub_id'=>$sub_id]) }}" class="sort sort-default @if($sort=='id') active @endif">默认</a>
                            <a href="{{ url('category',['id'=>$id,'sub_id'=>$sub_id,'sort'=>'price']) }}" class="sort sort-price @if($sort=='price') active @endif"><span>价格</span>
                                <div class="icon">
                                    <i class="iconfont icon-down1"></i>
                                </div>
                            </a>
                            <a href="{{ url('category',['id'=>$id,'sub_id'=>$sub_id,'sort'=>'created_at']) }}" class="sort sort-time @if($sort=='created_at') active @endif" >
                                <span>上架时间</span>
                                <i class="iconfont icon-down2"></i>
                            </a>
                        </div>
                    </div>
                    <div class="content">
                        @include('widgets.goods-list')
                    </div>
                </div>
            </div>
        </div>
        <div class="page-list">
            {{ $list->links() }}
        </div>
    </div>

@endsection