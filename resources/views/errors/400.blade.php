@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "400 - Bad Request")
@section("code", "400")
@section("message", "Bad Request")
@section("description", "The request cannot be fulfilled due to bad syntax")
