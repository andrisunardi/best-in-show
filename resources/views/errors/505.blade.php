@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "505 - HTTP Version Not Supported")
@section("code", "505")
@section("message", "HTTP Version Not Supported")
@section("description", "The server does not support the HTTP protocol version used in the request")
