@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "431 - Request Header Fields Too Large")
@section("code", "431")
@section("message", "Request Header Fields Too Large")
@section("description", "The server is unwilling to process the request because either an individual header field, or all the header fields collectively, are too large")
