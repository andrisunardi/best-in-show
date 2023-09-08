@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "405 - Method Not Allowed")
@section("code", "405")
@section("message", "Method Not Allowed")
@section("description", "A request was made of a page using a request method not supported by that page")
