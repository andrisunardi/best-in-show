@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "415 - Unsupported Media Type")
@section("code", "415")
@section("message", "Unsupported Media Type")
@section("description", "The server will not accept the request, because the media type is not supported")
