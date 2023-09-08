@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "406 - Not Acceptable")
@section("code", "406")
@section("message", "Not Acceptable")
@section("description", "The server can only generate a response that is not accepted by the client")
