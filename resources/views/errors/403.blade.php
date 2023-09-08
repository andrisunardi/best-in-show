@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "403 - Forbidden")
@section("code", "403")
@section("message", "Forbidden")
@section("description", "The request was a legal request, but the server is refusing to respond to it")
