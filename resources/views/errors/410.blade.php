@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "410 - Gone")
@section("code", "410")
@section("message", "Gone")
@section("description", "The requested page is no longer available")
