@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "408 - Request Timeout")
@section("code", "408")
@section("message", "Request Timeout")
@section("description", "The server timed out waiting for the request")
