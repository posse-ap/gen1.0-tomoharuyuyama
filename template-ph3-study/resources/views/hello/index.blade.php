@extends('layouts.helloapp')

@section('title', 'Indexだよ')
@section('menubar')
  @parent
  インデックスページll
@endsection

@section('content')
  <p>ここが本文のコンテンツです。</p>
  <p>必要なだけ記述できますよ。</p>
  @include('components.message', ['msg_title'=>'OK','msg_content'=>'サブビューです。'])
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection